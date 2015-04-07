<?php
App::uses('AppModel', 'Model');


/**
 * Artist Model
 *
 * @property Citie $Citie
 * @property Like $Like
 * @property Projet $Projet
 * @property User $User
 */
class Artist extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Artists';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'groupe';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Citie' => array(
			'className' => 'Citie',
			'foreignKey' => 'citie_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Like' => array(
			'className' => 'Like',
			'foreignKey' => 'artist_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Projet' => array(
			'className' => 'Projet',
			'joinTable' => 'Artists_Projets',
			'foreignKey' => 'artist_id',
			'associationForeignKey' => 'projet_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'User' => array(
			'className' => 'User',
			'joinTable' => 'Artists_Users',
			'foreignKey' => 'artist_id',
			'associationForeignKey' => 'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);




}
