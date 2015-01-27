<?php
App::uses('AppController', 'Controller');
/**
 * DaqVersionTables Controller
 *
 * @property DaqVersionTable $DaqVersionTable
 * @property PaginatorComponent $Paginator
 */
class DaqVersionTablesController extends AppController {

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
		$this->DaqVersionTable->recursive = 0;
		$this->set('daqVersionTables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DaqVersionTable->exists($id)) {
			throw new NotFoundException(__('Invalid daq version table'));
		}
		$options = array('conditions' => array('DaqVersionTable.' . $this->DaqVersionTable->primaryKey => $id));
		$this->set('daqVersionTable', $this->DaqVersionTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DaqVersionTable->create();
			if ($this->DaqVersionTable->save($this->request->data)) {
				$this->Session->setFlash(__('The daq version table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The daq version table could not be saved. Please, try again.'));
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
		if (!$this->DaqVersionTable->exists($id)) {
			throw new NotFoundException(__('Invalid daq version table'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DaqVersionTable->save($this->request->data)) {
				$this->Session->setFlash(__('The daq version table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The daq version table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DaqVersionTable.' . $this->DaqVersionTable->primaryKey => $id));
			$this->request->data = $this->DaqVersionTable->find('first', $options);
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
		$this->DaqVersionTable->id = $id;
		if (!$this->DaqVersionTable->exists()) {
			throw new NotFoundException(__('Invalid daq version table'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DaqVersionTable->delete()) {
			$this->Session->setFlash(__('The daq version table has been deleted.'));
		} else {
			$this->Session->setFlash(__('The daq version table could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
