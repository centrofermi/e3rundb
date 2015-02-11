<?php
App::uses('HardwareConfiguration', 'Model');

/**
 * HardwareConfiguration Test Case
 *
 */
class HardwareConfigurationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.hardware_configuration'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HardwareConfiguration = ClassRegistry::init('HardwareConfiguration');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HardwareConfiguration);

		parent::tearDown();
	}

}
