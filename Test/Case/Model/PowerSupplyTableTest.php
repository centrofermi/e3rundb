<?php
App::uses('PowerSupplyTable', 'Model');

/**
 * PowerSupplyTable Test Case
 *
 */
class PowerSupplyTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.power_supply_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PowerSupplyTable = ClassRegistry::init('PowerSupplyTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PowerSupplyTable);

		parent::tearDown();
	}

}
