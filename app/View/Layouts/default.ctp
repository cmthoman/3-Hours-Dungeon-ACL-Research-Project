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
	<div id="pageInfo">
		<div page="<?php echo $page; ?>"></div>
	</div>
	<?php echo $this->element('layout/embeddedLogin'); ?>
	<div id="blackout"></div>
	<div id="container" class="clearfix">
		<div id="header" class="clearfix alignCentered">
			<?php echo $this->element('layout/userControl'); ?>
			<?php echo $this->element('layout/searchbar'); ?>
			<?php echo $this->element('layout/siteNavigation'); ?>
		</div>
		<div id="content" class="clearfix alignCentered">
			<?php echo $this->element('layout/siteTrail'); ?>
			<div id="contentAlignment" class="clearfix">
				<div class="wrapper900px clearfix">
					<?php echo $this->Session->flash();?>
				</div>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<div id="footer" class="clearfix alignCentered">
		</div>
		<div id="debug" class="clearfix alignCentered">
			<?php echo $this->element('sql_dump'); ?>
		</div>
	</div>
</body>
</html>
