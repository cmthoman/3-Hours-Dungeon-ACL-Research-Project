<?php
class GroupsController extends AppController {
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->set('page', 'landing');
	}
		
	function index(){
		$this->set('groups', $this->Group->find('all'));
	}
	
	function add(){
		if($this->request->is('post')){
			if($this->request->data){
				if($this->Group->save($this->request->data)){
					$this->redirect(array('action' => 'add'));
				}
			}
		}
	}
	
}
