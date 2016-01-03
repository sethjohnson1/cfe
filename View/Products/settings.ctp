<div class="row">
<div class="col-xs-12">
<h1>Global settings</h1>
<?
$days=array(
'sun_start',
'sun_end',
'mon_start',
'mon_end',
'tue_start',
'tue_end',
'wed_start',
'wed_end',
'thur_start',
'thur_end',
'fri_start',
'fri_end',
'sat_start',
'sat_end'
);
echo $this->Form->create();
?>
<h3>Hours</h3>
<div class="row">
<?foreach ($days as $key=>$day):?>
<div class="col-xs-6 col-lg-3">
<?=$this->Form->input($day,array('class'=>'form-control','placeholder'=>$day))?>
</div>

<?endforeach?>
<div class="col-xs-12">
<?
echo $this->Form->submit('Save', array('div' => false,'class'=>'btn btn-success btn-lg date-btns'));
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