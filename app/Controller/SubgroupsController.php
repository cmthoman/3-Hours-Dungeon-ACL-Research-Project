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
			foreach($aro[0]['Aco'] as $controller){
				foreach($controller as $permission){
					if($permission['_create'] == 1){
						$this->request->data['Create'][$controller['foreign_key']] = 1;
					}else{
						$this->request->data['Create'][$controller['foreign_key']] = 0;
					}
					if($permission['_read'] == 1){
						$this->request->data['Read'][$controller['foreign_key']] = 1;
					}else{
						$this->request->data['Read'][$controller['foreign_key']] = 0;
					}
					if($permission['_update'] == 1){
						$this->request->data['Update'][$controller['foreign_key']] = 1;
					}else{
						$this->request->data['Update'][$controller['foreign_key']] = 0;
					}
					if($permission['_delete'] == 1){
						$this->request->data['Delete'][$controller['foreign_key']] = 1;
					}else{
						$this->request->data['Delete'][$controller['foreign_key']] = 0;
					}
				}
			}
			$this->set('debug', $aro);	
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

	function delete($id = null){
		$name = $this->Subgroup->find('first', array('conditions' => array('Subgroup.id' => $id)));
		$this->Subgroup->delete($id);
		$this->Logger->logStaff('Subgroup', 'Delete Subgroup :: ID ['.$id.'] Name ['.$name['Subgroup']['name'].']');
		$this->redirect(array('controller' => 'Groups', 'action' => 'index'));
	}
	
		
	function permissions(){
		$id = $this->request->data['Permissions']['id'];
		if($this->request->is('post')){
				foreach($this->request->data['Create'] as $key => $value){
					if($value == 1){
						$this->Acl->allow(array('model' => 'Subgroup', 'foreign_key' => $id), array('model' => 'ControllerNode', 'foreign_key' => $key), 'create');
					}else{
						$this->Acl->deny(array('model' => 'Subgroup', 'foreign_key' => $id), array('model' => 'ControllerNode', 'foreign_key' => $key), 'create');
					}
				}
				foreach($this->request->data['Read'] as $key => $value){
					if($value == 1){
						$this->Acl->allow(array('model' => 'Subgroup', 'foreign_key' => $id), array('model' => 'ControllerNode', 'foreign_key' => $key), 'read');
					}else{
						$this->Acl->deny(array('model' => 'Subgroup', 'foreign_key' => $id), array('model' => 'ControllerNode', 'foreign_key' => $key), 'read');
					}
				}
				foreach($this->request->data['Update'] as $key => $value){
					if($value == 1){
						$this->Acl->allow(array('model' => 'Subgroup', 'foreign_key' => $id), array('model' => 'ControllerNode', 'foreign_key' => $key), 'update');
					}else{
						$this->Acl->deny(array('model' => 'Subgroup', 'foreign_key' => $id), array('model' => 'ControllerNode', 'foreign_key' => $key), 'update');
					}
				}
				foreach($this->request->data['Delete'] as $key => $value){
					if($value == 1){
						$this->Acl->allow(array('model' => 'Subgroup', 'foreign_key' => $id), array('model' => 'ControllerNode', 'foreign_key' => $key), 'delete');
					}else{
						$this->Acl->deny(array('model' => 'Subgroup', 'foreign_key' => $id), array('model' => 'ControllerNode', 'foreign_key' => $key), 'delete');
					}
				}
		}
		$this->redirect(array('controller' => 'Subgroups', 'action' => 'edit/'.$id));
	}

	function _populatePermissions(){
		
	}
}
