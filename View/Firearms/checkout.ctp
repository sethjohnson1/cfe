<div class="row">
<div class="col-xs-12">
<h3>Confirm your dates and times. <small><em>Once booked, a slot cannot be canceled or refunded.</em></small></h3>
<table class="table table-hover"> 
<thead> <tr> <th>Package</th> <th>Date</th> <th>Time</th> <th>Price</th><th>2x ammo</th> </tr> </thead><tbody> 
<?

foreach ($checkout_items['Services'] as $mbdate=>$id):
$date_time=explode('T',$mbdate);
?>
<tr> <th scope="row"><?=$id['Name']?></th> <td><?=date('D M d, Y',strtotime($date_time[0]))?></td> <td><?=date('h:i a',strtotime($date_time[1]))?></td> <td><?=money_format('$%i',$id['OnlinePrice'])?></td>
<td><?if (isset($id['Double'])) echo money_format('$%i',$id['DoubleInfo']['OnlinePrice']); else echo '';?></td> </tr>
<?
endforeach?>
<?if(!empty($checkout_items['Discount'])):
$discount_array=explode('_',$checkout_items['Discount']);?>

<tr> <th scope="row"></th> <td></td> <td><?=$discount_array[1]?> Discount:</td> <td><?='-'.money_format('$%i',$discount_array[0])?></td>
<td><strong>Please bring proof to have discount honored.</strong></td> </tr>
<?

endif;?>
</tbody>
</table>
<h3>Extras</h3>

<?if (isset($checkout_items['Extras'])){?>
<table class="table table-hover"> 
<thead> <tr> <th>Item</th> <th>Description</th> <th>Price</th><th>Qty</th> </tr> </thead><tbody> 
<?

foreach ($checkout_items['Extras'] as $id=>$extra):

$qty_val=$checkout_items['Extras'][$id];


?>
<tr> <th scope="row"><?=$extras[$id]['Name']?></th> <td><?=$extras[$id]['ShortDesc']?></td><td><?=money_format('$%i',$extras[$id]['OnlinePrice'])?></td>
<td>
<?=$qty_val?>
</td> </tr>



<?

endforeach;
}?>
</tbody>
</table>

<?//debug($discounts)?>
<h3><?=$this->Html->link('<< Back to Cart',array('action'=>'cart'))?></h3>

<h3 align="center">Sub-Total: <small><em>only</em></small> <?=money_format('$%i',$checkout_total)?><br />
<small>Tax: <?=money_format('$%i',$tax_total)?></small><br />
Total: <?=money_format('$%i',$final_total)?>

</h3>
<?=$this->Html->link('Proceed to Payment >>',array('action'=>'transact'),array('class'=>'btn btn-lg date-btns','onclick'=>$this->element('blockui',array('msg'=>'Loading...'))))?>
</div>
</div><!--  /checkout row -->