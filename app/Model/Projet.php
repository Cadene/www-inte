<?php
App::uses('AppModel', 'Model');
/**
 * Projet Model
 *
 * @property Citie $Citie
 * @property Participation $Participation
 * @property Artist $Artist
 */
class Projet extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Projets';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'titre';


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
		'Participation' => array(
			'className' => 'Participation',
			'foreignKey' => 'projet_id',
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
		'Artist' => array(
			'className' => 'Artist',
			'joinTable' => 'Artists_Projets',
			'foreignKey' => 'projet_id',
			'associationForeignKey' => 'artist_id',
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
