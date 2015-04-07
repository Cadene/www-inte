<?php
App::uses('AppController', 'Controller');
/**
 * Artists Controller
 *
 * @property Artist $Artist
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ArtistsController extends AppController {

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
	    	'create',
	    	'get',
	    	'maj',
	    	'view_page'
	    );
	}

/**
 * get method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function get($id = null) {
		if (!$this->Artist->exists($id)) {
			throw new NotFoundException(__('Invalid artist'));
		}
		$options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
		$this->set('artist', $this->Artist->find('first', $options));
		$this->set('_serialize', array('artist'));
	}

/**
 * maj method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function maj($id = null) {

		$artist = null;

		//debug($id);

        if ($id != null && $this->request->is('get')) {
            
            $d = $this->request->query;
        	//$d = $this->request->data;

            if (isset($d['groupe']) &&
            	isset($d['genre']) &&
            	isset($d['talent']) &&
            	isset($d['presentation']) &&
            	isset($d['token']) &&
            	isset($d['user_id']) &&
            	isset($d['introduction'])) {

            	$u['groupe'] = $d['groupe'];
            	$u['genre'] = $d['genre'];
            	$u['talent'] = $d['talent'];
            	$u['presentation'] = $d['presentation'];
            	$u['token'] = $d['token'];
            	$u['user_id'] = $d['user_id'];
            	$u['introduction'] = $d['introduction'];

            	$d = $u;

            	//debug($d);
            	$data = $this->Artist->User->find('first',
                    array(
                        'conditions' => array(
                            'User.id' => $d['user_id']
                        )
                    )
                );

                if (isset($data['User'])) {
                	if ($data['User']['token'] == $d['token']) {

                		// Rajouter User possède l'artiste

		                $data = $this->Artist->find('first',
		                    array(
		                        'conditions' => array(
		                            'Artist.id' => $id
		                        )
		                    )
		                );
						$this->Artist->id = $id;
						if ($this->Artist->save($d)) {
							$artist = $d;
						}
					}
				}
			}
		}

		$this->set(array(
            'artist' => $artist,
            '_serialize' => array('artist')
        ));
	}

/**
 * create method
 *
 * @return void
 */
    public function create() {

        $artist = null;
        if ($this->request->is('get')) {

            //$this->request->data = $this->request->query;
            $d = $this->request->query;
            //$d = $this->request->data;

            //debug($d);

            if (isset($d['groupe']) &&
            	isset($d['genre']) &&
            	isset($d['talent']) &&
            	isset($d['presentation']) &&
            	isset($d['token']) &&
            	isset($d['user_id']) &&
            	isset($d['introduction'])) {

            	$u['groupe'] = $d['groupe'];
            	$u['genre'] = $d['genre'];
            	$u['talent'] = $d['talent'];
            	$u['presentation'] = $d['presentation'];
            	$u['token'] = $d['token'];
            	$u['user_id'] = $d['user_id'];
            	$u['introduction'] = $d['introduction'];

            	$d = $u;

            	$data = $this->Artist->User->find('first',
                    array(
                        'conditions' => array(
                            'User.id' => $d['user_id']
                        )
                    )
                );

                if (isset($data['User'])) {
					if ($data['User']['token'] == $d['token']) {

						$email = $data['User']['email'];
			            $data = $this->Artist->find('first',
			                array(
			                    'conditions' => array(
			                        'groupe' => $d['groupe']
			                    )
			                )
			            );

			            //debug($data);

			            if ($data == null) {
			                $this->Artist->create();

			                $q['Artist'] = $d;
			                unset($q['Artist']['token']);
			                unset($q['Artist']['user_id']);

			                $q['User'] = array(
			                	'User' => array(
			                		$d['user_id']
			                	)
			                );

			                //debug($q);

			                if ($this->Artist->save($q)) {
			                    $artist = $this->Artist->find('first',
			                        array(
			                            'conditions' => array(
			                                'groupe' => $d['groupe']
			                            )
			                        )
			                    );

			                    // Email à l'amigo
			                    App::uses('CakeEmail', 'Network/Email');
			                    $Email = new CakeEmail();
			                    $Email->from(array('sacha@openingstage.fr' => 'Opening Stage'));
			                    $Email->to($email);
			                    $Email->subject('[Opening Stage] Bienvenue !');
			                    $Email->send('Salut c\'est cool.');

			                    // Email à sacha
			                    App::uses('CakeEmail', 'Network/Email');
			                    $Email = new CakeEmail();
			                    $Email->from(array('sacha@openingstage.fr' => 'Opening Stage'));
			                    $Email->to('sacha@openingstage.fr');
			                    $Email->subject('[Opening Stage] Nouvel artiste !');
			                    $Email->send('Nouvel artiste inscrit, il faut mettre son état à 1 pour qu\'il soit visible. : \n' . print_r($artist, true));
			                }
			            }
			        }
		        }
	        }
        }
        $this->set(array(
            'artist' => $artist,
            '_serialize' => array('artist')
        ));
    }


