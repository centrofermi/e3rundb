<div class="runs view">
<h2><?php echo __('Run'); ?></h2>
	<dl>
		<dt><?php echo __('Station Name'); ?></dt>
		<dd>
			<?php echo h($run['Run']['station_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Run Date'); ?></dt>
		<dd>
			<?php echo h($run['Run']['run_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Run Id'); ?></dt>
		<dd>
			<?php echo h($run['Run']['run_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transfer Timestamp'); ?></dt>
		<dd>
			<?php echo h($run['Run']['transfer_timestamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unique Run Id'); ?></dt>
		<dd>
			<?php echo h($run['Run']['unique_run_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Run Start'); ?></dt>
		<dd>
			<?php echo h($run['Run']['run_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Run Stop'); ?></dt>
		<dd>
			<?php echo h($run['Run']['run_stop']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Run Tag'); ?></dt>
		<dd>
			<?php echo h($run['Run']['run_tag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Run Comment'); ?></dt>
		<dd>
			<?php echo h($run['Run']['run_comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Events'); ?></dt>
		<dd>
			<?php echo h($run['Run']['num_events']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Hit Events'); ?></dt>
		<dd>
			<?php echo h($run['Run']['num_hit_events']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Track Events'); ?></dt>
		<dd>
			<?php echo h($run['Run']['num_track_events']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num No Hit Events'); ?></dt>
		<dd>
			<?php echo h($run['Run']['num_no_hit_events']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num No Hits Events'); ?></dt>
		<dd>
			<?php echo h($run['Run']['num_no_hits_events']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Malformed Events'); ?></dt>
		<dd>
			<?php echo h($run['Run']['num_malformed_events']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Backward Events'); ?></dt>
		<dd>
			<?php echo h($run['Run']['num_backward_events']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Processing Status Code'); ?></dt>
		<dd>
			<?php echo h($run['Run']['processing_status_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('E3pipe Version'); ?></dt>
		<dd>
			<?php echo h($run['Run']['e3pipe_version']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Processing'); ?></dt>
		<dd>
			<?php echo h($run['Run']['last_processing']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Update'); ?></dt>
		<dd>
			<?php echo h($run['Run']['last_update']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Run'), array('action' => 'edit', $run['Run']['unique_run_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Run'), array('action' => 'delete', $run['Run']['unique_run_id']), array(), __('Are you sure you want to delete # %s?', $run['Run']['unique_run_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Runs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Run'), array('action' => 'add')); ?> </li>
	</ul>
</div>
