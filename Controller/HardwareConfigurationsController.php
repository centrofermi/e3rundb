<?php
App::uses('AppController', 'Controller');
/**
 * HardwareConfigurations Controller
 *
 * @property HardwareConfiguration $HardwareConfiguration
 * @property PaginatorComponent $Paginator
 */
class HardwareConfigurationsController extends AppController {

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
		$this->HardwareConfiguration->recursive = 0;
		$this->set('hardwareConfigurations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HardwareConfiguration->exists($id)) {
			throw new NotFoundException(__('Invalid hardware configuration'));
		}
		$options = array('conditions' => array('HardwareConfiguration.' . $this->HardwareConfiguration->primaryKey => $id));
		$this->set('hardwareConfiguration', $this->HardwareConfiguration->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		if ($this->request->is('post')) {
			$this->HardwareConfiguration->create();
			if ($this->HardwareConfiguration->save($this->request->data)) {
				$this->Session->setFlash(__('The hardware configuration has been saved.'), 'default', array('class' => 'notification'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hardware configuration could not be saved. Please, try again.'));
			}
		} else {
			$gps = $this->HardwareConfiguration->Gps->find('list');
			$powerSupplies = $this->HardwareConfiguration->PowerSupply->find('list');
			$triggerCards = $this->HardwareConfiguration->TriggerCard->find('list');
			$weatherStations = $this->HardwareConfiguration->WeatherStation->find('list');
			$this->set(compact('gps','powerSupplies','triggerCards','weatherStations'));
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
		if (!$this->HardwareConfiguration->exists($id)) {
			throw new NotFoundException(__('Invalid hardware configuration'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->HardwareConfiguration->id = $id;
			if ($this->HardwareConfiguration->save($this->request->data)) {
				$this->Session->setFlash(__('The hardware configuration has been saved.'), 'default', array('class' => 'notification'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hardware configuration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('HardwareConfiguration.' . $this->HardwareConfiguration->primaryKey => $id));
			$this->request->data = $this->HardwareConfiguration->find('first', $options);
			
			$gps = $this->HardwareConfiguration->Gps->find('list');
			$powerSupplies = $this->HardwareConfiguration->PowerSupply->find('list');
			$triggerCards = $this->HardwareConfiguration->TriggerCard->find('list');
			$weatherStations = $this->HardwareConfiguration->WeatherStation->find('list');
			$this->set(compact('gps','powerSupplies','triggerCards','weatherStations'));
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
		$this->HardwareConfiguration->id = $id;
		if (!$this->HardwareConfiguration->exists()) {
			throw new NotFoundException(__('Invalid hardware configuration'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->HardwareConfiguration->delete()) {
			$this->Session->setFlash(__('The hardware configuration has been deleted.'));
		} else {
			$this->Session->setFlash(__('The hardware configuration could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
