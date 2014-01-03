<?php
App::uses('AppController', 'Controller');
/**
 * Disciplines Controller
 *
 * @property Discipline $Discipline
 */
class DisciplinesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Discipline->recursive = 0;
		$this->set('disciplines', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
    $this->Discipline->id = $id;
		if (!$this->Discipline->exists()) {
			throw new NotFoundException(__('discipline inválido(a).'));
		}
		
		$this->set('discipline', $this->Discipline->read());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Discipline->create();
			if ($this->Discipline->save($this->request->data)) {
				$this->setFlash(__('O(A) discipline foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) discipline não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Discipline->id = $id;
		if (!$this->Discipline->exists()) {
			throw new NotFoundException(__('discipline inválido(a).'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Discipline->save($this->request->data)) {
				$this->setFlash(__('O(A) discipline foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) discipline não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Discipline.' . $this->Discipline->primaryKey => $id));
			$this->request->data = $this->Discipline->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Discipline->id = $id;
		if (!$this->Discipline->exists()) {
			throw new NotFoundException(__('discipline inválido(a).'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Discipline->delete()) {
			$this->setFlash(__('Discipline deletado(a)'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Discipline não foi deletado(a)'));
		$this->redirect(array('action' => 'index'));
	}
}
