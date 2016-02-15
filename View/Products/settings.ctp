<style>
.pad{
	margin:10px;
}
.row{
	margin-left:25px;
}
</style>
<div class="row">
<div class="col-xs-12">
<h1>Global settings</h1>
<?
echo $this->Form->create();
?>
<h3>Check the days OPEN <small> Timeslots are controlled by staff schedule in MINDBODY</small></h3>
<div class="row pad">
<?foreach ($days as $key=>$day):?>


<?=$this->Form->input($day,array('div'=>false,'type'=>'checkbox','class'=>'','placeholder'=>$day))?>


<?endforeach?>
<div class="col-xs-12 pad">
<h2>Other settings</h2>
<?

echo $this->Form->input('maxBookableDays',array('class'=>'form-control'));

echo $this->Form->input('closedDays',array('class'=>'form-control','label'=>'Closed Days comma listed, see Christmas and Thanksgiving below for format')).'<br />';

echo $this->Form->input('appointmentSessionIDs',array('class'=>'form-control','label'=>'Comma listed session IDs of packages')).'<br />';
echo $this->Form->input('doubleSessionIDs',array('class'=>'form-control','label'=>'Comma listed product IDs of Double-fun IN SAME ORDER AS ABOVE')).'<br />';

echo $this->Form->input('everythingSessionID',array('class'=>'form-control','label'=>'All That & a Gat Session IDs - You must have one package assigned just to gatling and another to all lanes, comma list in order you want them booked')).'<br />';
echo $this->Form->input('retailCategoryID',array('class'=>'form-control','label'=>'Retail category ID')).'<br />';
echo $this->Form->input('doubleCategoryID',array('class'=>'form-control','label'=>'Double-fun category ID')).'<br />';

echo $this->Form->submit('Save', array('div' => false,'class'=>'pad btn btn-success btn-lg date-btns'));
echo $this->Form->end();
?>
</div>
</div>
<pre>
<?print_r($firearm)?>
</pre>
</div>
</div>

<?
//for debugging
if (isset($request)) echo '<textarea>'.$request.'</textarea>';
?>