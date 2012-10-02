<div id="pageControls" class="bgBlackOpaque">
	<div id="pageControlsTab" class="clearfix"></div>
	<div id="pageControlsBody" class="clearfix">
		<?php 
			if(isset($action)){
				echo $this->element($page.'/'.$action.'/pageControls');
			}
		?>
	</div>
</div>
