<?php
class ControllerNode extends AppModel {
	
    public $actsAs = array('Acl' => array('type' => 'controlled'));

    public function parentNode() {
        return 'Controller';
    }
	
	public $hasMany = array(
		'ActionNode' => array('dependent' => true),
	);
	
	function formatName($data){
		if(isset($this->data['ControllerNode']['name'])){
			$this->data['ControllerNode']['name'] = ucfirst(strtolower($this->data['ControllerNode']['name']));
		}
		return true;
	}
	
	var $validate = array(
		'name' => array(
		
			'formatName' => array(
				'rule' => 'formatName'
			),
			
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a name for this controller node.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
}