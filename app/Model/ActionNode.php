<?php
class ActionNode extends Model {
			
	public $belongsTo = array(
		'ControllerNode'
	);
}