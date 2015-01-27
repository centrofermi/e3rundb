<div class="telescopeSoftwareTables form">
<?php echo $this->Form->create('TelescopeSoftwareTable'); ?>
	<fieldset>
		<legend><?php echo __('Add Telescope Software Table'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Telescope Software Tables'), array('action' => 'index')); ?></li>
	</ul>
</div>
