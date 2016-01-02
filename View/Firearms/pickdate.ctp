<div class="row">
<div class="col-xs-12">
<h1>Pick a Date</h1>
</div>
<?foreach ($dates as $date):?>
<div class="col-xs-12 col-md-6 col-lg-2" style="padding:10px;">
<?=$this->Html->link($date,array('action'=>'picktime','?'=>array('t'=>$date)),array('class'=>'btn btn-lg btn-primary date-btns','style'=>''))?>

</div>
<?endforeach?>
<br />

</div>


<textarea rows=20>
<?=$request?>
</textarea>