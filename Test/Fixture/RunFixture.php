<?php
/**
 * RunFixture
 *
 */
class RunFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'station_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 7, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'run_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'run_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'transfer_timestamp' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'unique_run_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'run_start' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'run_stop' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'run_tag' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
		'run_comment' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'num_events' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'num_hit_events' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'num_track_events' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'num_no_hit_events' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'num_no_hits_events' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'num_malformed_events' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'num_backward_events' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'processing_status_code' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => true),
		'e3pipe_version' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'last_processing' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'last_update' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'unique_run_id', 'unique' => 1),
			'unique_run_id_UNIQUE' => array('column' => 'unique_run_id', 'unique' => 1)
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
			'station_name' => 'Lorem',
			'run_date' => '2014-12-23',
			'run_id' => 1,
			'transfer_timestamp' => '2014-12-23 14:33:40',
			'unique_run_id' => '',
			'run_start' => 1,
			'run_stop' => 1,
			'run_tag' => 1,
			'run_comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'num_events' => 1,
			'num_hit_events' => 1,
			'num_track_events' => 1,
			'num_no_hit_events' => 1,
			'num_no_hits_events' => 1,
			'num_malformed_events' => 1,
			'num_backward_events' => 1,
			'processing_status_code' => 1,
			'e3pipe_version' => 'Lorem ip',
			'last_processing' => '2014-12-23 14:33:40',
			'last_update' => '2014-12-23 14:33:40'
		),
	);

}
