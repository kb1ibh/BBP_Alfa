<?php

/**
 * Model for Products
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
class Product extends AppModel {

	public $name = 'Product';
	public $displayField = 'description';
	
	public $hasMany = array(
		'Detail'
	);
	
	
	public $validate = array(
		'description' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'the Description field cannot be empty'
				
		),
		'bbp_cat' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'the BBP Catalog # field cannot be empty'
		),
		'aa_cat' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'the Alfa Catalog # field cannot be empty'
		),
		'vol' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'the Volume field cannot be empty'
		),
		'price' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'the Price field cannot be empty'
		),
	);
	
	/*
	 *  Autocomplete find method
	 *  Returns product data formatted for jQuery UI Autocomplete 
	 */
	public $findMethods = array('autocomplete' => true);
	protected function _findAutoComplete($state, $query, $results = array()) {
		if ($state === 'before') {
			return $query;
		} elseif($state === 'after') {
			$data = array();
			foreach($results as $result) {
				$result[$this->alias]['label'] = $result[$this->alias]['aa_cat'] . ' - ' . $result[$this->alias]['bbp_cat'] . ' - ' . $result[$this->alias]['vol'];
				$result[$this->alias]['desc'] = $result[$this->alias]['description'];
				array_push($data, $result[$this->alias]);
			}
			
			return $data;
		}
    }

}