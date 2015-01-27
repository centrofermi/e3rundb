<div class="telescopeIdTables view">
<h2><?php echo __('Telescope Id Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($telescopeIdTable['TelescopeIdTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($telescopeIdTable['TelescopeIdTable']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($telescopeIdTable['TelescopeIdTable']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Telescope Id Table'), array('action' => 'edit', $telescopeIdTable['TelescopeIdTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Telescope Id Table'), array('action' => 'delete', $telescopeIdTable['TelescopeIdTable']['id']), array(), __('Are you sure you want to delete # %s?', $telescopeIdTable['TelescopeIdTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Telescope Id Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telescope Id Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
