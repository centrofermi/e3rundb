<?php
App::uses('OsVersionTable', 'Model');

/**
 * OsVersionTable Test Case
 *
 */
class OsVersionTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.os_version_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OsVersionTable = ClassRegistry::init('OsVersionTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OsVersionTable);

		parent::tearDown();
	}

}
