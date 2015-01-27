<div class="telescopeHardwareTables index">
	<h2><?php echo __('Telescope Hardware Tables'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('power_supply'); ?></th>
			<th><?php echo $this->Paginator->sort('trigger_card'); ?></th>
			<th><?php echo $this->Paginator->sort('gps'); ?></th>
			<th><?php echo $this->Paginator->sort('weather_station'); ?></th>
			<th><?php echo $this->Paginator->sort('valid_from'); ?></th>
			<th><?php echo $this->Paginator->sort('valid_until'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($telescopeHardwareTables as $telescopeHardwareTable): ?>
	<tr>
		<td><?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['id']); ?>&nbsp;</td>
		<td><?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['power_supply']); ?>&nbsp;</td>
		<td><?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['trigger_card']); ?>&nbsp;</td>
		<td><?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['gps']); ?>&nbsp;</td>
		<td><?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['weather_station']); ?>&nbsp;</td>
		<td><?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['valid_from']); ?>&nbsp;</td>
		<td><?php echo h($telescopeHardwareTable['TelescopeHardwareTable']['valid_until']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $telescopeHardwareTable['TelescopeHardwareTable']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $telescopeHardwareTable['TelescopeHardwareTable']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $telescopeHardwareTable['TelescopeHardwareTable']['id']), array(), __('Are you sure you want to delete # %s?', $telescopeHardwareTable['TelescopeHardwareTable']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Telescope Hardware Table'), array('action' => 'add')); ?></li>
	</ul>
</div>
