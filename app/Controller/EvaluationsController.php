<?php
App::uses('AppController', 'Controller');
/**
 * Evaluations Controller
 *
 * @property Evaluation $Evaluation
 */
class EvaluationsController extends AppController {
	var $beforeFilter = array('isAdmin' => array(
          'except' => array('index','view','add','edit','delete'),
          'args' => array('redirect' => '/')
      )
  );
/**
 * index method
 *
 * @return void
 */
	public function index($schoolclasse_id) {
		$this->Evaluation->recursive = 0;
		$this->paginate = array('conditions'=>array('Evaluation.schoolclasse_id'=>$schoolclasse_id));
		$this->set('evaluations', $this->paginate());
		$this->set(compact('schoolclasse_id'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
    $this->Evaluation->id = $id;
		if (!$this->Evaluation->exists() || !$this->Evaluation->Schoolclass->belongsToSchoolclass($this->getUserId(),$this->Evaluation->field('schoolclasse_id'))) {
			throw new NotFoundException(__('evaluation inválido(a).'));
		}
		
		$this->set('evaluation', $this->Evaluation->read());
	}

/**
 * add method
 *
 * @return void
 */
	public function add($schoolclasse_id) {
		if ($this->request->is('post')) {
			$this->Evaluation->create();
			if ($this->Evaluation->save($this->request->data)) {
				$this->setFlash(__('O(A) avaliação foi salvo'));
				$this->redirect(array('action' => 'index',$schoolclasse_id));
			} else {
				$this->setFlash(__('O(A) avaliação não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		}
		$schoolclasses = $this->Evaluation->Schoolclass->find('list',array('conditions'=>array('Schoolclass.id'=>$schoolclasse_id)));
		$evaluationtypes = $this->Evaluation->Evaluationtype->find('list');
		$this->set(compact('schoolclasses', 'evaluationtypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Evaluation->id = $id;
		if (!$this->Evaluation->exists()) {
			throw new NotFoundException(__('evaluation inválido(a).'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Evaluation->save($this->request->data)) {
				$this->setFlash(__('O(A) avaliação foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) avaliação não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
			$this->request->data = $this->Evaluation->find('first', $options);
		}
		$schoolclasses = $this->Evaluation->Schoolclasse->find('list');
		$evaluationtypes = $this->Evaluation->Evaluationtype->find('list');
		$this->set(compact('schoolclasses', 'evaluationtypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Evaluation->id = $id;
		if (!$this->Evaluation->exists()) {
			throw new NotFoundException(__('evaluation inválido(a).'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Evaluation->delete()) {
			$this->setFlash(__('Evaluation deletado(a)'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Evaluation não foi deletado(a)'));
		$this->redirect(array('action' => 'index'));
	}
}
