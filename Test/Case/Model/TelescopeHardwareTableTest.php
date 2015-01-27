<?php
App::uses('TelescopeHardwareTable', 'Model');

/**
 * TelescopeHardwareTable Test Case
 *
 */
class TelescopeHardwareTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.telescope_hardware_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TelescopeHardwareTable = ClassRegistry::init('TelescopeHardwareTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TelescopeHardwareTable);

		parent::tearDown();
	}

}
