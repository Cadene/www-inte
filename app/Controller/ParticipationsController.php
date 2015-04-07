<?php
App::uses('AppController', 'Controller');
/**
 * Participations Controller
 *
 * @property Participation $Participation
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ParticipationsController extends AppController {

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
		$this->Participation->recursive = 0;
		$this->set('participations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Participation->exists($id)) {
			throw new NotFoundException(__('Invalid participation'));
		}
		$options = array('conditions' => array('Participation.' . $this->Participation->primaryKey => $id));
		$this->set('participation', $this->Participation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Participation->create();
			if ($this->Participation->save($this->request->data)) {
				$this->Session->setFlash(__('The participation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participation could not be saved. Please, try again.'));
			}
		}
		$projets = $this->Participation->Projet->find('list');
		$users = $this->Participation->User->find('list');
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
		if (!$this->Participation->exists($id)) {
			throw new NotFoundException(__('Invalid participation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Participation->save($this->request->data)) {
				$this->Session->setFlash(__('The participation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Participation.' . $this->Participation->primaryKey => $id));
			$this->request->data = $this->Participation->find('first', $options);
		}
		$projets = $this->Participation->Projet->find('list');
		$users = $this->Participation->User->find('list');
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
		$this->Participation->id = $id;
		if (!$this->Participation->exists()) {
			throw new NotFoundException(__('Invalid participation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Participation->delete()) {
			$this->Session->setFlash(__('The participation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The participation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Participation->recursive = 0;
		$this->set('participations', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Participation->exists($id)) {
			throw new NotFoundException(__('Invalid participation'));
		}
		$options = array('conditions' => array('Participation.' . $this->Participation->primaryKey => $id));
		$this->set('participation', $this->Participation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Participation->create();
			if ($this->Participation->save($this->request->data)) {
				$this->Session->setFlash(__('The participation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participation could not be saved. Please, try again.'));
			}
		}
		$projets = $this->Participation->Projet->find('list');
		$users = $this->Participation->User->find('list');
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
		if (!$this->Participation->exists($id)) {
			throw new NotFoundException(__('Invalid participation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Participation->save($this->request->data)) {
				$this->Session->setFlash(__('The participation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Participation.' . $this->Participation->primaryKey => $id));
			$this->request->data = $this->Participation->find('first', $options);
		}
		$projets = $this->Participation->Projet->find('list');
		$users = $this->Participation->User->find('list');
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
		$this->Participation->id = $id;
		if (!$this->Participation->exists()) {
			throw new NotFoundException(__('Invalid participation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Participation->delete()) {
			$this->Session->setFlash(__('The participation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The participation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
