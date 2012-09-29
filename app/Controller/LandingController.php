<?php
class LandingController extends AppController {
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->set('page', 'landing');
	}
	
	function index(){
		
	}
	
}