<div class="row">
<div class="col-xs-12">
<h1>Pick a Time for <?=date('D M d, Y',strtotime($pickdate))?></h1>
</div>
<?
echo $this->Form->create('Firearm',array('url'=>array('action'=>'addcart')));
echo $this->Form->input('pickdate',array('type'=>'hidden','value'=>$pickdate,'name'=>'data[Picktime][picktime]'));
?>

<?foreach ($available_times as $key=>$slot):
	$slot_view=date('H:i',strtotime($slot));
	
?>
<div class="col-xs-12 col-md-6 col-lg-2" style="padding:10px;">
<!-- this should add to cart, does nothing at the moment -->
<?


//echo $this->Html->link($slot_view,array('action'=>'addcart'),array('class'=>'btn btn-lg btn-primary date-btns','style'=>''));

echo $this->Form->submit($slot_view, array('div' => false,'class'=>'btn btn-success btn-lg date-btns','name'=>'data[Picktime][slot]','value'=>'value'.$key));

?>
</div>
<?endforeach;
echo $this->Form->end();
?>
<br />
</div><!-- /picktime row -->