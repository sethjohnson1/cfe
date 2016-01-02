<div class="webpages index">
	<h2><?php echo __('Webpages'); ?></h2>
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
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($webpages as $webpage): ?>
	<tr>
		<td><?php echo h($webpage['Webpage']['id']); ?>&nbsp;</td>
		<td><?php echo h($webpage['Webpage']['name']); ?>&nbsp;</td>
		<td><?php echo h($webpage['Webpage']['created']); ?>&nbsp;</td>
		<td><?php echo h($webpage['Webpage']['modified']); ?>&nbsp;</td>
		<td><?php echo h($webpage['Webpage']['slug']); ?>&nbsp;</td>
		<td><?php echo h($webpage['Webpage']['visible']); ?>&nbsp;</td>
		<td><?php echo h($webpage['Webpage']['img']); ?>&nbsp;</td>
		<td><?php echo h($webpage['Webpage']['metatitle']); ?>&nbsp;</td>
		<td><?php echo h($webpage['Webpage']['metadescription']); ?>&nbsp;</td>
		<td><?php echo h($webpage['Webpage']['content']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $webpage['Webpage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $webpage['Webpage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $webpage['Webpage']['id']), array(), __('Are you sure you want to delete # %s?', $webpage['Webpage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Webpage'), array('action' => 'add')); ?></li>
	</ul>
</div>