/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Artist->recursive = 0;

		if ($this->request->query('letter') != null) {
			$letter = $this->request->query('letter');
			$options = array(
			    'conditions' => array('Artist.groupe LIKE' => $letter.'%'),
			    'fields' => array('*'),
			    //'order' => array('Model.created', 'Model.field3 DESC'),
			    //'group' => array('Model.field'), //fields to GROUP BY
			    //'limit' => n, //int
			    //'page' => n, //int
			    //'offset' => n, //int
			    //'callbacks' => true //other possible values are false, 'before', 'after'
			);
			$artists = $this->Artist->find('all', $options);
		} else {
			$artists = $this->Paginator->paginate();
		}

		$this->set(array(
			'artists' => $artists,
			'_serialize' => array('artists')
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
		if (!$this->Artist->exists($id)) {
			throw new NotFoundException(__('Invalid artist'));
		}
		$options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
		$this->set(array(
			'artist' => $this->Artist->find('first', $options),
			'_serialize' => array('artist')
		));
	}

/**
 * view_page method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function view_page($id = null) {
		if (!$this->Artist->exists($id)) {
			throw new NotFoundException(__('Invalid artist'));
		}
		$options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
		$this->set(array('artist' => $this->Artist->find('first', $options)));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Artist->create();

			//debug($this->request->data);

			if ($this->Artist->save($this->request->data)) {
				$this->Session->setFlash(__('The artist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artist could not be saved. Please, try again.'));
			}
		}
		$cities = $this->Artist->Citie->find('list');
		$projets = $this->Artist->Projet->find('list');
		$users = $this->Artist->User->find('list');
		$this->set(compact('cities', 'projets', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Artist->exists($id)) {
			throw new NotFoundException(__('Invalid artist'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Artist->save($this->request->data)) {
				$this->Session->setFlash(__('The artist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artist could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
			$this->request->data = $this->Artist->find('first', $options);
		}
		$cities = $this->Artist->Citie->find('list');
		$projets = $this->Artist->Projet->find('list');
		$users = $this->Artist->User->find('list');
		$this->set(compact('cities', 'projets', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Artist->id = $id;

		debug($this->Artist->exists());

		if (!$this->Artist->exists()) {
			throw new NotFoundException(__('Invalid artist'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Artist->delete()) {
			$this->Session->setFlash(__('The artist has been deleted.'));
		} else {
			$this->Session->setFlash(__('The artist could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Artist->recursive = 0;
		$this->set('artists', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Artist->exists($id)) {
			throw new NotFoundException(__('Invalid artist'));
		}
		$options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
		$this->set('artist', $this->Artist->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Artist->create();
			if ($this->Artist->save($this->request->data)) {
				$this->Session->setFlash(__('The artist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artist could not be saved. Please, try again.'));
			}
		}
		$cities = $this->Artist->Citie->find('list');
		$projets = $this->Artist->Projet->find('list');
		$users = $this->Artist->User->find('list');
		$this->set(compact('cities', 'projets', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Artist->exists($id)) {
			throw new NotFoundException(__('Invalid artist'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Artist->save($this->request->data)) {
				$this->Session->setFlash(__('The artist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artist could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
			$this->request->data = $this->Artist->find('first', $options);
		}
		$cities = $this->Artist->Citie->find('list');
		$projets = $this->Artist->Projet->find('list');
		$users = $this->Artist->User->find('list');
		$this->set(compact('cities', 'projets', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Artist->id = $id;
		if (!$this->Artist->exists()) {
			throw new NotFoundException(__('Invalid artist'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Artist->delete()) {
			$this->Session->setFlash(__('The artist has been deleted.'));
		} else {
			$this->Session->setFlash(__('The artist could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
