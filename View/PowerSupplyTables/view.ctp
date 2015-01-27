<div class="powerSupplyTables view">
<h2><?php echo __('Power Supply Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($powerSupplyTable['PowerSupplyTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($powerSupplyTable['PowerSupplyTable']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Power Supply Table'), array('action' => 'edit', $powerSupplyTable['PowerSupplyTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Power Supply Table'), array('action' => 'delete', $powerSupplyTable['PowerSupplyTable']['id']), array(), __('Are you sure you want to delete # %s?', $powerSupplyTable['PowerSupplyTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Power Supply Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Power Supply Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
