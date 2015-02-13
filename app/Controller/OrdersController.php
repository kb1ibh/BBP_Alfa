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
		#Debug mode will break this function
		Configure::write('debug', 0);
		
		$this->layout = "dashboard-empty";
		//get shipping/billing addresses
		$this->loadModel('Shipping');
		$this->loadModel('Billing');
		
		$shipping = $this->Shipping->find('all');
		$billing = $this->Billing->find('all');
		
		$this->set(compact('shipping', 'billing'));
		
		//Handle Posts
		if( $this->request->is('post') ) {
			//add new order number
			if( $insertID = $this->Order->add($this->request->data) ) {
				
				//Process redirect
				if($this->request->data['redirect'] == 'orders') {
					$this->redirect('/fancybox/redirect/orders');
				} elseif($this->request->data['redirect'] == 'details') {
					$this->redirect('/fancybox/redirect/orders/details/'.$insertID);
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
	
	public function invoice($id) {
		#Debug mode will break this function
		Configure::write('debug', 0);
		$this->layout = 'docx';
		$order = $this->Order->find('first', array(
			'contain' => array(
				'Billing',
				'Shipping',
				'Detail' => array(
					'Product'
				)
			), 
			'conditions' => array(
				'Order.id' => $id
			)
		));
		$this->set(compact('order'));
	}
	
	public function packing($id) {
		#Debug mode will break this function
		Configure::write('debug', 0);
		$this->layout = 'docx';
		$order = $this->Order->find('first', array(
			'contain' => array(
				'Billing',
				'Shipping',
				'Detail' => array(
					'Product'
				)
			), 
			'conditions' => array(
				'Order.id' => $id
			)
		));
		$this->set(compact('order'));
	}
	
	/*
	 * ajax_search()
	 * returns html table containing search results
	 * used in orders/index
	 */
	public function ajax_search() {
		$this->layout = 'ajax';
		$orders = $this->Order->find('all', array(
				'conditions' => array(
						'po_number LIKE' => '%' . $this->request->data('q') . '%',
				),
				'contain'=> array(
					'Detail' => array(
						'Product'
					)
						
				),
				'limit' => 30
		));
		$this->set(compact('orders'));
	}
	
}