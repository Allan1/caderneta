<?php
App::uses('AppModel', 'Model');
/**
 * ProfessorsSchoolclass Model
 *
 * @property Schoolclasse $Schoolclasse
 * @property Professor $Professor
 */
class ProfessorsSchoolclass extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'professor_siape' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'schoolclasse_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Schoolclass' => array(
			'className' => 'Schoolclass',
			'foreignKey' => 'schoolclasse_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Professor' => array(
			'className' => 'Professor',
			'foreignKey' => 'professor_siape',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
