<div class="processingStatusCodeTables form">
<?php echo $this->Form->create('ProcessingStatusCodeTable'); ?>
	<fieldset>
		<legend><?php echo __('Add Processing Status Code Table'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Processing Status Code Tables'), array('action' => 'index')); ?></li>
	</ul>
</div>
