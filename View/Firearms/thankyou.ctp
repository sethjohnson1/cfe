<div class ="col-xs-12">
<div class ="jumbotron">
<h1>Thank you. <small>Your booking is confirmed </small></h1>
<h2>Booked Lane Time(s):</h2>
<ul>
<?
foreach ($cart['Services'] as $mbdate=>$val):?>
<li><h3>
<?
$date=explode('T',$mbdate);
echo '<strong>'.date('l M d, Y',strtotime($date[0])).' at '.date('h:i a',strtotime($date[1])).':</strong> '.$val['Name'];
//debug($date);
?>
</h3>
</li>
<?
endforeach;
?>
</ul>
<h2 style="color:red">Please arrive on time, if you're more than 10 minutes late we may have to cancel your reservation.</h2>
<h3><a target="_blank" href="<?=$this->base?>/files/CFE_Liability_Release.pdf" class="">Click here for the Liability Release.</a> Please print and complete it if you can, this will get you on the range even faster!</h3>
<p>
<?=$this->Html->link('Return Home','/',array('class'=>'btn btn-success btn-lg','role'=>'button'))?></p>
</div>

</div>