<?php
App::uses('AppController', 'Controller');
/**
 * TriggerCardTables Controller
 *
 * @property TriggerCardTable $TriggerCardTable
 * @property PaginatorComponent $Paginator
 */
class TriggerCardTablesController extends AppController {

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
		$this->TriggerCardTable->recursive = 0;
		$this->set('triggerCardTables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TriggerCardTable->exists($id)) {
			throw new NotFoundException(__('Invalid trigger card table'));
		}
		$options = array('conditions' => array('TriggerCardTable.' . $this->TriggerCardTable->primaryKey => $id));
		$this->set('triggerCardTable', $this->TriggerCardTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TriggerCardTable->create();
			if ($this->TriggerCardTable->save($this->request->data)) {
				$this->Session->setFlash(__('The trigger card table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trigger card table could not be saved. Please, try again.'));
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
		if (!$this->TriggerCardTable->exists($id)) {
			throw new NotFoundException(__('Invalid trigger card table'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TriggerCardTable->save($this->request->data)) {
				$this->Session->setFlash(__('The trigger card table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trigger card table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TriggerCardTable.' . $this->TriggerCardTable->primaryKey => $id));
			$this->request->data = $this->TriggerCardTable->find('first', $options);
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
		$this->TriggerCardTable->id = $id;
		if (!$this->TriggerCardTable->exists()) {
			throw new NotFoundException(__('Invalid trigger card table'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TriggerCardTable->delete()) {
			$this->Session->setFlash(__('The trigger card table has been deleted.'));
		} else {
			$this->Session->setFlash(__('The trigger card table could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
