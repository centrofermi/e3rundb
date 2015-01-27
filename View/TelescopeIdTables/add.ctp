<div class="telescopeIdTables form">
<?php echo $this->Form->create('TelescopeIdTable'); ?>
	<fieldset>
		<legend><?php echo __('Add Telescope Id Table'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Telescope Id Tables'), array('action' => 'index')); ?></li>
	</ul>
</div>
