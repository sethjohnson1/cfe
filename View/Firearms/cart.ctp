<div class="row">
<?if (isset($cart_items)):
echo $this->Form->create('Firearm',array('url'=>array('action'=>'cart')));
$disabled=false;
?>
<div class="col-xs-12">
<h1>Shopping Cart</h1>
</div>
<div class="col-xs-12">
<h2>Lane Reservations</h2>
<?if (isset($cart_items['Packages'])){?>
<table class="table table-hover"> 
<thead> <tr> <th>Package</th> <th>Date</th> <th>Time</th> <th>Price</th><th></th> </tr> </thead><tbody> 
<?

foreach ($cart_items['Packages'] as $mbdate=>$id):
$date_time=explode('T',$mbdate);
?>
<tr> <th scope="row"><?=$packages[$id]['Name']?></th> <td><?=date('D M d, Y',strtotime($date_time[0]))?></td> <td><?=$date_time[1]?></td> <td><?=$packages[$id]['Price']?></strike></span></td>
<td><?
$xicon='<span class="glyphicon glyphicon-remove"></span>';
echo $this->Html->link($xicon,array('action'=>'cart_remove_package',urlencode($mbdate)),array('escape'=>false));
?>
</td> </tr>
<tr><th class="row"><em>&nbsp;&nbsp;Double your Fun</em></th><td>Twice the ammo, twice the fun! <span style="color:red">Online discount! (these do nothing. Subcategories?)</span></td>
<td></td>
<td><span style="color:red"><strike>40</strike></span>&nbsp;&nbsp;30</td>
<td><input type="checkbox" name="data[][]" class="" checked="checked" value="1"></input></td></tr>
<?

endforeach?>
</tbody>
</table>

<?} 
//no valid packages
else{
$disabled=true;
?>
<div class="alert alert-dismissible fade in alert-danger session-flash">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
You must have at least one package to complete checkout<br />

</div>
<?=$this->Html->link('Browse Packages',array('action'=>'pickpkg'),array('class'=>'btn btn-lg btn-success date-btns'))?>
<?}?>
</div><!-- /package column -->

<div class="col-xs-12">
<h2>Targets and Extra Ammo <small style="color:red">Buy Online and Save!</small></h2>
<?
//still need to fill in this info somehow
?>
<?if (isset($extras)){?>
<table class="table table-hover"> 
<thead> <tr> <th>Item</th> <th>Description</th> <th>Retail</th> <th>Online Price</th><th>Qty</th> </tr> </thead><tbody> 
<?
//using counter for mockup
$i=0;
foreach ($extras as $id=>$extra):
$i++;
//if ($i>3) break;
$qty_val=0;
//debug($cart_items['Extras']);
if (isset($cart_items['Extras'][$extra['barcodeID']])){
	$qty_val=$cart_items['Extras'][$extra['barcodeID']];
}

?>
<tr> <th scope="row"><?=$extra['Name']?></th> <td><?=$extra['ShortDesc']?></td> <td><span style="color:red"><strike><?=$extras[$id]['Price']?></strike></span></td> <td><span style="color:green"><strong> <?=$extras[$id]['OnlinePrice']?></strong></span></td>
<td>
<?=$this->Form->input($extra['barcodeID'],array('type'=>'number','class'=>'','label'=>false,'div'=>false,'style'=>'width:45px','value'=>$qty_val,'min'=>0,'max'=>99,'name'=>'data[Cart][Extras]['.$extra['barcodeID'].']'))?>
</td> </tr>



<?

endforeach?>
</tbody>
</table>

<?} 
//no valid extras
else{?>
<div class="alert alert-dismissible fade in alert-success session-flash">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
Don't forget to add targets and other fun extras to maximize your experience.<br />

</div>

<?}?>
<h2><small>Shirts, hats, drinks/snacks and other merchandise are available at our full retail store.</small></h2>
</div><!-- /add-ons column -->
<div class="col-xs-12 col-pad">
<h2 align="">Cart Total: <?='$'.$cart_total?><br /><small> Tax will be added at checkout</small></h2>
</div>
<div class="col-xs-12 col-md-6 col-pad">
<?=$this->Form->submit('Update', array('div' => false,'class'=>'btn btn-success btn-lg date-btns','name'=>'data[Cart][update_button]'))?>
</div>

<div class="col-xs-12 col-md-6 col-pad">
<?echo $this->Form->submit('Checkout', array('div' => false,'class'=>'btn btn-success btn-lg date-btns','name'=>'data[Cart][checkout_button]','disabled'=>$disabled));
echo $this->Form->end();
?>
</div>

<?//cart is empty
else:?>
<div class="col-xs-12" style="padding: 10px">
<?=$this->Html->link('Browse Packages',array('action'=>'pickpkg'),array('class'=>'btn btn-lg btn-success date-btns'))?>
</div>
<div class="col-xs-12" style="padding: 10px">
<?=$this->Html->link('Learn More',array('action'=>'about'),array('class'=>'btn btn-lg btn-primary date-btns'))?>
</div>

<?endif?>

</div><!-- /cart row -->