<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SpjPayment extends MY_Controller {

  function read ($id) {
    $data = array();
    $data['page_name'] = 'form';
    $model = $this->model;
    $data['form'] = $this->$model->getForm($id);
    $data['subform'] = $this->$model->getFormChild($id);
    $data['uuid'] = $id;

    $record = $this->{$this->model}->findOne($id);
    if ('unverified' === $record['global_status']) {
	    $this->load->model('Permissions');
	    $data['permitted_actions'] = array();
	    foreach ($this->Permissions->getPermittedActions($this->controller) as $perm) {
	    	if ('update' !== $perm) $data['permitted_actions'][] = $perm;
	    }
    }

    $this->loadview('index', $data);
  }

}