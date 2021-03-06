<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');
//App::uses('Security', 'Controller/Component');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
		'Acl',
		'Auth' => array(
			'authorize' => array(
				'Actions' => array(
					'actionPath' => 'Controller',
				)
			)
		),
		'Session',
		'Logger',
		'Security'
	);
	
	public $helpers = array('Html', 'Form');
	public $uses = array('User');
	
	function beforeFilter(){
		//$this->Auth->allow('*');
		$this->set('loggedIn', $this->_loggedIn());
		//Pass the default action variable to the view as null. We can override this later in a specific action to modify the layout on a per-action basis. 
		$this->set('action', null);
		$this->set('page', '');
		$this->set('debug1', null);
		$this->set('debug2', null);
		$this->set('debug3', null);
		$this->Security->csrfExpires = "+2 hours";
	}
	
	function _loggedIn(){
		$loggedIn = FALSE;
		//Check for user session, if it exists then set loggedIn to true and pass te username to the layout view
		if($this->Auth->user()){
			$loggedIn = TRUE;
			$this->set('username', $username = $this->Auth->user('username'));
		}
		//Return the results of the log in test as TRUE or FALSE
		return $loggedIn;
	}	
}
