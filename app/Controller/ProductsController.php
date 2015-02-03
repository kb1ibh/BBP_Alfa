<?php

/**
 * Products Controller
 *
 * PHP v5
 *
 * @author     	Michael Haynes <kb1ibh@gmail.com>
 * @copyright  	2014 Boston BioProducts Inc.
 * @license    	MIT License
 * @created		2014-09-29
 * @modified	2014-09-29
 */

class ProductsController extends AppController {
	
	/*
	 * autocomplete_search()
	*  used in autocomplete input in orders/details
	*  feeds properly formatted JSON with
	*/
	public function autocomplete_search() {
		$this->layout = 'ajax';
		$products = $this->Product->find('autocomplete', array(
			'conditions' => array(
				'OR' => array(
					'description LIKE' => '%' . $this->request->data('q') . '%',
					'bbp_cat LIKE' => '%' . $this->request->data('q') . '%',
					'aa_cat LIKE' => '%' . $this->request->data('q') . '%'
				)
			),
			'limit' => 5
		));
		$this->set(compact('products'));
	}
	
	

}