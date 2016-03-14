<div class="row">
<div class="col-xs-12">
<?php echo $this->Form->create('Description'); ?>
	<fieldset>
		<legend><?php echo __('Add Description'); ?></legend>
	<?php
	if (isset($edit)) echo $this->Form->input('id');
		echo $this->Form->input('name', array('class'=>'form-control'));
		echo $this->Form->input('description', array('class'=>'form-control'));
		echo $this->Form->input('product_id', array('class'=>'form-control'));
		echo $this->Form->input('visible', array('class'=>'','label'=>false,'div'=>false)).' Visible';
		
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
<h3><?php echo $this->Html->link(__('List Descriptions'), array('action' => 'index')); ?></h3>
</div>
</div>
