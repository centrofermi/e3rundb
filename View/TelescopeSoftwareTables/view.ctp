<div class="telescopeSoftwareTables view">
<h2><?php echo __('Telescope Software Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($telescopeSoftwareTable['TelescopeSoftwareTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Os Version'); ?></dt>
		<dd>
			<?php echo h($telescopeSoftwareTable['TelescopeSoftwareTable']['os_version']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Daq Version'); ?></dt>
		<dd>
			<?php echo h($telescopeSoftwareTable['TelescopeSoftwareTable']['daq_version']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transfer Software Version'); ?></dt>
		<dd>
			<?php echo h($telescopeSoftwareTable['TelescopeSoftwareTable']['transfer_software_version']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valid From'); ?></dt>
		<dd>
			<?php echo h($telescopeSoftwareTable['TelescopeSoftwareTable']['valid_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valid Until'); ?></dt>
		<dd>
			<?php echo h($telescopeSoftwareTable['TelescopeSoftwareTable']['valid_until']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Telescope Software Table'), array('action' => 'edit', $telescopeSoftwareTable['TelescopeSoftwareTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Telescope Software Table'), array('action' => 'delete', $telescopeSoftwareTable['TelescopeSoftwareTable']['id']), array(), __('Are you sure you want to delete # %s?', $telescopeSoftwareTable['TelescopeSoftwareTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Telescope Software Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telescope Software Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
