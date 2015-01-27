<div class="triggerCardTables form">
<?php echo $this->Form->create('TriggerCardTable'); ?>
	<fieldset>
		<legend><?php echo __('Add Trigger Card Table'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Trigger Card Tables'), array('action' => 'index')); ?></li>
	</ul>
</div>
