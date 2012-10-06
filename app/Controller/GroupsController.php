<?php
class GroupsController extends AppController {
	
	public $uses = array('Group', 'Subgroup', 'UserProfile', 'ControllerNode', 'ActionNode');
	
	function beforeFilter(){
		parent::beforeFilter();
	}
		
	function index(){
		$this->Subgroup->unbindModel(array('belongsTo' => array('Group')));
		$this->UserProfile->unbindModel(array('belongsTo' => array('Subgroup')));
		$this->set('groups', $groups = $this->Group->find('all', array('recursive' => 3)));
		$options = null;
		foreach($groups as $group){
			$id = $group['Group']['id'];
			$name = $group['Group']['name'];
			$options[$id] = $name;
		}
		$this->set('options', $options);
	}
	
	function add(){
		if($this->request->is('post')){
			if($this->request->data){
				if($this->Group->save($this->request->data)){
					$this->Logger->logStaff('Groups', 'Add Group :: Name['.$this->request->data['Group']['name'].']');
					$this->redirect(array('controller' => 'Groups', 'action' => 'edit/'.$this->Group->field('id')));
				}
			}
		}
	}
	
	function delete($id = null){
		$name = $this->Group->find('first', array('conditions' => array('Group.id' => $id)));
		$this->Group->delete($id, true);
		$this->Logger->logStaff('Groups', 'Delete Group :: ID ['.$id.'] Name ['.$name['Group']['name'].']');
		$this->redirect(array('controller' => 'Groups', 'action' => 'index'));
	}
	
	function edit($id = null){
		if($this->request->data){
			$id = $this->request->data['Group']['id'];
			$this->Group->id = $id;
			if($this->Group->save($this->request->data)){
				$this->Logger->logStaff('Subgroups', 'Edit Group :: ID ['.$this->request->data['Group']['id'].'] Name ['.$this->request->data['Group']['name'].']');
				//$this->redirect(array('controller' => 'Groups', 'action' => array('edit', $id)));
			}
		}
		$this->UserProfile->unbindModel(array('belongsTo' => array('Subgroup')));
		$this->set('groups', $groups = $this->Group->find('all', array('recursive' => 3)));
		foreach($groups as $group){
			$groupId = $group['Group']['id'];
			$groupName = $group['Group']['name'];
			$options[$groupId] = $groupName;
			if($groupId == $id){
				$this->request->data['Group']['name'] = $groupName;
				$this->request->data['Group']['id'] = $groupId;
				$this->set('id', $id);
			}
		}
		$controllerNodes = $this->ControllerNode->find('all');
		$aro = $this->Acl->Aro->find('all', array('conditions' => array('model' => 'Group', 'foreign_key' => $id)));
		$this->_populatePermissions($aro);
		$this->set('controllerNodes', $controllerNodes);
	}

	function _populatePermissions($aro){
		foreach($aro[0]['Aco'] as $controller){
			foreach($controller['Permission'] as $permission => $value){
				if($permission != "id" && $permission != "aco_id" && $permission != "aro_id"){
					$field = strtolower(str_replace('_', '', $permission));
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
			if($fieldName != 'Permissions' && $fieldName != 'Check'){
				array_push($fields, $fieldName);
			}
		}
		foreach($fields as $field){
			foreach($this->request->data[$field] as $key => $value){
				if($value == 1){
					$this->Acl->allow(array('model' => 'Group', 'foreign_key' => $id), array('model' => 'ControllerNode', 'foreign_key' => $key), strtolower($field));
				}else{
					$this->Acl->deny(array('model' => 'Group', 'foreign_key' => $id), array('model' => 'ControllerNode', 'foreign_key' => $key), strtolower($field));
				}
			}
		}
		$this->redirect(array('controller' => 'Groups', 'action' => 'edit/'.$id));
	}
}
