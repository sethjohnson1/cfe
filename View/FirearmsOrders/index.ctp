<div class="firearmsOrders index">
	<h2><?php echo __('Firearms Orders'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('firearm_id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($firearmsOrders as $firearmsOrder): ?>
	<tr>
		<td><?php echo h($firearmsOrder['FirearmsOrder']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($firearmsOrder['Firearm']['name'], array('controller' => 'firearms', 'action' => 'view', $firearmsOrder['Firearm']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($firearmsOrder['Order']['name'], array('controller' => 'orders', 'action' => 'view', $firearmsOrder['Order']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $firearmsOrder['FirearmsOrder']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $firearmsOrder['FirearmsOrder']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $firearmsOrder['FirearmsOrder']['id']), array(), __('Are you sure you want to delete # %s?', $firearmsOrder['FirearmsOrder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Firearms Order'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Firearms'), array('controller' => 'firearms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Firearm'), array('controller' => 'firearms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
