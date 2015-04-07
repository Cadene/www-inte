<?php
App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session',  'RequestHandler');


	public function beforeFilter() {
	    parent::beforeFilter();
	    // Allow users to register and logout.
	    $this->Auth->allow(
	    	'admin_login',
	    	'admin_logout',
	    	'index',
	    	'get',
	    	'register',
	    	'login',
	    	'forgot',
	    	'maj'
	    );

	    //$this->Auth->allow('*');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * get method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function get($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
		$this->set('_serialize', array('user'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$cities = $this->User->Citie->find('list');
		$artists = $this->User->Artist->find('list');
        $this->set(array(
            'cities' => $cities,
            'artists' => $artists,
            '_serialize' => array('cities', 'artists')
        ));
	}

/**
 * register method
 *
 * @return void
 */
    public function register() {

        $user = null;
        if ($this->request->is('get')) {

            //$this->request->data = $this->request->query;
            $d = $this->request->query;
            //$d = $this->request->data;

            //debug($d);

            if (isset($d['email']) &&
            	isset($d['password']) &&
            	isset($d['nom']) &&
            	isset($d['prenom'])) {

            	$u['email'] = $d['email'];
            	$u['password'] = $d['password'];
            	$u['nom'] = $d['nom'];
            	$u['prenom'] = $d['prenom'];

            	$d = $u;

	            $data = $this->User->find('first',
	                array(
	                    'conditions' => array(
	                        'email' => $d['email']
	                    )
	                )
	            );

	            //debug($data);

	            if ($data == null) {
	                $this->User->create();
	                if ($this->User->save($d)) {
	                    $user = $this->User->find('first',
	                        array(
	                            'conditions' => array(
	                                'email' => $d['email']
	                            )
	                        )
	                    );

	                    $this->User->id = $user['User']['id'];
	                    $token = md5(uniqid(mt_rand(), true));
	                    $this->User->saveField('token', $token);
	                    $this->User->saveField('last_connection', date("Y-m-d H:i:s"));

	                    $user['User']['token'] = $token;

	                    // Email à l'amigo
	                    App::uses('CakeEmail', 'Network/Email');
	                    $Email = new CakeEmail();
	                    $Email->from(array('sacha@openingstage.fr' => 'Opening Stage'));
	                    $Email->to($d['email']);
	                    $Email->subject('[Opening Stage] Bienvenue !');
	                    $Email->send('Salut c\'est cool.');

	                    // Email à sacha
	                    App::uses('CakeEmail', 'Network/Email');
	                    $Email = new CakeEmail();
	                    $Email->from(array('sacha@openingstage.fr' => 'Opening Stage'));
	                    $Email->to('sacha@openingstage.fr');
	                    $Email->subject('[Opening Stage] Nouvel utilisateur !');
	                    $Email->send('Nouvel utilisateur inscrit : \n' . print_r($user, true));
	                }
	            }
	        }
        }
        $this->set(array(
            'user' => $user,
            '_serialize' => array('user')
        ));
    }

/**
 * forgot method
 *
 * @return void
 */
    public function forgot() {

        if (isset($this->request->data['email'])) {
            App::uses('CakeEmail', 'Network/Email');
            $Email = new CakeEmail();
            $Email->from(array('sacha@openingstage.fr' => 'Opening Stage'));
            $Email->to($this->request->data['email']);
            $Email->subject('[Opening Stage] Mot de passe oublié');
            $Email->send('Cliquez sur le lien d\'activation suivant pour recevoir un nouveau mot de passe.');
            return true;
        } else {
            // si on recoit le lien d'activation on crée un nouveau mdp et on l'envoie
        }
        return false;        
    }

/**
 * login method
 *
 * @return void
 */
    public function login() { 
        $user = null;
        if ($this->request->is('post')) {
            //$this->request->data = $this->request->query;
            if (isset($this->request->data['email']) &&
                isset($this->request->data['password'])) {

                $post['email'] = $this->request->data['email'];
                $post['password'] = $this->request->data['password'];

                $data = $this->User->find('first',
                    array(
                        'conditions' => array(
                            'email' => $post['email']
                        )
                    )
                );

                //debug($data);

                if (isset($data['User'])) {
                    $salt = $data['User']['password'];
                    $hash = Security::hash($post['password'], 'blowfish', $salt);

                    //debug($salt);
                    //debug($hash);
                    if ($salt === $hash) {
                        $this->User->id = $data['User']['id'];
                        $token = md5(uniqid(mt_rand(), true));
                        $this->User->saveField('token', $token);
                        $this->User->saveField('last_connection', date("Y-m-d H:i:s"));

                        $data['User']['token'] = $token;
                        $user = $data;
                    }
                }
            }
        }
        $this->set(array(
            'user' => $user,
            '_serialize' => array('user')
        ));   
    }

/**
 * logout method
 *
 * @return void
 */
    public function logout() {

    }

/**
 * maj method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function maj($id = null) {

		$user = null;

		//debug($id);

        if ($id != null && $this->request->is('get')) {
            
            $d = $this->request->query;
        	//$d = $this->request->data;

            if (isset($d['email']) &&
                isset($d['password']) &&
                isset($d['nom']) &&
                isset($d['prenom']) &&
                isset($d['token'])) {

            	$u['email'] = $d['email'];
            	$u['password'] = $d['password'];
            	$u['nom'] = $d['nom'];
            	$u['prenom'] = $d['prenom'];
            	$u['token'] = $d['token'];

            	$d = $u;

            	//debug($d);

                $data = $this->User->find('first',
                    array(
                        'conditions' => array(
                            'User.id' => $id
                        )
                    )
                );

				if (isset($data['User'])) {
					if ($data['User']['token'] == $d['token']) {
						if ($d['password'] == '') {
							unset($d['password']);
						} else {
							$salt = $data['User']['password'];
                    		$hash = Security::hash($d['password'], 'blowfish', $salt);
						}
						$this->User->id = $id;
						if ($this->User->save($d)) {
							$user = $d;
						}
					}
				}
			}
		}

		$this->set(array(
            'user' => $user,
            '_serialize' => array('user')
        ));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$cities = $this->User->Citie->find('list');
		$artists = $this->User->Artist->find('list');
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function admin_login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect('/admin/users');
	        }
	        $this->Session->setFlash(__('Invalid mail or password, try again'));
	    }
	}

	public function admin_logout() {
	    return $this->redirect('/pages/index');
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$cities = $this->User->Citie->find('list');
		$artists = $this->User->Artist->find('list');
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$cities = $this->User->Citie->find('list');
		$artists = $this->User->Artist->find('list');
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
