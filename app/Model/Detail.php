<?php

/**
 * Model for Order Details
 *
 * PHP v5
 *
 * @author     	Michael Haynes <kb1ibh@gmail.com>
 * @copyright  	2014 Boston BioProducts Inc.
 * @license    	MIT License
 * @created		2014-08-26
 * @modified	2014-09-30
 */

App::uses('AppModel', 'Model');
class Detail extends AppModel {

    public $name = 'Detail';
	
	public $hasOne = array(
		'Order' => array(
			'className' => 'Order'
		)
	);

	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product'
		),
	);
	
	public $validate = array(
		'order_id' => array(
			'numeric' => array(
                'rule'     => 'numeric',
                'required' => 'create',
                'message'  => 'Numbers only'
            )
		),
		'product_id' => array(
			'numeric' => array(
                'rule'     => 'numeric',
                'required' => 'create',
                'message'  => 'Numbers only'
            )
		),
		'quantity' => array(
			'numeric' => array(
                'rule'     => 'numeric',
                'required' => 'create',
                'message'  => 'Numbers only'
            )
		),
		'lot' => array(
			'alphaNumeric' => array(
                'rule'     => 'alphaNumeric',
                'required' => 'create',
                'message'  => 'Letters and numbers only'
            )
		)
	);
	
	//beforeSave Model Hook
	public function beforeSave($options = array()) {
		//auto-generate lot numbers when empty
		if (isset($this->data['Detail']['lot']) && $this->data['Detail']['lot'] == '') {
			$this->data['Detail']['lot'] = $this->generateLot();
		}
		return true;
	}
	
	public function generateLot() {
		$montharray = array(
			'1'=>'M',  '2'=>'N',  '3'=>'P',
			'4'=>'Q',  '5'=>'R',  '6'=>'S',
			'7'=>'T',  '8'=>'U',  '9'=>'W',
			'10'=>'X', '11'=>'Y', '12'=>'Z'
		);

		$yeararray = array(
			'2011'=>'X', '2012'=>'Y', '2013'=>'Z',
			'2014'=>'A', '2015'=>'B', '2016'=>'C',
			'2017'=>'D', '2018'=>'E', '2019'=>'F',
			'2020'=>'G', '2021'=>'H', '2022'=>'I',
			'2023'=>'J'
		);
		
		$day = date("d");
		$month = date("n");
		$year = date("Y");
		$lotPrefix = $montharray[$month] . $day . $yeararray[$year];
		
		//find all lot numbers with existing month-day-year sequence
		$existingLots = $this->find('all', array(
			'conditions' => array(
				'lot LIKE' => $lotPrefix .'%'
			)
		));
		//lot sequence numbers begin at 500, if lots exist with 
		$maxLot = 500;
		if($existingLots) {
			foreach($existingLots as $lot) {
				preg_match('/([A-Z]+)([0-9]+)([A-Z]+)([0-9]+)/', $lot['Detail']['lot'], $matches);
				if($matches[4] > $maxLot) {
					$maxLot = $matches[4];
				}
			}
		} 
		return $lotPrefix . ($maxLot + 1);
	}

}