<?php
App::uses('AppModel', 'Model');
/**
 * ArtistsProjet Model
 *
 * @property Projet $Projet
 * @property Artist $Artist
 */
class ArtistsProjet extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Artists_Projets';


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
		'Artist' => array(
			'className' => 'Artist',
			'foreignKey' => 'artist_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
