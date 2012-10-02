<?php
class UsersController extends AppController{
	
	public $components = array('Emails');
	public $uses = array('User', 'UserProfile');
	
	function beforeFilter(){
		parent::beforeFilter();
	}
		
	public function login() {
		//Check for request type = post
	    if($this->request->is('post')){
	    	$this->Session->destroy('User');
	    	//Log User In
	        if($this->Auth->login()){
				$id = $this->Auth->user('id');
	        	$profile = $this->UserProfile->find('first', array('conditions' => array('UserProfile.user_id' => $id)));
				//If no profile exists then create one -- Tied to Group Model using ACL behaviour to automagically modify ACL table on profile create
				if(empty($profile)){
					$this->UserProfile->set('user_id', $id);
					$this->UserProfile->save($this->data);
				}
				$this->Logger->logUser('Users', 'Log In :: Success');
	        	$this->redirect(array('controller' => 'landing'));
			}else{
				//Login Failed -- Redirect with params to auto-open embedded login and display error message
			}
	    }
	}
	
	public function logout(){
		$this->Logger->logUser('Users', 'Log Out :: Success');
		$this->Session->destroy('User');
		$this->redirect(array('controller' => 'landing'));
	}
	
	function register(){
		//Tell the view what specific action we're requesting (specifically used to modify the user control bar to remove embedded login for this page)
		$this->set('action', 'register');
		//Check if the user is already logged in
		if($this->Auth->user()){
			$this->redirect(array('controller' => 'landing'));
		}else{
			//Check for request type = post
			if($this->request->is('post')){
				//Make sure post data exists
				if (!empty($this->data)) {
					$this->User->create();
					$this->request->data['User']['activate_hash'] = Security::hash(rand(20, 40), NULL, TRUE);
					if ($this->User->save($this->data)) {
						//Use Emails component to send a generic Auth email containing the user's supplied information and the link with the login hash
						$this->Emails->sendAuthEmail($this->data['User']['email']);
						$this->redirect(array('action' => 'activateAccount?username='.$this->data['User']['username'].'&email='.$this->data['User']['email'].'&activate=pending'));
					}
				}
			}
		}
	}
	
	function activateAccount(){
		//If the url param "activate" is "pending" pass data to the view to render the activation pending message
		if($this->params['url']['activate'] == 'pending'){
			$username = $this->params['url']['username']; 
			$email = $this->params['url']['email'];
			//Set variable for use in the view
			$this->set('username', $username);
			$this->set('email', $email);
			$this->set('activate', 'pending');
		}
		//If the url param param "activate" is "attempt" attempt to activate the user's account
		elseif($this->params['url']['activate'] == 'attempt'){
			$username = $this->params['url']['username'];
			$key = $this->params['url']['key'];
			$activate_user = $this->User->find('first', array('conditions'=>array('User.username'=>$username, 'User.activate_hash'=>$key)));
			//Check to make sure we found a user matching our find call and update the active record to true and set a new hash for use later in our application
			if(!empty($activate_user)){
				$this->User->id = $activate_user['User']['id'];
				if($this->User->saveField('active', 'true')){
					$this->User->saveField('activate_hash', Security::hash(rand(20, 40), NULL, TRUE));
					//Redirect user to the activateAccount view this time with the param "activate" set to complete
					$this->redirect(array('action' => 'activateAccount?username='.$username.'&activate=complete'));
				}
			}else{
				$this->redirect(array('controller' => 'landing'));
			}
		}
		//If the url param "activate" is "complete" pass data to the view to render the activation complete message
		elseif($this->params['url']['activate'] == 'complete'){
			$username = $this->params['url']['username']; 
			$this->set('username', $username);
			$this->set('activate', 'complete');
		//If the url param "activate" is none of the above or missing, redirect the user to the landing page
		}else{
			$this->redirect(array('controller' => 'landing'));
		}
	}
}
