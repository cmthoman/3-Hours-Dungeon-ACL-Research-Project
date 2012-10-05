<?php
class SubgroupsController extends AppController{
	
	public $uses = array('Group', 'Subgroup', 'UserProfile', 'ControllerNode', 'ActionNode');
	
	function beforeFilter(){
		parent::beforeFilter();
		//$this->Security->unlockedActions = array('permissions');
	}
	
	function add(){
		if($this->request->is('post')){
			if($this->request->data){
				if($this->Subgroup->save($this->request->data)){
					$this->Logger->logStaff('Subgroups', 'Add Subgroup :: Name['.$this->request->data['Subgroup']['name'].']');
					$this->redirect(array('controller' => 'Groups', 'action' => 'index'));
				}
			}
		}
	}
	
	function delete($id = null){
		$name = $this->Subgroup->find('first', array('conditions' => array('Subgroup.id' => $id)));
		$this->Subgroup->delete($id);
		$this->Logger->logStaff('Subgroup', 'Delete Subgroup :: ID ['.$id.'] Name ['.$name['Subgroup']['name'].']');
		$this->redirect(array('controller' => 'Groups', 'action' => 'index'));
	}
	
	function edit($id = null){
		if($this->request->is('get')){
			$this->Subgroup->unbindModel(array('belongsTo' => array('Group')));
			$this->UserProfile->unbindModel(array('belongsTo' => array('Subgroup')));
			$this->set('groups', $groups = $this->Group->find('all', array('recursive' => 3)));
			foreach($groups as $group){
				$groupId = $group['Group']['id'];
				$groupName = $group['Group']['name'];
				$options[$groupId] = $groupName;
				$this->set('groupId', $groupId);
			}
			$subgroup = $this->Subgroup->find('first', array('conditions' => array('Subgroup.id' => $id), 'recursive' => -1));
			$controllerNodes = $this->ControllerNode->find('all');
			$aro = $this->Acl->Aro->find('all', array('conditions' => array('model' => 'Subgroup', 'foreign_key' => $id)));
			$this->_populatePermissions($aro);
			$this->request->data['Subgroup']['name'] = $subgroup['Subgroup']['name'];
			$this->request->data['Subgroup']['group_id'] = $subgroup['Subgroup']['group_id'];
			$this->set('id', $id);
			$this->set('options', $options);
			$this->set('controllerNodes', $controllerNodes);
		}
		if($this->request->is('post')){
			$this->Subgroup->id = $this->request->data['Subgroup']['id'];
			if($this->Subgroup->save($this->request->data)){
				$this->Logger->logStaff('Subgroups', 'Edit Subgroup :: ID ['.$this->request->data['Subgroup']['id'].'] Name ['.$this->request->data['Subgroup']['name'].']');
				$this->redirect(array('controller' => 'Groups', 'action' => 'index'));
			}
		}
	}

	function _populatePermissions($aro){
		foreach($aro[0]['Aco'] as $controller){
			foreach($controller['Permission'] as $permission => $value){
				if($permission != "id" && $permission != "aco_id" && $permission != "aro_id"){
					$field = ucfirst(str_replace('_', '', $permission));
					if($value == 1){
						$this->request->data[$field][$controller['foreign_key']] = 1;
					}else{
						$this->request->data[$field][$controller['foreign_key']] = 0;
					}
				}
			}
		}
	}
		
	function permissions(){
		$id = $this->request->data['Permissions']['id'];
		$fields = array();
		foreach($this->request->data as $fieldName => $val){
			if($fieldName != 'Permissions'){
				array_push($fields, $fieldName);
			}
		}
		foreach($fields as $field){
			foreach($this->request->data[$field] as $key => $value){
				if($value == 1){
					$this->Acl->allow(array('model' => 'Subgroup', 'foreign_key' => $id), array('model' => 'ControllerNode', 'foreign_key' => $key), strtolower($field));
				}else{
					$this->Acl->deny(array('model' => 'Subgroup', 'foreign_key' => $id), array('model' => 'ControllerNode', 'foreign_key' => $key), strtolower($field));
				}
			}
		}
		$this->redirect(array('controller' => 'Subgroups', 'action' => 'edit/'.$id));
	}
}
