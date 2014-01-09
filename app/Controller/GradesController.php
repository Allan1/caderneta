<?php
App::uses('AppController', 'Controller');
/**
 * Grades Controller
 *
 * @property Grade $Grade
 */
class GradesController extends AppController {
	var $beforeFilter = array('canToAccess' => array(
          'except' => array('index','view'),
          'args' => array('redirect' => '/')
      )
  );
/**
 * index method
 *
 * @return void
 */
	public function index($schoolclasses_student_id = null) {
		$this->Grade->recursive = 0;
		if($schoolclasses_student_id){
			$this->paginate = array('conditions'=>array('Grade.schoolclasses_student_id'=>$schoolclasses_student_id));
		}
		$this->set('schoolclasses_student_id', $schoolclasses_student_id);
		$this->set('schoolclasses_student',$this->Grade->SchoolclassesStudent->read(null,$schoolclasses_student_id));
		$this->set('grades', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
    $this->Grade->id = $id;
		if (!$this->Grade->exists()) {
			throw new NotFoundException(__('grade inválido(a).'));
		}
		
		$this->set('grade', $this->Grade->read());
	}

/**
 * add method
 *
 * @return void
 */
	public function add($schoolclasses_student_id = null) {
		if ($this->request->is('post')) {
			$this->Grade->create();
			if ($this->Grade->save($this->request->data)) {
				$this->setFlash(__('O(A) nota foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) nota não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		}
		$evaluations = $this->Grade->Evaluation->find('list');
		if ($schoolclasses_student_id) {
			$schoolclasses_student = $this->Grade->SchoolclassesStudent->read(null,$schoolclasses_student_id);
			$schoolclassesStudents = array($schoolclasses_student_id=>$schoolclasses_student['SchoolclassesStudent']['student_enrolment']);
			$evaluations = $this->Grade->Evaluation->find('list',array('conditions'=>array('Evaluation.schoolclasse_id'=>$schoolclasses_student['SchoolclassesStudent']['schoolclasse_id'])));
		}
		else
			$schoolclassesStudents = $this->Grade->SchoolclassesStudent->find('list');
		$this->set(compact('evaluations', 'schoolclassesStudents'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Grade->id = $id;
		if (!$this->Grade->exists()) {
			throw new NotFoundException(__('grade inválido(a).'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Grade->save($this->request->data)) {
				$this->setFlash(__('O(A) nota foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) nota não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Grade.' . $this->Grade->primaryKey => $id));
			$this->request->data = $this->Grade->find('first', $options);
		}
		$evaluations = $this->Grade->Evaluation->find('list');
		$schoolclassesStudents = $this->Grade->SchoolclassesStudent->find('list');
		$this->set(compact('evaluations', 'schoolclassesStudents'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Grade->id = $id;
		if (!$this->Grade->exists()) {
			throw new NotFoundException(__('grade inválido(a).'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Grade->delete()) {
			$this->setFlash(__('Grade deletado(a)'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Grade não foi deletado(a)'));
		$this->redirect(array('action' => 'index'));
	}
}
