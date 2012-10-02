<div id="userControl" class="clearfix">
	<div id="userControlLeft" class="fontWeightBold fontSizeDefault fontColorMist">
		<div style="margin-left: 20px; margin-top: 8px;">3HD</div>
	</div>
	<div id="userControlBody">
		<!-- IF USER IS LOGGED IN -->
		<?php if($loggedIn): ?>
		<div class="userControlElement fontSizeSmall fontColorMist">
			<?php 
				echo 'Welcome Back '.$username;
			?>
		</div>
		<div class="userControlElement fontSizeSmall fontColorMist">
			<?php 
				echo $this->Html->link('log out', array('controller' => 'users', 'action' => 'logout'));
			?>
		</div>
		<div class="userControlElement fontSizeSmall fontColorMist">
			<?php 
				echo $this->Html->link('PROFILE', array('controller' => 'users', 'action' => 'viewProfile/'));
			?>
		</div>
		<div class="userControlElement fontSizeSmall fontColorMist">
			<?php 
				echo $this->Html->link('CONTROL PANEL', array('controller' => 'panel'));
			?>
		</div>
		<?php else: ?>
		<!-- ELSE IF USER IS NOT LOGGED IN -->
		<div class="userControlElement fontSizeSmall fontColorMist">
			<?php 
				if($action != 'register'){
					echo $this->Html->link('log in', '#', array('id' => 'login'))." or ";
				}
				 
				echo $this->Html->link('Create Your Account', array('controller' => 'users', 'action' => 'register'));
			?>
		</div>
		<?php endif; ?>
		<!-- END USER LOGIN CONTROLS -->
	</div>
	<div id="userConrolDropDown"></div>
</div>