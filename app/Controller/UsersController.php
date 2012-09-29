<?php
class UsersController extends AppController{
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->set('page', 'landing');
	}
	
	function login(){
		
	}
	
	function logout(){
		
	}
	
	function register(){
		if($this->Auth->user()){
			$this->redirect(array('controller' => 'home'));
		}else{
			if (!empty($this->data)) {
				$this->User->create();
				$this->request->data['User']['activate_hash'] = Security::hash(rand(20, 40), NULL, TRUE);
				if ($this->User->save($this->data)) {
					$email = new CakeEmail();
					$email->emailFormat('text');
					$email->template('activation', 'activation');
					$email->from(array('noreply@3hoursdungeon.com' => '3 Hours Dungeon'));
					$email->to($this->data['User']['email']);
					$email->subject('3 Hours Dungeon Account Activation');
					$email->send();
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
