<?php
class ControllerNode extends AppModel {
	
    public $actsAs = array('Acl' => array('type' => 'controlled'));

    public function parentNode() {
        return 'Controller';
    }
	
	public $hasMany = array(
		'ActionNode',
	);
}