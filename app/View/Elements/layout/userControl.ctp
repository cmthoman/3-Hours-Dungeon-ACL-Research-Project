<div id="userControl" class="clearfix">
	<div id="userControlLeft" class="fontWeightBold fontSizeDefault fontColorMist">
		<div style="margin-left: 20px; margin-top: 8px;">3HD</div>
	</div>
	<div id="userControlBody">
		<!-- ELSE IF USER IS LOGGED IN -->
		<?php if($loggedIn): ?>
		<div class="userControlElement fontSizeSmall fontColorMist">
			<?php 
				echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));
			?>
			 or 
			<?php 
				echo $this->Html->link('Create Your Account', array('controller' => 'users', 'action' => 'register'));
			?>
		</div>
		<?php else: ?>
		<!-- IF USER IS NOT LOGGED IN -->
		<div class="userControlElement fontSizeSmall fontColorMist">
			<?php 
				echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));
			?>
			 or 
			<?php 
				echo $this->Html->link('Create Your Account', array('controller' => 'users', 'action' => 'register'));
			?>
		</div>
		<?php endif; ?>
		<!-- END USER CONTROL ELEMENTS -->
		<!-- When Support Page is Complete
		<div class="userControlElement fontSizeSmall fontColorMist">
			<?php 
				echo $this->Html->link('SUPPORT', array('controller' => 'support', 'action' => 'ticket'));
			?>
		</div>
		-->
	</div>
	<div id="userConrolDropDown"></div>
</div>