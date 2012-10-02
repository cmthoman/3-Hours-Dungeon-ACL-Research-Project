<?php
class Subgroup extends Model {
	public $actsAs = array('Acl' => array('type' => 'requester'));
	
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
		
	public $belongsTo = array(
		'Group'
	);
	
	public $hasMany = array(
		'UserProfile'
	);
}
