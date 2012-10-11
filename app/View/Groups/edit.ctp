<?php
	$this->Html->addCrumb('Control Panel', '/Panel', array('class' => 'fontColorDefault'));
	$this->Html->addCrumb('Groups & Subgroups Manager', '/Groups', array('class' => 'fontColorDefault'));
	$this->Html->addCrumb('Edit Group');
?>
<div class='pageBackgroundAtlantis'>
	<div class="wrapperFull">
		<h3>Edit Group</h3>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>Edit Group</h5>
		</div>
		<?php
			echo $this->Form->create('Group', array(
				'url' => array(
					'controller' => 'Groups',
					'action' => 'edit',
				),
				'inputDefaults' => array(
					'label' => false,
					'class' => 'inputTextAreaField',
					'div' => 'inputTextAreaBackground',
					'error' => ''
					)
				)
			);
			echo $this->Form->input('id', array('type' => 'hidden', 'value' => $id));
		?>
		<div class="wrapperFull">
			<div class="clearfix">
				<div class="inputTextArea">
					<div class="inputLabel marginLeft10px">Group Name:</div>
					<?php echo $this->Form->input('name'); ?>
					<?php if($this->Form->error('name')): ?>
					<div class="inputError fontColorRedOrange fontWeightThick">
						<?php echo $this->Form->error('name'); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="wrapperFull">
			<div class="clearfix">
				<div id="GroupEditForm" class="submitButtonLargeGreen marginLeft10px">EDIT GROUP</div>
			</div>
		</div>
		<?php echo $this->Form->end(''); ?>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>Delete Group</h5>
			<div class="wrapper600px fontSizeSmall marginTop10px fontColorRedOrange fontWeightBold">WARNING: DO NOT DELETE GROUPS THAT STILL HAVE USERS OR ELSE THIS CAN CAUSE SERIOUS PROBLEMS</div>
		</div>
		<div class="wrapperFull">
			<div class="clearfix">
				<a href="/groups/delete/<?php echo $id ?>"><div class="ButtonLargeRed fontColorDefault">DELETE GROUP</div></a>
			</div>
		</div>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>ARO Tree</h5>
		</div>
		<div class="wrapperFull">
			<?php foreach($groups as $group): ?>
				<ul><li><?php echo $this->Html->link($group['Group']['name'], array('controller' => 'Groups', 'action' => 'edit/'.$group['Group']['id'])); ?></li>
					<?php foreach($group['Subgroup'] as $subgroup): ?>
					<ul><li><?php echo $this->Html->link($subgroup['name'], array('controller' => 'Subgroups', 'action' => 'edit/'.$subgroup['id'])); ?></li>
						<?php foreach($subgroup['UserProfile'] as $userProfile): ?>
							<ul><li><?php echo $userProfile['User']['username']; ?></li>
						<?php endforeach; ?>
						</ul>
					<?php endforeach; ?>
				</ul></ul>
				<br/>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="wrapperFull">
		<h3>Edit Permissions</h3>
	</div>
	<?php
		echo $this->Form->create('Permissions', array(
			'url' => array(
				'controller' => 'Groups',
				'action' => 'permissions',
			),
			'inputDefaults' => array(
				'label' => false,
				'class' => 'inputCheckboxField',
				'div' => 'inputCheckboxBackground',
				'error' => ''
				)
			)
		);
		echo $this->Form->input('id', array('type' => 'hidden', 'value' => $id));
	?>
	<?php foreach($controllerNodes as $controllerNode): ?>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="inputLabel fontSizeDefault fontWeightBold"><?php echo $controllerNode['ControllerNode']['name']; ?></div>
		<div class="clearfix">
			<fieldset>
			<?php
				echo $this->Form->input('selectall', array(
					'type' => 'checkbox',
					'class' => 'inputCheckboxField checkall',
					'after' => '<div class="inputCheckboxLabel fontSizeSmall floatLeft">Select All</div><br/><br/>',
				));
				foreach($controllerNode['ActionNode'] as $node){
					echo $this->Form->input($controllerNode['ControllerNode']['name'].'.'.strtolower($node['name']), array(
						'type' => 'checkbox',
						'after' => '<div class="inputCheckboxLabel fontSizeSmall floatLeft">'.$node['name'].'</div>',
					));
				}
			?>
			</fieldset>
		</div>
	</div>
	<?php endforeach; ?>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="clearfix">
			<div id="PermissionsEditForm" class="submitButtonLargeGreen">EDIT GROUP PERMISSIONS</div>
		</div>
	</div>
	<?php echo $this->Form->end(''); ?>
</div>
