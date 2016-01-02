<div class="ordersPackages view">
<h2><?php echo __('Orders Package'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ordersPackage['OrdersPackage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersPackage['Order']['name'], array('controller' => 'orders', 'action' => 'view', $ordersPackage['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Package'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordersPackage['Package']['name'], array('controller' => 'packages', 'action' => 'view', $ordersPackage['Package']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Orders Package'), array('action' => 'edit', $ordersPackage['OrdersPackage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Orders Package'), array('action' => 'delete', $ordersPackage['OrdersPackage']['id']), array(), __('Are you sure you want to delete # %s?', $ordersPackage['OrdersPackage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders Packages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orders Package'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages'), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>
