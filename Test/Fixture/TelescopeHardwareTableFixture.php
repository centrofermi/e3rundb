<?php
/**
 * TelescopeHardwareTableFixture
 *
 */
class TelescopeHardwareTableFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'telescope_hardware_table';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => true, 'key' => 'primary'),
		'power_supply' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
		'trigger_card' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
		'gps' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
		'weather_station' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
		'valid_from' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'valid_until' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'power_supply' => 1,
			'trigger_card' => 1,
			'gps' => 1,
			'weather_station' => 1,
			'valid_from' => '2014-12-23 14:14:17',
			'valid_until' => '2014-12-23 14:14:17'
		),
	);

}
