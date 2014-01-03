<?php
App::uses('AppController', 'Controller');
/**
 * Evaluationtypes Controller
 *
 * @property Evaluationtype $Evaluationtype
 */
class EvaluationtypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Evaluationtype->recursive = 0;
		$this->set('evaluationtypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
    $this->Evaluationtype->id = $id;
		if (!$this->Evaluationtype->exists()) {
			throw new NotFoundException(__('evaluationtype inválido(a).'));
		}
		
		$this->set('evaluationtype', $this->Evaluationtype->read());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Evaluationtype->create();
			if ($this->Evaluationtype->save($this->request->data)) {
				$this->setFlash(__('O(A) evaluationtype foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) evaluationtype não pôde ser salvo(a). Por favor, tente novamente.'));
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
		$this->Evaluationtype->id = $id;
		if (!$this->Evaluationtype->exists()) {
			throw new NotFoundException(__('evaluationtype inválido(a).'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Evaluationtype->save($this->request->data)) {
				$this->setFlash(__('O(A) evaluationtype foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) evaluationtype não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Evaluationtype.' . $this->Evaluationtype->primaryKey => $id));
			$this->request->data = $this->Evaluationtype->find('first', $options);
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
		$this->Evaluationtype->id = $id;
		if (!$this->Evaluationtype->exists()) {
			throw new NotFoundException(__('evaluationtype inválido(a).'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Evaluationtype->delete()) {
			$this->setFlash(__('Evaluationtype deletado(a)'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Evaluationtype não foi deletado(a)'));
		$this->redirect(array('action' => 'index'));
	}
}
