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
  
  const MSG_NOT_EMPTY = 'Campo obrigatório.';
	const MSG_NOT_SELECTED = 'Selecione um valor para este campo.';
	const MSG_ONLY_NUMBERS = 'Preencha este campo com números apenas.';
	const MSG_ONLY_NUMBERS_LETTERS = 'Use apenas letras e números!';
	const MSG_INVALID_EMAIL = 'Email inválido.';
	const MSG_INVALID_CEP = 'CEP inválido (ex. 00000-000).';
	const MSG_INVALID_DATE = 'Data inválida.';
	const MSG_INVALID_STATE = 'Estado inválido. Use a sigla da UF.';
	const MSG_INVALID_CPF = 'CPF inválido.';
	const MSG_PASSWORD_RECHECK = 'Senha repetida não confere!';
	const MSG_PASSWORD_LENGTH = 'A senha deve ter um mínimo de 4 caracteres!';
	const MSG_LOGIN_NOT_UNIQUE = 'Já existe um login com esta identificação!';
	const MSG_CPF_NOT_UNIQUE = 'Já existe um cliente com este CPF!';
	const MSG_EMAIL_NOT_UNIQUE = 'E-mail já cadastrado!';
	const MSG_IS_UNIQUE = 'Valor já cadastrado!';
	const MSG_NUMBER_OUT_OF_RANGE = 'Número fora da faixa permitida!';
	const MSG_DATA_OUT_OF_RANGE = 'Data fora da faixa permitida!';

}
