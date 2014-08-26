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
	
	/* Add new PO */
	public function add($po) {
		$this->create();
		$this->set(
			array(
				'po_number' => $po,
				'invoice_number' => $this->maxInvoice() + 1
			)
		);
		return $this->save();
	}

	/* Get max invoice number */
	public function maxInvoice() {
		$result = $this->find('first', 
			array(
				'fields' => array('MAX(invoice_number) as max_inv')
			)
		);
		return $result[0]['max_inv'];
	}
	
}