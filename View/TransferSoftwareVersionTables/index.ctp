<div class="transferSoftwareVersionTables index">
	<h2><?php echo __('Transfer Software Version Tables'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($transferSoftwareVersionTables as $transferSoftwareVersionTable): ?>
	<tr>
		<td><?php echo h($transferSoftwareVersionTable['TransferSoftwareVersionTable']['id']); ?>&nbsp;</td>
		<td><?php echo h($transferSoftwareVersionTable['TransferSoftwareVersionTable']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transferSoftwareVersionTable['TransferSoftwareVersionTable']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transferSoftwareVersionTable['TransferSoftwareVersionTable']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transferSoftwareVersionTable['TransferSoftwareVersionTable']['id']), array(), __('Are you sure you want to delete # %s?', $transferSoftwareVersionTable['TransferSoftwareVersionTable']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transfer Software Version Table'), array('action' => 'add')); ?></li>
	</ul>
</div>
