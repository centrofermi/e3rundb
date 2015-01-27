<div class="telescopeSoftwareTables form">
<?php echo $this->Form->create('TelescopeSoftwareTable'); ?>
	<fieldset>
		<legend><?php echo __('Edit Telescope Software Table'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('os_version');
		echo $this->Form->input('daq_version');
		echo $this->Form->input('transfer_software_version');
		echo $this->Form->input('valid_from');
		echo $this->Form->input('valid_until');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TelescopeSoftwareTable.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('TelescopeSoftwareTable.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Telescope Software Tables'), array('action' => 'index')); ?></li>
	</ul>
</div>
