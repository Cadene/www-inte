<?php
App::uses('AppController', 'Controller');
/**
 * Projets Controller
 *
 * @property Projet $Projet
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProjetsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'RequestHandler');


	public function beforeFilter() {
	    parent::beforeFilter();
	    // Allow users to register and logout.
	    $this->Auth->allow(
	    	'index',
	    	'create',
	    	'get',
	    	'maj',
	    	'view_page'
	    );
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Projet->recursive = 0;
		if ($this->request->query('letter') != null) {
			$letter = $this->request->query('letter');
			$options = array(
			    'conditions' => array('Projet.titre LIKE' => $letter.'%'),
			    'fields' => array('*'),
			    //'order' => array('Model.created', 'Model.field3 DESC'),
			    //'group' => array('Model.field'), //fields to GROUP BY
			    //'limit' => n, //int
			    //'page' => n, //int
			    //'offset' => n, //int
			    //'callbacks' => true //other possible values are false, 'before', 'after'
			);
			$projets = $this->Projet->find('all', $options);
		} else {
			$projets = $this->Paginator->paginate();
		}

		$this->set(array(
			'projets' => $projets,
			'_serialize' => array('projets')
		));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Projet->exists($id)) {
			throw new NotFoundException(__('Invalid projet'));
		}
		$options = array('conditions' => array('Projet.' . $this->Projet->primaryKey => $id));
		$this->set('projet', $this->Projet->find('first', $options));
	}

/**
 * view_page method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function view_page($id = null) {
		if (!$this->Projet->exists($id)) {
			throw new NotFoundException(__('Invalid projet'));
		}
		$options = array('conditions' => array('Projet.' . $this->Projet->primaryKey => $id));
		$this->set(array('projet' => $this->Projet->find('first', $options)));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Projet->create();
			if ($this->Projet->save($this->request->data)) {
				$this->Session->setFlash(__('The projet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projet could not be saved. Please, try again.'));
			}
		}
		$cities = $this->Projet->Citie->find('list');
		$artists = $this->Projet->Artist->find('list');
		$this->set(compact('cities', 'artists'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Projet->exists($id)) {
			throw new NotFoundException(__('Invalid projet'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Projet->save($this->request->data)) {
				$this->Session->setFlash(__('The projet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projet could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Projet.' . $this->Projet->primaryKey => $id));
			$this->request->data = $this->Projet->find('first', $options);
		}
		$cities = $this->Projet->Citie->find('list');
		$artists = $this->Projet->Artist->find('list');
		$this->set(compact('cities', 'artists'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Projet->id = $id;
		if (!$this->Projet->exists()) {
			throw new NotFoundException(__('Invalid projet'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Projet->delete()) {
			$this->Session->setFlash(__('The projet has been deleted.'));
		} else {
			$this->Session->setFlash(__('The projet could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Projet->recursive = 0;
		$this->set('projets', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Projet->exists($id)) {
			throw new NotFoundException(__('Invalid projet'));
		}
		$options = array('conditions' => array('Projet.' . $this->Projet->primaryKey => $id));
		$this->set('projet', $this->Projet->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Projet->create();
			if ($this->Projet->save($this->request->data)) {
				$this->Session->setFlash(__('The projet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projet could not be saved. Please, try again.'));
			}
		}
		$cities = $this->Projet->Citie->find('list');
		$artists = $this->Projet->Artist->find('list');
		$this->set(compact('cities', 'artists'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Projet->exists($id)) {
			throw new NotFoundException(__('Invalid projet'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Projet->save($this->request->data)) {
				$this->Session->setFlash(__('The projet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projet could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Projet.' . $this->Projet->primaryKey => $id));
			$this->request->data = $this->Projet->find('first', $options);
		}
		$cities = $this->Projet->Citie->find('list');
		$artists = $this->Projet->Artist->find('list');
		$this->set(compact('cities', 'artists'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Projet->id = $id;
		if (!$this->Projet->exists()) {
			throw new NotFoundException(__('Invalid projet'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Projet->delete()) {
			$this->Session->setFlash(__('The projet has been deleted.'));
		} else {
			$this->Session->setFlash(__('The projet could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
