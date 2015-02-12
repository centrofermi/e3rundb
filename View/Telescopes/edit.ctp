<script type="text/javascript" charset="utf-8">
	$(function() {
	$( "#tabs" ).tabs();
	});
</script>

<?php
	$this->Html->addCrumb($this->params['controller'], 'index');
	$this->Html->addCrumb($this->params['action'].' '.$this->request->data['Telescope']['name'], $this->params['action'].'/'.$this->request->data['Telescope']['id']);

	//debug($hardwareConfiguration);
	//debug($this->request->data);
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
				<table class="configurations">
					<thead>
						<tr>
							<th>&nbsp;</th>
							<th>Type</th>
							<th>State</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td><?php echo __('Gps'); ?></td>
							<td><?php echo $this->Form->input('HardwareConfiguration.gps_id',
										array(
											'type'=>'select',
											'div' => false,
											'label'=> false,
											'options'=>$gps,
											'selected'=>$hardwareConfiguration['HardwareConfiguration']['gps_id']
										)
									);
								?></td>
							<td><?php echo $this->Form->input('HardwareConfiguration.gps_state_id',
										array(
											'type'=>'select',
											'div' => false,
											'label'=> false,
											'options'=>$hardwareStates,
											'selected'=>$hardwareConfiguration['HardwareConfiguration']['gps_state_id']
										)
									);
								?></td>
						<tr>
						<tr>
							<td><?php echo __('Power supply'); ?></td>
							<td><?php echo $this->Form->input('HardwareConfiguration.power_supply_id',
										array(
											'type'=>'select',
											'div' => false,
											'label'=> false,
											'options'=>$powerSupplies,
											'selected'=>$hardwareConfiguration['HardwareConfiguration']['power_supply_id']
										)
									);
								?></td>
							<td><?php echo $this->Form->input('HardwareConfiguration.power_supply_state_id',
										array(
											'type'=>'select',
											'div' => false,
											'label'=> false,
											'options'=>$hardwareStates,
											'selected'=>$hardwareConfiguration['HardwareConfiguration']['power_supply_state_id']
										)
									);
								?></td>
						<tr>
						<tr>
							<td><?php echo __('Trigger card'); ?></td>
							<td><?php echo $this->Form->input('HardwareConfiguration.trigger_card_id',
										array(
											'type'=>'select',
											'div' => false,
											'label'=> false,
											'options'=>$triggerCards,
											'selected'=>$hardwareConfiguration['HardwareConfiguration']['trigger_card_id']
										)
									);
								?></td>
							<td><?php echo $this->Form->input('HardwareConfiguration.trigger_card_state_id',
										array(
											'type'=>'select',
											'div' => false,
											'label'=> false,
											'options'=>$hardwareStates,
											'selected'=>$hardwareConfiguration['HardwareConfiguration']['trigger_card_state_id']
										)
									);
								?></td>
						<tr>
						<tr>
							<td><?php echo __('Weather station'); ?></td>
							<td><?php echo $this->Form->input('HardwareConfiguration.weather_station_id',
										array(
											'type'=>'select',
											'div' => false,
											'label'=> false,
											'options'=>$weatherStations,
											'selected'=>$hardwareConfiguration['HardwareConfiguration']['weather_station_id']
										)
									);
								?></td>
							<td><?php echo $this->Form->input('HardwareConfiguration.weather_station_state_id',
										array(
											'type'=>'select',
											'div' => false,
											'label'=> false,
											'options'=>$hardwareStates,
											'selected'=>$hardwareConfiguration['HardwareConfiguration']['weather_station_state_id']
										)
									);
								?></td>
						<tr>
				</tbody>
				</table>
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
