<script type="text/javascript" charset="utf-8">
	$(function() {
	$( "#tabs" ).tabs();
	});
</script>

<?php
	$this->Html->addCrumb($this->params['controller'], 'index');
	$this->Html->addCrumb($this->params['action'].' '.$telescope['Telescope']['name'], $this->params['action'].'/'.$telescope['Telescope']['id']);
	
	//debug($telescope);
	//debug($hardwareConfiguration);
	//debug($hardwareStates);
	
	function getProperColor($var) {
		if ($var > 0 && $var < 5) return '#CC0000';
		else if ($var >= 5 && $var < 10) return '#00CCCC';
		else if ($var == 10) return '#00CC00';
		else return '#FFFFFF';
	}
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
						<td><?php echo h($hardwareConfiguration['Gps']['name']); ?></td>
						<td style="color: <?php echo getProperColor($hardwareConfiguration['HardwareConfiguration']['gps_state_id']) ?>">
							<?php echo h($hardwareStates[$hardwareConfiguration['HardwareConfiguration']['gps_state_id']]); ?>
						</td>
					</tr>
					<tr>
						<td><?php echo __('Power supply'); ?></td>
						<td><?php echo h($hardwareConfiguration['PowerSupply']['name']); ?></td>
						<td style="color: <?php echo getProperColor($hardwareConfiguration['HardwareConfiguration']['power_supply_state_id']) ?>">
							<?php echo h($hardwareStates[$hardwareConfiguration['HardwareConfiguration']['power_supply_state_id']]); ?>
						</td>
					</tr>
					<tr>
						<td><?php echo __('Trigger card'); ?></td>
						<td><?php echo h($hardwareConfiguration['TriggerCard']['name']); ?></td>
						<td style="color: <?php echo getProperColor($hardwareConfiguration['HardwareConfiguration']['trigger_card_state_id']) ?>">
							<?php echo h($hardwareStates[$hardwareConfiguration['HardwareConfiguration']['trigger_card_state_id']]); ?>
						</td>
					</tr>
					<tr>
						<td><?php echo __('Weather station'); ?></td>
						<td><?php echo h($hardwareConfiguration['WeatherStation']['name']); ?></td>
						<td style="color: <?php echo getProperColor($hardwareConfiguration['HardwareConfiguration']['weather_station_state_id']) ?>">
							<?php echo h($hardwareStates[$hardwareConfiguration['HardwareConfiguration']['weather_station_state_id']]); ?>
						</td>
					</tr>
				</tbody>
			</table>
			<div class='time'>
				<?php
					$date = date_create($hardwareConfiguration['HardwareConfiguration']['valid_from']);
					echo 'Last update: '.$date->format('g:ia \o\n l jS F Y'); 
				?>
			</div>
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
