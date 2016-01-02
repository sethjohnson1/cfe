<div class="firearmsOrders view">
<h2><?php echo __('Firearms Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($firearmsOrder['FirearmsOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firearm'); ?></dt>
		<dd>
			<?php echo $this->Html->link($firearmsOrder['Firearm']['name'], array('controller' => 'firearms', 'action' => 'view', $firearmsOrder['Firearm']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($firearmsOrder['Order']['name'], array('controller' => 'orders', 'action' => 'view', $firearmsOrder['Order']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Firearms Order'), array('action' => 'edit', $firearmsOrder['FirearmsOrder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Firearms Order'), array('action' => 'delete', $firearmsOrder['FirearmsOrder']['id']), array(), __('Are you sure you want to delete # %s?', $firearmsOrder['FirearmsOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Firearms Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Firearms Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Firearms'), array('controller' => 'firearms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Firearm'), array('controller' => 'firearms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
