<div class="powerSupplyTables form">
<?php echo $this->Form->create('PowerSupplyTable'); ?>
	<fieldset>
		<legend><?php echo __('Add Power Supply Table'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Power Supply Tables'), array('action' => 'index')); ?></li>
	</ul>
</div>
