<div class="row">
<?if (isset($cart_items)):?>
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
<tr> <th scope="row"><?=$packages[$id]['name']?></th> <td><?=date('D M d, Y',strtotime($date_time[0]))?></td> <td><?=$date_time[1]?></td> <td><?=$packages[$id]['price']?></td>
<td><?
$xicon='<span class="glyphicon glyphicon-remove"></span>';
echo $this->Html->link($xicon,array('action'=>'cart_remove_package',urlencode($mbdate)),array('escape'=>false));
?>
</td> </tr>
<tr><th class="row"><em>&nbsp;&nbsp;Double your Fun</em></th><td>Twice the ammo, twice the fun!</td></tr>
<?

endforeach?>
</tbody>
</table>

<?} 
//no valid packages
else{?>
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
<h2>Targets and Extra Ammo</h2>
<?if (isset($cart_items['Extras'])){?>
<table class="table table-hover"> 
<thead> <tr> <th>Package</th> <th>Date</th> <th>Time</th> <th>Price</th><th></th> </tr> </thead><tbody> 
<?

foreach ($cart_items['Extras'] as $mbdate=>$id):
$date_time=explode('T',$mbdate);
?>
<tr> <th scope="row"><?=$extras[$id]['name']?></th> <td><?=date('D M d, Y',strtotime($date_time[0]))?></td> <td><?=$date_time[1]?></td> <td><?=$extras[$id]['price']?></td>
<td><?
$xicon='<span class="glyphicon glyphicon-remove"></span>';
echo $this->Html->link($xicon,array('action'=>'cart_remove_package',urlencode($mbdate)),array('escape'=>false));
?>
</td> </tr>



<?

endforeach?>
</tbody>
</table>

<?} 
//no valid extras
else{?>
<div class="alert alert-dismissible fade in alert-danger session-flash">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
You must have at least one package to complete checkout<br />

</div>
<?=$this->Html->link('Browse Packages',array('action'=>'pickpkg'),array('class'=>'btn btn-lg btn-success date-btns'))?>
<?}?>
</div><!-- /add-ons column -->

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