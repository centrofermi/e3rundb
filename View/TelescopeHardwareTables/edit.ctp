<div class="telescopeHardwareTables form">
<?php echo $this->Form->create('TelescopeHardwareTable'); ?>
	<fieldset>
		<legend><?php echo __('Edit Telescope Hardware Table'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('power_supply');
		echo $this->Form->input('trigger_card');
		echo $this->Form->input('gps');
		echo $this->Form->input('weather_station');
		echo $this->Form->input('valid_from');
		echo $this->Form->input('valid_until');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TelescopeHardwareTable.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('TelescopeHardwareTable.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Telescope Hardware Tables'), array('action' => 'index')); ?></li>
	</ul>
</div>
