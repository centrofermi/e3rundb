<?php
App::uses('AppController', 'Controller');
/**
 * OsVersionTables Controller
 *
 * @property OsVersionTable $OsVersionTable
 * @property PaginatorComponent $Paginator
 */
class OsVersionTablesController extends AppController {

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
		$this->OsVersionTable->recursive = 0;
		$this->set('osVersionTables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OsVersionTable->exists($id)) {
			throw new NotFoundException(__('Invalid os version table'));
		}
		$options = array('conditions' => array('OsVersionTable.' . $this->OsVersionTable->primaryKey => $id));
		$this->set('osVersionTable', $this->OsVersionTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OsVersionTable->create();
			if ($this->OsVersionTable->save($this->request->data)) {
				$this->Session->setFlash(__('The os version table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The os version table could not be saved. Please, try again.'));
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
		if (!$this->OsVersionTable->exists($id)) {
			throw new NotFoundException(__('Invalid os version table'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OsVersionTable->save($this->request->data)) {
				$this->Session->setFlash(__('The os version table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The os version table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OsVersionTable.' . $this->OsVersionTable->primaryKey => $id));
			$this->request->data = $this->OsVersionTable->find('first', $options);
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
		$this->OsVersionTable->id = $id;
		if (!$this->OsVersionTable->exists()) {
			throw new NotFoundException(__('Invalid os version table'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OsVersionTable->delete()) {
			$this->Session->setFlash(__('The os version table has been deleted.'));
		} else {
			$this->Session->setFlash(__('The os version table could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
