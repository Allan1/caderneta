<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
      'unique' => array(
          'rule' => 'isUnique',
          'message' => AppModel::MSG_IS_UNIQUE
      )
		),
		'password' => array(
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
  
	
/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Professor' => array(
			'className' => 'Professor',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


  public function beforeSave($options = array()) {
      $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
      return true;
  }

  public function isProfessor($id = null) {
  	if ($id) {
  		$this->id = $id;
  	}

  	return $this->Professor->find('first',array('conditions'=>array('Professor.user_id'=>$this->id)));
  }

  public function isStudent($id = null) {
  	if ($id) {
  		$this->id = $id;
  	}

  	return $this->Student->find('first',array('conditions'=>array('Student.user_id'=>$this->id)));
  }
}
