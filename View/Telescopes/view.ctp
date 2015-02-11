<div class="telescopes view">
<h2><?php echo __('Telescope'); ?></h2>
	<dl>
		<dt><?php echo __('Telescope Name'); ?></dt>
		<dd>
			<?php echo h($telescope['Telescope']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Telescope'), array('action' => 'edit', $telescope['Telescope']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Telescope'), array('action' => 'delete', $telescope['Telescope']['id']), array(), __('Are you sure you want to delete # %s?', $telescope['Telescope']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Telescopes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telescope'), array('action' => 'add')); ?> </li>
	</ul>
</div>
