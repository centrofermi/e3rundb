<?php
App::uses('AppController', 'Controller');
/**
 * Telescopes Controller
 *
 */
class TelescopesController extends AppController {

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
								'Search.Prg',
								'CsvView.CsvView'
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

		$this->Telescope->recursive = 0;
		$this->set('telescopes', $this->Paginator->paginate());
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
	
		if (!$this->Telescope->exists($id)) {
			throw new NotFoundException(__('Invalid run'));
		}
		$options = array('conditions' => array('Telescope.' . $this->Telescope->primaryKey => $id));
		$this->set('telescope', $this->Telescope->find('first', $options));
	
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	
		if ($this->request->is('post')) {
			$this->Telescope->create();
			if ($this->Telescope->save($this->request->data)) {
				$this->Session->setFlash(__('The telescope has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The telescope could not be saved. Please, try again.'));
			}
		}
		$telescopes = $this->Telescope->find('list');
		$this->set(compact('telescopes'));
	
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	
		if (!$this->Telescope->exists($id)) {
			throw new NotFoundException(__('Invalid telescope'));
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
		$Telescopes = $this->Run->find('list');
		$this->set(compact('Telescopes'));
	
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
				$this->set('Telescopes', $this->Paginator->paginate());
			
		    }
		
	    }
	}

/**
 * export method
 *
cake * @return void
 */	
	public function export() {
		
		// start a standard search
		$this->Prg->commonProcess();
		// process the URL parameters
		$params = $this->Prg->parsedParams();
		// generate the Paginator conditions
		$conditions = $this->Run->parseCriteria($params);
		$Telescopes = $this->Run->find('all', array('conditions' => $conditions, 'limit' => 10));
		$_extract = $this->CsvView->prepareExtractFromFindResults($Telescopes);
		$_serialize = 'Telescopes';
		
		$this->response->download('my_file.csv'); // <= setting the file name
		$this->viewClass = 'CsvView.Csv';
		$this->set(compact('Telescopes', '_serialize','_extract'));

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
