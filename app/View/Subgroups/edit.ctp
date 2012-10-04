<?php
	$this->Html->addCrumb('Control Panel', '/Panel', array('class' => 'fontColorDefault'));
	$this->Html->addCrumb('Groups & Subgroups Manager', '/Groups', array('class' => 'fontColorDefault'));
	$this->Html->addCrumb('Edit Subgroup');
?>
<div class='pageBackgroundAtlantis'>
	<div class="wrapperFull">
		<h3>Edit Subgroup</h3>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>Edit Subgroup</h5>
		</div>
		<?php
			echo $this->Form->create('Subgroup', array(
					'url' => array(
						'controller' => 'Subgroups',
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
					<div class="inputLabel marginLeft10px">Subgroup Name:</div>
					<?php echo $this->Form->input('name'); ?>
					<?php if($this->Form->error('name')): ?>
					<div class="inputError fontColorRedOrange fontWeightThick">
						<?php echo $this->Form->error('name'); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="inputTextArea">
					<div class="inputLabel marginLeft10px">Parent Group:</div>
					<?php echo $this->Form->input('group_id', array('type' => 'select', 'options' => $options, 'class' => 'inputSelectField', 'div' => 'inputSelectBackground')); ?>
					<?php if($this->Form->error('group_id')): ?>
					<div class="inputError fontColorRedOrange fontWeightThick">
						<?php echo $this->Form->error('group_id'); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="wrapperFull">
			<div class="clearfix">
				<div id="SubgroupEditForm" class="submitButtonLargeGreen marginLeft10px">EDIT SUBGROUP</div>
			</div>
		</div>
		<?php echo $this->Form->end(''); ?>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>Delete Subgroup</h5>
			<div class="wrapper600px fontSizeSmall marginTop10px fontColorRedOrange fontWeightBold">WARNING: DO NOT DELETE SUBGROUPS THAT STILL HAVE USERS OR ELSE THIS CAN CAUSE SERIOUS PROBLEMS</div>
		</div>
		<div class="wrapperFull">
			<div class="clearfix marginLeft10px">
				<a href="/subgroups/delete/<?php echo $id ?>"><div class="ButtonLargeRed fontColorDefault">DELETE SUBGROUP</div></a>
			</div>
		</div>
	</div>
	<div class="wrapperFull">
		<h3>Edit Permissions</h3>
	</div>
	<?php
		echo $this->Form->create('Permissions', array(
			'url' => array(
				'controller' => 'Subgroups',
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
			<?php
				foreach($controllerNode['ActionNode'] as $key => $value){
					echo $this->Form->input($value['name'].'.'.$controllerNode['ControllerNode']['id'], array(
						'type' => 'checkbox',
						'after' => '<div class="inputCheckboxLabel fontSizeSmall floatLeft">'.$value['name'].'</div>',
					));
				}
			?>
		</div>
	</div>
	<?php endforeach; ?>
	<div class="wrapperFull">
		<div class="clearfix">
			<div id="PermissionsEditForm" class="submitButtonLargeGreen marginLeft10px">EDIT GROUP PERMISSIONS</div>
		</div>
	</div>
	<?php echo $this->Form->end(''); ?>
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
							<ul><li><?php echo $userProfile['User']['username']; ?></li></ul>
						<?php endforeach; ?></ul>
					<?php endforeach; ?></ul>
				<br/>
			<?php endforeach; ?>
		</div>
	</div>
</div>
