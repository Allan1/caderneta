<?php
App::uses('AppController', 'Controller');
/**
 * ProfessorsSchoolclasses Controller
 *
 * @property ProfessorsSchoolclass $ProfessorsSchoolclass
 */
class ProfessorsSchoolclassesController extends AppController {
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
	public function index() {
		$this->ProfessorsSchoolclass->recursive = 0;
		$this->set('professorsSchoolclasses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
    $this->ProfessorsSchoolclass->id = $id;
		if (!$this->ProfessorsSchoolclass->exists()) {
			throw new NotFoundException(__('professors schoolclass inválido(a).'));
		}
		
		$this->set('professorsSchoolclass', $this->ProfessorsSchoolclass->read());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProfessorsSchoolclass->create();
			if ($this->ProfessorsSchoolclass->save($this->request->data)) {
				$this->setFlash(__('O(A) relação de ministrar foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) relação de ministrar não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		}
		
		$schoolclassesAll = $this->ProfessorsSchoolclass->Schoolclasse->find('all',array('fields'=>'Schoolclasse.id,Schoolclasse.discipline_code,Schoolclasse.semester,Schoolclasse.code'));
		$schoolclasses = array();
		foreach ($schoolclassesAll as $key => $value) {
			$schoolclasses[$value['Schoolclasse']['id']] = $value['Schoolclasse']['semester'].'-'.$value['Schoolclasse']['discipline_code'].'-'.$value['Schoolclasse']['code'];
		}
		
		$this->ProfessorsSchoolclass->Professor->recursive = 1;
		$professorsAll = $this->ProfessorsSchoolclass->Professor->find('all',array('fields'=>'Professor.siape,User.name'));
		foreach ($professorsAll as $key => $value) {
			$professors[$value['Professor']['siape']] = $value['Professor']['siape'].'-'.$value['User']['name'];
		}
		
		$this->set(compact('schoolclasses', 'professors'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ProfessorsSchoolclass->id = $id;
		if (!$this->ProfessorsSchoolclass->exists()) {
			throw new NotFoundException(__('professors schoolclass inválido(a).'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProfessorsSchoolclass->save($this->request->data)) {
				$this->setFlash(__('O(A) relação de ministrar foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash(__('O(A) relação de ministrar não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('ProfessorsSchoolclass.' . $this->ProfessorsSchoolclass->primaryKey => $id));
			$this->request->data = $this->ProfessorsSchoolclass->find('first', $options);
		}
		$schoolclassesAll = $this->ProfessorsSchoolclass->Schoolclasse->find('all',array('fields'=>'Schoolclasse.id,Schoolclasse.discipline_code,Schoolclasse.semester,Schoolclasse.code'));
		$schoolclasses = array();
		foreach ($schoolclassesAll as $key => $value) {
			$schoolclasses[$value['Schoolclasse']['id']] = $value['Schoolclasse']['semester'].'-'.$value['Schoolclasse']['discipline_code'].'-'.$value['Schoolclasse']['code'];
		}
		
		$this->ProfessorsSchoolclass->Professor->recursive = 1;
		$professorsAll = $this->ProfessorsSchoolclass->Professor->find('all',array('fields'=>'Professor.siape,User.name'));
		foreach ($professorsAll as $key => $value) {
			$professors[$value['Professor']['siape']] = $value['Professor']['siape'].'-'.$value['User']['name'];
		}
		$this->set(compact('schoolclasses', 'professors'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProfessorsSchoolclass->id = $id;
		if (!$this->ProfessorsSchoolclass->exists()) {
			throw new NotFoundException(__('professors schoolclass inválido(a).'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProfessorsSchoolclass->delete()) {
			$this->setFlash(__('Professors schoolclass deletado(a)'));
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlash(__('Professors schoolclass não foi deletado(a)'));
		$this->redirect(array('action' => 'index'));
	}
}
