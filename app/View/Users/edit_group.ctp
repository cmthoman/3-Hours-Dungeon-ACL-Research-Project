<div class="pageBackgroundAtlantis">
	<?php echo $this->Form->create('UserProfile'); ?>
	<div class="wrapper600px alignCentered marginBottom10px">
		<?php echo $this->request->data['UserProfile']['Group']['name']; ?>
		<?php echo $this->Form->input('group_id', array('type' => 'text')); ?>
	</div>
	<div class="wrapper600px alignCentered marginBottom10px">
		<?php echo $this->Form->input('game_name', array('type' => 'text')); ?>
	</div>
	<div class="wrapper600px alignCentered marginBottom10px">
		<?php echo $this->Form->end('submit'); ?>
	</div>
</div>