<script type="text/javascript" charset="utf-8">
	$(function() {
	$( "#tabs" ).tabs();
	});
</script>

<?php
	$this->Html->addCrumb($this->params['controller'], 'index');
	$this->Html->addCrumb($this->params['action'].' '.$this->request->data['Telescope']['name'], $this->params['action'].'/'.$this->request->data['Telescope']['id']);

	debug($this->request->data);
?>

<div class="telescopes form">
<?php echo $this->Form->create('Telescope'); ?>
	<fieldset>
		<legend><?php echo __('Edit Telescope'); ?></legend>
		
		<div id="tabs">
			<ul>
				<li><a href="#informations"><?php echo __('Informations'); ?></a></li>
				<li><a href="#hardwareConfigurations"><?php echo __('Hardware Configuration'); ?></a></li>
			</ul>
			
			<div id="informations">
				<?php
					echo $this->Form->input('name');
					echo $this->Form->input('description');
				?>
			</div>
			
			<div id="hardwareConfigurations">
				<?php
					echo $this->Form->input('HardwareConfiguration.gps_id',
						array(
							'type'=>'select',
							'div' => false,
							'label'=>'Gps',
							'options'=>$gps,
							'selected'=>$hardwareConfiguration['Gps']['id']
						)
					);
					echo $this->Form->input('HardwareConfiguration.power_supply_id',
						array(
							'type'=>'select',
							'div' => false,
							'label'=>'Power supply',
							'options'=>$powerSupplies,
							'selected'=>$hardwareConfiguration['PowerSupply']['id']
						)
					);
					echo $this->Form->input('HardwareConfiguration.trigger_card_id',
						array(
							'type'=>'select',
							'div' => false,
							'label'=>'Trigger card',
							'options'=>$triggerCards,
							'selected'=>$hardwareConfiguration['TriggerCard']['id']
						)
					);
					echo $this->Form->input('HardwareConfiguration.weather_station_id',
						array(
							'type'=>'select',
							'div' => false,
							'label'=>'Weather station',
							'options'=>$weatherStations,
							'selected'=>$hardwareConfiguration['WeatherStation']['id']
						)
					);
				?>
			</div>
			
		</div>

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Cancel'), array('action' => 'view', $this->request->data['Telescope']['id'])); ?></li>
	</ul>
</div>
