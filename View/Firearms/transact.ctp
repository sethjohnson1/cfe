<div class="row">
<div class="col-xs-12">
<textarea class="form-control" rows=20><?=$request?></textarea>
</div>
</div>
<?
//make an array for the inputs, the 1 or 0 is for required
$client_inputs=array(
	//'Username'=>'random'.time(),
	//'Password'=>'random1test',
	//'Notes'=>'some notes like timestamp and IP',
	//'Gender'=>'Male',
	//'LiabilityRelease'=>0,
	
	//'ID'=>$userid,
	'FirstName'=>array('First name',1),
	'MiddleName'=>array('Middle Name',false),
	'LastName'=>array('Last Name',1),
	'Email'=>array('E-mail',1),
	//'EmailOptIn'=>0,
	'AddressLine1'=>array('Address Line 1',1),
	'AddressLine2'=>array('Address Line 2',false),
	'City'=>array('City',1),
	'State'=>array('State',1),
	'PostalCode'=>array('Zip Code',1),
	'Country'=>array('Country',1),
	'MobilePhone'=>array('Primary Phone',1),
	'HomePhone'=>array('Secondary Phone',false),
	//'WorkPhone'=>'307-999-9999',
	'BirthDate'=>array('Birth Date',1),
	'EmergencyContactInfoName'=>array('Emergency Contact name',1),
	'EmergencyContactInfoPhone'=>array('Emergency Contact phone',1)
	//'ReferredBy'=>'website'
);
$billing_inputs=array(
	'BillingAddress'=>'Billing Address',
	'BillingCity'=>'City',
	'BillingState'=>'State',
	'BillingPostalCode'=>'Zip'
);
/*
$cc_inputs=array(
	'BillingName'=>'Name on Card',
	'CreditCardNumber'=>'Card number',
	'ExpMonth'=>'Expiration Month',
	'ExpYear'=>'Exp Year'
);
*/
$years=array();
for ($x=0; $x<=10;$x++){
	$years[date('Y',strtotime('today + '.$x.' years'))]= date('Y',strtotime('today + '.$x.' years'));
}
//set this to FALSE and it's disabled
$testdata='TESTING_TRUE'?>
<div class="row">
<div class="col-xs-12">
<h3>Shooter Registration</h3>
<?=$this->Form->create(array('class'=>'form-horizontal'));
foreach ($client_inputs as $name=>$label):
?>
<div class="form-group">
<?
	echo $this->Form->input($name,array('value'=>$testdata,'div'=>false,'required'=>$label[1],'placeholder'=>$label[0],'class'=>'form-control','label'=>array('text'=>$label[0],'class'=>'col-sm-2 col-xs-12 control-label'),'between'=>'<div class="col-xs-12 col-sm-10">','after'=>'</div>'));?>
</div>
	<?
endforeach;
?>



<h3>Payment Info</h3>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10 col-xs-12">
<?=$this->Form->input('SameBilling',array('value'=>$testdata,'label'=>'Billing address is the same as above','onclick'=>'toggleBilling()','checked'=>'checked','id'=>'showBillInfo','class'=>'','div'=>array('class'=>'checkbox')))?>

</div>
</div>
<style>
.billing-info{
	display:none;
}
</style>
<?foreach ($billing_inputs as $name=>$label):?>
<div class="form-group billing-info">
<?=$this->Form->input($name,array('value'=>$testdata,'div'=>false,'placeholder'=>$label,'class'=>'form-control billing-input','label'=>array('text'=>$label,'class'=>'col-sm-2 col-xs-12 control-label'),'between'=>'<div class="col-xs-12 col-sm-10">','after'=>'</div>'));?>
</div>
<?endforeach?>


<div class="form-group cc-info">
<?=$this->Form->input('BillingName',array('value'=>'','required'=>true,'label'=>'Name on Card','div'=>false,'placeholder'=>'Name on Card','class'=>'form-control','label'=>array('class'=>'col-sm-2 col-xs-12 control-label'),'between'=>'<div class="col-xs-12 col-sm-10">','after'=>'</div>'));?>
</div>
<div class="form-group cc-info">
<?=$this->Form->input('CreditCardNumber',array('value'=>'','required'=>true,'label'=>'Card number','div'=>false,'placeholder'=>'Card Number','class'=>'form-control','label'=>array('class'=>'col-sm-2 col-xs-12 control-label'),'between'=>'<div class="col-xs-12 col-sm-10">','after'=>'</div>'));?>
</div>
<div class="form-group cc-info">
<?=$this->Form->input('ExpMonth',array('options'=>array('01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12'),'label'=>'Exp Month','div'=>false,'class'=>'form-control','label'=>array('class'=>'col-sm-2 col-xs-12 control-label'),'between'=>'<div class="col-xs-12 col-sm-10">','after'=>'</div>'));?>
</div>
<div class="form-group cc-info">
<?=$this->Form->input('ExpYear',array('options'=>$years,'label'=>'Exp Year','div'=>false,'class'=>'form-control','label'=>array('class'=>'col-sm-2 col-xs-12 control-label'),'between'=>'<div class="col-xs-12 col-sm-10">','after'=>'</div>'));?>
</div>

<?//do not just blindly blockUI here
//'onclick'=>$this->element('blockui',array('msg'=>'Loading cart...'))
?>
<?=$this->Form->submit('Submit Payment', array('div' => false,'class'=>'btn btn-success btn-lg date-btns'))?>
<?=$this->Form->end();?>
</div>
</div><!-- /transaction row -->

<script>

function toggleBilling() {
	if ($("#showBillInfo").prop('checked')){
		$( ".billing-info" ).fadeOut();
		$(".billing-input").prop('required', false);
	}
	else {
		$( ".billing-info" ).fadeIn();
		$(".billing-input").prop('required', true);
	}
}

</script>