<?php
/********************************************************************************************
 * Setup file with actions used to generate baseline data for each new portal launch
 * Once you've completed using these actions it is recommended to move this Controller
 * to a safe/unaccessable folder OR delete it.
 ********************************************************************************************/

class SetupController extends AppController{
	
	public $uses = array('Group', 'Subgroup', 'ActionNode', 'ControllerNode');
	
	function beforeFilter(){
		parent::beforeFilter();
		
	}
	
	function run(){
		$this->_setupDefaultAROs();
		$this->_setupDefaultRootACO();
		$this->_setupDefaultControlPanelNodeACOs();
		$this->_setupDefaultPermission();
		$this->redirect(array('controller' => 'panel', 'action' => 'index'));
		
	}
	
	function _setupDefaultRootACO(){
		$ACORootNode = array('alias' => 'Controller');
		$this->Acl->Aco->save($ACORootNode);
	}
	
	function _setupDefaultControlPanelNodeACOs(){
		$nodes = array(
					array('name' => 'Panel'), 
					array('name' => 'ControllerNodes'),
					array('name' => 'ActionNodes'),
					array('name' => 'Groups'),
					array('name' => 'Subgroups'),
				);
				
		foreach($nodes as $node){
			$this->ControllerNode->create();
			$this->ControllerNode->save($node);
			$id = $this->ControllerNode->field('id');
			$nodeChildren = array(
				array('controller_node_id' => $id, 'name' => 'index'),
				array('controller_node_id' => $id, 'name' => 'add'),
				array('controller_node_id' => $id, 'name' => 'edit'),
				array('controller_node_id' => $id, 'name' => 'delete'),
			);
			foreach($nodeChildren as $aco){
				$this->ActionNode->create();
				$this->ActionNode->save($aco);
			}
		}
	}

	function _setupDefaultAROs(){
		//Use this action when first launching a portal to setup the default ARO structure.
		
		$groups = array('Admin', 'Staff', 'Member');
		
		foreach($groups as $group){
			$this->Group->create();
			$data['Group']['name'] = $group;
			$this->Group->save($data);
			//$this->Acl->Deny(array('model' => 'Group', 'foreign_key' => $this->Group->field('id')), 'Controller');
		}
		
		$subgroups = array(
			array('id' => 1, 'name' => 'NetworkAdministrator'),
			array('id' => 2, 'name' => 'Editor'),
			array('id' => 2, 'name' => 'Writer'),
			array('id' => 2, 'name' => 'Moderator'),
			array('id' => 3, 'name' => 'PremiumMember'),
			array('id' => 3, 'name' => 'CommunityMember'),
		);
		
		foreach($subgroups as $subgroup){
			$this->Subgroup->create();
			$data['Subgroup']['group_id'] = $subgroup['id'];
			$data['Subgroup']['name'] = $subgroup['name'];
			$this->Subgroup->save($data);
		}
	}

	function _setupDefaultPermission(){
		$this->Acl->Allow(array('model' => 'Group', 'foreign_key' => 1), 'Controller');
		$this->Acl->Deny(array('model' => 'Group', 'foreign_key' => 2), 'Controller');
		$this->Acl->Deny(array('model' => 'Group', 'foreign_key' => 3), 'Controller');
	}
	
}


		
