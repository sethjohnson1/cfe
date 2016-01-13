<div class="row">
<div class="col-xs-12">
<h3>Confirm your dates and times. <small><em>Once booked, a slot cannot be canceled or refunded.</em></small></h3>
<table class="table table-hover"> 
<thead> <tr> <th>Package</th> <th>Date</th> <th>Time</th> <th>Price</th><th></th> </tr> </thead><tbody> 
<?

foreach ($checkout_items['Packages'] as $mbdate=>$id):
$date_time=explode('T',$mbdate);
?>
<tr> <th scope="row"><?=$id['Name']?></th> <td><?=date('D M d, Y',strtotime($date_time[0]))?></td> <td><?=$date_time[1]?></td> <td><?=$id['Price']?></strike></span></td>
<td><?if (isset($id['Double'])) echo '<strong>2x ammo!</strong> (+$'.$id['DoubleTypeID']['OnlinePrice'].')'?></td> </tr>
<?
endforeach?>
</tbody>
</table>
<h3>Extras (online discount applied)</h3>

<?if (isset($checkout_items['Extras'])){?>
<table class="table table-hover"> 
<thead> <tr> <th>Item</th> <th>Description</th> <th>Retail</th> <th>Online Price</th><th>Qty</th> </tr> </thead><tbody> 
<?

foreach ($checkout_items['Extras'] as $id=>$extra):

$qty_val=$checkout_items['Extras'][$id];


?>
<tr> <th scope="row"><?=$extras[$id]['Name']?></th> <td><?=$extras[$id]['ShortDesc']?></td> <td><span style="color:red"><strike><?=$extras[$id]['Price']?></strike></span></td> <td><span style="color:green"><strong> <?=$extras[$id]['OnlinePrice']?></strong></span></td>
<td>
<?=$qty_val?>
</td> </tr>



<?

endforeach;
}?>
</tbody>
</table>
<h3><?=$this->Html->link('<< Back to Cart',array('action'=>'cart'))?></h3>
<h3 align="center">Sub-Total: <small><em>only</em></small> <?='$'.$checkout_total?><br />
Tax: <?=$tax_total?><br />
Total: <?=$final_total?>

</h3>
<?=$this->Html->link('Proceed to Payment >>',array('action'=>'transact'),array('class'=>'btn btn-lg btn-success date-btns'))?>
</div>
</div><!--  /checkout row -->