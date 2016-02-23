<?php
App::uses('AppController', 'Controller');
/**
 * Telescopes Controller
 *
 * @property Telescope $Telescope
 * @property PaginatorComponent $Paginator
 */
class TelescopesController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;
	
/**
 * Components
 *
 * @var array
 */
	public $components = array( 
								'RequestHandler',
								'Paginator',
								'Search.Prg',
								'CsvView.CsvView'
							);
							
/**
 * Helpers
 *
 * @var array
 */	
	public $helpers = array('Js' => array('Jquery'));

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Telescope->recursive = 0;
		$this->paginate = array(
			'recursive' => 0,
			'order' => array('name' => 'asc')
		);
		$this->set('telescopes', $this->Paginator->paginate());
	}
	
/**
 * view_map method
 *
 * @return void
 */
	public function viewMap() {
		$this->paginate = array(
			'recursive' => 0,
			'order' => array('name' => 'asc')
		);
		$this->set('telescopes', $this->Paginator->paginate());

		$this->Telescope->recursive = 0;		
		$telescopes = $this->Telescope->find('all');
		$iConf = 0;
		foreach ($telescopes as $telescope){
			$options = array(
				'conditions' => array('DaqConfiguration.id' => $telescope['Telescope']['daq_id']),
			);
			$daqConfiguration = $this->Telescope->DaqConfiguration->find('first', $options);
			if(!empty($daqConfiguration)){
				$this->setJsVar('name_'.$iConf, $daqConfiguration['Telescopes']['name']);
				$this->setJsVar('lon_'.$iConf, $daqConfiguration['DaqConfiguration']['gps_longitude']);
				$this->setJsVar('lat_'.$iConf, $daqConfiguration['DaqConfiguration']['gps_latitude']);
				$iConf++;
			}
		}
		$this->setJsVar('totConfFound', $iConf);
    	$this->setJsVar('absImgPath', $this->webroot."img/");

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		
		if (!$this->Telescope->exists($id)) {
			throw new NotFoundException(__('Invalid telescope'));
		}
		$this->Telescope->unbindModel(
			array('hasMany' => array('DaqConfiguration','HardwareConfiguration', 'SoftwareConfiguration'))
		);	
		$options = array('conditions' => array('Telescope.' . $this->Telescope->primaryKey => $id));
		$telescope = $this->Telescope->find('first', $options);
		
		$options = array(
			'conditions' => array('DaqConfiguration.telescope_id' => $id),
			'order' => array('DaqConfiguration.id' =>'desc')
		);
		$daqConfiguration = $this->Telescope->DaqConfiguration->find('first', $options);
		
		$options = array(
			'conditions' => array('HardwareConfiguration.telescope_id' => $id),
			'order' => array('HardwareConfiguration.id' =>'desc')
		);		
		$hardwareConfiguration = $this->Telescope->HardwareConfiguration->find('first', $options);
		$this->loadModel('HardwareState');
		$hardwareStates = $this->HardwareState->find('list');

		$this->set(compact('telescope','daqConfiguration','hardwareConfiguration','hardwareStates'));
	}

/**
 * list_changes method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function list_changes($id = null) {
		
		if (!$this->Telescope->exists($id)) {
			throw new NotFoundException(__('Invalid telescope'));
		}
		$this->Telescope->unbindModel(
			array('hasMany' => array('DaqConfiguration','HardwareConfiguration','SoftwareConfiguration'))
		);	
		$options = array('conditions' => array('Telescope.' . $this->Telescope->primaryKey => $id));
		$telescope = $this->Telescope->find('first', $options);
		
		$options = array(
			'conditions' => array('DaqConfiguration.telescope_id' => $id),
			'order' => array('DaqConfiguration.id' =>'desc')
		);
		$daqConfiguration = $this->Telescope->DaqConfiguration->find('first', $options);
		
		$options = array(
			'conditions' => array('HardwareConfiguration.telescope_id' => $id),
			'order' => array('HardwareConfiguration.id' =>'desc')
		);		
		$hardwareConfiguration = $this->Telescope->HardwareConfiguration->find('first', $options);
		$this->loadModel('HardwareState');
		$hardwareStates = $this->HardwareState->find('list');

		$this->set(compact('telescope','daqConfiguration','hardwareConfiguration','hardwareStates'));
	}
}