<div class="hardwareConfigurations index">
	<h2><?php echo __('Hardware Configurations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('power_supply_id'); ?></th>
			<th><?php echo $this->Paginator->sort('trigger_card_id'); ?></th>
			<th><?php echo $this->Paginator->sort('gps_id'); ?></th>
			<th><?php echo $this->Paginator->sort('weather_station_id'); ?></th>
			<th><?php echo $this->Paginator->sort('valid_from'); ?></th>
			<th><?php echo $this->Paginator->sort('valid_until'); ?></th>
			<th><?php echo $this->Paginator->sort('telescope_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($hardwareConfigurations as $hardwareConfiguration): ?>
	<tr>
		<td><?php echo h($hardwareConfiguration['HardwareConfiguration']['id']); ?>&nbsp;</td>
		<td><?php echo h($hardwareConfiguration['HardwareConfiguration']['power_supply_id']); ?>&nbsp;</td>
		<td><?php echo h($hardwareConfiguration['HardwareConfiguration']['trigger_card_id']); ?>&nbsp;</td>
		<td><?php echo h($hardwareConfiguration['HardwareConfiguration']['gps_id']); ?>&nbsp;</td>
		<td><?php echo h($hardwareConfiguration['HardwareConfiguration']['weather_station_id']); ?>&nbsp;</td>
		<td><?php echo h($hardwareConfiguration['HardwareConfiguration']['valid_from']); ?>&nbsp;</td>
		<td><?php echo h($hardwareConfiguration['HardwareConfiguration']['valid_until']); ?>&nbsp;</td>
		<td><?php echo h($hardwareConfiguration['HardwareConfiguration']['telescope_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $hardwareConfiguration['HardwareConfiguration']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $hardwareConfiguration['HardwareConfiguration']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hardwareConfiguration['HardwareConfiguration']['id']), array(), __('Are you sure you want to delete # %s?', $hardwareConfiguration['HardwareConfiguration']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Hardware Configuration'), array('action' => 'add')); ?></li>
	</ul>
</div>
