<?php
App::uses('AppModel', 'Model');
/**
 * Telescope Model
 *
 */
class Telescope extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id';
	
	public $actsAs = array('Search.Searchable');

}
