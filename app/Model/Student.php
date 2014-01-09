<?php
App::uses('AppModel', 'Model');
/**
 * Student Model
 *
 * @property User $User
 * @property Schoolclass $Schoolclass
 */
class Student extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'enrolment';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'enrolment' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Schoolclass' => array(
			'className' => 'Schoolclass',
			'joinTable' => 'schoolclasses_students',
			'foreignKey' => 'student_enrolment',
			'associationForeignKey' => 'schoolclasse_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

	public function bestStudents()	{
		$result = $this->find('all',array(
			'joins'=>array(
				array(
					'table'=>'schoolclasses_students',
					'alias'=>'SchoolclassesStudent',
					'conditions'=>'SchoolclassesStudent.student_enrolment = Student.enrolment'
				),
				array(
					'table'=>'grades',
					'alias'=>'Grade',
					'conditions'=>'SchoolclassesStudent.id = Grade.schoolclasses_student_id'
				),
			)
		));
		debug($result);
	}

}
