<?php 
require_once('jq/head.php');

echo $this->Html->image('logo_72.png', array('alt'=>'WFE logo','class'=>'banner'));
?>

<div class="ui-body ui-body-a ui-corner-all">
<h1>hello</h1>
</div>

<? echo $this->Html->link('Details',array('action'=>'details'),array(
	'class'=>'ui-btn ui-shadow ui-corner-all ui-icon-arrow-r ui-btn-icon-right','data-transition'=>'slide','id'=>'sj_button'
)); ?>

	
<?php require_once('jq/foot.php'); ?>
