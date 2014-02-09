<?php
App::uses('AppController', 'Controller');
/**
 * ProfessorsSchoolclasses Controller
 *
 * @property ProfessorsSchoolclass $ProfessorsSchoolclass
 */
class ProfessorsSchoolclassesController extends AppController {
	var $beforeFilter = array('isAdmin' => array(
          'except' => array('index'),
          'args' => array('redirect' => '/')
      )
  );
/**
 * index method
 *
 * @return void
 */
	public function index($schoolclasse_id = null) {
		$this->ProfessorsSchoolclass->recursive = 1;
		if($schoolclasse_id){
			$this->paginate = array('conditions'=>array('ProfessorsSchoolclass.schoolclasse_id'=>$schoolclasse_id));
			$schoolclass = $this->ProfessorsSchoolclass->Schoolclasse->read(null,$schoolclasse_id);
			$this->set(compact('schoolclass'));
		}
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
	public function add($schoolclasse_id = null) {
		if ($this->request->is('post')) {
			$this->ProfessorsSchoolclass->create();
			if ($this->ProfessorsSchoolclass->save($this->request->data)) {
				$this->setFlash(__('O(A) relação de ministrar foi salvo'));
				$this->redirect(array('action' => 'index',$schoolclasse_id));
			} else {
				$this->setFlash(__('O(A) relação de ministrar não pôde ser salvo(a). Por favor, tente novamente.'));
			}
		}
		
		$schoolclassesAll = $this->ProfessorsSchoolclass->Schoolclasse->find('all',array('fields'=>'Schoolclasse.id,Schoolclasse.discipline_code,Schoolclasse.semester,Schoolclasse.code'));
		$schoolclasses = array();
		foreach ($schoolclassesAll as $key => $value) {
			$schoolclasses[$value['Schoolclasse']['id']] = $value['Schoolclasse']['semester'].'-'.$value['Schoolclasse']['discipline_code'].'-'.$value['Schoolclasse']['code'];
		}
		if($schoolclasse_id){
			$value = $schoolclasses[$schoolclasse_id];
			$schoolclasses = array($schoolclasse_id => $value);
		}		
		$this->ProfessorsSchoolclass->Professor->recursive = 1;
		$professorsAll = $this->ProfessorsSchoolclass->Professor->find('all',array('fields'=>'Professor.siape,User.name'));
		foreach ($professorsAll as $key => $value) {
			$professors[$value['Professor']['siape']] = $value['Professor']['siape'].'-'.$value['User']['name'];
		}		
		$this->set(compact('schoolclasses', 'professors','schoolclasse_id'));
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
	public function delete($id = null, $schoolclasse_id = null) {
		$this->ProfessorsSchoolclass->id = $id;
		if (!$this->ProfessorsSchoolclass->exists()) {
			throw new NotFoundException(__('professors schoolclass inválido(a).'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProfessorsSchoolclass->delete()) {
			$this->setFlash(__('Professors schoolclass deletado(a)'));
			$this->redirect(array('action' => 'index',$schoolclasse_id));
		}
		$this->setFlash(__('Professors schoolclass não foi deletado(a)'));
		$this->redirect(array('action' => 'index',$schoolclasse_id));
	}
}
