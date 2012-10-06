<?php
class Group extends AppModel {
	
    public $actsAs = array('Acl' => array('type' => 'requester'));

    public function parentNode() {
        return null;
    }
	
	public $hasMany = array(
		'Subgroup' => array('dependent' => true),
	);
	
	var $validate = array(
		'name' => array(
					
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a name for this Group.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	
	function formatName($data){
		if(isset($this->data['Group']['name'])){
			$this->data['Group']['name'] = ucfirst(strtolower($this->data['Group']['name']));
		}
		return true;
	}
}