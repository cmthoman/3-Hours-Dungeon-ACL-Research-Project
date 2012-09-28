<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		//Load CSS Files for the current view if they exist in the /css/controller/view.css format
		if (is_file(APP.WEBROOT_DIR.DS."css".DS.$this->params["controller"].DS.$this->params["action"].".css")){ 
		       echo $this->html->css($this->params["controller"]."/".$this->params["action"]); 
		}
		//Load JS Files for the current view if they exist in the /js/controller/view.css format
		if (is_file(APP.WEBROOT_DIR.DS."js".DS.$this->params["controller"].DS.$this->params["action"].".js")){ 
		       echo $this->Html->script($this->params["controller"]."/".$this->params["action"]); 
		}
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			
		</div>
		<div id="content">
			
		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
