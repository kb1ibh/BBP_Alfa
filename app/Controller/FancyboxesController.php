<?php
class FancyboxesController extends AppController {

	public $uses = false;
	public $layout = "empty";

	public function close() {
		Configure::write('debug', 0);
	}

	public function parent_redirect($path) {
		Configure::write('debug', 0);
		$this->set(compact('path'));
	}

}