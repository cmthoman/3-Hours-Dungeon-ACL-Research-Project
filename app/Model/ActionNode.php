<?php
class ActionNode extends Model {
	
	public $actsAs = array('Acl' => array('className' => 'AclAlias', 'type' => 'controlled'));

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['ActionNode']['controller_node_id'])) {
            $groupId = $this->data['ActionNode']['controller_node_id'];
        } else {
            $groupId = $this->field('controller_node_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('ControllerNode' => array('id' => $groupId));
        }
    }
	
	public function alias() {
    	return $this->field('name');
    }
			
	public $belongsTo = array(
		'ControllerNode'
	);
	
	var $validate = array(
		'name' => array(

			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a name for this action node.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	
	function formatName($data){
		if(isset($this->data['ActionNode']['name'])){
			$this->data['ActionNode']['name'] = ucfirst(strtolower($this->data['ActionNode']['name']));
		}
		return true;
	}
}