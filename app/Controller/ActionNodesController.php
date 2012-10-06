<?php
class ActionNodesController extends AppController{
	
	public $uses = array('ControllerNode', 'ActionNode');
	
	function beforeFilter(){
		parent::beforeFilter();
	}
	
	function add(){
		if($this->request->is('post')){
			if($this->request->data){
				if($this->ActionNode->save($this->request->data)){
					$name = "_".strtolower($this->request->data['ActionNode']['name']);
					$fields = $this->ActionNode->query("SHOW COLUMNS FROM `aros_acos` LIKE '".$name."'");
					if(empty($fields)){
						$this->ActionNode->query("ALTER TABLE  `aros_acos` ADD  `".$name."` VARCHAR( 2 ) NOT NULL DEFAULT  '0'");
					}
					$this->Logger->logStaff('Action', 'Add Action :: Name['.$this->request->data['ActionNode']['name'].']');
					$this->redirect(array('controller' => 'ControllerNodes', 'action' => 'index'));
				}
			}
			$this->redirect(array('controller' => 'ControllerNodes', 'action' => 'index'));
		}
	}
	
	function edit($id = null){
		if($this->request->is('get')){
			$this->ActionNode->unbindModel(array('belongsTo' => array('ControllerNode')));
			$this->set('controllers', $controllers = $this->ControllerNode->find('all', array('recursive' => 2)));
			foreach($controllers as $controller){
				$controllerId = $controller['ControllerNode']['id'];
				$controllerName = $controller['ControllerNode']['name'];
				$options[$controllerId] = $controllerName;
				$this->set('controllerId', $controllerId);
			}
			$action = $this->ActionNode->find('first', array('conditions' => array('ActionNode.id' => $id), 'recursive' => -1));
			$this->request->data['ActionNode']['name'] = $action['ActionNode']['name'];
			$this->request->data['ActionNode']['controller_node_id'] = $action['ActionNode']['controller_node_id'];
			$this->set('options', $options);
			$this->set('id', $id);
		}
		if($this->request->is('post')){
			$id = $this->ActionNode->id = $this->request->data['ActionNode']['id'];
			$action = $this->ActionNode->find('first', array('conditions' => array('ActionNode.id' => $id), 'recursive' => -1));
			if($this->ActionNode->save($this->request->data)){
				$old = "_".strtolower($action['ActionNode']['name']);
				$new = "_".strtolower($this->request->data['ActionNode']['name']);
				$this->ActionNode->query("ALTER TABLE  `aros_acos` CHANGE  `".$old."`  `".$new."` VARCHAR( 2 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  '0'");
				$this->Logger->logStaff('Actions', 'Edit Action :: ID ['.$this->request->data['ActionNode']['id'].'] Name ['.$this->request->data['ActionNode']['name'].']');
				$this->redirect(array('controller' => 'ControllerNodes', 'action' => 'index'));
			}
		}
	}

	function delete(){
		$id = $this->request->data['DeleteActionNode']['id'];
		$action = $this->ActionNode->find('first', array('conditions' => array('ActionNode.id' => $id)));
		$name = "_".strtolower($action['ActionNode']['name']);
		if($this->request->data['DeleteActionNode']['drop'] == 1){
			$this->ActionNode->query("ALTER TABLE  `aros_acos` DROP  `".$name."`");
		}
		$this->ActionNode->delete($id);
		$this->Logger->logStaff('Actions', 'Delete Action :: ID ['.$id.'] Name ['.$action['ActionNode']['name'].']');
		$this->redirect(array('controller' => 'ControllerNodes', 'action' => 'index'));
	}
}
