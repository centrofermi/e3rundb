<?php
App::uses('TriggerCardTable', 'Model');

/**
 * TriggerCardTable Test Case
 *
 */
class TriggerCardTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.trigger_card_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TriggerCardTable = ClassRegistry::init('TriggerCardTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TriggerCardTable);

		parent::tearDown();
	}

}
