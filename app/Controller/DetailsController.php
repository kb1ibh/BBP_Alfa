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
 * @modified	2015-02-04
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
				$this->Session->setFlash('Could not save order item', 'Flash/Validation/alert', array(
					'type' => 'danger',
				));
			}
		}		
		$this->redirect($this->referer());
	}
	
	public function edit($id = null) {
        $this->layout = "dashboard-empty";
        
        if( ! $id ) {
            $this->Session->setFlash('Bad ID', 'Flash/Validation/alert', array(
				'type' => 'danger'
			));
            $this->redirect('/fancybox/redirect/');
        }
		
        if($this->request->isPost()) {
            $this->Detail->id = $id;
            if($this->Detail->save($this->request->data)) {
            	$this->Session->setFlash('Saved Successfully', 'Flash/Validation/alert', array(
           			'type' => 'success'
            	));
            	$detail = $this->Detail->findById($id);
                $this->redirect('/fancybox/redirect/orders/details/'.$detail['Detail']['order_id']);
            }          
        } else {
            $detail = $this->Detail->findById($id);
            $this->set(compact('detail'));
        }
    }
	
	public function delete($id) {
		$this->autoRender = false;
		if($this->Detail->exists($id)) {
			$this->Detail->delete($id);
			$this->Session->setFlash('Deleted Sucessfully', 'Flash/Validation/alert', array('type' => 'success'));
			$this->redirect($this->referer());
			
		} else {
			$this->Session->setFlash('Could not delete line', 'Flash/Validation/alert', array('type' => 'danger'));
			$this->redirect($this->referer());
		}
	}

}