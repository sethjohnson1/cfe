<div class="customersOrders view">
<h2><?php echo __('Customers Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($customersOrder['CustomersOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($customersOrder['Customer']['id'], array('controller' => 'customers', 'action' => 'view', $customersOrder['Customer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($customersOrder['Order']['name'], array('controller' => 'orders', 'action' => 'view', $customersOrder['Order']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Customers Order'), array('action' => 'edit', $customersOrder['CustomersOrder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Customers Order'), array('action' => 'delete', $customersOrder['CustomersOrder']['id']), array(), __('Are you sure you want to delete # %s?', $customersOrder['CustomersOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
