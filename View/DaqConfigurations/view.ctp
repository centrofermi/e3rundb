<div class="daqConfigurations view">
	<h2><?php echo __('Daq Configuration'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($daqConfiguration['DaqConfiguration']['id']); ?>
			&nbsp;
		</dd>
<!--		
		<dt><?php echo __('Power Supply Id'); ?></dt>
		<dd>
			<?php echo h($hardwareConfiguration['HardwareConfiguration']['power_supply_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trigger Card Id'); ?></dt>
		<dd>
			<?php echo h($hardwareConfiguration['HardwareConfiguration']['trigger_card_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gps Id'); ?></dt>
		<dd>
			<?php echo h($hardwareConfiguration['HardwareConfiguration']['gps_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weather Station Id'); ?></dt>
		<dd>
			<?php echo h($hardwareConfiguration['HardwareConfiguration']['weather_station_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valid From'); ?></dt>
		<dd>
			<?php echo h($hardwareConfiguration['HardwareConfiguration']['valid_from']); ?>
			&nbsp;
		</dd>
-->
		<dt><?php echo __('Valid Until'); ?></dt>
		<dd>
			<?php echo h($daqConfiguration['DaqConfiguration']['valid_until']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telescope Id'); ?></dt>
		<dd>
			<?php echo h($daqConfiguration['DaqConfiguration']['telescope_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Daq Configuration'), array('action' => 'edit', $daqConfiguration['DaqConfiguration']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Daq Configuration'), array('action' => 'delete', $daqConfiguration['DaqConfiguration']['id']), array(), __('Are you sure you want to delete # %s?', $hardwareConfiguration['HardwareConfiguration']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Daq Configurations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Daq Configuration'), array('action' => 'add')); ?> </li>
	</ul>
</div>
