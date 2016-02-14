<div class="row">
<div class="col-xs-12">
<?=$this->element('selected_package')?>
</div>
<div class="col-xs-12">
<h1>Pick a Date &nbsp;&nbsp;<small>We'll have your guns ready</small></h1>
<?echo $this->Form->create('Firearm',array('url'=>array('action'=>'picktime')));
echo $this->Form->input('package_id',array('type'=>'hidden','value'=>$package_id));
echo $this->Form->input('session_id',array('type'=>'hidden','value'=>$session_id));
?>
<style>
.bootstrap-datetimepicker-widget.dropdown-menu{
	width:100%;
	font-size: 1.4em;
	padding: 14px;
	display: block;
}
.bootstrap-datetimepicker-widget table td.day{
	line-height:44px;
}
.pickdate{
	height:56px;
	font-size:30px;
}

</style>

<div class="container">
    <div class="row">
        <div class='col-sm-12'>
            <div class="form-group">
                <div class='input-group date' id='pickdate'>
				<?=$this->Form->input('pickdate',array('class'=>'form-control pickdate','type'=>'hidden','div'=>false,'label'=>false))?>
                   
                    <span class="input-group-addon" id="cal-btn">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
			<p><a href="#" onclick="location.reload();">Reset</a></p>
			<?=$this->Form->submit('Continue', array('div' => false,'class'=>'btn btn-success btn-lg date-btns','onclick'=>$this->element('blockui',array('msg'=>'Finding time slots...'))))?>
        </div>
		<?//debug($closed);?>
        <script type="text/javascript">
            $(function () {
                $('#pickdate').datetimepicker({
					//debug:true,
					keepOpen: true,
					inline: true,
					collapse: false,
                    defaultDate: "<?=reset($dates)?>",
					maxDate: "<?=$lastday?>",
					minDate: "<?=date('Y-m-d')?>",
					format: "ddd MMMM DD, YYYY",
                    disabledDates: [
					<?foreach ($closed as $cl) echo '"'.$cl.'",';?>
 
                    ]
                });
            });
			$( document ).ready(function() {
				$('#pickdate').data("DateTimePicker").show();
				$("#cal-btn").prop ("onclick", null);

			});
			
			$('#cal-btn').click(function(){
				console.log('h');
				//$('#pickdate').data("DateTimePicker").show();
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