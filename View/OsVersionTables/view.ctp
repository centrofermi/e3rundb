<div class="osVersionTables view">
<h2><?php echo __('Os Version Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($osVersionTable['OsVersionTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($osVersionTable['OsVersionTable']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Os Version Table'), array('action' => 'edit', $osVersionTable['OsVersionTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Os Version Table'), array('action' => 'delete', $osVersionTable['OsVersionTable']['id']), array(), __('Are you sure you want to delete # %s?', $osVersionTable['OsVersionTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Os Version Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Os Version Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
