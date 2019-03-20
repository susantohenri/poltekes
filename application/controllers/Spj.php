<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spj extends MY_Controller {

  public function index () {
    $model = $this->model;
    if ($post = $this->$model->lastSubmit($this->input->post())) {
      if (isset ($post['delete'])) $this->$model->delete($post['delete']);
      else if (isset ($post['verification'])) $this->$model->verify($post['verification']);
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
              redirect($this->controller);
          }
      }
    }
    $vars = array();
    $vars['page_name'] = 'table';
    // $vars['records'] = $this->$model->find();
    $vars['thead'] = $this->$model->thead;
    $this->loadview('index', $vars);
  }

  function create ($detail = null) {
    $model= $this->model;
    $vars = array();
    $vars['page_name'] = 'form';
    $vars['form']     = $this->$model->getForm();
    if (!is_null($detail)) {
      $this->load->model('Details');
      $record = $this->Details->findOne($detail);
      $vars['form'][0]['options'][] = array(
        'value' => $detail,
        'text' => $record['uraian']
      );
      $vars['form'][0]['value'] = $detail;
    }
    $vars['subform'] = $this->$model->getFormChild();
    $vars['uuid'] = '';
    $this->loadview('index', $vars);
  }

  function save () {
    $post = $this->input->post();
    echo $this->{$this->model}->save($post);
  }

  function read ($id) {
    $data = array();
    $data['page_name'] = 'form';
    $model = $this->model;
    $data['form'] = $this->$model->getForm($id);
    $data['subform'] = $this->$model->getFormChild($id);
    $data['uuid'] = $id;

    $spj = $this->Spjs->findOne($id);
    $status = $this->Spjs->getStatus($spj);

    $this->load->model('Permissions');
    $data['permission'] = $this->Permissions->getPermissions();

    switch ($status) {
      case 'unverifiable':
      case 'verified':
        unset($data['permission'][array_search('update_Spj', $data['permission'])]);
        unset($data['permission'][array_search('delete_Spj', $data['permission'])]);
        break;
      case 'verifiable':
        $data['permission'][] = 'verify_Spj';
        break;
      default: $data['permission'] = array();
    }

    $this->loadview('index', $data);
  }

  function verify ($uuid) {
    $vars = array();
    $vars['page_name'] = 'confirm-verification';
    $vars['uuid'] = $uuid;
    $this->loadview('index', $vars);
  }
}