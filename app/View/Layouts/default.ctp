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
		//Load CSS Files for the elements attached to this view in the format /css/elements/controller/view.css
		if (is_file(APP.WEBROOT_DIR.DS."css".DS."elements".DS.$this->params["controller"].DS.$this->params["action"].".css")){ 
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
	<?php echo $this->element('Layout/embeddedLogin'); ?>
	<div id="blackout"></div>
	<div id="container">
		<div id="header" class="alignCentered">
			<?php echo $this->element('Layout/userControl'); ?>
			<?php echo $this->element('Layout/searchbar'); ?>
			<?php echo $this->element('Layout/siteNavigation'); ?>
		</div>
		<div id="content" class="alignCentered">
			<?php echo $this->element('Layout/siteTrail'); ?>
			<div id="contentAlignment" class="clearfix">
				<?php 
					if (is_file(APP.DS."View".DS."Elements".DS.$page.DS.$action.DS."pageControls.ctp")){ 
					       echo $this->element('Layout/pageControls');
					}
				?>
				<div class="wrapper900px clearfix">
					<?php echo $this->Session->flash();?>
				</div>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<div id="footer" class="alignCentered">
			<?php //echo debug($form); ?>
		</div>
		<div id="debug" class="alignCentered">
			<?php echo $this->element('sql_dump'); ?>
		</div>
	</div>
</body>
</html>
