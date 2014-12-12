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
 * @modified	2014-09-29
 */

class OrdersController extends AppController {

	public $components = array('Paginator');

	/* Paginated order listings */
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
	
	/* Details for specific order*/
	public function details($id) {	
		$order = $this->Order->find('first', array(
			'conditions' => array(
				'id' => $id
			),
			'contain' => array(
				'Detail' => array(
					'Product'
	 			)
			)
		));
		
		$this->set(compact('order', 'id'));
	}
	
	public function add() {
		if( $this->request->is('post') ) {
			//add new order number
			if( $insertID = $this->Order->add($this->request->data) ) {
				$this->Session->setFlash('The Order was Created Successfully', 'Flash/Validation/alert', array('type' => 'success'));
				
				//Process redirect
				if($this->request->data['redirect'] == 'orders') {
					$this->redirect('/orders');
				} elseif($this->request->data['redirect'] == 'details') {
					$this->redirect('/orders/details/'.$insertID);
				}				
			} else {
				//display validation errors
				$this->Session->setFlash(null, 'Flash/validation/alert', array(
					'validation' => true, 
					'type' => 'danger',
				));
			}
		}
	}

	public function ajax_order_number() {
		$this->autoRender = false;
		$resultCount = $this->Order->find('count', array(
			'conditions' => array(
				'po_number' => $this->request->data('orderNumber')
			)
		));
		$this->set(compact('resultCount'));
	}
}