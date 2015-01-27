<?php
App::uses('AppController', 'Controller');
/**
 * ProcessingStatusCodeTables Controller
 *
 * @property ProcessingStatusCodeTable $ProcessingStatusCodeTable
 * @property PaginatorComponent $Paginator
 */
class ProcessingStatusCodeTablesController extends AppController {

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
		$this->ProcessingStatusCodeTable->recursive = 0;
		$this->set('processingStatusCodeTables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProcessingStatusCodeTable->exists($id)) {
			throw new NotFoundException(__('Invalid processing status code table'));
		}
		$options = array('conditions' => array('ProcessingStatusCodeTable.' . $this->ProcessingStatusCodeTable->primaryKey => $id));
		$this->set('processingStatusCodeTable', $this->ProcessingStatusCodeTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProcessingStatusCodeTable->create();
			if ($this->ProcessingStatusCodeTable->save($this->request->data)) {
				$this->Session->setFlash(__('The processing status code table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The processing status code table could not be saved. Please, try again.'));
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
		if (!$this->ProcessingStatusCodeTable->exists($id)) {
			throw new NotFoundException(__('Invalid processing status code table'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProcessingStatusCodeTable->save($this->request->data)) {
				$this->Session->setFlash(__('The processing status code table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The processing status code table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProcessingStatusCodeTable.' . $this->ProcessingStatusCodeTable->primaryKey => $id));
			$this->request->data = $this->ProcessingStatusCodeTable->find('first', $options);
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
		$this->ProcessingStatusCodeTable->id = $id;
		if (!$this->ProcessingStatusCodeTable->exists()) {
			throw new NotFoundException(__('Invalid processing status code table'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProcessingStatusCodeTable->delete()) {
			$this->Session->setFlash(__('The processing status code table has been deleted.'));
		} else {
			$this->Session->setFlash(__('The processing status code table could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
