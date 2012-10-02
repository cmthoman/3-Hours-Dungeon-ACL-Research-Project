<?php
Class UserProfilesController extends AppController {
	
	function beforeFilter(){
		parent::beforeFilter();
	}
		
	function index(){
		
	}
	
	function edit(){
		
	}
	
	function editGroup($id = null){
		$user = $this->UserGroup->find('first', array('conditions' => array('User.id' => $id), 'recursive' => 2));
		if($this->request->is('get')){
			
		}else{
			$this->UserProfile->id = $user['UserProfile']['id'];
			$this->UserProfile->save($this->request->data);
		}
	}
}
