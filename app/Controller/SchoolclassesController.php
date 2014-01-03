<?php
App::uses('AppController', 'Controller');
/**
 * Schoolclasses Controller
 *
 * @property Schoolclass $Schoolclass
 */
class SchoolclassesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Schoolclass->recursive = 0;
		$this->set('schoolclasses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
    $this->Schoolclass->id = $id;
		if (!$this->Schoolclass->exists()) {
			throw new NotFoundException(__('schoolclass inválido(a).'));
		}
		
		$this->set('schoolclass', $this->Schoolclass->read());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Schoolclass->create();
			if ($this->Schoolclass->save($this->request->data)) {
				$this->setFlash(__('O(A) schoolclass foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) schoolclass não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		}
		$disciplines = $this->Schoolclass->Discipline->find('list');
		$professors = $this->Schoolclass->Professor->find('list');
		$students = $this->Schoolclass->Student->find('list');
		$this->set(compact('disciplines', 'professors', 'students'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Schoolclass->id = $id;
		if (!$this->Schoolclass->exists()) {
			throw new NotFoundException(__('schoolclass inválido(a).'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Schoolclass->save($this->request->data)) {
				$this->setFlash(__('O(A) schoolclass foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) schoolclass não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Schoolclass.' . $this->Schoolclass->primaryKey => $id));
			$this->request->data = $this->Schoolclass->find('first', $options);
		}
		$disciplines = $this->Schoolclass->Discipline->find('list');
		$professors = $this->Schoolclass->Professor->find('list');
		$students = $this->Schoolclass->Student->find('list');
		$this->set(compact('disciplines', 'professors', 'students'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Schoolclass->id = $id;
		if (!$this->Schoolclass->exists()) {
			throw new NotFoundException(__('schoolclass inválido(a).'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Schoolclass->delete()) {
			$this->setFlash(__('Schoolclass deletado(a)'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Schoolclass não foi deletado(a)'));
		$this->redirect(array('action' => 'index'));
	}
}
