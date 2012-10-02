<?php if($action != 'register'): ?>
<div id="embeddedLogin">
	<?php 
		echo $this->Form->create('User' , array(
				'action' => 'login',
				'inputDefaults' => array(
					'label' => false,
					'class' => 'inputTextAreaField',
					'div' => 'inputBackground',
					'error' => ''
				)
			)
		);
	?>
	<div class="title marginBottom10px marginTop10px"><?php echo $this->Html->image('/img/site-resources/3hd-banner-small.png') ?></div>
	<div class="inputTextArea marginTop10px">
		<div class="inputLabel fontColor3HDGreen">User Name</div>
		<?php 
			echo $this->Form->input('username', array(
				)
			); 
		?>
		<?php if($this->Form->error('username')): ?>
		<div class="inputError clearfix fontColorRedOrange fontWeightThick">
			<?php echo $this->Form->error('username'); ?>
		</div>
		<?php endif; ?>
	</div>
	<div class="inputTextArea">
		<div class="inputLabel fontColor3HDGreen">Password</div>
		<?php 
			echo $this->Form->input('password', array(
				)
			); 
		?>
		<?php if($this->Form->error('password')): ?>
		<div class="inputError clearfix fontColorRedOrange fontWeightThick">
			<?php echo $this->Form->error('password'); ?>
		</div>
		<?php endif; ?>
	</div>
	<div class="inputTextArea">
		<div class="clearfix" style="margin-top: 10px;">
			<div id="UserLoginForm" class="submitButtonLargeGreen">LOG IN</div>
		</div>
	</div>
	<?php echo $this->Form->end(''); ?>
</div>
<?php endif; ?>