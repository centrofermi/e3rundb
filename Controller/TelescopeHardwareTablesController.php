<?php
App::uses('AppController', 'Controller');
/**
 * TelescopeHardwareTables Controller
 *
 * @property TelescopeHardwareTable $TelescopeHardwareTable
 * @property PaginatorComponent $Paginator
 */
class TelescopeHardwareTablesController extends AppController {

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
		$this->TelescopeHardwareTable->recursive = 0;
		$this->set('telescopeHardwareTables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TelescopeHardwareTable->exists($id)) {
			throw new NotFoundException(__('Invalid telescope hardware table'));
		}
		$options = array('conditions' => array('TelescopeHardwareTable.' . $this->TelescopeHardwareTable->primaryKey => $id));
		$this->set('telescopeHardwareTable', $this->TelescopeHardwareTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TelescopeHardwareTable->create();
			if ($this->TelescopeHardwareTable->save($this->request->data)) {
				$this->Session->setFlash(__('The telescope hardware table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The telescope hardware table could not be saved. Please, try again.'));
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
		if (!$this->TelescopeHardwareTable->exists($id)) {
			throw new NotFoundException(__('Invalid telescope hardware table'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TelescopeHardwareTable->save($this->request->data)) {
				$this->Session->setFlash(__('The telescope hardware table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The telescope hardware table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TelescopeHardwareTable.' . $this->TelescopeHardwareTable->primaryKey => $id));
			$this->request->data = $this->TelescopeHardwareTable->find('first', $options);
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
		$this->TelescopeHardwareTable->id = $id;
		if (!$this->TelescopeHardwareTable->exists()) {
			throw new NotFoundException(__('Invalid telescope hardware table'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TelescopeHardwareTable->delete()) {
			$this->Session->setFlash(__('The telescope hardware table has been deleted.'));
		} else {
			$this->Session->setFlash(__('The telescope hardware table could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
