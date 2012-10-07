<?php
class PanelController extends AppController{
	
	function beforeFilter(){
		parent::beforeFilter();
	}
	
	function index(){
		
	}
	
	function read(){
		
	}
	
	//Build our Root ACO Node Called Controller //Run Once Upon Setting up a new portal
	function buildRootACOController(){
		$this->Acl->Aco->create(array('parent_id' => null, 'alias' => 'controllers'));
		$this->Acl->Aco->save();
	}
}
