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

	public function ajax_search($searchString) {
		$this->layout = 'ajax';
		$products = $this->Product->find('all', array(
			'conditions' => array(
				'OR' => array(
					'description LIKE' => '%' . $searchString . '%',
					'bbp_cat LIKE' => '%' . $searchString . '%',
					'aa_cat LIKE' => '%' . $searchString . '%'
				)
			),
			'limit' => 10
		));
		$this->set(compact('products'));
	}

}