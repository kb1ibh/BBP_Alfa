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
	
	/*
	 * ajax_search()
	 * returns html table containing search results
	 * used in products/index
	 */
	public function ajax_search() {
		$this->layout = 'ajax';
		$products = $this->Product->find('all', array(
				'conditions' => array(
						'OR' => array(
								'description LIKE' => '%' . $this->request->data('q') . '%',
								'bbp_cat LIKE' => '%' . $this->request->data('q') . '%',
								'aa_cat LIKE' => '%' . $this->request->data('q') . '%'
						)
				),
				'limit' => 30
		));
		$this->set(compact('products'));
	}
	/*
	 * Index()
	 * paginated list of products 
	 */
	public function index() {
		$products = $this->Paginator->paginate('Product');
		$this->set(compact('products'));
	}
	
	/*
	 * edit()
	 * modify product title, catalog #'s, description, volume & price
	 */
	public function edit($id = null) {
		$this->layout = "dashboard-empty";
	
		if( ! $id ) {
			$this->Session->setFlash('Bad ID', 'Flash/Validation/alert', array(
				'type' => 'danger'
			));
			$this->redirect('/fancybox/redirect/');
		}
	
		if($this->request->isPost()) {
			$this->Product->id = $id;
			if($this->Product->save($this->request->data)) {
				$this->Session->setFlash('Saved Successfully', 'Flash/Validation/alert', array(
						'type' => 'success'
				));
				$product = $this->Product->findById($id);
				$this->redirect('/fancybox/close');
			}
		} else {
			$detail = $this->Product->findById($id);
			$this->set(compact('detail'));
		}
	}
	
	
	/*
	 * orders()
	 * list of all orders for spesific product
	 */
	public function orders($id) {
		$this->layout = "dashboard-empty";
		
		if($this->Product->exists($id)) {
			$product = $this->Product->find('first', array(
				'contain' => array(
					'Detail'=> array(
						'Order' => array(
							'Detail' => array(
								'Product'
							)
						)
					)
				)
			));
			$this->set(compact('product'));
		}
	}
}	