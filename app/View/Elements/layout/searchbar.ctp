<div id="searchBar">
	<?php 
		echo $this->Form->create('Search', array(
				'inputDefaults' => array(
					'label' => false,
					'div' => 'search'
				),
				'url' => array(
					'controller' => 'search',
					'action' => 'index'
				)
			)
		);
		
		echo $this->Form->input('searchQuery', array(
			'type' => 'text',
			'class' => 'searchField',
			'default' => 'Search 3HD'
			)
		);
	?>
	<div class='searchButton'>
		<?php
			echo $this->Form->end('/img/site-buttons/searchbar-button.png');
		?>
	</div>
</div>