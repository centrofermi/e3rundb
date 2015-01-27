<div class="telescopeHardwareTables form">
<?php echo $this->Form->create('TelescopeHardwareTable'); ?>
	<fieldset>
		<legend><?php echo __('Add Telescope Hardware Table'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Telescope Hardware Tables'), array('action' => 'index')); ?></li>
	</ul>
</div>
