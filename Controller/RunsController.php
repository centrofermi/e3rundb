<?php
App::uses('AppController', 'Controller');
/**
 * Runs Controller
 *
 */
class RunsController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;
	
/**
 * Components
 *
 * @var array
 */
	public $components = array( 
								'RequestHandler',
								'Paginator',
								'Search.Prg'
							);
							
/**
 * Helpers
 *
 * @var array
 */	
	public $helpers = array('Js' => array('Jquery'));

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Run->recursive = 0;
		$this->set('runs', $this->Paginator->paginate());
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
	
		if (!$this->Run->exists($id)) {
			throw new NotFoundException(__('Invalid run'));
		}
		$options = array('conditions' => array('Run.' . $this->Run->primaryKey => $id));
		$this->set('run', $this->Run->find('first', $options));
	
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	
		if ($this->request->is('post')) {
			$this->Run->create();
			if ($this->Run->save($this->request->data)) {
				$this->Session->setFlash(__('The run has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The run could not be saved. Please, try again.'));
			}
		}
		$runs = $this->Run->find('list');
		$this->set(compact('runs'));
	
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	
		if (!$this->Run->exists($id)) {
			throw new NotFoundException(__('Invalid run'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Run->save($this->request->data)) {
				$this->Session->setFlash(__('The run has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The run could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Run.' . $this->Run->primaryKey => $id));
			$this->request->data = $this->Run->find('first', $options);
		}
		$runs = $this->Run->find('list');
		$this->set(compact('runs'));
	
	}
	
/**
 * find method
 *
 * @return void
 */
	public function find() {
	
		if ( $this->request->is('get') ) {

			if ( $this->request->is('ajax') ) {

				$this->layout = 'ajax';
				$this->autoRender = false;
				
				// start a standard search
				$this->Prg->commonProcess();
				// process the URL parameters
				$params = $this->Prg->parsedParams();
				// generate the Paginator conditions
				$conditions = $this->Run->parseCriteria($params);
		        $nruns = $this->Run->find('count', array('conditions' => $conditions));
				echo 'Show results '.$nruns;
				//echo implode(" ",$params);
					
			}	
		    else {
			
				// start a standard search
				$this->Prg->commonProcess();
				// process the URL parameters
				$params = $this->Prg->parsedParams();
				// generate the Paginator conditions
				$conditions = $this->Run->parseCriteria($params);
				// add the conditions for paging
				$this->Paginator->settings['conditions'] = $conditions;
				$this->set('runs', $this->Paginator->paginate());
			
		    }
		
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
	
		$this->Run->id = $id;
		if (!$this->Run->exists()) {
			throw new NotFoundException(__('Invalid run'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Run->delete()) {
			$this->Session->setFlash(__('The run has been deleted.'));
		} else {
			$this->Session->setFlash(__('The run could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	
	}
	
}
