<script type="text/javascript" charset="utf-8">
	$(function() {
	$( "#tabs" ).tabs();
	});
</script>

<?php
	$this->Html->addCrumb($this->params['controller'], 'index');
	$this->Html->addCrumb($this->params['action'].' '.$telescope['Telescope']['name'], $this->params['action'].'/'.$telescope['Telescope']['id']);
	
	debug($telescope);
	debug($hardwareConfiguration);
?>
	
<div class="telescopes view">
	<h2><?php echo __('Telescope'); ?></h2>

	<div id="tabs">
		<ul>
			<li><a href="#informations"><?php echo __('Informations'); ?></a></li>
			<li><a href="#hardwareConfigurations"><?php echo __('Hardware Configuration'); ?></a></li>
		</ul>
		
		<div id="informations">
			<dl>
				<dt><?php echo __('Name'); ?></dt>
				<dd>
					<?php echo h($telescope['Telescope']['name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Description'); ?></dt>
				<dd>
					<?php echo h($telescope['Telescope']['description']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Hardware status'); ?></dt>
				<dt><?php echo __('Software status'); ?></dt>
			<dl>
		</div>
		<div id="hardwareConfigurations">
			<dl>
				<dt><?php echo __('Gps'); ?></dt>
				<dd>
					<?php echo h($hardwareConfiguration['Gps']['name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Power supply'); ?></dt>
				<dd>
					<?php echo h($hardwareConfiguration['PowerSupply']['name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Trigger card'); ?></dt>
				<dd>
					<?php echo h($hardwareConfiguration['TriggerCard']['name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Weather station'); ?></dt>
				<dd>
					<?php echo h($hardwareConfiguration['WeatherStation']['name']); ?>
					&nbsp;
				</dd>

			</dl>
		</div>

	</div>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Telescope'), array('action' => 'edit', $telescope['Telescope']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Telescope'), array('action' => 'delete', $telescope['Telescope']['id']), array(), __('Are you sure you want to delete # %s?', $telescope['Telescope']['id'])); ?> </li>
	</ul>
</div>
