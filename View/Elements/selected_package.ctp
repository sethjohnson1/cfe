<?
if (isset($selected_package)):
?>

<div class="alert alert-success session-flash">
<h1><strong>Package:</strong> <?=$selected_package['Name'].' <small>$'.$selected_package['OnlinePrice'].' ['.$this->Html->link('Edit',array('action'=>'pickpkg','controller'=>'firearms')).']</small>'?></h1>
<?if (isset($pickdate)):?>
<h1><strong>Date:</strong> <?=date('D M d, Y',strtotime($pickdate)).'<small> ['.$this->Html->link('Edit',array('controller'=>'firearms','action'=>'pickdate',$package_id,$session_id)).']</small>'?></h1>
<?endif?>
<h4 style="color:red; font-style:italic">You must complete checkout to reserve your time slot!</h4>
</div>
<?endif?>