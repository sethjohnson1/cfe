<div class="firearmsPackages index">
	<h2><?php echo __('Firearms Packages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('firearm_id'); ?></th>
			<th><?php echo $this->Paginator->sort('package_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($firearmsPackages as $firearmsPackage): ?>
	<tr>
		<td><?php echo h($firearmsPackage['FirearmsPackage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($firearmsPackage['Firearm']['name'], array('controller' => 'firearms', 'action' => 'view', $firearmsPackage['Firearm']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($firearmsPackage['Package']['name'], array('controller' => 'packages', 'action' => 'view', $firearmsPackage['Package']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $firearmsPackage['FirearmsPackage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $firearmsPackage['FirearmsPackage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $firearmsPackage['FirearmsPackage']['id']), array(), __('Are you sure you want to delete # %s?', $firearmsPackage['FirearmsPackage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Firearms Package'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Firearms'), array('controller' => 'firearms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Firearm'), array('controller' => 'firearms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages'), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>
