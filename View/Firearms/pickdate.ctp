<div class="row">
<div class="col-xs-12">
<?=$this->element('selected_package')?>
</div>
<div class="col-xs-12">
<h1>Pick a Date</h1>
<?echo $this->Form->create('Firearm',array('url'=>array('action'=>'picktime')));
echo $this->Form->input('package_id',array('type'=>'hidden','value'=>$package_id));
echo $this->Form->input('session_id',array('type'=>'hidden','value'=>$session_id));
?>
<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
				<?=$this->Form->input('pickdate',array('class'=>'form-control','type'=>'text','div'=>false,'label'=>false))?>
                   
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
			<?=$this->Form->submit('Pick time', array('div' => false,'class'=>'btn btn-success btn-lg date-btns','onclick'=>$this->element('blockui',array('msg'=>'Finding time slots...'))))?>
        </div>
		<?//debug($closed);?>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    defaultDate: "<?=reset($dates)?>",
					maxDate: "<?=$lastday?>",
					format: "ddd MMMM DD, YYYY",
                    disabledDates: [
					<?foreach ($closed as $cl) echo '"'.$cl.'",';?>
 
                    ]
                });
            });
        </script>
    </div>
</div>
</div>
<?foreach ($dates as $date):?>
<div class="col-xs-12 col-md-6 col-lg-2" style="padding:10px;">
<?//=$this->Html->link($date,array('action'=>'picktime',$package_id,$session_id,'?'=>array('t'=>$date)),array('class'=>'btn btn-lg btn-primary date-btns','style'=>'','onclick'=>$this->element('blockui',array('msg'=>'Getting time slots...'))))?>

</div>
<?endforeach?>
<br />

</div>
<?=$this->Form->end()?>