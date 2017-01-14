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
<h3>
<?=$this->Html->link('YouTube vid',array('action'=>'youtube'))?> |
<?=$this->Html->link('Update_Product_DB',array('action'=>'update'))?> |
<?=$this->Html->link('Descriptions',array('action'=>'index','controller'=>'descriptions'))?> |
<?=$this->Html->link('Logout',array('action'=>'logout','controller'=>'firearms'))?> |

</h3>
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
echo $this->Form->input('bookingInterval',array('class'=>'form-control','label'=>'Booking interval in seconds (1800 is 30 min)'));

echo $this->Form->input('closedDays',array('class'=>'form-control','label'=>'Closed Days comma listed, see Christmas and Thanksgiving below for format')).'<br />';
?>
<h4>Package ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Double Ammo ID</h4>
<div class="row">
<?for ($i=0;$i<15;$i++):?>
<div class="col-xs-6 ">
<?
if (isset($this->request->data['Product']['appointmentSessionIDs'][$i])) $val=$this->request->data['Product']['appointmentSessionIDs'][$i];
else $val='';
echo $this->Form->input('appointmentSessionIDs',array('class'=>'form-control','label'=>false,'name'=>'data[Product][appointmentSessionIDs]['.$i.']','value'=>$val));
?>
</div>
<div class="col-xs-6 ">
<?
if (isset($this->request->data['Product']['doubleSessionIDs'][$i])) $val=$this->request->data['Product']['doubleSessionIDs'][$i];
else $val='';
echo $this->Form->input('doubleSessionIDs',array('class'=>'form-control','label'=>false,'name'=>'data[Product][doubleSessionIDs]['.$i.']','value'=>$val)).'<br />';
?>
</div>
<?endfor;?>
</div>
<h4>Discount ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Amount</h4>
<?//debug($discount_fill)?>
<div class="row">
<?for ($i=0;$i<3;$i++):?>
<div class="col-xs-4 ">
<?
if (isset($discount_fill[$i]['setting_value'])) $val=$discount_fill[$i]['setting_value'];
else $val='';
echo $this->Form->input('discountIDs',array('class'=>'form-control','label'=>false,'name'=>'data[Product][discountIDs]['.$i.']','value'=>$val));
?>
</div>
<div class="col-xs-4 ">
<?
if (isset($discount_fill[$i]['desc'])) $val=$discount_fill[$i]['desc'];
else $val='';
echo $this->Form->input('discountDesc',array('class'=>'form-control','label'=>false,'name'=>'data[Product][discountDesc]['.$i.']','value'=>$val)).'<br />';
?>
</div>
<div class="col-xs-4 ">
<?
if (isset($discount_fill[$i]['amount'])) $val=$discount_fill[$i]['amount'];
else $val='';
echo $this->Form->input('amount',array('class'=>'form-control','label'=>false,'name'=>'data[Product][amount]['.$i.']','value'=>$val)).'<br />';
?>
</div>
<?endfor;?>
</div>

<?
//echo $this->Form->input('everythingSessionID',array('class'=>'form-control','label'=>'All That & a Gat Session IDs - You must have one package assigned just to gatling and another to all lanes, comma list in order you want them booked')).'<br />';

//this is disabled, just two now - one for targets the other for double
//echo $this->Form->input('nontaxableCategoryID',array('class'=>'form-control','label'=>'No Tax category ID')).'<br />';
echo $this->Form->input('taxableCategoryID',array('class'=>'form-control','label'=>'Tax category ID (Range retail)')).'<br />';
echo $this->Form->input('doubleCategoryID',array('class'=>'form-control','label'=>'Double ammo (Package Sales)')).'<br />';
echo $this->Form->input('YouTube',array('class'=>'form-control','label'=>'YouTube video ID')).'<br />';

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