<?php
App::uses('AppController', 'Controller');
/**
 * Students Controller
 *
 * @property Student $Student
 */
class StudentsController extends AppController {
	var $beforeFilter = array('isAdmin' => array(
          'except' => array('view'),
          'args' => array('redirect' => '/')
      )
  );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Student->recursive = 0;
		$this->set('students', $this->paginate());
		$this->Student->bestStudents();
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $primaryKey
 * @return void
 */
	public function view($id = null) {
		if(!$this->isAdmin()){
			$student = $this->Student->User->isStudent($this->getUserId());
			if(!$student)
				$this->setFlashAccessDenied();
		}
		else{
			$this->Student->id = $id;
			if (!$this->Student->exists()) {
				throw new NotFoundException(__('Estudante inválido(a).'));
			}
			$student = $this->Student->read();	
		}    	
		$this->set('student', $student);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Student->create();
			if ($this->Student->save($this->request->data)) {
				$this->setFlash(__('O(A) estudante foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) estudante não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		}
		$users = $this->Student->User->find('list');
		$schoolclasses = $this->Student->Schoolclass->find('list');
		$this->set(compact('users', 'schoolclasses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $primaryKey
 * @return void
 */
	public function edit($id = null) {
		$this->Student->id = $id;
		if (!$this->Student->exists()) {
			throw new NotFoundException(__('student inválido(a).'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Student->save($this->request->data)) {
				$this->setFlash(__('O(A) estudante foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) estudante não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $primaryKey));
			$this->request->data = $this->Student->find('first', $options);
		}
		$users = $this->Student->User->find('list');
		$schoolclasses = $this->Student->Schoolclass->find('list');
		$this->set(compact('users', 'schoolclasses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $primaryKey
 * @return void
 */
	public function delete($id = null) {
		$this->Student->id = $id;
		if (!$this->Student->exists()) {
			throw new NotFoundException(__('student inválido(a).'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Student->delete()) {
			$this->setFlash(__('Student deletado(a)'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Student não foi deletado(a)'));
		$this->redirect(array('action' => 'index'));
	}
}
