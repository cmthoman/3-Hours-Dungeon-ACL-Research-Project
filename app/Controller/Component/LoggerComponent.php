<?php
App::uses('Component', 'Controller');
App::uses('AuthComponent', 'Controller/Component');
class LoggerComponent extends Component{
	
	public $components = array('Auth');
		
	function logUser($controller, $action){
		$id = $this->Auth->user('id');
		$this->LogUser = ClassRegistry::init('LogUser');
		$log['LogUser']['user_id'] = $id;
		$log['LogUser']['controller'] = $controller;
		$log['LogUser']['action'] = $action;
		$this->LogUser->save($log);
	}
	
	function logStaff($controller, $action){
		$id = $this->Auth->user('id');
		$this->LogStaff = ClassRegistry::init('LogStaff');
		$log['LogStaff']['user_id'] = $id;
		$log['LogStaff']['controller'] = $controller;
		$log['LogStaff']['action'] = $action;
		$this->LogStaff->save($log);
	}
	
}
