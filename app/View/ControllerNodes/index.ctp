<?php
	$this->Html->addCrumb('Control Panel', '/panel', array('class' => 'fontColorDefault'));
	$this->Html->addCrumb('Controller & Action Node Manager');
?>
<div class='pageBackgroundAtlantis'>
	<div class="wrapperFull">
		<h3>Manage Controller and Action Nodes</h3>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>Add a Controller Node</h5>
			<div class="wrapper600px fontSizeSmall marginTop10px">Controller Nodes come with CRUD Action Nodes pre-defined.</div>
		</div>
		<?php
			echo $this->Form->create('ControllerNode', array(
					'url' => array(
						'controller' => 'ControllerNodes',
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
					<div class="inputLabel marginLeft10px">Controller Name:</div>
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
				<div id="ControllerNodeIndexForm" class="submitButtonLargeGreen marginLeft10px">ADD CONTROLLER NODE</div>
			</div>
		</div>
		<?php echo $this->Form->end(''); ?>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>Add an Action Node</h5>
			<div class="wrapper600px fontSizeSmall marginTop10px">Used to create custom action access on a per controller basis. The aros_acos table must be modified manually to accept newly designed actions.</div>
		</div>
		<?php
			echo $this->Form->create('ActionNode', array(
					'url' => array(
						'controller' => 'ActionNodes',
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
					<div class="inputLabel marginLeft10px">Action Name:</div>
					<?php echo $this->Form->input('name'); ?>
					<?php if($this->Form->error('name')): ?>
					<div class="inputError fontColorRedOrange fontWeightThick">
						<?php echo $this->Form->error('name'); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="inputTextArea">
					<div class="inputLabel marginLeft10px">Parent Controller:</div>
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
				<div id="ActionNodeIndexForm" class="submitButtonLargeGreen marginLeft10px">ADD ACTION NODE</div>
			</div>
		</div>
		<?php echo $this->Form->end(''); ?>
	</div>
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