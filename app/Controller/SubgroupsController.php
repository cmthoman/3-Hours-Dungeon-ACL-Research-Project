<?php
class SubgroupsController extends AppController{
	
	public $uses = array('Group', 'Subgroup', 'UserProfile');
	
	function beforeFilter(){
		parent::beforeFilter();
	}
	
	function add(){
		if($this->request->is('post')){
			if($this->request->data){
				if($this->Subgroup->save($this->request->data)){
					$this->Logger->logStaff('Subgroups', 'Add Subgroup :: Name['.$this->request->data['Subgroup']['name'].']');
					$this->redirect(array('controller' => 'groups', 'action' => 'index'));
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
			$this->request->data['Subgroup']['name'] = $subgroup['Subgroup']['name'];
			$this->request->data['Subgroup']['group_id'] = $subgroup['Subgroup']['group_id'];
			$this->set('options', $options);
			$this->set('id', $id);
		}
		if($this->request->is('post')){
			$this->Subgroup->id = $this->request->data['Subgroup']['id'];
			if($this->Subgroup->save($this->request->data)){
				$this->Logger->logStaff('Subgroups', 'Edit Subgroup :: ID ['.$this->request->data['Subgroup']['id'].'] Name ['.$this->request->data['Subgroup']['name'].']');
				$this->redirect(array('controller' => 'groups', 'action' => 'index'));
			}
		}
	}

	function delete($id = null){
		$name = $this->Subgroup->find('first', array('conditions' => array('Subgroup.id' => $id)));
		$this->Subgroup->delete($id);
		$this->Logger->logStaff('Subgroup', 'Delete Subgroup :: ID ['.$id.'] Name ['.$name['Subgroup']['name'].']');
		$this->redirect(array('controller' => 'groups', 'action' => 'index'));
	}
}
