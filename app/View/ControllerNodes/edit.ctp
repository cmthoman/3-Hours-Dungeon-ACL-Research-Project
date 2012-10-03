<?php
	$this->Html->addCrumb('Control Panel', '/panel', array('class' => 'fontColorDefault'));
	$this->Html->addCrumb('Controller & Action Node Manager', '/ControllerNodes', array('class' => 'fontColorDefault'));
	$this->Html->addCrumb('Edit Controller Node');
?>
<div class='pageBackgroundAtlantis'>
	<div class="wrapperFull">
		<h3>Edit Controller</h3>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>Edit Controller</h5>
		</div>
		<?php
			echo $this->Form->create('ControllerNode', array(
					'url' => array(
						'controller' => 'ControllerNodes',
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
				<div id="ControllerNodeEditForm" class="submitButtonLargeGreen marginLeft10px">EDIT CONTROLLER</div>
			</div>
		</div>
		<?php echo $this->Form->end(''); ?>
	</div>
	<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
		<div class="wrapperFull">
			<h5>Delete Controller</h5>
			<div class="wrapper600px marginTop10px fontColorRedOrange fontWeightBold">WARNING: DO NOT DELETE CONTROLLERS THAT ARE STILL IN USE ON THE PORTAL PERIOD...EVER...EVER... OR ELSE THIS CAN CAUSE SERIOUS PROBLEMS...ONLY USED FOR PORTAL SETUP AND DEVELOPMENT!!!</div>
		</div>
		<div class="wrapperFull">
			<div class="clearfix">
				<a href="/ControllerNodes/delete/<?php echo $id ?>"><div class="ButtonLargeRed fontColorDefault">DELETE CONTROLLER</div></a>
			</div>
		</div>
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