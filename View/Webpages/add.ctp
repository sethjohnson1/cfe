<div class="webpages form">
<?php echo $this->Form->create('Webpage'); ?>
	<fieldset>
		<legend><?php echo __('Add Webpage'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('visible');
		echo $this->Form->input('img');
		echo $this->Form->input('metatitle');
		echo $this->Form->input('metadescription');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Webpages'), array('action' => 'index')); ?></li>
	</ul>
</div>