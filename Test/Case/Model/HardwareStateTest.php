<?php
App::uses('HardwareState', 'Model');

/**
 * HardwareState Test Case
 *
 */
class HardwareStateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.hardware_state'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HardwareState = ClassRegistry::init('HardwareState');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HardwareState);

		parent::tearDown();
	}

}
