<?php
App::uses('AppModel', 'Model');
/**
 * HardwareConfiguration Model
 *
 */
class HardwareConfiguration extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
	
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Telescopes' => array(
			'className' => 'Telescope',
			'foreignKey' => 'telescope_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Gps' => array(
			'className' => 'Gps',
			'foreignKey' => 'gps_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PowerSupply' => array(
			'className' => 'PowerSupply',
			'foreignKey' => 'power_supply_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TriggerCard' => array(
			'className' => 'TriggerCard',
			'foreignKey' => 'trigger_card_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'WeatherStation' => array(
			'className' => 'WeatherStation',
			'foreignKey' => 'weather_station_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
    );

}
