<div class="runs form">
<?php echo $this->Form->create('Run'); ?>
	<fieldset>
		<legend><?php echo __('Add Run'); ?></legend>
	<?php
		echo $this->Form->input('station_name');
		echo $this->Form->input('run_date');
		echo $this->Form->input('run_id');
		echo $this->Form->input('transfer_timestamp');
		echo $this->Form->input('run_start');
		echo $this->Form->input('run_stop');
		echo $this->Form->input('run_tag');
		echo $this->Form->input('run_comment');
		echo $this->Form->input('num_events');
		echo $this->Form->input('num_hit_events');
		echo $this->Form->input('num_track_events');
		echo $this->Form->input('num_no_hit_events');
		echo $this->Form->input('num_no_hits_events');
		echo $this->Form->input('num_malformed_events');
		echo $this->Form->input('num_backward_events');
		echo $this->Form->input('processing_status_code');
		echo $this->Form->input('e3pipe_version');
		echo $this->Form->input('last_processing');
		echo $this->Form->input('last_update');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Runs'), array('action' => 'index')); ?></li>
	</ul>
</div>
