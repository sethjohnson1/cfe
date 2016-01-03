<div class="firearmsOrders form">
<?php echo $this->Form->create('FirearmsOrder'); ?>
	<fieldset>
		<legend><?php echo __('Edit Firearms Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('firearm_id');
		echo $this->Form->input('order_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FirearmsOrder.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('FirearmsOrder.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Firearms Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Firearms'), array('controller' => 'firearms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Firearm'), array('controller' => 'firearms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>