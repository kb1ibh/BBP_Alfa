<?php

/**
 * Orders Controller
 *
 * PHP v5
 *
 * @author     	Michael Haynes <kb1ibh@gmail.com>
 * @copyright  	2014 Boston BioProducts Inc.
 * @license    	MIT License
 * @created		2014-08-28
 * @modified	2014-08-28
 */

class OrdersController extends AppController {

	public $components = array('Paginator');

	public function index() {
		$this->paginate = array(
			'contain' => array( 
				'Detail' => array(
					'Product'
				)
			),
			'order' => 'Order.created DESC',
			'limit' => 15
		);
		$orders = $this->Paginator->paginate('Order');
		$this->set(compact('orders'));
	}
}