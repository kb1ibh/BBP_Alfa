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
 * @modified	2014-08-26
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

}