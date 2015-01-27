<div class="transferSoftwareVersionTables view">
<h2><?php echo __('Transfer Software Version Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transferSoftwareVersionTable['TransferSoftwareVersionTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($transferSoftwareVersionTable['TransferSoftwareVersionTable']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transfer Software Version Table'), array('action' => 'edit', $transferSoftwareVersionTable['TransferSoftwareVersionTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transfer Software Version Table'), array('action' => 'delete', $transferSoftwareVersionTable['TransferSoftwareVersionTable']['id']), array(), __('Are you sure you want to delete # %s?', $transferSoftwareVersionTable['TransferSoftwareVersionTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transfer Software Version Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfer Software Version Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
