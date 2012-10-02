<div class='pageBackgroundAtlantis'>
	<div class="wrapperFull">
		<h3>Manage Groups and Subgroups</h3>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>Add a Group</h5>
		</div>
		<?php
			echo $this->Form->create('Group', array(
					'url' => array(
						'controller' => 'groups',
						'action' => 'add',
					),
					'inputDefaults' => array(
						'label' => false,
						'class' => 'inputTextAreaField',
						'div' => 'inputTextAreaBackground',
						'error' => ''
						)
					)
				);
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
				<div id="GroupIndexForm" class="submitButtonLargeGreen marginLeft10px">ADD GROUP</div>
			</div>
		</div>
		<?php echo $this->Form->end(''); ?>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<?php
			echo $this->Form->create('Subgroup', array(
					'url' => array(
						'controller' => 'subgroups',
						'action' => 'add',
					),
					'inputDefaults' => array(
						'label' => false,
						'class' => 'inputTextAreaField',
						'div' => 'inputTextAreaBackground',
						'error' => ''
						)
					)
				);
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
				<div id="SubgroupIndexForm" class="submitButtonLargeGreen marginLeft10px">ADD SUBGROUP</div>
			</div>
		</div>
		<?php echo $this->Form->end(''); ?>
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
							<ul><li><?php echo $userProfile['User']['username']; ?></li></ul>
						<?php endforeach; ?></ul>
					<?php endforeach; ?></ul>
				<br/>
			<?php endforeach; ?>
		</div>
	</div>
</div>