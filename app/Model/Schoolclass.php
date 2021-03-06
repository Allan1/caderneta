<?php
App::uses('AppModel', 'Model');
/**
 * Schoolclass Model
 *
 * @property Discipline $Discipline
 * @property Evaluation $Evaluation
 * @property Professor $Professor
 * @property Student $Student
 */
class Schoolclass extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'code' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'semester' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'discipline_code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
		'Discipline' => array(
			'className' => 'Discipline',
			'foreignKey' => 'discipline_code',
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
		'Evaluation' => array(
			'className' => 'Evaluation',
			'foreignKey' => 'schoolclasse_id',
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
		'Professor' => array(
			'className' => 'Professor',
			'joinTable' => 'professors_schoolclasses',
			'foreignKey' => 'schoolclasse_id',
			'associationForeignKey' => 'professor_siape',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Student' => array(
			'className' => 'Student',
			'joinTable' => 'schoolclasses_students',
			'foreignKey' => 'schoolclasse_id',
			'associationForeignKey' => 'student_enrolment',
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

	public function belongsToSchoolclass($user_id,$id = null){
		if ($id) {
			$this->id = $id;
		}

		if( $this->isProfessorOf($user_id) ||
			$this->find('first',array(
				'conditions'=>array('Student.user_id'=>$user_id,'Schoolclass.id'=>$this->id),
				'joins'=>array(
					array(
						'table'=>'schoolclasses_students',
						'alias'=>'SchoolclassesStudent',
						'conditions'=>'SchoolclassesStudent.schoolclasse_id = Schoolclass.id'
					),
					array(
						'table'=>'students',
						'alias'=>'Student',
						'conditions'=>'Student.enrolment = SchoolclassesStudent.student_enrolment'
					)
				)
			))
		)
			return true;
		return false;
	}

	public function isProfessorOf($user_id,$id = null){
		if ($id) {
			$this->id = $id;
		}
		return $this->find('first',array(
			'conditions'=>array('Professor.user_id'=>$user_id,'Schoolclass.id'=>$this->id),
			'joins'=>array(
				array(
					'table'=>'professors_schoolclasses',
					'alias'=>'ProfessorsSchoolclass',
					'conditions'=>'ProfessorsSchoolclass.schoolclasse_id = Schoolclass.id'
				),
				array(
					'table'=>'professors',
					'alias'=>'Professor',
					'conditions'=>'Professor.siape = ProfessorsSchoolclass.professor_siape'
				)
			)
		));

	}

}
