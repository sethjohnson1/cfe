<?
if (isset($selected_package)):
?>
<h3 style="color:red">You must complete checkout to reserve you time slot!</h3>
<div class="alert alert-success session-flash">
<h1><strong>Package:</strong> <?=$selected_package['Name'].' $'.$selected_package['Price']?></h1>
<?if (isset($pickdate)):?>
<h1><strong>Date:</strong> <?=date('D M d, Y',strtotime($pickdate))?></h1>
<?endif?>
</div>
<?endif?>