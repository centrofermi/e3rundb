<div class="powerSupplyTables form">
<?php echo $this->Form->create('PowerSupplyTable'); ?>
	<fieldset>
		<legend><?php echo __('Edit Power Supply Table'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PowerSupplyTable.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('PowerSupplyTable.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Power Supply Tables'), array('action' => 'index')); ?></li>
	</ul>
</div>
