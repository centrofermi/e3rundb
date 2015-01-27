<?php
App::uses('AppController', 'Controller');
/**
 * WeatherStationTables Controller
 *
 * @property WeatherStationTable $WeatherStationTable
 * @property PaginatorComponent $Paginator
 */
class WeatherStationTablesController extends AppController {

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
		$this->WeatherStationTable->recursive = 0;
		$this->set('weatherStationTables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WeatherStationTable->exists($id)) {
			throw new NotFoundException(__('Invalid weather station table'));
		}
		$options = array('conditions' => array('WeatherStationTable.' . $this->WeatherStationTable->primaryKey => $id));
		$this->set('weatherStationTable', $this->WeatherStationTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WeatherStationTable->create();
			if ($this->WeatherStationTable->save($this->request->data)) {
				$this->Session->setFlash(__('The weather station table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The weather station table could not be saved. Please, try again.'));
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
		if (!$this->WeatherStationTable->exists($id)) {
			throw new NotFoundException(__('Invalid weather station table'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WeatherStationTable->save($this->request->data)) {
				$this->Session->setFlash(__('The weather station table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The weather station table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WeatherStationTable.' . $this->WeatherStationTable->primaryKey => $id));
			$this->request->data = $this->WeatherStationTable->find('first', $options);
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
		$this->WeatherStationTable->id = $id;
		if (!$this->WeatherStationTable->exists()) {
			throw new NotFoundException(__('Invalid weather station table'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->WeatherStationTable->delete()) {
			$this->Session->setFlash(__('The weather station table has been deleted.'));
		} else {
			$this->Session->setFlash(__('The weather station table could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
