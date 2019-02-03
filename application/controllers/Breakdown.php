<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Breakdown extends MY_Controller {

	function Assign ($entity, $uuid) {
		$entity = array(
			'table' => strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $entity)),
			'controller' => $entity,
			'model' => "{$entity}s"
		);
	    $data = array();
	    $data['page_name'] = 'form';
	    $model = $this->model;
	    $data['form'] = $this->$model->getAssignmentForm($entity, $uuid);
	    $data['subform'] = $this->$model->getFormChild($uuid);
	    $data['entity'] = $entity;
	    $data['uuid'] = $uuid;
	    $this->loadview('index', $data);
	}

}