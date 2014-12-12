<?php

/**
 * Model for Billing addresses
 *
 * PHP v5
 *
 * @author     	Michael Haynes <kb1ibh@gmail.com>
 * @copyright  	2014 Boston BioProducts Inc.
 * @license    	MIT License
 * @created		2014-12-12
 * @modified	2014-12-12
 */
 
App::uses('AppModel', 'Model');
class Billing extends AppModel {

	public $name = 'Billing';
	
	/* validation rules */
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Name field cannot be left blank'
		),
		'address1' => array(
			'rule' => 'notEmpty',
			'message' => 'Address 1 field cannot be left blank'
		),
		'address2' => array(
			'rule' => 'notEmpty',
			'message' => 'Address 2 field cannot be left blank'
		),
		'city' => array(
			'rule' => 'notEmpty',
			'message' => 'City field cannot be left blank'
		),
		'state' => array(
			'rule' => 'notEmpty',
			'message' => 'State field cannot be left blank'
		),
		'zip' => array(
			'rule' => 'notEmpty',
			'message' => 'Zip field cannot be left blank'
		),
	);
	
	public $hasOne = 'Order';
	
}