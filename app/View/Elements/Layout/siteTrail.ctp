<div id="siteTrail">
	<div id="siteTrailLeft">
		<?php
			echo $this->Html->getCrumbs(' :: ' , array(
			    'text' => '3 Hours Dungeon',
			    'url' => array('controller' => 'landing', 'action' => 'index'),
			    'escape' => false,
			    'class' => 'fontColorDefault',
			));
		?>
	</div>
	<div id="siteTrailDetail"></div>
</div>