<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'users', 'action' => 'view'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	
	Router::connect ('/usuarios', array('controller'=>'users','action'=>'index'));
  Router::connect ('/usuarios/apagar/*', array('controller'=>'users','action'=>'delete'));
  Router::connect ('/usuarios/ver/*', array('controller'=>'users','action'=>'view'));
  Router::connect ('/usuarios/editar/*', array('controller'=>'users','action'=>'edit'));
  Router::connect ('/usuarios/adicionar/*', array('controller'=>'users','action'=>'add'));
  Router::connect ('/usuarios/senha/*', array('controller'=>'users','action'=>'password'));
  Router::connect ('/usuarios/login/*', array('controller'=>'users','action'=>'login'));
  
  Router::connect ('/estudantes', array('controller'=>'students','action'=>'index'));
  Router::connect ('/estudantes/apagar/*', array('controller'=>'students','action'=>'delete'));
  Router::connect ('/estudantes/ver/*', array('controller'=>'students','action'=>'view'));
  Router::connect ('/estudantes/editar/*', array('controller'=>'students','action'=>'edit'));
  Router::connect ('/estudantes/adicionar/*', array('controller'=>'students','action'=>'add'));

  Router::connect ('/professores', array('controller'=>'professors','action'=>'index'));
  Router::connect ('/professores/apagar/*', array('controller'=>'professors','action'=>'delete'));
  Router::connect ('/professores/ver/*', array('controller'=>'professors','action'=>'view'));
  Router::connect ('/professores/editar/*', array('controller'=>'professors','action'=>'edit'));
  Router::connect ('/professores/adicionar/*', array('controller'=>'professors','action'=>'add'));
  
  Router::connect ('/avaliacoes', array('controller'=>'evaluations','action'=>'index'));
  Router::connect ('/avaliacoes/apagar/*', array('controller'=>'evaluations','action'=>'delete'));
  Router::connect ('/avaliacoes/ver/*', array('controller'=>'evaluations','action'=>'view'));
  Router::connect ('/avaliacoes/editar/*', array('controller'=>'evaluations','action'=>'edit'));
  Router::connect ('/avaliacoes/adicionar/*', array('controller'=>'evaluations','action'=>'add'));

  Router::connect ('/tidoDeAvaliacoes', array('controller'=>'evaluationtypes','action'=>'index'));
  Router::connect ('/tidoDeAvaliacoes/apagar/*', array('controller'=>'evaluationtypes','action'=>'delete'));
  Router::connect ('/tidoDeAvaliacoes/ver/*', array('controller'=>'evaluationtypes','action'=>'view'));
  Router::connect ('/tidoDeAvaliacoes/editar/*', array('controller'=>'evaluationtypes','action'=>'edit'));
  Router::connect ('/tidoDeAvaliacoes/adicionar/*', array('controller'=>'evaluationtypes','action'=>'add'));
    
  Router::connect ('/notas', array('controller'=>'grades','action'=>'index'));
  Router::connect ('/notas/apagar/*', array('controller'=>'grades','action'=>'delete'));
  Router::connect ('/notas/ver/*', array('controller'=>'grades','action'=>'view'));
  Router::connect ('/notas/editar/*', array('controller'=>'grades','action'=>'edit'));
  Router::connect ('/notas/adicionar/*', array('controller'=>'grades','action'=>'add'));
  
  Router::connect ('/ministra', array('controller'=>'professors_schoolclasses','action'=>'index'));
  Router::connect ('/ministra/apagar/*', array('controller'=>'professors_schoolclasses','action'=>'delete'));
  Router::connect ('/ministra/ver/*', array('controller'=>'professors_schoolclasses','action'=>'view'));
  Router::connect ('/ministra/editar/*', array('controller'=>'professors_schoolclasses','action'=>'edit'));
  Router::connect ('/ministra/adicionar/*', array('controller'=>'professors_schoolclasses','action'=>'add'));

  Router::connect ('/cursa', array('controller'=>'schoolclasses_students','action'=>'index'));
  Router::connect ('/cursa/apagar/*', array('controller'=>'schoolclasses_students','action'=>'delete'));
  Router::connect ('/cursa/ver/*', array('controller'=>'schoolclasses_students','action'=>'view'));
  Router::connect ('/cursa/editar/*', array('controller'=>'schoolclasses_students','action'=>'edit'));
  Router::connect ('/cursa/adicionar/*', array('controller'=>'schoolclasses_students','action'=>'add'));

  Router::connect ('/disciplinas', array('controller'=>'disciplines','action'=>'index'));
  Router::connect ('/disciplinas/apagar/*', array('controller'=>'disciplines','action'=>'delete'));
  Router::connect ('/disciplinas/ver/*', array('controller'=>'disciplines','action'=>'view'));
  Router::connect ('/disciplinas/editar/*', array('controller'=>'disciplines','action'=>'edit'));
  Router::connect ('/disciplinas/adicionar/*', array('controller'=>'disciplines','action'=>'add'));

  Router::connect ('/turmas', array('controller'=>'schoolclasses','action'=>'index'));
  Router::connect ('/turmas/apagar/*', array('controller'=>'schoolclasses','action'=>'delete'));
  Router::connect ('/turmas/ver/*', array('controller'=>'schoolclasses','action'=>'view'));
  Router::connect ('/turmas/editar/*', array('controller'=>'schoolclasses','action'=>'edit'));
  Router::connect ('/turmas/adicionar/*', array('controller'=>'schoolclasses','action'=>'add'));
      

	Router::connect('/:controller/ver/*',array('action'=>'view'));
  Router::connect('/:controller/adicionar/*',array('action'=>'add'));
  Router::connect('/:controller/editar/*',array('action'=>'edit'));
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
