<?php
class ActionNode extends Model {
	public $actsAs = array('Acl' => array('type' => 'controlled'));
	
	public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['ActionNode']['controller_node_id'])) {
            $controllerId = $this->data['ActionNode']['controller_node_id'];
        } else {
            $controllerId = $this->field('controller_node_id');
        }
        if (!$controllerId) {
            return null;
        } else {
            return array('ControllerNode' => array('id' => $controllerId));
        }
    }
		
	public $belongsTo = array(
		'ControllerNode'
	);
}