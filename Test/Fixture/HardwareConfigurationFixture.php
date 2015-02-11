<?php
/**
 * HardwareConfigurationFixture
 *
 */
class HardwareConfigurationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => true, 'key' => 'primary'),
		'power_supply_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
		'trigger_card_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
		'gps_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
		'weather_station_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
		'valid_from' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'valid_until' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'telescope_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => true, 'key' => 'unique'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'telescope_id_UNIQUE' => array('column' => 'telescope_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'power_supply_id' => 1,
			'trigger_card_id' => 1,
			'gps_id' => 1,
			'weather_station_id' => 1,
			'valid_from' => '2015-02-11 16:37:23',
			'valid_until' => '2015-02-11 16:37:23',
			'telescope_id' => 1
		),
	);

}
