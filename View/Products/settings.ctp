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
<div class="col-xs-6 col-lg-3 pad">
<h4>
<?=$this->Form->input($day,array('type'=>'checkbox','class'=>'','placeholder'=>$day))?>
</h4>
</div>

<?endforeach?>
<div class="col-xs-12 pad">
<?

echo $this->Form->input('maxBookableDays',array('class'=>'form-control'));

echo $this->Form->input('closedDays',array('class'=>'form-control','label'=>'Closed Days comma listed, see Christmas and Thanksgiving below for format')).'<br />';

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