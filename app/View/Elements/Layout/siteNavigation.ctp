<div id="nav">
	<div class="navButton">
		<?php 
			echo $this->Html->image('/img/site-buttons/navigation-button-home.png', array(
					'url' => array(
						'controller' => 'Landing',
						'action' => 'index',
					),
					'alt' => 'Landing Page',
					'id' => 'landing',
				)
			);
		?>
	</div>
	<div class="navButton">
		<?php 
			echo $this->Html->image('/img/site-buttons/navigation-button-forum.png', array(
					'url' => array(
						'controller' => 'Forum',
						'action' => 'index',
					),
					'alt' => 'Forum Page',
					'id' => 'forum',
				)
			);
		?>
	</div>
</div>