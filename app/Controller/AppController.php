<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

  public $components = array(
      'Session',
      'Auth' => array(
          'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
          'logoutRedirect' => array('controller' => 'users', 'action' => 'login')
      )
  );

  public function beforeFilter() {
    date_default_timezone_set('America/Sao_Paulo');
    $this->Auth->authenticate = array(
    'Form' => array(
        'fields' => array('username' => 'email', 'password' => 'password'),
    ),
);
//      $this->Auth->allow('index');

    if (empty($this->beforeFilter))
      return true;
    $failures = false;
    foreach ($this->beforeFilter as $func_name => $func) {
      $call_func = true;
      if (!empty($func['only'])) {
        if (!in_array($this->action, $func['only']))
          $call_func = false;
      }
      if (!empty($func['except'])) {
        if (in_array($this->action, $func['except']))
          $call_func = false;
      }
      if ($call_func) {
        //                $args = (isset($func['args'])) ? implode(',',$func['args']) : null;
        $args = (isset($func['args'])) ? $func['args'] : null;
        if (!$this->{$func_name}($args)) {
          $failures = true;
          break;
        }
      }
    }
    return !$failures;
  }

  public function getUserId() {
    return $this->Session->read('Auth.User.id');
  }

  public function setFlashSuccess($message, $redirect = null) {
    $this->Session->setFlash(__($message), 'default', array('class' => 'alert alert-success'));
    if ($redirect)
      $this->redirect($redirect);
  }

  public function setFlashFailure($message, $redirect = null) {
    $this->Session->setFlash(__($message), 'default', array('class' => 'alert alert-error'));
    if ($redirect)
      $this->redirect($redirect);
  }

  public function setFlash($message, $redirect = null) {
    $this->Session->setFlash(__($message), 'default', array('class' => 'alert'));
    if ($redirect)
      $this->redirect($redirect);
  }

  public function setFlashInfo($message, $redirect = null) {
    $this->Session->setFlash(__($message), 'default', array('class' => 'alert alert-info'));
    if ($redirect)
      $this->redirect($redirect);
  }

  public function setFlashAccessDenied($redirect = '/') {
    $this->setFlashFailure ('Usuário sem permissão para acessar esse conteúdo.', $redirect);
  }

  public function canToAccess($args) {
    $admin = $this->Session->read('Auth.User.admin');
    if($admin)
      return true;
    if(isset($args['redirect']))
      $this->setFlashAccessDenied ($args['redirect']);
    return false;
  }

}
