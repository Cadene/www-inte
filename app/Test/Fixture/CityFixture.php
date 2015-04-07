<?php
/**
 * CityFixture
 *
 */
class CityFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Cities';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => 'Default', 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'country_code' => array('type' => 'string', 'null' => false, 'default' => 'Default', 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'district' => array('type' => 'string', 'null' => false, 'default' => 'Default', 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pop' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'country_code' => 'Lorem ipsum dolor sit amet',
			'district' => 'Lorem ipsum dolor sit amet',
			'pop' => 1
		),
	);

}
