<h3><?=$this->Html->link('Add New',array('action'=>'add'))?></h3>
<?
foreach ($descriptions as $k=>$v):
	//debug($v);?>
	<h3><strong>Appointment ID</strong> <?=$v['Description']['id']?></h3>
	<h3><strong><?=$v['Description']['name']?></strong></h3>
	<div class="well">
	<?=$v['Description']['description']?>
	</div>
	<?if (!$v['Description']['visible']) echo '<span style="color:red">THIS DESCRIPTION HAS BEEN MARKED AS HIDDEN</span>'?>
	<h3><?=$this->Html->link('Edit',array('action'=>'edit',$v['Description']['id']))?></h3>
	<p><?=$this->Form->postLink(__('Delete'), array('action' => 'delete', $v['Description']['id']), array(), __('Are you sure you want to delete # %s?', $v['Description']['id']))?></p><hr />
<?	endforeach;
?>