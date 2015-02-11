<div class="hardwareConfigurations form">
<?php echo $this->Form->create('HardwareConfiguration'); ?>
	<fieldset>
		<legend><?php echo __('Edit Hardware Configuration'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('power_supply_id');
		echo $this->Form->input('trigger_card_id');
		echo $this->Form->input('gps_id');
		echo $this->Form->input('weather_station_id');
		echo $this->Form->input('valid_from');
		echo $this->Form->input('valid_until');
		echo $this->Form->input('telescope_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('HardwareConfiguration.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('HardwareConfiguration.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Hardware Configurations'), array('action' => 'index')); ?></li>
	</ul>
</div>
