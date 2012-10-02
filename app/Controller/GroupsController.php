<?php
class GroupsController extends AppController {
	
	public $uses = array('Group', 'Subgroup', 'UserProfile');
	
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
					$this->redirect(array('action' => 'index'));
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
				$name = $group['Group']['name'];
				$options[$groupId] = $name;
				if($groupId == $id){
					$this->request->data['Group']['name'] = $name;
					$this->set('id', $groupId);
				}
			}
			$this->set('options', $options);
		}
		if($this->request->is('post')){
			$this->Group->id = $this->request->data['Group']['id'];
			if($this->Group->save($this->request->data)){
				$this->Logger->logStaff('Groups', 'Edit Group :: ID ['.$this->request->data['Group']['id'].'] Name ['.$this->request->data['Group']['name'].']');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	function delete($id = null){
		$name = $this->Group->find('first', array('conditions' => array('Group.id' => $id)));
		$this->Group->delete($id);
		$this->Logger->logStaff('Groups', 'Delete Group :: ID ['.$id.'] Name ['.$name['Group']['name'].']');
		$this->redirect(array('action' => 'index'));
	}
	
}
