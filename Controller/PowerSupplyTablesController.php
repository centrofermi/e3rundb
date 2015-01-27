<?php
App::uses('AppController', 'Controller');
/**
 * PowerSupplyTables Controller
 *
 * @property PowerSupplyTable $PowerSupplyTable
 * @property PaginatorComponent $Paginator
 */
class PowerSupplyTablesController extends AppController {

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
		$this->PowerSupplyTable->recursive = 0;
		$this->set('powerSupplyTables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PowerSupplyTable->exists($id)) {
			throw new NotFoundException(__('Invalid power supply table'));
		}
		$options = array('conditions' => array('PowerSupplyTable.' . $this->PowerSupplyTable->primaryKey => $id));
		$this->set('powerSupplyTable', $this->PowerSupplyTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PowerSupplyTable->create();
			if ($this->PowerSupplyTable->save($this->request->data)) {
				$this->Session->setFlash(__('The power supply table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The power supply table could not be saved. Please, try again.'));
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
		if (!$this->PowerSupplyTable->exists($id)) {
			throw new NotFoundException(__('Invalid power supply table'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PowerSupplyTable->save($this->request->data)) {
				$this->Session->setFlash(__('The power supply table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The power supply table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PowerSupplyTable.' . $this->PowerSupplyTable->primaryKey => $id));
			$this->request->data = $this->PowerSupplyTable->find('first', $options);
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
		$this->PowerSupplyTable->id = $id;
		if (!$this->PowerSupplyTable->exists()) {
			throw new NotFoundException(__('Invalid power supply table'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PowerSupplyTable->delete()) {
			$this->Session->setFlash(__('The power supply table has been deleted.'));
		} else {
			$this->Session->setFlash(__('The power supply table could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
