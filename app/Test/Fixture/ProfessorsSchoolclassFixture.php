<?php
/**
 * ProfessorsSchoolclassFixture
 *
 */
class ProfessorsSchoolclassFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'professor_siape' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'schoolclasse_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_professors_has_classes_classes1' => array('column' => 'schoolclasse_id', 'unique' => 0),
			'fk_professors_has_classes_professors1' => array('column' => 'professor_siape', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'professor_siape' => 1,
			'schoolclasse_id' => 1
		),
	);

}
