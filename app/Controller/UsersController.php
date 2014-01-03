<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

  /**
   * index method
   *
   * @return void
   */
  public function index() {
    $this->User->recursive = 0;
    $this->set('users', $this->paginate());
  }

  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function view($id = null) {
    if(!$id)
      $id = $this->getUserId();
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
    $this->set('user', $this->User->find('first', $options));
  }

  /**
   * add method
   *
   * @return void
   */
  public function add() {
    if ($this->request->is('post')) {
      $this->User->create();
      if ($this->User->save($this->request->data)) {
        $this->setFlash(__('O user foi salvo'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->setFlash(__('O user não pôde ser salvo. Por favor, tente novamente.'));
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
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->User->save($this->request->data)) {
        $this->setFlash(__('O user foi salvo'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->setFlash(__('O user não pôde ser salvo. Por favor, tente novamente.'));
      }
    } else {
      $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
      $this->request->data = $this->User->find('first', $options);
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
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->User->delete()) {
      $this->setFlash(__('User deletado'));
      $this->redirect(array('action' => 'index'));
    }
    $this->setFlash(__('User não foi deletado'));
    $this->redirect(array('action' => 'index'));
  }

  public function login() {
    $this->layout = 'login';
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        $this->redirect($this->Auth->redirect());
      } else {
        debug(AuthComponent::password($this->request->data['User']['password']));
        $this->setFlashFailure(__('Email e/ou senha errados'));
      }
    }
  }

  public function logout() {
    $this->redirect($this->Auth->logout());
  }

}
