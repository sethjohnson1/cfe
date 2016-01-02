<?php 
require_once('jq/head.php');

echo $this->Html->image('logo_72.png', array('alt'=>'WFE logo','class'=>'banner'));
?>

<div class="ui-body ui-body-a ui-corner-all">
<h1>Opening Summer 2015</h1>
<? echo $this->Html->image('concept.jpg', array('alt'=>'Wyoming Firearms Experience concept photo','class'=>'banner')); ?>
<h3>Shoot the guns of the Old West!</h3>
<p>
<strong>Indoor firearms range</strong> – Relive the days of the Cowboy and the Mountain Men.  Colt 45 revolvers, Winchester rifles, Buffalo guns, and  even a Gatling Gun!!
</p>
</div>
<br />
<div class="ui-body ui-body-a ui-corner-all">
<?php echo $this->Html->image('interior1.jpg', array('alt'=>'Interior concept rendering','class'=>'banner')); ?>
<h3>State of the Art Experience</h3>
<ul>
<li>Full range of services and ammunition sales</li>
<li>Online reservations and self-service kiosks</li>
<li>Practice with your own guns or rent ours</li>
<li>Tactical and standard target systems</li>
<li>Virtual range for inexpensive practice and real-like scenarios</li>
<li>Free North American wildlife display</li>
</ul>
</div>
<br />
<div class="ui-body ui-body-a ui-corner-all">
<h3>Mission Statement</h3>
<p>
To provide a quality environment that explains the historical significance and evolution of firearms in the west, that teaches firearms safety and use,
and that allows people to experience that history through the use of reproduction historical and modern day firearms. 
</p>
</div>
<br />

<? echo $this->Html->link('Details',array('action'=>'details'),array(
	'class'=>'ui-btn ui-shadow ui-corner-all ui-icon-arrow-r ui-btn-icon-right','data-transition'=>'slide','id'=>'sj_button'
)); ?>

	
<?php require_once('jq/foot.php'); ?>
