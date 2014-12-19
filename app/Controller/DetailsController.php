<?php

/**
 * Orders Controller
 *
 * PHP v5
 *
 * @author     	Michael Haynes <kb1ibh@gmail.com>
 * @copyright  	2014 Boston BioProducts Inc.
 * @license    	MIT License
 * @created		2014-09-29
 * @modified	2014-09-29
 */

class DetailsController extends AppController {

	public $components = array('Paginator');

	
	public function add() {
		$this->autoRender = false;
		if( $this->request->is('post') ) {
			//add new order number
			if($this->Detail->save($this->request->data)) {
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash("", "flashMessage/error");
			}
		}		
		$this->redirect($this->referer());
	}
	
}