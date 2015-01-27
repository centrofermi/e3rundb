<?php
App::uses('ProcessingStatusCodeTable', 'Model');

/**
 * ProcessingStatusCodeTable Test Case
 *
 */
class ProcessingStatusCodeTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.processing_status_code_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProcessingStatusCodeTable = ClassRegistry::init('ProcessingStatusCodeTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProcessingStatusCodeTable);

		parent::tearDown();
	}

}
