<?php
App::uses('AppModel', 'Model');
/**
 * Run Model
 *
 */
class Run extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'unique_run_id';
	
	public $actsAs = array('Search.Searchable');

    public $filterArgs = array(
        'station_name' => array(
            'type' => 'like',
            'field' => 'station_name'
        ),
		'creationDateBetween' => array(
            'type'      => 'expression',
            'method'    => 'CreationDateRangeCondition',
            'field'     => 'Run.run_date BETWEEN ? AND ?',
        ),
		'runIDBetween' => array(
            'type'      => 'expression',
            'method'    => 'RunIDRangeCondition',
            'field'     => 'Run.run_id BETWEEN ? AND ?',
        )

    );
	
	public function CreationDateRangeCondition($data = array()){
		
		if(strpos($data['creationDateBetween'], ' - ') !== false){
			$tmp = explode(' - ', $data['creationDateBetween']);
			if($tmp[0] == null) $tmp[0] = "2014-01-01";
			if($tmp[1] == null) $tmp[1] = "2114-01-01";
			return $tmp;
		}else{
			return array($data['creationDateBetween'], $data['creationDateBetween']);
		}
	}

	public function RunIDRangeCondition($data = array()){
		
		if(strpos($data['runIDBetween'], ' - ') !== false){
			$tmp = explode(' - ', $data['runIDBetween']);
			if($tmp[0] == null) $tmp[0] = "0";
			if($tmp[1] == null) $tmp[1] = "1000000";
			return $tmp;
		}else{
			return array($data['runIDBetween'], $data['runIDBetween']);
		}
	}
	
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Telescope' => array(
			'className' => 'Telescope',
			'foreignKey' => 'telescope_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
    );
	
}
