<?php
App::uses('AppController', 'Controller');
/**
 * TelescopeSoftwareTables Controller
 *
 * @property TelescopeSoftwareTable $TelescopeSoftwareTable
 * @property PaginatorComponent $Paginator
 */
class TelescopeSoftwareTablesController extends AppController {

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
		$this->TelescopeSoftwareTable->recursive = 0;
		$this->set('telescopeSoftwareTables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TelescopeSoftwareTable->exists($id)) {
			throw new NotFoundException(__('Invalid telescope software table'));
		}
		$options = array('conditions' => array('TelescopeSoftwareTable.' . $this->TelescopeSoftwareTable->primaryKey => $id));
		$this->set('telescopeSoftwareTable', $this->TelescopeSoftwareTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TelescopeSoftwareTable->create();
			if ($this->TelescopeSoftwareTable->save($this->request->data)) {
				$this->Session->setFlash(__('The telescope software table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The telescope software table could not be saved. Please, try again.'));
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
		if (!$this->TelescopeSoftwareTable->exists($id)) {
			throw new NotFoundException(__('Invalid telescope software table'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TelescopeSoftwareTable->save($this->request->data)) {
				$this->Session->setFlash(__('The telescope software table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The telescope software table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TelescopeSoftwareTable.' . $this->TelescopeSoftwareTable->primaryKey => $id));
			$this->request->data = $this->TelescopeSoftwareTable->find('first', $options);
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
		$this->TelescopeSoftwareTable->id = $id;
		if (!$this->TelescopeSoftwareTable->exists()) {
			throw new NotFoundException(__('Invalid telescope software table'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TelescopeSoftwareTable->delete()) {
			$this->Session->setFlash(__('The telescope software table has been deleted.'));
		} else {
			$this->Session->setFlash(__('The telescope software table could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
