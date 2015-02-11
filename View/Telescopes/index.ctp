<?php
	$this->Html->addCrumb('Telescopes', '/telescopes/index');
?>

<div class="telescopes index">

	<h2><?php echo __('Telescopes'); ?></h2>

	<div id="results">
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('hardware_id','Hardware configuration'); ?></th>
			<th><?php echo $this->Paginator->sort('software_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($telescopes as $telescope): ?>
	<tr>
		<td><?php echo h($telescope['Telescope']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(__($telescope['Telescope']['name']), array('action' => 'view', $telescope['Telescope']['id'])); ?>&nbsp;</td>
		<td><?php echo h($telescope['Telescope']['description']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(__($telescope['Telescope']['hardware_id']), array('controller' => 'hardwareConfiguration', 'action' => 'view', $telescope['Telescope']['hardware_id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(__($telescope['Telescope']['software_id']), array('controller' => 'softwareConfiguration', 'action' => 'view', $telescope['Telescope']['software_id'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $telescope['Telescope']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $telescope['Telescope']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $telescope['Telescope']['id']), array(), __('Are you sure you want to delete # %s?', $telescope['Telescope']['id'])); ?>
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
<!--		<li><?php echo $this->Html->link(__('Search'), array('action' => 'find')); ?></li>  -->
<!--		<li><?php echo $this->Html->link(__('New Run'), array('action' => 'add')); ?></li>	-->
	</ul>
</div>