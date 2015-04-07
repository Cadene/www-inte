<?php
App::uses('AppController', 'Controller');
/**
 * Prestations Controller
 *
 * @property Prestation $Prestation
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PrestationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Prestation->recursive = 0;
		$this->set('prestations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Prestation->exists($id)) {
			throw new NotFoundException(__('Invalid prestation'));
		}
		$options = array('conditions' => array('Prestation.' . $this->Prestation->primaryKey => $id));
		$this->set('prestation', $this->Prestation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Prestation->create();
			if ($this->Prestation->save($this->request->data)) {
				$this->Session->setFlash(__('The prestation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prestation could not be saved. Please, try again.'));
			}
		}
		$projets = $this->Prestation->Projet->find('list');
		$users = $this->Prestation->User->find('list');
		$this->set(compact('projets', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Prestation->exists($id)) {
			throw new NotFoundException(__('Invalid prestation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Prestation->save($this->request->data)) {
				$this->Session->setFlash(__('The prestation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prestation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Prestation.' . $this->Prestation->primaryKey => $id));
			$this->request->data = $this->Prestation->find('first', $options);
		}
		$projets = $this->Prestation->Projet->find('list');
		$users = $this->Prestation->User->find('list');
		$this->set(compact('projets', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Prestation->id = $id;
		if (!$this->Prestation->exists()) {
			throw new NotFoundException(__('Invalid prestation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Prestation->delete()) {
			$this->Session->setFlash(__('The prestation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The prestation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Prestation->recursive = 0;
		$this->set('prestations', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Prestation->exists($id)) {
			throw new NotFoundException(__('Invalid prestation'));
		}
		$options = array('conditions' => array('Prestation.' . $this->Prestation->primaryKey => $id));
		$this->set('prestation', $this->Prestation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Prestation->create();
			if ($this->Prestation->save($this->request->data)) {
				$this->Session->setFlash(__('The prestation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prestation could not be saved. Please, try again.'));
			}
		}
		$projets = $this->Prestation->Projet->find('list');
		$users = $this->Prestation->User->find('list');
		$this->set(compact('projets', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Prestation->exists($id)) {
			throw new NotFoundException(__('Invalid prestation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Prestation->save($this->request->data)) {
				$this->Session->setFlash(__('The prestation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prestation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Prestation.' . $this->Prestation->primaryKey => $id));
			$this->request->data = $this->Prestation->find('first', $options);
		}
		$projets = $this->Prestation->Projet->find('list');
		$users = $this->Prestation->User->find('list');
		$this->set(compact('projets', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Prestation->id = $id;
		if (!$this->Prestation->exists()) {
			throw new NotFoundException(__('Invalid prestation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Prestation->delete()) {
			$this->Session->setFlash(__('The prestation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The prestation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
