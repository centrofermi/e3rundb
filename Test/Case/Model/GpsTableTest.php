<?php
App::uses('GpsTable', 'Model');

/**
 * GpsTable Test Case
 *
 */
class GpsTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gps_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GpsTable = ClassRegistry::init('GpsTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GpsTable);

		parent::tearDown();
	}

}
