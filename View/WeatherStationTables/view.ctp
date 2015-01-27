<div class="weatherStationTables view">
<h2><?php echo __('Weather Station Table'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($weatherStationTable['WeatherStationTable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($weatherStationTable['WeatherStationTable']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Weather Station Table'), array('action' => 'edit', $weatherStationTable['WeatherStationTable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Weather Station Table'), array('action' => 'delete', $weatherStationTable['WeatherStationTable']['id']), array(), __('Are you sure you want to delete # %s?', $weatherStationTable['WeatherStationTable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Weather Station Tables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Weather Station Table'), array('action' => 'add')); ?> </li>
	</ul>
</div>
