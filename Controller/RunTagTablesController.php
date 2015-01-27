<?php
App::uses('AppController', 'Controller');
/**
 * RunTagTables Controller
 *
 * @property RunTagTable $RunTagTable
 * @property PaginatorComponent $Paginator
 */
class RunTagTablesController extends AppController {

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
		$this->RunTagTable->recursive = 0;
		$this->set('runTagTables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RunTagTable->exists($id)) {
			throw new NotFoundException(__('Invalid run tag table'));
		}
		$options = array('conditions' => array('RunTagTable.' . $this->RunTagTable->primaryKey => $id));
		$this->set('runTagTable', $this->RunTagTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RunTagTable->create();
			if ($this->RunTagTable->save($this->request->data)) {
				$this->Session->setFlash(__('The run tag table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The run tag table could not be saved. Please, try again.'));
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
		if (!$this->RunTagTable->exists($id)) {
			throw new NotFoundException(__('Invalid run tag table'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RunTagTable->save($this->request->data)) {
				$this->Session->setFlash(__('The run tag table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The run tag table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RunTagTable.' . $this->RunTagTable->primaryKey => $id));
			$this->request->data = $this->RunTagTable->find('first', $options);
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
		$this->RunTagTable->id = $id;
		if (!$this->RunTagTable->exists()) {
			throw new NotFoundException(__('Invalid run tag table'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RunTagTable->delete()) {
			$this->Session->setFlash(__('The run tag table has been deleted.'));
		} else {
			$this->Session->setFlash(__('The run tag table could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
