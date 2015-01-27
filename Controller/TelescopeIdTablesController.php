<?php
App::uses('AppController', 'Controller');
/**
 * TelescopeIdTables Controller
 *
 * @property TelescopeIdTable $TelescopeIdTable
 * @property PaginatorComponent $Paginator
 */
class TelescopeIdTablesController extends AppController {

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
		$this->TelescopeIdTable->recursive = 0;
		$this->set('telescopeIdTables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TelescopeIdTable->exists($id)) {
			throw new NotFoundException(__('Invalid telescope id table'));
		}
		$options = array('conditions' => array('TelescopeIdTable.' . $this->TelescopeIdTable->primaryKey => $id));
		$this->set('telescopeIdTable', $this->TelescopeIdTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TelescopeIdTable->create();
			if ($this->TelescopeIdTable->save($this->request->data)) {
				$this->Session->setFlash(__('The telescope id table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The telescope id table could not be saved. Please, try again.'));
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
		if (!$this->TelescopeIdTable->exists($id)) {
			throw new NotFoundException(__('Invalid telescope id table'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TelescopeIdTable->save($this->request->data)) {
				$this->Session->setFlash(__('The telescope id table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The telescope id table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TelescopeIdTable.' . $this->TelescopeIdTable->primaryKey => $id));
			$this->request->data = $this->TelescopeIdTable->find('first', $options);
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
		$this->TelescopeIdTable->id = $id;
		if (!$this->TelescopeIdTable->exists()) {
			throw new NotFoundException(__('Invalid telescope id table'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TelescopeIdTable->delete()) {
			$this->Session->setFlash(__('The telescope id table has been deleted.'));
		} else {
			$this->Session->setFlash(__('The telescope id table could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
