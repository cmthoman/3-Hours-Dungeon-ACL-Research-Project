<?php
class LandingController extends AppController {
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->set('page', 'landing');
		$this->Auth->allow();
	}
	
	function index(){
		$this->set('action', 'index');
	}
	
}