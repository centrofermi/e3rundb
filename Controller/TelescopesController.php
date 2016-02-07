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
				//debug($daqConfiguration);
				$this->setJsVar('lat_'.$iConf, $daqConfiguration['DaqConfiguration']['gps_latitude']);
				$this->setJsVar('lon_'.$iConf, $daqConfiguration['DaqConfiguration']['gps_longitude']);
				$iConf++;
			}
			$this->setJsVar('totConfFound', $iConf);
		}
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
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Telescope->create();
			if ($this->Telescope->save($this->request->data)) {
				$this->Session->setFlash(__('The telescope has been saved.'), 'default', array('class' => 'notification'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The telescope could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Telescope->exists($id)) {
			throw new NotFoundException(__('Invalid telescope'));
		}
		if ($this->request->is(array('post', 'put'))) {
						
			// debug($this->request->data);
			// exit;
			
			$error = false;
			$this->Telescope->id = $id;

			$telescope = $this->request->data['Telescope'];
			$telescope['id'] = $id;
			
			//update Daq configuration
			$daqConfiguration = $this->request->data['DaqConfiguration'];
			$daqConfiguration['telescope_id'] = $id;
			$daqConfiguration['valid_until'] = null;
			if($this->Telescope->DaqConfiguration->find('count', array('conditions' => $daqConfiguration)) == 0){
									
				$this->Telescope->recursive = -1;
				$this->Telescope->DaqConfiguration->id = $this->Telescope->read('daq_id',$id)['Telescope']['daq_id']; 
				$this->Telescope->DaqConfiguration->saveField('valid_until', date("Y-m-d H:i:s"));
			
				$this->Telescope->DaqConfiguration->id = null;
				if($this->Telescope->DaqConfiguration->save($daqConfiguration)){
					
					$daqConfigurationId=$this->Telescope->DaqConfiguration->getInsertId();
					$this->Telescope->DaqConfiguration->saveField('valid_from', date("Y-m-d H:i:s"));
					$telescope['hardware_id'] = $daqConfigurationId;

					Cakelog::write('info',$telescope['name'].': daq configuration update');
					
				} else $error = true;
			}

			//update Hardware configuration
			$hardwareConfiguration = $this->request->data['HardwareConfiguration'];
			$hardwareConfiguration['telescope_id'] = $id;
			$hardwareConfiguration['valid_until'] = null;
			if($this->Telescope->HardwareConfiguration->find('count', array('conditions' => $hardwareConfiguration)) == 0){
									
				$this->Telescope->recursive = -1;
				$this->Telescope->HardwareConfiguration->id = $this->Telescope->read('hardware_id',$id)['Telescope']['hardware_id']; 
				$this->Telescope->HardwareConfiguration->saveField('valid_until', date("Y-m-d H:i:s"));
			
				$this->Telescope->HardwareConfiguration->id = null;
				if($this->Telescope->HardwareConfiguration->save($hardwareConfiguration)){
					
					$hardwareConfigurationId=$this->Telescope->HardwareConfiguration->getInsertId();
					$this->Telescope->HardwareConfiguration->saveField('valid_from', date("Y-m-d H:i:s"));
					$telescope['hardware_id'] = $hardwareConfigurationId;

					Cakelog::write('info',$telescope['name'].': hardware configuration update');
					
				} else $error = true;
			}
			
			//update Telescope
			if($this->Telescope->find('count', array('conditions' => $telescope)) == 0){
				if (!$this->Telescope->save($telescope)) $error = true;
			}

			if(!$error){
				$this->Session->setFlash(__('The telescope has been updated.'), 'default', array('class' => 'notification'));
				return $this->redirect(array('action' => 'view',$id));
			} else{
				$this->Session->setFlash(__('The telescope could not be saved. Please, try again.'));
			}
			
		} else {
			$options = array('conditions' => array('Telescope.' . $this->Telescope->primaryKey => $id));
			$this->request->data = $this->Telescope->find('first', $options);
			
			$options = array(
				'conditions' => array('HardwareConfiguration.telescope_id' => $id),
				'order' => array('HardwareConfiguration.id' =>'desc')
			);
			
			$this->Telescope->HardwareConfiguration->recursive = -1;
			$hardwareConfiguration = $this->Telescope->HardwareConfiguration->find('first', $options);
			$gps = $this->Telescope->HardwareConfiguration->Gps->find('list');
			$powerSupplies = $this->Telescope->HardwareConfiguration->PowerSupply->find('list');
			$triggerCards = $this->Telescope->HardwareConfiguration->TriggerCard->find('list');
			$weatherStations = $this->Telescope->HardwareConfiguration->WeatherStation->find('list');
			
			$this->loadModel('HardwareState');
			$hardwareStates = $this->HardwareState->find('list');

			$this->set(compact('hardwareConfiguration','gps','powerSupplies','triggerCards','weatherStations','hardwareStates'));
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Telescope->id = $id;
		if (!$this->Telescope->exists()) {
			throw new NotFoundException(__('Invalid telescope'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Telescope->delete()) {
			$this->Session->setFlash(__('The telescope has been deleted.'));
		} else {
			$this->Session->setFlash(__('The telescope could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
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