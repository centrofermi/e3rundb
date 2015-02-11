<?php
App::uses('Telescope', 'Model');

/**
 * Telescope Test Case
 *
 */
class TelescopeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.telescope'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Telescope = ClassRegistry::init('Telescope');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Telescope);

		parent::tearDown();
	}

}
