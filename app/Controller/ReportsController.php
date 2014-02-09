<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class ReportsController extends AppController {


	public function reprovedByPresence() {
		$this->loadModel('Schoolclasse');
		$this->loadModel('Discipline');

		$results = array();
		if ($this->request->is('post')) {
			$query = "SELECT * FROM `view1` WHERE 1 = 1";
			foreach ($this->request->data['User'] as $key => $value) {
				if ($value) {
						$query.=" AND `view1`.`{$key}` = '{$value}'"; 
				}
				$results = $this->Discipline->query($query);
				//debug($results);
			}
		}

		
		$semesters2 = $this->Schoolclasse->find('list',array(
			'fields'=>'semester',
			'group'=>'semester'
		));
		$semesters = array();
		foreach ($semesters2 as $key => $value) {
			$semesters[$value] = $value;
		}
		
		$disciplines = $this->Discipline->find('list');
		foreach ($disciplines as $key => $value) {
			$disciplines[$key] = $key.' - '.$value;
		}
		$this->set(compact('disciplines','semesters','results'));
	}
}
