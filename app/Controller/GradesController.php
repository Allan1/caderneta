<?php
App::uses('AppController', 'Controller');
/**
 * Grades Controller
 *
 * @property Grade $Grade
 */
class GradesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Grade->recursive = 0;
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
	public function add() {
		if ($this->request->is('post')) {
			$this->Grade->create();
			if ($this->Grade->save($this->request->data)) {
				$this->setFlash(__('O(A) grade foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) grade não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		}
		$evaluations = $this->Grade->Evaluation->find('list');
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
				$this->setFlash(__('O(A) grade foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) grade não pôde ser salvo(a). Por favor, tente novamente.'));
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
