<?php 
require_once('jq/head.php');

?>
<div class="firearms index">
	<h2><?php echo __('Firearms'); ?></h2>
	<?php
		echo $this->Form->create('Firearm', array('url' => array_merge(array('action' => 'index'), $this->params['pass'])));
        echo $this->Form->input('searchdata', array('div' => false,'empty'=>true,'label'=>''));
        echo $this->Form->submit(__('Search', true), array('div' => false));
        echo $this->Form->end();
	?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('visible'); ?></th>
			<th><?php echo $this->Paginator->sort('img'); ?></th>
			<th><?php echo $this->Paginator->sort('metatitle'); ?></th>
			<th><?php echo $this->Paginator->sort('metadescription'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('cost'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($firearms as $firearm): ?>
	<tr>
		<td><?php echo h($firearm['Firearm']['id']); ?>&nbsp;</td>
		<td><?php echo h($firearm['Firearm']['name']); ?>&nbsp;</td>
		<td><?php echo h($firearm['Firearm']['created']); ?>&nbsp;</td>
		<td><?php echo h($firearm['Firearm']['modified']); ?>&nbsp;</td>
		<td><?php echo h($firearm['Firearm']['slug']); ?>&nbsp;</td>
		<td><?php echo h($firearm['Firearm']['visible']); ?>&nbsp;</td>
		<td><?php echo h($firearm['Firearm']['img']); ?>&nbsp;</td>
		<td><?php echo h($firearm['Firearm']['metatitle']); ?>&nbsp;</td>
		<td><?php echo h($firearm['Firearm']['metadescription']); ?>&nbsp;</td>
		<td><?php echo h($firearm['Firearm']['content']); ?>&nbsp;</td>
		<td><?php echo h($firearm['Firearm']['cost']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $firearm['Firearm']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $firearm['Firearm']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $firearm['Firearm']['id']), array(), __('Are you sure you want to delete # %s?', $firearm['Firearm']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Firearm'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages'), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>
