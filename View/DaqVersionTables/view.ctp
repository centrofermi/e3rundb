<div class="daqVersionTables view">
<h2><?php echo __('Daq Version Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($daqVersionTable['DaqVersionTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($daqVersionTable['DaqVersionTable']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Daq Version Table'), array('action' => 'edit', $daqVersionTable['DaqVersionTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Daq Version Table'), array('action' => 'delete', $daqVersionTable['DaqVersionTable']['id']), array(), __('Are you sure you want to delete # %s?', $daqVersionTable['DaqVersionTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Daq Version Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Daq Version Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
