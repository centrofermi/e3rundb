<div class="processingStatusCodeTables view">
<h2><?php echo __('Processing Status Code Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($processingStatusCodeTable['ProcessingStatusCodeTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($processingStatusCodeTable['ProcessingStatusCodeTable']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($processingStatusCodeTable['ProcessingStatusCodeTable']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Processing Status Code Table'), array('action' => 'edit', $processingStatusCodeTable['ProcessingStatusCodeTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Processing Status Code Table'), array('action' => 'delete', $processingStatusCodeTable['ProcessingStatusCodeTable']['id']), array(), __('Are you sure you want to delete # %s?', $processingStatusCodeTable['ProcessingStatusCodeTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Processing Status Code Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Processing Status Code Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
