<div class="firearms view">
<h2><?php echo __('Firearm'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($firearm['Firearm']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($firearm['Firearm']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($firearm['Firearm']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($firearm['Firearm']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($firearm['Firearm']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visible'); ?></dt>
		<dd>
			<?php echo h($firearm['Firearm']['visible']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo h($firearm['Firearm']['img']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metatitle'); ?></dt>
		<dd>
			<?php echo h($firearm['Firearm']['metatitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metadescription'); ?></dt>
		<dd>
			<?php echo h($firearm['Firearm']['metadescription']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($firearm['Firearm']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cost'); ?></dt>
		<dd>
			<?php echo h($firearm['Firearm']['cost']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Firearm'), array('action' => 'edit', $firearm['Firearm']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Firearm'), array('action' => 'delete', $firearm['Firearm']['id']), array(), __('Are you sure you want to delete # %s?', $firearm['Firearm']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Firearms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Firearm'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages'), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($firearm['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Complete'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($firearm['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['name']; ?></td>
			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['modified']; ?></td>
			<td><?php echo $order['slug']; ?></td>
			<td><?php echo $order['complete']; ?></td>
			<td><?php echo $order['notes']; ?></td>
			<td><?php echo $order['total']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), array(), __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Packages'); ?></h3>
	<?php if (!empty($firearm['Package'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Visible'); ?></th>
		<th><?php echo __('Img'); ?></th>
		<th><?php echo __('Metatitle'); ?></th>
		<th><?php echo __('Metadescription'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Cost'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($firearm['Package'] as $package): ?>
		<tr>
			<td><?php echo $package['id']; ?></td>
			<td><?php echo $package['name']; ?></td>
			<td><?php echo $package['created']; ?></td>
			<td><?php echo $package['modified']; ?></td>
			<td><?php echo $package['slug']; ?></td>
			<td><?php echo $package['visible']; ?></td>
			<td><?php echo $package['img']; ?></td>
			<td><?php echo $package['metatitle']; ?></td>
			<td><?php echo $package['metadescription']; ?></td>
			<td><?php echo $package['content']; ?></td>
			<td><?php echo $package['cost']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'packages', 'action' => 'view', $package['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'packages', 'action' => 'edit', $package['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'packages', 'action' => 'delete', $package['id']), array(), __('Are you sure you want to delete # %s?', $package['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
