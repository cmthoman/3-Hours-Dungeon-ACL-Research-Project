<?php
class UserProfile extends AppModel {
		
	public $belongsTo = array(
		'UserGroup',
		'User'
	);
	
	var $validate = array(
	
		'display_name' => array(
		
			
			'alphanumeric' => array(
				'rule' => array('custom', '/^[a-z0-9 ]*$/i'),        
				'message' => 'Character names must only contain letters and numbers.'
			),
			
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => "Please enter your main character's name.",
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'username_between_3_and_19' => array(
				'rule' => array('between', 3, 19),
				'message' => 'Character Names must be between 3 and 19 characters in length.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'server' => array(
			'inList' => array(
				'rule' => 'inList',        
				'message' => 'Nice try, but we thought of that haha. Pick a server from the dropdown this time please!'
			)
		)
	);
	
	function formatName($data){
		if(isset($this->data['UserProfile']['display_name'])){
			$this->data['UserProfile']['display_name'] = ucfirst(strtolower($this->data['UserProfile']['display_name']));
		}
		return true;
	}
	
}
?>