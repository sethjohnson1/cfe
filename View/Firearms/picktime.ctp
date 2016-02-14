<div class="row">
<div class="col-xs-12">
<?=$this->element('selected_package')?>
</div>
<div class="col-xs-12">

<script type="text/javascript">


var currenttime = '<? print date("F d, Y g:i:s a", time())?>'
//make the time

var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var serverdate=new Date(currenttime)

function padlength(what){
var output=(what.toString().length==1)? "0"+what : what
return output
}

function displaytime(){
if (serverdate.getHours() > 12) {
	ampm='pm';
	hours=serverdate.getHours()-12;
}
else{
	ampm='am';
	hours=serverdate.getHours();
}
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
//var timestring=padlength(hours)+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
var timestring=padlength(hours)+":"+padlength(serverdate.getMinutes())
document.getElementById("servertime").innerHTML=datestring+" "+timestring+" "+ampm
}

window.onload=function(){
setInterval("displaytime()", 1000)
}

</script>
<p>Time slots are in MST<small>(UTC-7)</small></p>
<h3><b>Current Time at the Range:</b> <span id="servertime"></span></h3>


</div>
<?
echo $this->Form->create('Firearm',array('url'=>array('action'=>'cart')));
echo $this->Form->input('pickdate',array('type'=>'hidden','value'=>$pickdate,'name'=>'data[Picktime][picktime]'));
echo $this->Form->input('package_id',array('type'=>'hidden','value'=>$package_id,'name'=>'data[Picktime][package_id]'));

foreach ($available_times as $key=>$slot):
	$slot_view=date('g:i a',$key);
	//slot is the staff_id now
	
?>
<div class="col-xs-12 col-md-6" style="padding:10px;">
<?
//$slot is the available staff_ID
//echo $slot;
echo $this->Form->input($slot,array('type'=>'hidden','value'=>$slot,'name'=>'data[Picktime]['.$slot_view.']'));
echo $this->Form->submit($slot_view, array('div' => false,'class'=>'btn btn-success btn-lg date-btns','name'=>'data[Picktime][slot]','value'=>'value'.$key,'onclick'=>$this->element('blockui',array('msg'=>'Loading cart...'))));



?>
</div>
<?endforeach;
echo $this->Form->end();
?>
<br />
</div><!-- /picktime row -->