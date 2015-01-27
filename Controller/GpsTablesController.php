<?php
App::uses('AppController', 'Controller');
/**
 * GpsTables Controller
 *
 * @property GpsTable $GpsTable
 * @property PaginatorComponent $Paginator
 */
class GpsTablesController extends AppController {

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
		$this->GpsTable->recursive = 0;
		$this->set('gpsTables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GpsTable->exists($id)) {
			throw new NotFoundException(__('Invalid gps table'));
		}
		$options = array('conditions' => array('GpsTable.' . $this->GpsTable->primaryKey => $id));
		$this->set('gpsTable', $this->GpsTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GpsTable->create();
			if ($this->GpsTable->save($this->request->data)) {
				$this->Session->setFlash(__('The gps table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gps table could not be saved. Please, try again.'));
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
		if (!$this->GpsTable->exists($id)) {
			throw new NotFoundException(__('Invalid gps table'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GpsTable->save($this->request->data)) {
				$this->Session->setFlash(__('The gps table has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gps table could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GpsTable.' . $this->GpsTable->primaryKey => $id));
			$this->request->data = $this->GpsTable->find('first', $options);
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
		$this->GpsTable->id = $id;
		if (!$this->GpsTable->exists()) {
			throw new NotFoundException(__('Invalid gps table'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->GpsTable->delete()) {
			$this->Session->setFlash(__('The gps table has been deleted.'));
		} else {
			$this->Session->setFlash(__('The gps table could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
