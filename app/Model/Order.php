<?php

/**
 * Model for Orders
 *
 * PHP v5
 *
 * @author     	Michael Haynes <kb1ibh@gmail.com>
 * @copyright  	2014 Boston BioProducts Inc.
 * @license    	MIT License
 * @created		2014-08-26
 * @modified	2014-08-26
 */
 
App::uses('AppModel', 'Model');
class Order extends AppModel {

	public $name = 'Order';
	
	/* validation rules */
	public $validate = array(
		'po_number' => array(
			'numericRule' => array(
				'rule'    	=> 'numeric',
				'required'	=> true,
				'message' 	=> 'PO Numbers must contain only numbers.'
			)
		),
		'invoice_number' => array(
			'numericRule' => array(
				'rule'    	=> 'numeric',
				'required'	=> true,
				'message' 	=> 'Invoice Number must contain only numbers.'
			)
		)
	);
	
	public $hasMany = array(
		'Detail' => array(
			'className' => 'Detail'
		)
	);
	
}