<?php
class ControllerNodesController extends AppController {
	
	public $uses = array('ControllerNode', 'ActionNode');
	
	function beforeFilter(){
		parent::beforeFilter();
	}
		
	function index(){
		$this->ActionNode->unbindModel(array('belongsTo' => array('ControllerNode')));
		$this->set('controllers', $controllers = $this->ControllerNode->find('all', array('recursive' => 2)));
		$options = null;
		foreach($controllers as $controller){
			$id = $controller['ControllerNode']['id'];
			$name = $controller['ControllerNode']['name'];
			$options[$id] = $name;
		}
		$this->set('options', $options);
	}
	
	function add(){
		if($this->request->is('post')){
			if($this->request->data){
				if($this->ControllerNode->save($this->request->data)){
					$id = $this->ControllerNode->field('id');
					$ACOChildren = array(
						array('controller_node_id' => $id, 'name' => 'Create'),
						array('controller_node_id' => $id, 'name' => 'Read'),
						array('controller_node_id' => $id, 'name' => 'Update'),
						array('controller_node_id' => $id, 'name' => 'Delete'),
					);
					
					foreach($ACOChildren as $aco){
						$this->ActionNode->create();
						$this->ActionNode->save($aco);
					}
					
					$this->Logger->logStaff('Controllers', 'Add Controller Node :: Name['.$this->request->data['ControllerNode']['name'].']');
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
				$name = $controller['ControllerNode']['name'];
				$options[$controllerId] = $name;
				if($controllerId == $id){
					$this->request->data['ControllerNode']['name'] = $name;
					$this->set('id', $controllerId);
				}
			}
			$this->set('options', $options);
		}
		if($this->request->is('post')){
			$this->ControllerNode->id = $this->request->data['ControllerNode']['id'];
			if($this->ControllerNode->save($this->request->data)){
				$this->Logger->logStaff('Controllers', 'Edit Controller :: ID ['.$this->request->data['ControllerNode']['id'].'] Name ['.$this->request->data['ControllerNode']['name'].']');
				$this->redirect(array('controller' => 'ControllerNodes', 'action' => 'index'));
			}
		}
	}
	
	function delete($id = null){
		$name = $this->ControllerNode->find('first', array('conditions' => array('ControllerNode.id' => $id)));
		$this->ControllerNode->delete($id);
		$this->Logger->logStaff('Controllers', 'Delete Controller :: ID ['.$id.'] Name ['.$name['ControllerNode']['name'].']');
		$this->redirect(array('controller' => 'ControllerNodes', 'action' => 'index'));
	}
	
}