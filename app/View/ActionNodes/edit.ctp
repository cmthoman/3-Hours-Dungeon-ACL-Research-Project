<?php
	$this->Html->addCrumb('Control Panel', '/Panel', array('class' => 'fontColorDefault'));
	$this->Html->addCrumb('Controller & Action Node Manager', '/ControllerNodes', array('class' => 'fontColorDefault'));
	$this->Html->addCrumb('Edit Action Node');
?>
<div class='pageBackgroundAtlantis'>
	<div class="wrapperFull">
		<h3>Edit Action</h3>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>Edit Action</h5>
		</div>
		<?php
			echo $this->Form->create('ActionNode', array(
					'url' => array(
						'controller' => 'ActionNodes',
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
					<?php echo $this->Form->input('controller_node_id', array('type' => 'select', 'options' => $options, 'class' => 'inputSelectField', 'div' => 'inputSelectBackground')); ?>
					<?php if($this->Form->error('controller_node_id')): ?>
					<div class="inputError fontColorRedOrange fontWeightThick">
						<?php echo $this->Form->error('controller_node_id'); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="wrapperFull">
			<div class="clearfix">
				<div id="ActionNodeEditForm" class="submitButtonLargeGreen marginLeft10px">EDIT ACTION</div>
			</div>
		</div>
		<?php echo $this->Form->end(''); ?>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>Delete Action</h5>
			<div class="wrapper600px marginTop10px fontColorRedOrange fontWeightBold">WARNING: DO NOT DELETE ACTIONS THAT ARE STILL IN USE ON THE PORTAL PERIOD...EVER...EVER... OR ELSE THIS CAN CAUSE SERIOUS PROBLEMS...ONLY USED FOR PORTAL SETUP AND DEVELOPMENT!!!</div>
		</div>
		<?php
			echo $this->Form->create('DeleteActionNode', array(
					'url' => array(
						'controller' => 'ActionNodes',
						'action' => 'delete',
					),
					'inputDefaults' => array(
						'label' => false,
						'class' => 'inputCheckBox',
						'div' => 'inputCheckBoxBackground',
						'error' => ''
						)
					)
				);
				echo $this->Form->input('id', array('type' => 'hidden', 'value' => $id));
		?>
		<div class="wrapperFull">
			<div class="clearfix">
				<div class="marginBottom10px">
					<?php
						echo $this->Form->input('drop', array(
						'type' => 'checkbox',
						'class' => 'inputCheckboxField',
						'after' => '<div class="inputCheckboxLabel fontSizeSmall floatLeft">Delete From ACOS_AROS Table</div><br/><br/>',
						));
					?>
				</div>
				<div id="DeleteActionNodeEditForm" class="submitButtonLargeRed fontColorDefault">DELETE ACTION</div>
			</div>
		</div>
	</div>
	<?php echo $this->Form->end(''); ?>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>ACO Tree</h5>
		</div>
		<div class="wrapperFull">
			<?php foreach($controllers as $controller): ?>
				<ul><li><?php echo $this->Html->link($controller['ControllerNode']['name'], array('controller' => 'ControllerNodes', 'action' => 'edit/'.$controller['ControllerNode']['id'])); ?></li>
					<?php foreach($controller['ActionNode'] as $action): ?>
					<ul><li><?php echo $this->Html->link($action['name'], array('controller' => 'ActionNodes', 'action' => 'edit/'.$action['id'])); ?></li></ul>
					<?php endforeach; ?>
				</ul>
				<br/>
			<?php endforeach; ?>
		</div>
	</div>
</div>