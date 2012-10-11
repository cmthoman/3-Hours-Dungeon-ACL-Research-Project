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
					$this->Acl->allow(array('model' => 'Group', 'foreign_key' => $id), 'Controller/'.$field.'/'.$key );
				}else
				if($value == 0){
					$this->Acl->deny(array('model' => 'Group', 'foreign_key' => $id), 'Controller/'.$field.'/'.$key );
				}
			}
		}
		$this->redirect(array('controller' => 'Groups', 'action' => 'edit/'.$id));
	}
}
