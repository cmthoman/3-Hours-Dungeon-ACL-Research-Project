<!DOCTYPE HTML>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('layout');
		echo $this->Html->css('toolkit');
		echo $this->Html->css('fonts');
		echo $this->Html->css('tables');
		echo $this->Html->css('debug');
		echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
		echo $this->Html->script('layout');
		//Load CSS Files for the current view if they exist in the /css/controller/view.css format
		if (is_file(APP.WEBROOT_DIR.DS."css".DS.$this->params["controller"].DS.$this->params["action"].".css")){ 
		       echo $this->html->css($this->params["controller"]."/".$this->params["action"]); 
		}
		//Load JS Files for the current view if they exist in the /js/controller/view.js format
		if (is_file(APP.WEBROOT_DIR.DS."js".DS.$this->params["controller"].DS.$this->params["action"].".js")){ 
		       echo $this->Html->script($this->params["controller"]."/".$this->params["action"]); 
		}
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container" class="clearfix">
		<div id="header" class="clearfix alignCentered">
			<div id="userControl" class="clearfix">
				<div id="userControlLeft"></div>
				<div id="userControlBody"></div>
				<div id="userConrolDropDown"></div>
			</div>
			<div id="nav">
				<div class="navButton"><?php echo $this->Html->image('/img/site-buttons/navigation-button-home.png'); ?></div>
				<div class="navButton"><?php echo $this->Html->image('/img/site-buttons/navigation-button-community.png'); ?></div>
				<div class="navButton"><?php echo $this->Html->image('/img/site-buttons/navigation-button-forum.png'); ?></div>
			</div>
		</div>
		<div id="content" class="clearfix alignCentered">
			<div id="siteTrail">
				<div id="siteTrailLeft">Home > Streams > Chris</div>
				<div id="siteTrailDetail"></div>
			</div>
			<div id="contentAlignment" class="clearfix">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<div id="footer" class="clearfix alignCentered">
			
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
