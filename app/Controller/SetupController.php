<?php
/********************************************************************************************
 * Setup file with actions used to generate baseline data for each new portal launch
 * Once you've completed using these actions it is recommended to move this Controller
 * to a safe/unaccessable via the web folder OR delete it.
 ********************************************************************************************/

class SetupController extends AppController{
	
	public $uses = array('Group', 'Subgroup', 'Action', 'Controller');
	
	function setupDefaultAROs(){
		//Use this action when first launching a portal to setup the default ARO structure.
		
		$AROGroups = array('Admin', 'Staff', 'Member');
		
		foreach($AROGroups as $group){
			$this->Group->create();
			$data['Group']['name'] = $group;
			$this->Group->save($data);
		}
		
		$AROSubgroups = array(
			array('id' => 1, 'name' => 'Network Administrator'),
			array('id' => 2, 'name' => 'Editor'),
			array('id' => 2, 'name' => 'Writer'),
			array('id' => 2, 'name' => 'Moderator'),
			array('id' => 3, 'name' => 'Premium Member'),
			array('id' => 3, 'name' => 'Community Member'),
		);
		
		foreach($AROSubgroups as $subgroup){
			$this->Subgroup->create();
			$data['Subgroup']['group_id'] = $subgroup['id'];
			$data['Subgroup']['name'] = $subgroup['name'];
			$this->Subgroup->save($data);
		}
		
		$this->redirect(array('controller' => 'groups', 'action' => 'index'));
	}
	
}


		
