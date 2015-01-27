<div class="gpsTables view">
<h2><?php echo __('Gps Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gpsTable['GpsTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($gpsTable['GpsTable']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gps Table'), array('action' => 'edit', $gpsTable['GpsTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gps Table'), array('action' => 'delete', $gpsTable['GpsTable']['id']), array(), __('Are you sure you want to delete # %s?', $gpsTable['GpsTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Gps Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gps Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
