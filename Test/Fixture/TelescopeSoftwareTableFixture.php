<?php
/**
 * TelescopeSoftwareTableFixture
 *
 */
class TelescopeSoftwareTableFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'telescope_software_table';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => true, 'key' => 'primary'),
		'os_version' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
		'daq_version' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
		'transfer_software_version' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
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
			'os_version' => 1,
			'daq_version' => 1,
			'transfer_software_version' => 1,
			'valid_from' => '2014-12-23 14:14:25',
			'valid_until' => '2014-12-23 14:14:25'
		),
	);

}
