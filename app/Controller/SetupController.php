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
		$this->_setupDefaultControllerNodeACOs();
		$this->redirect(array('controller' => 'panel', 'action' => 'index'));
		
	}
	
	function _setupDefaultAROs(){
		//Use this action when first launching a portal to setup the default ARO structure.
		
		$groups = array('Admin', 'Staff', 'Member');
		
		foreach($groups as $group){
			$this->Group->create();
			$data['Group']['name'] = $group;
			$this->Group->save($data);
		}
		
		$subgroups = array(
			array('id' => 1, 'name' => 'Network Administrator'),
			array('id' => 2, 'name' => 'Editor'),
			array('id' => 2, 'name' => 'Writer'),
			array('id' => 2, 'name' => 'Moderator'),
			array('id' => 3, 'name' => 'Premium Member'),
			array('id' => 3, 'name' => 'Community Member'),
		);
		
		foreach($subgroups as $subgroup){
			$this->Subgroup->create();
			$data['Subgroup']['group_id'] = $subgroup['id'];
			$data['Subgroup']['name'] = $subgroup['name'];
			$this->Subgroup->save($data);
		}
	}
	
	function _setupDefaultRootACO(){
		$ACORootNode = array('alias' => 'Controller');
		$this->Acl->Aco->save($ACORootNode);
	}
	
	function _setupDefaultControllerNodeACOs(){
		$nodes = array(
					array('name' => 'Control Panel'), 
					array('name' => 'Controller Nodes'),
					array('name' => 'Action Nodes'),
					array('name' => 'Groups'),
					array('name' => 'Subgroups'),
					array('name' => 'User Profiles'),
					array('name' => 'Private Messages'),
					array('name' => 'Articles'),
					array('name' => 'Forum Categories'),
					array('name' => 'Forums'),
					array('name' => 'Forum Topics'),
					array('name' => 'Forum Posts'),
				);
				
		foreach($nodes as $node){
			$this->ControllerNode->create();
			$this->ControllerNode->save($node);
			$id = $this->ControllerNode->field('id');
			$nodeChildren = array(
				array('controller_node_id' => $id, 'name' => 'Create'),
				array('controller_node_id' => $id, 'name' => 'Read'),
				array('controller_node_id' => $id, 'name' => 'Update'),
				array('controller_node_id' => $id, 'name' => 'Delete'),
			);
			foreach($nodeChildren as $aco){
				$this->ActionNode->create();
				$this->ActionNode->save($aco);
			}
		}
	}
	
}


		
