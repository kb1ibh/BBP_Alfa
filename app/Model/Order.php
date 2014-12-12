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
			),
			'unique' => array(
				'rule' => 'isUnique',
				'required' => 'create'
			)
		),
		'invoice_number' => array(
			'numericRule' => array(
				'rule'    	=> 'numeric',
				'required'	=> true,
				'message' 	=> 'Invoice Number must contain only numbers.'
			),
			'unique' => array(
				'rule' => 'isUnique',
				'required' => 'create'
			)
		)
	);
	
	public $hasMany = array(
		'Detail' => array(
			'className' => 'Detail'
		)
	);
	
	public $belongsTo = array(
        'Billing',
		'Shipping'
    );
	
	/* Add new PO 
	 * RETURNS id of row if inserted, else false.
	 */
	public function add($argArray) {
		$this->create();
		
		// populate invoice field with next invoice value
		$defaultArgs = array(
			'Order' => array(
				'invoice_number' => $this->maxInvoice() + 1
			)
		);
		
		// combine default and passed arrays, MUST be recursive merge to 
		// maintain nested values
		$this->set(array_merge_recursive($defaultArgs, $argArray));
		
		if($this->save()){
			return $this->getInsertID();
		} else return false;
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