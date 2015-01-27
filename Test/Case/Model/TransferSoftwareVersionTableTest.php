<?php
App::uses('TransferSoftwareVersionTable', 'Model');

/**
 * TransferSoftwareVersionTable Test Case
 *
 */
class TransferSoftwareVersionTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transfer_software_version_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransferSoftwareVersionTable = ClassRegistry::init('TransferSoftwareVersionTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransferSoftwareVersionTable);

		parent::tearDown();
	}

}
