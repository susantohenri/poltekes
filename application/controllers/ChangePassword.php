<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends MY_Controller {

  public function index () {
    $model = $this->model;
    if ($post = $this->$model->lastSubmit($this->input->post())) {
      $db_debug = $this->db->db_debug;
      $this->db->db_debug = FALSE;
      $result = $this->$model->save($post);
      $error = $this->db->error();
      $this->db->db_debug = $db_debug;
      if (isset ($result['error'])) $error = $result['error'];
      if(count($error)) $this->session->set_flashdata('model_error', $error['message']);
    }
    if (isset ($post['uuid'])) redirect("{$this->controller}/read/{$post['uuid']}");
   	else redirect(site_url());
  }

}