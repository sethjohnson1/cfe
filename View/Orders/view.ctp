<div class="orders view">
<h2><?php echo __('Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($order['Order']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($order['Order']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($order['Order']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($order['Order']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Complete'); ?></dt>
		<dd>
			<?php echo h($order['Order']['complete']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($order['Order']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($order['Order']['total']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), array(), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Firearms'), array('controller' => 'firearms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Firearm'), array('controller' => 'firearms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Packages'), array('controller' => 'packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Customers'); ?></h3>
	<?php if (!empty($order['Customer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Address1'); ?></th>
		<th><?php echo __('Address2'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Usstate'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($order['Customer'] as $customer): ?>
		<tr>
			<td><?php echo $customer['id']; ?></td>
			<td><?php echo $customer['created']; ?></td>
			<td><?php echo $customer['modified']; ?></td>
			<td><?php echo $customer['firstname']; ?></td>
			<td><?php echo $customer['lastname']; ?></td>
			<td><?php echo $customer['address1']; ?></td>
			<td><?php echo $customer['address2']; ?></td>
			<td><?php echo $customer['city']; ?></td>
			<td><?php echo $customer['usstate']; ?></td>
			<td><?php echo $customer['country']; ?></td>
			<td><?php echo $customer['notes']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'customers', 'action' => 'view', $customer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'customers', 'action' => 'edit', $customer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'customers', 'action' => 'delete', $customer['id']), array(), __('Are you sure you want to delete # %s?', $customer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Firearms'); ?></h3>
	<?php if (!empty($order['Firearm'])): ?>
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
	<?php foreach ($order['Firearm'] as $firearm): ?>
		<tr>
			<td><?php echo $firearm['id']; ?></td>
			<td><?php echo $firearm['name']; ?></td>
			<td><?php echo $firearm['created']; ?></td>
			<td><?php echo $firearm['modified']; ?></td>
			<td><?php echo $firearm['slug']; ?></td>
			<td><?php echo $firearm['visible']; ?></td>
			<td><?php echo $firearm['img']; ?></td>
			<td><?php echo $firearm['metatitle']; ?></td>
			<td><?php echo $firearm['metadescription']; ?></td>
			<td><?php echo $firearm['content']; ?></td>
			<td><?php echo $firearm['cost']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'firearms', 'action' => 'view', $firearm['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'firearms', 'action' => 'edit', $firearm['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'firearms', 'action' => 'delete', $firearm['id']), array(), __('Are you sure you want to delete # %s?', $firearm['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Firearm'), array('controller' => 'firearms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Packages'); ?></h3>
	<?php if (!empty($order['Package'])): ?>
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
	<?php foreach ($order['Package'] as $package): ?>
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
