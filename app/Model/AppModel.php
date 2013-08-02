<?php

/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

  /**
   * 
   * @staticvar string $_useDbConfig Stores the name of the current DB.
   * @param integer|string|array $id Set this ID for this model on startup, can also be an array of options, see above.
   * @param string $table Name of database table to use.
   * @param string $ds DataSource connection name.
   * @see Model
   */
  public function __construct($id = false, $table = null, $ds = null) {
    // If a datasource is set via params, use it and return 
    if ((is_array($id) && isset($id['ds'])) || $ds) {
      parent::__construct($id, $table, $ds);
      return;
    }

    /*
     * Use a static variable, to only use one connection per page-call (otherwise
     * we would get a new handle every time a Model is created)
     */
    static $_useDbConfig;
    if (!isset($_useDbConfig)) {
      $_useDbConfig = 'slave';
    }
    $this->useDbConfig = $_useDbConfig;

    parent::__construct($id, $table, $ds);
  }

  /**
   * Every data must be saved in to Master. For to do that, we store the current
   * configuration that DB is using, we put the Master's configuration, we store
   * data in to DB and we restore the configuration used before.
   * @see Model 
   */
  public function save($data = null, $validate = true, $fieldList = array()) {
    $oldDbConfig = $this->useDbConfig;
    $this->setDataSource('master');
    $return = parent::save($data, $validate, $fieldList);
    $this->setDataSource($oldDbConfig);
    return $return;
  }

  /**
   * Every data must be updated in to Master. For to do that, we store the current
   * configuration that DB is using, we put the Master's configuration, we update
   * data in to DB and we restore the configuration used before.
   * @see Model
   */
  public function updateAll($fields, $conditions = true) {
    $oldDbConfig = $this->useDbConfig;
    $this->setDataSource('master');
    $return = parent::updateAll($fields, $conditions);
    $this->setDataSource($oldDbConfig);
    return $return;
  }

}
