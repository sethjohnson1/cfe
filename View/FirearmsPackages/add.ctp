<div class="firearmsPackages form">
<?php echo $this->Form->create('FirearmsPackage'); ?>
	<fieldset>
		<legend><?php echo __('Add Firearms Package'); ?></legend>
	<?php
		echo $this->Form->input('firearm_id');
		echo $this->Form->input('package_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Firearms Packages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Firearms'), array('controller' => 'firearms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Firearm'), array('controller' => 'firearms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages'), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>
