<div class="firearms form">
<?php echo $this->Form->create('Firearm'); ?>
	<fieldset>
		<legend><?php echo __('Edit Firearm'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('visible');
		echo $this->Form->input('img');
		echo $this->Form->input('metatitle');
		echo $this->Form->input('metadescription');
		echo $this->Form->input('content');
		echo $this->Form->input('cost');
		echo $this->Form->input('Order');
		echo $this->Form->input('Package');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Firearm.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Firearm.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Firearms'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages'), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>
