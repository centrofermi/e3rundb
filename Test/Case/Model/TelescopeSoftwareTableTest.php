<?php
App::uses('TelescopeSoftwareTable', 'Model');

/**
 * TelescopeSoftwareTable Test Case
 *
 */
class TelescopeSoftwareTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.telescope_software_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TelescopeSoftwareTable = ClassRegistry::init('TelescopeSoftwareTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TelescopeSoftwareTable);

		parent::tearDown();
	}

}
