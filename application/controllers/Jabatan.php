<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends MY_Controller {

	function assignment ($controller, $uuid) {
	  $model= $this->model;
    if ($post = $this->$model->lastSubmit($this->input->post())) {
      $this->$model->assign($post['jabatan'], $uuid);
      redirect("{$this->controller}/read/{$post['jabatan']}");
    }
    $vars = array();
    $vars['page_name'] = 'form-jabatan-assignment';
    $vars['form'] = $this->$model->getAssignmentForm($controller);
    $vars['subform'] = array();
    $vars['uuid'] = '';
    $this->loadview('index', $vars);
	}

}