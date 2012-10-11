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
					$this->redirect(array('controller' => 'Groups', 'action' => 'edit/'.$this->Group->field('id')));
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
		if($this->request->data){
			$id = $this->request->data['Subgroup']['id'];
			$this->Group->id = $id;
			$this->Subgroup->id = $id;
			if($this->Subgroup->save($this->request->data)){
				$this->Logger->logStaff('Subgroups', 'Edit Subgroup :: ID ['.$this->request->data['Subgroup']['id'].'] Name ['.$this->request->data['Subgroup']['name'].']');
				//$this->redirect(array('controller' => 'Subgroups', 'action' => 'edit/'.$id));
			}
		}
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

	function _populatePermissions($aro){
		$fields = $this->Acl->Aco->find('all', array('conditions' => array('model' => 'ControllerNode')));
		//$this->set('debug1', $aro);
		$actions = array();
		foreach($aro[0]['Aco'] as $action){
			$actionInfo['name'] = $action['alias'];
			$actionInfo['id'] = $action['parent_id'];
			foreach($action['Permission'] as $permission){
				if($permission == 1){
					$actionInfo['allowed'] = 'true';
				}else{
					$actionInfo['allowed'] = 'false';
				}
			}
			array_push($actions, $actionInfo);
		}
		$this->set('debug1', $actions);
		foreach($fields as $field){
			$fieldName = $field['Aco']['alias'];
			$fieldId = $field['Aco']['id'];
			$this->set('debug2', $fieldId);
			foreach($actions as $action){
				if($action['id'] == $fieldId){
					if($action['allowed'] == 'true'){
						$this->request->data[$fieldName][$action['name']] = 1;
					}else{
						$this->request->data[$fieldName][$action['name']] = 0;
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
					$this->Acl->allow(array('model' => 'Subgroup', 'foreign_key' => $id), 'Controller/'.$field.'/'.$key );
				}else{
					$this->Acl->deny(array('model' => 'Subgroup', 'foreign_key' => $id), 'Controller/'.$field.'/'.$key );
				}
			}
		}
		$this->redirect(array('controller' => 'Subgroups', 'action' => 'edit/'.$id));
	}
}
