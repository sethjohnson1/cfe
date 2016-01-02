<div class="firearmsPackages view">
<h2><?php echo __('Firearms Package'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($firearmsPackage['FirearmsPackage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firearm'); ?></dt>
		<dd>
			<?php echo $this->Html->link($firearmsPackage['Firearm']['name'], array('controller' => 'firearms', 'action' => 'view', $firearmsPackage['Firearm']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Package'); ?></dt>
		<dd>
			<?php echo $this->Html->link($firearmsPackage['Package']['name'], array('controller' => 'packages', 'action' => 'view', $firearmsPackage['Package']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Firearms Package'), array('action' => 'edit', $firearmsPackage['FirearmsPackage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Firearms Package'), array('action' => 'delete', $firearmsPackage['FirearmsPackage']['id']), array(), __('Are you sure you want to delete # %s?', $firearmsPackage['FirearmsPackage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Firearms Packages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Firearms Package'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Firearms'), array('controller' => 'firearms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Firearm'), array('controller' => 'firearms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages'), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>
