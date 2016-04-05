<div class="row">
<div class="col-xs-12">
<h3>Confirm your dates and times. <small><em>Once booked, a slot cannot be canceled or refunded.</em></small></h3>
<table class="table table-hover"> 
<thead> <tr> <th>Package</th> <th>Date</th> <th>Time</th> <th>Price</th><th></th> </tr> </thead><tbody> 
<?

foreach ($checkout_items['Services'] as $mbdate=>$id):
$date_time=explode('T',$mbdate);
?>
<tr> <th scope="row"><?=$id['Name']?></th> <td><?=date('D M d, Y',strtotime($date_time[0]))?></td> <td><?=$date_time[1]?></td> <td><?=money_format('$%i',$id['OnlinePrice'])?></strike></span></td>
<td><?if (isset($id['Double'])) echo '<strong>2x ammo</strong> add '.money_format('$%i',$id['DoubleInfo']['OnlinePrice'])?></td> </tr>
<?
endforeach?>
</tbody>
</table>
<h3>Extras</h3>

<?if (isset($checkout_items['Extras'])){?>
<table class="table table-hover"> 
<thead> <tr> <th>Item</th> <th>Description</th> <th>Retail</th><th>Qty</th> </tr> </thead><tbody> 
<?

foreach ($checkout_items['Extras'] as $id=>$extra):

$qty_val=$checkout_items['Extras'][$id];


?>
<tr> <th scope="row"><?=$extras[$id]['Name']?></th> <td><?=$extras[$id]['ShortDesc']?></td> <td><span style="color:red"><strike><?=$extras[$id]['Price']?></strike></span></td> <td><?=money_format('$%i',$extras[$id]['OnlinePrice'])?></td>
<td>
<?=$qty_val?>
</td> </tr>



<?

endforeach;
}?>
</tbody>
</table>
<style>
.radio{
	margin-left:30px;
}
.radio input[type=radio]{
	//margin-left:0px;
}
</style>
<h3><?=$this->Html->link('<< Back to Cart',array('action'=>'cart'))?></h3>
<h3>Discounts <small>Applied at final payment, please bring card or ID</small></h3>
<?

echo $this->Form->input('Discounts', array(
    //'before' => '--before--',
    //'between' => '<div class="radio_btn"',
	//'after' => '--after--',
	'label'=>false,
	'legend'=>false,
	'class'=>'radio_dis',
    'separator' => '<br/>',
	'type'=>'radio',
	'value'=>0,
    'options' => array(1=>'Cardholder save $5', 123413=>'Active duty or retired United States military, save $10', 456=>'Senior (age 65 and up) save $5',0=>'None')
));?>
<h3 align="center">Sub-Total: <small><em>only</em></small> <?=money_format('$%i',$checkout_total)?><br />
<small>Tax: <?=money_format('$%i',$tax_total)?></small><br />
Total: <?=money_format('$%i',$final_total)?>

</h3>
<?=$this->Html->link('Proceed to Payment >>',array('action'=>'transact'),array('class'=>'btn btn-lg btn-success date-btns','onclick'=>$this->element('blockui',array('msg'=>'Loading...'))))?>
</div>
</div><!--  /checkout row -->