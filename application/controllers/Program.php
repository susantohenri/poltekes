<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends MY_Controller {

  public function index () {
    $model = $this->model;
    if ($post = $this->$model->lastSubmit($this->input->post())) {
      if (isset ($post['delete'])) $this->$model->delete($post['delete']);
      else {
      		$create = false;
          $db_debug = $this->db->db_debug;
          $this->db->db_debug = FALSE;

          if (strpos($_SERVER['HTTP_REFERER'], '/readList/') > -1) {
            $this->load->model('AkunPrograms');
            $result = $this->AkunPrograms->updateByList($post);
          } else {
          	if (!isset ($post['uuid'])) $create = true;
          	$result = $this->$model->save($post);
          }

          $error = $this->db->error();
          $this->db->db_debug = $db_debug;
          if (isset ($result['error'])) $error = $result['error'];
          if(count($error)){
              $this->session->set_flashdata('model_error', $error['message']);
              redirect($create ? "{$this->controller}/readList/{$result}" : $this->controller);
          }
      }
    }
    $vars = array();
    $vars['page_name'] = 'table';
    $vars['thead'] = $this->$model->thead;
    $this->loadview('index', $vars);
  }

}