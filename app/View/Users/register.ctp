<div class="pageBackgroundAtlantis">
<?php 
	echo $this->Form->create('User', array(
			'inputDefaults' => array(
				'label' => false,
				'class' => 'inputTextAreaField',
				'div' => 'inputBackground',
				'error' => ''
			)
		)
	);
?>
	<div class="wrapper600px alignCentered clearfix">
		<div class="clearfix" style="margin-left: 27px; margin-bottom: 60px;">
			<h3>Create Your Account</h3>
		</div>
	</div>
	<div class="wrapper600px alignCentered clearfix">
		<div class="clearfix">
			<div class="inputColumnLeft">
				<div class="inputLabel fontSizeLarge">User Name:</div>
			</div>
			<div class="inputTextArea">
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
		</div>
	</div>
	<div class="wrapper600px alignCentered clearfix">
		<div class="clearfix">
			<div class="inputColumnLeft">
				<div class="inputLabel fontSizeLarge">Password:</div>
			</div>
			<div class="inputTextArea">
				<?php 
					echo $this->Form->input('password', array(
							'type' => 'password'
						)
					); 
				?>
				<?php 
					echo $this->Form->input('password2', array(
							'type' => 'password'
						)
					); 
				?>
				<?php if($this->Form->error('password')): ?>
				<div class="inputError fontColorRedOrange fontWeightThick">
					<?php echo $this->Form->error('password'); ?>
				</div>
				<?php endif; ?>
				<?php if($this->Form->error('password2')): ?>
				<div class="inputError fontColorRedOrange fontWeightThick">
					<?php echo $this->Form->error('password2'); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="wrapper600px alignCentered clearfix">
		<div class="clearfix">
			<div class="inputColumnLeft">
				<div class="inputLabel fontSizeLarge">Email:</div>
			</div>
			<div class="inputTextArea">
				<?php 
					echo $this->Form->input('email', array(
						)
					); 
				?>
				<?php 
					echo $this->Form->input('email2', array(
							'default' => 'Re-Enter E-Mail Address'
						)
					); 
				?>
				<?php if($this->Form->error('email')): ?>
				<div class="inputError fontColorRedOrange fontWeightThick">
					<?php echo $this->Form->error('email'); ?>
				</div>
				<?php endif; ?>
				<?php if($this->Form->error('email2')): ?>
				<div class="inputError fontColorRedOrange fontWeightThick">
					<?php echo $this->Form->error('email2'); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="wrapper600px alignCentered clearfix">
		<div class="clearfix" style="margin-left: 113px; margin-bottom: 60px;">
			<div class="buttonLargeGreen">CREATE YOUR ACCOUNT</div>
		</div>
	</div>
	<?php
		echo $this->Form->end();
	?>
</div>