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
        )
    );
	
	public function CreationDateRangeCondition($data = array()){
		if(strpos($data['creationDateBetween'], ' - ') !== false){
			$tmp = explode(' - ', $data['creationDateBetween']);
			//$tmp[0] = $tmp[0]."-01-01";
			//$tmp[1] = $tmp[1]."-12-31";
			return $tmp;
		}else{
			//return array($data['creationDateBetween']."-01-01", $data['creationDateBetween']."-12-31");
			return array($data['creationDateBetween'], $data['creationDateBetween']);
		}
	}
	
}
