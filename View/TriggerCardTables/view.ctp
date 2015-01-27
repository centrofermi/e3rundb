<div class="triggerCardTables view">
<h2><?php echo __('Trigger Card Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($triggerCardTable['TriggerCardTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($triggerCardTable['TriggerCardTable']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Trigger Card Table'), array('action' => 'edit', $triggerCardTable['TriggerCardTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Trigger Card Table'), array('action' => 'delete', $triggerCardTable['TriggerCardTable']['id']), array(), __('Are you sure you want to delete # %s?', $triggerCardTable['TriggerCardTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Trigger Card Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trigger Card Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
