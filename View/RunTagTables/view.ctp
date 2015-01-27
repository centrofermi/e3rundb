<div class="runTagTables view">
<h2><?php echo __('Run Tag Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($runTagTable['RunTagTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($runTagTable['RunTagTable']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Run Tag Table'), array('action' => 'edit', $runTagTable['RunTagTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Run Tag Table'), array('action' => 'delete', $runTagTable['RunTagTable']['id']), array(), __('Are you sure you want to delete # %s?', $runTagTable['RunTagTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Run Tag Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Run Tag Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
