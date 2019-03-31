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
    $this->loadview('index', $data);
  }

  public function index () {
    $model = $this->model;
    if ($post = $this->$model->lastSubmit($this->input->post())) {
      if (isset ($post['delete'])) $this->$model->delete($post['delete']);
      else {
          $db_debug = $this->db->db_debug;
          $this->db->db_debug = FALSE;

          if (strpos($_SERVER['HTTP_REFERER'], '/readList/') > -1) {
            $this->load->model('Details');
            $result = $this->Details->updateByList($post);
          } else $result = $this->$model->save($post);

          $error = $this->db->error();
          $this->db->db_debug = $db_debug;
          if (isset ($result['error'])) $error = $result['error'];
          if(count($error)){
              $this->session->set_flashdata('model_error', $error['message']);
              redirect(site_url('Spj'));
          }
      }
    } else redirect(site_url('Spj'));
  }

  function create ($spj = null) {
    $model= $this->model;
    $vars = array();
    $vars['page_name']= 'form';
    $vars['form']     = $this->$model->getForm();
    if (!is_null($spj)) {
      $this->load->model('Spjs');
      $record = $this->Spjs->findOne($spj);
      $vars['form'][0]['options'][] = array(
        'value' => $spj,
        'text' => $record['uraian']
      );
      $vars['form'][0]['value'] = $spj;
    }
    $vars['subform'] = $this->$model->getFormChild();
    $vars['uuid'] = '';
    $this->loadview('index', $vars);
  }

}