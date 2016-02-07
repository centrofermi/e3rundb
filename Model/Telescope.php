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

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please specify the name of the telescope.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'DaqConfiguration' => array(
			'className' => 'DaqConfiguration',
			'foreignKey' => 'telescope_id',
			// 'conditions' => '',
			// 'order' => '',
			// 'limit' => '',
			// 'offset' => '',
			'dependent' => true,
			'exclusive' => true
			// 'finderQuery' => ''
		),
		'HardwareConfiguration' => array(
			'className' => 'HardwareConfiguration',
			'foreignKey' => 'telescope_id',
			// 'conditions' => '',
			// 'order' => '',
			// 'limit' => '',
			// 'offset' => '',
			'dependent' => true,
			'exclusive' => true
			// 'finderQuery' => ''
		),
		'SoftwareConfiguration' => array(
			'className' => 'SoftwareConfiguration',
			'foreignKey' => 'telescope_id',
			// 'conditions' => '',
			// 'order' => '',
			// 'limit' => '',
			// 'offset' => '',
			'dependent' => true,
			'exclusive' => true
			// 'finderQuery' => ''
		)		
	);
	
}
