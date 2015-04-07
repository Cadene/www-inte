<?php
App::uses('AppModel', 'Model');
/**
 * Prestation Model
 *
 * @property Projet $Projet
 * @property User $User
 */
class Prestation extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Prestations';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nom';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Projet' => array(
			'className' => 'Projet',
			'foreignKey' => 'projet_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
