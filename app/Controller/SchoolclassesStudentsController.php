<?php
App::uses('AppController', 'Controller');
/**
 * SchoolclassesStudents Controller
 *
 * @property SchoolclassesStudent $SchoolclassesStudent
 */
class SchoolclassesStudentsController extends AppController {

	var $beforeFilter = array('isAdmin' => array(
          'except' => array('index','attendance'),
          'args' => array('redirect' => '/')
    	)
  	);
/**
 * index method
 *
 * @return void
 */
	public function index($schoolclasse_id) {
		$this->SchoolclassesStudent->recursive = 1;
		$paginate = array(
			'conditions'=>array(
				'SchoolclassesStudent.schoolclasse_id'=>$schoolclasse_id				
			)
		);
		if(!$this->isAdmin()){
			$paginate['conditions']['Professor.user_id'] = $this->getUserId();
			$paginate['joins'] = array(
				array(
					'table'=>'professors_schoolclasses',
					'alias'=>'ProfessorsSchoolclasse',
					'conditions'=>'SchoolclassesStudent.schoolclasse_id = ProfessorsSchoolclasse.schoolclasse_id'
				),
				array(
					'table'=>'professors',
					'alias'=>'Professor',
					'conditions'=>'Professor.siape = ProfessorsSchoolclasse.professor_siape'
				)
			);
		}
		$this->paginate = $paginate;
		$schoolclass = $this->SchoolclassesStudent->Schoolclass->read(null,$schoolclasse_id);
		$this->set(compact('schoolclass'));
		
		$this->set('schoolclassesStudents', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
    $this->SchoolclassesStudent->id = $id;
		if (!$this->SchoolclassesStudent->exists()) {
			throw new NotFoundException(__('schoolclasses student inválido(a).'));
		}
		
		$this->set('schoolclassesStudent', $this->SchoolclassesStudent->read());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Schoolclasse']['attendance'] = 0;
			$this->SchoolclassesStudent->create();
			if ($this->SchoolclassesStudent->save($this->request->data)) {
				$this->setFlash(__('O(A) relação de cursar foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) relação de cursar não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		}
		$schoolclassesAll = $this->SchoolclassesStudent->Schoolclasse->find('all',array('fields'=>'Schoolclasse.id,Schoolclasse.discipline_code,Schoolclasse.semester,Schoolclasse.code'));
		$schoolclasses = array();
		foreach ($schoolclassesAll as $key => $value) {
			$schoolclasses[$value['Schoolclasse']['id']] = $value['Schoolclasse']['semester'].'-'.$value['Schoolclasse']['discipline_code'].'-'.$value['Schoolclasse']['code'];
		}
		
		$this->SchoolclassesStudent->Student->recursive = 1;
		$studentsAll = $this->SchoolclassesStudent->Student->find('all',array('fields'=>'Student.enrolment,User.name'));
		foreach ($studentsAll as $key => $value) {
			$students[$value['Student']['enrolment']] = $value['Student']['enrolment'].'-'.$value['User']['name'];
		}
		$this->set(compact('schoolclasses', 'students'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->SchoolclassesStudent->id = $id;
		if (!$this->SchoolclassesStudent->exists()) {
			throw new NotFoundException(__('schoolclasses student inválido(a).'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SchoolclassesStudent->save($this->request->data)) {
				$this->setFlash(__('O(A) relação de cursar foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) relação de cursar não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('SchoolclassesStudent.' . $this->SchoolclassesStudent->primaryKey => $id));
			$this->request->data = $this->SchoolclassesStudent->find('first', $options);
		}
		$schoolclassesAll = $this->SchoolclassesStudent->Schoolclasse->find('all',array('fields'=>'Schoolclasse.id,Schoolclasse.discipline_code,Schoolclasse.semester,Schoolclasse.code'));
		$schoolclasses = array();
		foreach ($schoolclassesAll as $key => $value) {
			$schoolclasses[$value['Schoolclasse']['id']] = $value['Schoolclasse']['semester'].'-'.$value['Schoolclasse']['discipline_code'].'-'.$value['Schoolclasse']['code'];
		}
		
		$this->SchoolclassesStudent->Student->recursive = 1;
		$studentsAll = $this->SchoolclassesStudent->Student->find('all',array('fields'=>'Student.enrolment,User.name'));
		foreach ($studentsAll as $key => $value) {
			$students[$value['Student']['enrolment']] = $value['Student']['enrolment'].'-'.$value['User']['name'];
		}
		$this->set(compact('schoolclasses', 'students'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SchoolclassesStudent->id = $id;
		if (!$this->SchoolclassesStudent->exists()) {
			throw new NotFoundException(__('schoolclasses student inválido(a).'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SchoolclassesStudent->delete()) {
			$this->setFlash(__('Schoolclasses student deletado(a)'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Schoolclasses student não foi deletado(a)'));
		$this->redirect(array('action' => 'index'));
	}

	public function attendance($id,$schoolclasse_id){
		$this->SchoolclassesStudent->id = $id;
		if (!$this->SchoolclassesStudent->exists()) {
			throw new NotFoundException(__('Relação de cursar inválido(a).'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SchoolclassesStudent->save($this->request->data)) {
				$this->setFlash(__('O(A) relação de cursar foi salvo'));
				$this->redirect(array('action' => 'index',$schoolclasse_id));
			} else {
				$this->setFlash(__('O(A) relação de cursar não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('SchoolclassesStudent.' . $this->SchoolclassesStudent->primaryKey => $id));
			$this->request->data = $this->SchoolclassesStudent->find('first', $options);
		}
		$this->set(compact('schoolclasses', 'students'));	
	}
}
