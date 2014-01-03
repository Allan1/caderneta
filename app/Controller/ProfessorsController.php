<?php
App::uses('AppController', 'Controller');
/**
 * Professors Controller
 *
 * @property Professor $Professor
 */
class ProfessorsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Professor->recursive = 0;
		$this->set('professors', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
    $this->Professor->id = $id;
		if (!$this->Professor->exists()) {
			throw new NotFoundException(__('professor inválido(a).'));
		}
		
		$this->set('professor', $this->Professor->read());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Professor->create();
			if ($this->Professor->save($this->request->data)) {
				$this->setFlash(__('O(A) professor foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) professor não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		}
		$users = $this->Professor->User->find('list');
		$schoolclasses = $this->Professor->Schoolclass->find('list');
		$this->set(compact('users', 'schoolclasses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Professor->id = $id;
		if (!$this->Professor->exists()) {
			throw new NotFoundException(__('professor inválido(a).'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Professor->save($this->request->data)) {
				$this->setFlash(__('O(A) professor foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) professor não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Professor.' . $this->Professor->primaryKey => $id));
			$this->request->data = $this->Professor->find('first', $options);
		}
		$users = $this->Professor->User->find('list');
		$schoolclasses = $this->Professor->Schoolclass->find('list');
		$this->set(compact('users', 'schoolclasses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Professor->id = $id;
		if (!$this->Professor->exists()) {
			throw new NotFoundException(__('professor inválido(a).'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Professor->delete()) {
			$this->setFlash(__('Professor deletado(a)'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Professor não foi deletado(a)'));
		$this->redirect(array('action' => 'index'));
	}
}
