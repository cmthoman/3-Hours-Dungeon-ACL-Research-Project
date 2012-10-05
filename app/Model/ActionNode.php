<?php
class ActionNode extends Model {
			
	public $belongsTo = array(
		'ControllerNode'
	);
	
	var $validate = array(
		'name' => array(
		
			'formatName' => array(
				'rule' => 'formatName'
			),
			
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