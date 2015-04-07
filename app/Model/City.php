<?php
App::uses('AppModel', 'Model');
/**
 * City Model
 *
 */
class City extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Cities';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

}
