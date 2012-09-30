<?php
class UsersController extends AppController{
	
	public $components = array('Emails');
	public $uses = array('User', 'UserProfile');
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->set('page', 'landing');
	}
	
	function editGroup($id = null){
		$this->UserProfile->unbindModel(array('belongsTo' => array('User')));
		$user = $this->User->find('first', array('conditions' => array('User.id' => $id), 'recursive' => 2));
		if($this->request->is('get')){
			$this->request->data = $user;
		}else{
			$this->UserProfile->id = $user['UserProfile']['id'];
			$this->UserProfile->save($this->request->data);
		}
	}
	
	public function login() {
	    if($this->request->is('post')) {
	        if($this->Auth->login()) {
	        	$id = $this->Auth->user('id');
	        	$profile = $this->UserProfile->find('first', array('conditions' => array('UserProfile.user_id' => $id)));
				if(empty($profile)){
					$this->UserProfile->set('user_id', $id);
					$this->UserProfile->save($this->data);
				}
	            return $this->redirect(array('controller' => 'landing'));
			}else{
			}
	    }
	}
	
	public function logout(){
		$this->Auth->logout();
		$this->redirect(array('controller' => 'landing'));
	}
	
	function register(){
		$this->set('action', 'register');
		if($this->Auth->user()){
			$this->redirect(array('controller' => 'landing'));
		}else{
			if (!empty($this->data)) {
				$this->User->create();
				$this->request->data['User']['activate_hash'] = Security::hash(rand(20, 40), NULL, TRUE);
				if ($this->User->save($this->data)) {
					$this->Emails->sendAuthEmail($this->data['User']['email']);
					$this->redirect(array('action' => 'activateAccount?username='.$this->data['User']['username'].'&email='.$this->data['User']['email'].'&activate=pending'));
				}
			}
		}
	}
	
	function activateAccount(){
		if($this->params['url']['activate'] == 'pending'){
			$username = $this->params['url']['username']; 
			$email = $this->params['url']['email'];
			$this->set('username', $username);
			$this->set('email', $email);
			$this->set('activate', 'pending');
		}	
		elseif($this->params['url']['activate'] == 'attempt'){
			$username = $this->params['url']['username'];
			$key = $this->params['url']['key'];
			$this->set('activate', 'attempt');
			$activate_user = $this->User->find('first', array('conditions'=>array('User.username'=>$username, 'User.activate_hash'=>$key)));
			if(!empty($activate_user)){
				$this->User->id = $activate_user['User']['id'];
				if($this->User->saveField('active', 'true')){
					$this->User->saveField('activate_hash', Security::hash(rand(20, 40), NULL, TRUE));
					$this->redirect(array('action' => 'activateAccount?username='.$username.'&activate=complete'));
				}
			}else{
				$this->redirect(array('controller' => 'landing'));
			}
		}
		elseif($this->params['url']['activate'] == 'complete'){
			$username = $this->params['url']['username']; 
			$this->set('username', $username);
			$this->set('activate', 'complete');
		}else{
			$this->redirect(array('controller' => 'landing'));
		}
	}
}
