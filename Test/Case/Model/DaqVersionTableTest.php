<?php
App::uses('DaqVersionTable', 'Model');

/**
 * DaqVersionTable Test Case
 *
 */
class DaqVersionTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.daq_version_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DaqVersionTable = ClassRegistry::init('DaqVersionTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DaqVersionTable);

		parent::tearDown();
	}

}
