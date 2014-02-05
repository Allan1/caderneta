<?php
App::uses('AppController', 'Controller');
/**
 * Educationplans Controller
 *
 * @property Educationplan $Educationplan
 */
class EducationplansController extends AppController {
	var $beforeFilter = array('isAdmin' => array(
          'except' => array('index','view'),
          'args' => array('redirect' => '/')
      )
  );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Educationplan->recursive = 0;
		$this->set('educationplans', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
    $this->Educationplan->id = $id;
		if (!$this->Educationplan->exists()) {
			throw new NotFoundException(__('educationplan inválido(a).'));
		}
		
		$this->set('educationplan', $this->Educationplan->read());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Educationplan->create();
			if ($this->Educationplan->save($this->request->data)) {
				$this->setFlash(__('O(A) plano de ensino foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) plano de ensino não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		}
		$disciplines = $this->Educationplan->Discipline->find('list');
		$this->set(compact('disciplines'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Educationplan->id = $id;
		if (!$this->Educationplan->exists()) {
			throw new NotFoundException(__('educationplan inválido(a).'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Educationplan->save($this->request->data)) {
				$this->setFlash(__('O(A) plano de ensino foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) plano de ensino não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Educationplan.' . $this->Educationplan->primaryKey => $id));
			$this->request->data = $this->Educationplan->find('first', $options);
		}
		$disciplines = $this->Educationplan->Discipline->find('list');
		$this->set(compact('disciplines'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Educationplan->id = $id;
		if (!$this->Educationplan->exists()) {
			throw new NotFoundException(__('educationplan inválido(a).'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Educationplan->delete()) {
			$this->setFlash(__('Educationplan deletado(a)'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Educationplan não foi deletado(a)'));
		$this->redirect(array('action' => 'index'));
	}
}
