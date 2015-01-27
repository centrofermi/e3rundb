<?php
App::uses('TelescopeIdTable', 'Model');

/**
 * TelescopeIdTable Test Case
 *
 */
class TelescopeIdTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.telescope_id_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TelescopeIdTable = ClassRegistry::init('TelescopeIdTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TelescopeIdTable);

		parent::tearDown();
	}

}
