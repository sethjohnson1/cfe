<div class="webpages view">
<h2><?php echo __('Webpage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($webpage['Webpage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($webpage['Webpage']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($webpage['Webpage']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($webpage['Webpage']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($webpage['Webpage']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visible'); ?></dt>
		<dd>
			<?php echo h($webpage['Webpage']['visible']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo h($webpage['Webpage']['img']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metatitle'); ?></dt>
		<dd>
			<?php echo h($webpage['Webpage']['metatitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metadescription'); ?></dt>
		<dd>
			<?php echo h($webpage['Webpage']['metadescription']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($webpage['Webpage']['content']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Webpage'), array('action' => 'edit', $webpage['Webpage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Webpage'), array('action' => 'delete', $webpage['Webpage']['id']), array(), __('Are you sure you want to delete # %s?', $webpage['Webpage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Webpages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Webpage'), array('action' => 'add')); ?> </li>
	</ul>
</div>
