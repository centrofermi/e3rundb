<?php
App::uses('AppController', 'Controller');
/**
 * DaqConfigurations Controller
 *
 * @property DaqConfiguration $DaqConfiguration
 * @property PaginatorComponent $Paginator
 */
class DaqConfigurationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DaqConfiguration->recursive = 0;
		$this->set('daqConfigurations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DaqConfiguration->exists($id)) {
			throw new NotFoundException(__('Invalid daq configuration'));
		}
		$options = array('conditions' => array('DaqConfiguration.' . $this->DaqConfiguration->primaryKey => $id));
		$this->set('daqConfiguration', $this->DaqConfiguration->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		if ($this->request->is('post')) {
			$this->DaqConfiguration->create();
			if ($this->DaqConfiguration->save($this->request->data)) {
				$this->Session->setFlash(__('The daq configuration has been saved.'), 'default', array('class' => 'notification'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The daq configuration could not be saved. Please, try again.'));
			}
		} 
		/*else {
			$gps = $this->HardwareConfiguration->Gps->find('list');
			$powerSupplies = $this->HardwareConfiguration->PowerSupply->find('list');
			$triggerCards = $this->HardwareConfiguration->TriggerCard->find('list');
			$weatherStations = $this->HardwareConfiguration->WeatherStation->find('list');
			$this->set(compact('gps','powerSupplies','triggerCards','weatherStations'));
		}*/
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DaqConfiguration->exists($id)) {
			throw new NotFoundException(__('Invalid hardware configuration'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->DaqConfiguration->id = $id;
			if ($this->DaqConfiguration->save($this->request->data)) {
				$this->Session->setFlash(__('The daq configuration has been saved.'), 'default', array('class' => 'notification'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The daq configuration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DaqConfiguration.' . $this->DaqConfiguration->primaryKey => $id));
			$this->request->data = $this->DaqConfiguration->find('first', $options);
			
			/*$gps = $this->HardwareConfiguration->Gps->find('list');
			$powerSupplies = $this->HardwareConfiguration->PowerSupply->find('list');
			$triggerCards = $this->HardwareConfiguration->TriggerCard->find('list');
			$weatherStations = $this->HardwareConfiguration->WeatherStation->find('list');
			$this->set(compact('gps','powerSupplies','triggerCards','weatherStations'));
			*/
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
		$this->DaqConfiguration->id = $id;
		if (!$this->DaqConfiguration->exists()) {
			throw new NotFoundException(__('Invalid daq configuration'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DaqConfiguration->delete()) {
			$this->Session->setFlash(__('The daq configuration has been deleted.'));
		} else {
			$this->Session->setFlash(__('The daq configuration could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
