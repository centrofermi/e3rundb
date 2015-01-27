<div class="telescopeHardwareTables view">
<h2><?php echo __('Telescope Hardware Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Power Supply'); ?></dt>
		<dd>
			<?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['power_supply']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trigger Card'); ?></dt>
		<dd>
			<?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['trigger_card']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gps'); ?></dt>
		<dd>
			<?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['gps']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weather Station'); ?></dt>
		<dd>
			<?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['weather_station']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valid From'); ?></dt>
		<dd>
			<?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['valid_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valid Until'); ?></dt>
		<dd>
			<?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['valid_until']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Telescope Hardware Table'), array('action' => 'edit', $telescopeHardwareTable['TelescopeHardwareTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Telescope Hardware Table'), array('action' => 'delete', $telescopeHardwareTable['TelescopeHardwareTable']['id']), array(), __('Are you sure you want to delete # %s?', $telescopeHardwareTable['TelescopeHardwareTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Telescope Hardware Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telescope Hardware Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
