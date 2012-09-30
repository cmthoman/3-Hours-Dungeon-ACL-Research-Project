<?php
class UserProfile extends AppModel {
	
	public $actsAs = array('Acl' => array('type' => 'requester'));
	
	public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['UserProfile']['group_id'])) {
            $groupId = $this->data['UserProfile']['group_id'];
        } else {
            $groupId = 6;
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
		
	public $belongsTo = array(
		'User',
		'Group'
	);
	
	var $validate = array(
	
		'game_name' => array(
		
			
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
			'between_3_and_19' => array(
				'rule' => array('between', 3, 20),
				'message' => 'Character Names must be between 3 and 19 characters in length.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
	);
	
	function formatName($data){
		if(isset($this->data['UserProfile']['display_name'])){
			$this->data['UserProfile']['display_name'] = ucfirst(strtolower($this->data['UserProfile']['display_name']));
		}
		return true;
	}
	
}
?>