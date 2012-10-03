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
					$this->Logger->logStaff('Action', 'Add Action :: Name['.$this->request->data['ActionNode']['name'].']');
					$this->redirect(array('controller' => 'ControllerNodes', 'action' => 'index'));
				}
			}
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
			$this->ActionNode->id = $this->request->data['ActionNode']['id'];
			if($this->ActionNode->save($this->request->data)){
				$this->Logger->logStaff('Actions', 'Edit Action :: ID ['.$this->request->data['ActionNode']['id'].'] Name ['.$this->request->data['ActionNode']['name'].']');
				$this->redirect(array('controller' => 'ControllerNodes', 'action' => 'index'));
			}
		}
	}

	function delete($id = null){
		$name = $this->ActionNode->find('first', array('conditions' => array('ActionNode.id' => $id)));
		$this->ActionNode->delete($id);
		$this->Logger->logStaff('Actions', 'Delete Action :: ID ['.$id.'] Name ['.$name['ActionNode']['name'].']');
		$this->redirect(array('controller' => 'ControllerNodes', 'action' => 'index'));
	}
}
