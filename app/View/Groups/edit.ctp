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
						'controller' => 'groups',
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
			<div class="fontSizeSmall marginTop10px fontColorRedOrange fontWeightBold">WARNING: DO NOT DELETE GROUPS THAT STILL HAVE USERS OR ELSE THIS CAN CAUSE SERIOUS PROBLEMS</div>
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
				<ul><li><?php echo $this->Html->link($group['Group']['name'], array('controller' => 'groups', 'action' => 'edit/'.$group['Group']['id'])); ?></li>
					<?php foreach($group['Subgroup'] as $subgroup): ?>
					<ul><li><?php echo $this->Html->link($subgroup['name'], array('controller' => 'subgroups', 'action' => 'edit/'.$subgroup['id'])); ?></li>
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
</div>