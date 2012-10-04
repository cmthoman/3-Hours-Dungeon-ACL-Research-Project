<?php
	$this->Html->addCrumb('Control Panel');
?>
<div class='pageBackgroundAtlantis'>
	<div class="wrapperFull">
		<h3>3HD Control Panel</h3>
	</div>
	<?php if($userData['subgroup_id'] > 1): ?>
	<div class="wrapperFull">
		<div class="wrapperFull">
			<h4>Admin Tools</h4>
			<div class="wrapper600px fontSizeSmall marginBottom10px">Portal Management Tools</div>
		</div>
		<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
			<div class="wrapperFull">
				<h5>Group Manager</h5>
				<div class="wrapper600px fontSizeSmall marginTop10px">
					Manage site permissions on a group scale. Add or edit groups as needed. Changes made here define group based access to portal controllers (broad features) and actions (specific functionality within a feature) for the entire portal.
					<br/><br/>
					Also used to define new user groups as needed and set their access levels throughout the portal.
				</div>
			</div>
			<div class="wrapperFull">
				<div class="clearfix">
					<a href="/Groups/"><div class="ButtonLargeGreen fontColorDefault">GROUP MANAGER</div></a>
				</div>
			</div>
		</div>
		<div class="wrapperFull bgBlackOpaque borderRadius8px marginBottom10px">
			<div class="wrapperFull">
				<h5>Controller and Action Node Manager</h5>
				<div class="wrapper600px marginTop10px">Mainly used when developing new portal features to define what controllers have which actions available for permission assignment. <span class="fontColorRedOrange fontWeightBold">[Don't Use Outside of Development Environment!]</span></div>
			</div>
			<div class="wrapperFull">
				<div class="clearfix">
					<a href="/ControllerNodes/"><div class="ButtonLargeGreen fontColorDefault">CONTROLLER AND ACTION NODE MANAGER</div></a>
				</div>
			</div>
		</div>
	</div>	
	<?php endif; ?>
</div>