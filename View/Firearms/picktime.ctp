<div class="row">
<div class="col-xs-12">
<?=$this->element('selected_package')?>
</div>
<div class="col-xs-12">
<!-- h1>Pick a Time for <?=date('D M d, Y',strtotime($pickdate))?></h1 -->
<h2>Time slots are in MST (UTC-7)</h2>


<script type="text/javascript">


var currenttime = '<? print date("F d, Y H:i:s", time())?>'
//make the time

var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var serverdate=new Date(currenttime)

function padlength(what){
var output=(what.toString().length==1)? "0"+what : what
return output
}

function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
document.getElementById("servertime").innerHTML=datestring+" "+timestring
}

window.onload=function(){
setInterval("displaytime()", 1000)
}

</script>

<p><b>Current Time:</b> <span id="servertime"></span></p>

</div>
<?
echo $this->Form->create('Firearm',array('url'=>array('action'=>'cart')));
echo $this->Form->input('pickdate',array('type'=>'hidden','value'=>$pickdate,'name'=>'data[Picktime][picktime]'));
echo $this->Form->input('package_id',array('type'=>'hidden','value'=>$package_id,'name'=>'data[Picktime][package_id]'));

foreach ($available_times as $key=>$slot):
	$slot_view=date('H:i',$key);
	//slot is the staff_id now
	
?>
<div class="col-xs-12 col-md-6 col-lg-2" style="padding:10px;">
<?
echo $slot;
echo $this->Form->input($slot,array('type'=>'hidden','value'=>$slot,'name'=>'data[Picktime]['.$slot_view.']'));
echo $this->Form->submit($slot_view, array('div' => false,'class'=>'btn btn-success btn-lg date-btns','name'=>'data[Picktime][slot]','value'=>'value'.$key,'onclick'=>$this->element('blockui',array('msg'=>'Loading cart...'))));



?>
</div>
<?endforeach;
echo $this->Form->end();
?>
<br />
</div><!-- /picktime row -->