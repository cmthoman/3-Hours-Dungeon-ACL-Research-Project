<?php
App::uses('AclBehavior', 'Model/Behavior');

class AclAliasBehavior extends AclBehavior {

	public function afterSave($model, $created) {
		$types = $this->_typeMaps[$this->settings[$model->name]['type']];
		if (!is_array($types)) {
			$types = array($types);
		}
		foreach ($types as $type) {
			$parent = $model->parentNode();
			$alias = $model->alias();
			if (!empty($parent)) {
				$parent = $this->node($model, $parent, $type);
			}
			$data = array(
			'parent_id' => isset($parent[0][$type]['id']) ? $parent[0][$type]['id'] : null,
			'model' => $model->name,
			'foreign_key' => $model->id,
			'alias' => isset($alias) ? $alias : null,
			);
			if (!$created) {
				$node = $this->node($model, null, $type);
				$data['id'] = isset($node[0][$type]['id']) ? $node[0][$type]['id'] : null;
			}
				$model->{$type}->create();
				$model->{$type}->save($data);
			}
		}
	}