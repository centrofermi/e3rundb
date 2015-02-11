<div class="runs index">

	<h2><?php echo __('Runs'); ?></h2>

	<div id="results">
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('station_name_id','Telescope ID'); ?></th>
			<th><?php echo $this->Paginator->sort('run_date'); ?></th>
			<th><?php echo $this->Paginator->sort('run_id','Run ID'); ?></th>
			<th><?php echo $this->Paginator->sort('transfer_timestamp'); ?></th>
			<th><?php echo $this->Paginator->sort('unique_run_id','Unique Run ID'); ?></th>
			<th><?php echo $this->Paginator->sort('run_start','Start Time'); ?></th>
			<th><?php echo $this->Paginator->sort('run_stop','Stop Time'); ?></th>
			<th><?php echo $this->Paginator->sort('run_tag','Tag'); ?></th>
			<th><?php echo $this->Paginator->sort('run_comment','Comment'); ?></th>
			<th><?php echo $this->Paginator->sort('num_events'); ?></th>
			<th><?php echo $this->Paginator->sort('num_hit_events'); ?></th>
			<th><?php echo $this->Paginator->sort('num_track_events'); ?></th>
			<th><?php echo $this->Paginator->sort('num_no_hit_events'); ?></th>
			<th><?php echo $this->Paginator->sort('num_no_hits_events'); ?></th>
			<th><?php echo $this->Paginator->sort('num_malformed_events'); ?></th>
			<th><?php echo $this->Paginator->sort('num_backward_events'); ?></th>
			<th><?php echo $this->Paginator->sort('processing_status_code'); ?></th>
			<th><?php echo $this->Paginator->sort('e3pipe_version'); ?></th>
			<th><?php echo $this->Paginator->sort('last_processing'); ?></th>
			<th><?php echo $this->Paginator->sort('last_update'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($runs as $run): ?>
	<tr>
		<td><?php echo h($run['Run']['station_name']); ?>&nbsp;</td>
		<!-- <td><?php echo $this->Html->link(__($run['Run']['station_name']), array('controller' => 'telescopes', 'action' => 'view', $run['Run']['telescope_id'])); ?>&nbsp;</td> -->
		<td><?php echo h($run['Run']['run_date']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['run_id']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['transfer_timestamp']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['unique_run_id']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['run_start']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['run_stop']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['run_tag']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['run_comment']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_hit_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_track_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_no_hit_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_no_hits_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_malformed_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_backward_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['processing_status_code']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['e3pipe_version']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['last_processing']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['last_update']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $run['Run']['unique_run_id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $run['Run']['unique_run_id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $run['Run']['unique_run_id']), array(), __('Are you sure you want to delete # %s?', $run['Run']['unique_run_id'])); ?>
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
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Search'), array('action' => 'find')); ?></li>
<!--		<li><?php echo $this->Html->link(__('New Run'), array('action' => 'add')); ?></li>	-->
	</ul>
</div>
