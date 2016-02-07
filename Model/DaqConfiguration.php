<?php
App::uses('AppModel', 'Model');
/**
 * HardwareConfiguration Model
 *
 */
class DaqConfiguration extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
	
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Telescopes' => array(
			'className' => 'Telescope',
			'foreignKey' => 'telescope_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
    );

}
