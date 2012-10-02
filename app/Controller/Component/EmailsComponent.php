<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class EmailsComponent extends Component {
	
	public function sendAuthEmail($to){
		$email = new CakeEmail();
		$email->emailFormat('text');
		$email->template('activation', 'activation');
		$email->from(array('noreply@3hoursdungeon.com' => '3 Hours Dungeon'));
		$email->to($to);
		$email->subject('3 Hours Dungeon Account Activation');
		$email->send();
		return TRUE;
	}
}
