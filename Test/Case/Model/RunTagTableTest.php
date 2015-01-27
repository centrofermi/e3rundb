<?php
App::uses('RunTagTable', 'Model');

/**
 * RunTagTable Test Case
 *
 */
class RunTagTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.run_tag_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RunTagTable = ClassRegistry::init('RunTagTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RunTagTable);

		parent::tearDown();
	}

}
