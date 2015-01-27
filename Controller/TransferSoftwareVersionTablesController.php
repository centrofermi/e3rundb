<?php
App::uses('AppController', 'Controller');
/**
 * TransferSoftwareVersionTables Controller
 *
 * @property TransferSoftwareVersionTable $TransferSoftwareVersionTable
 * @property PaginatorComponent $Paginator
 */
class TransferSoftwareVersionTablesController extends AppController {

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
		$this->TransferSoftwareVersionTable->recursive = 0;
		$this->set('transferSoftwareVersionTables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransferSoftwareVersionTable->exists($id)) {
			throw new NotFoundException(__('Invalid transfer software version table'));
		}
		$options = array('conditions' => array('TransferSoftwareVersionTable.' . $this->TransferSoftwareVersionTable->primaryKey => $id));
		$this->set('transferSoftwareVersionTable', $this->TransferSoftwareVersionTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransferSoftwareVersionTable->create();
			if ($this->TransferSoftwareVersionTable->save($this->request->data)) {
				$this->Session->setFlash(__('The transfer software version table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transfer software version table could not be saved. Please, try again.'));
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
		if (!$this->TransferSoftwareVersionTable->exists($id)) {
			throw new NotFoundException(__('Invalid transfer software version table'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TransferSoftwareVersionTable->save($this->request->data)) {
				$this->Session->setFlash(__('The transfer software version table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transfer software version table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TransferSoftwareVersionTable.' . $this->TransferSoftwareVersionTable->primaryKey => $id));
			$this->request->data = $this->TransferSoftwareVersionTable->find('first', $options);
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
		$this->TransferSoftwareVersionTable->id = $id;
		if (!$this->TransferSoftwareVersionTable->exists()) {
			throw new NotFoundException(__('Invalid transfer software version table'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TransferSoftwareVersionTable->delete()) {
			$this->Session->setFlash(__('The transfer software version table has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transfer software version table could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
