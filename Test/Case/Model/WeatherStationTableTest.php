<?php
App::uses('WeatherStationTable', 'Model');

/**
 * WeatherStationTable Test Case
 *
 */
class WeatherStationTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.weather_station_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WeatherStationTable = ClassRegistry::init('WeatherStationTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WeatherStationTable);

		parent::tearDown();
	}

}
