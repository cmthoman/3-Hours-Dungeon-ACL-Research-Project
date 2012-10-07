<?php
class Subgroup extends Model {
	public $actsAs = array('Acl' => array('className' => 'AclAlias', 'type' => 'requester'));
	
	public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['Subgroup']['group_id'])) {
            $groupId = $this->data['Subgroup']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
	
	public function alias() {
    	return $this->field('name');
    }
	
	public $belongsTo = array(
		'Group'
	);
	
	public $hasMany = array(
		'UserProfile'
	);
	
	var $validate = array(
		'name' => array(
			
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a name for this Subgroup.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	
	function formatName($data){
		if(isset($this->data['Subgroup']['name'])){
			$this->data['Subgroup']['name'] = ucfirst(strtolower($this->data['Subgroup']['name']));
		}
		return true;
	}
}
