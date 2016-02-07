<div class="daqConfigurations index">
	<h2><?php echo __('Daq Configurations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
<!--
			<th><?php echo $this->Paginator->sort('power_supply_id'); ?></th>
			<th><?php echo $this->Paginator->sort('trigger_card_id'); ?></th>
			<th><?php echo $this->Paginator->sort('gps_id'); ?></th>
			<th><?php echo $this->Paginator->sort('weather_station_id'); ?></th>
-->
			<th><?php echo $this->Paginator->sort('valid_from'); ?></th>
			<th><?php echo $this->Paginator->sort('valid_until'); ?></th>
			<th><?php echo $this->Paginator->sort('telescope_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($daqConfigurations as $daqConfiguration): ?>
	<tr>
		<td><?php echo h($daqConfiguration['DaqConfiguration']['id']); ?>&nbsp;</td>
<!--
		<td><?php echo h($daqConfiguration['HardwareConfiguration']['power_supply_id']); ?>&nbsp;</td>
		<td><?php echo h($daqConfiguration['HardwareConfiguration']['trigger_card_id']); ?>&nbsp;</td>
		<td><?php echo h($daqConfiguration['HardwareConfiguration']['gps_id']); ?>&nbsp;</td>
		<td><?php echo h($daqConfiguration['HardwareConfiguration']['weather_station_id']); ?>&nbsp;</td>
-->
		<td><?php echo h($daqConfiguration['DaqConfiguration']['valid_from']); ?>&nbsp;</td>
		<td><?php echo h($daqConfiguration['DaqConfiguration']['valid_until']); ?>&nbsp;</td>
		<td><?php echo h($daqConfiguration['DaqConfiguration']['telescope_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $daqConfiguration['DaqConfiguration']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $daqConfiguration['DaqConfiguration']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $daqConfiguration['DaqConfiguration']['id']), array(), __('Are you sure you want to delete # %s?', $daqConfiguration['DaqConfiguration']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Daq Configuration'), array('action' => 'add')); ?></li>
	</ul>
</div>
