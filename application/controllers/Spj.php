<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spj extends MY_Controller {

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

  function _subformlist ($uuid, $jabatanGroup = null) {
    $this->load->model('Permissions');
    $perms = $this->Permissions->getPermittedActions($this->controller);
    if (!in_array('read', $perms)) return false;
    $data = array();
    $model = $this->model;
    $data['item'] = $this->$model->getListItem($uuid);

    if ('form' === $data['item']['viewer']) {
      $viewer = 'subformlistread-spj';
      $this->load->model('Jabatans');
      $user = $this->session->userdata();
      $this->Jabatans->getUserAttr($user);
      $data['userDetail'] = $user;

      if (in_array('create', $perms)) {
        $creator = $this->{$this->model}->getCreator($uuid);
        if (in_array($creator, $user['letting'])) {}
        else if (!in_array($creator, $user['bawahan'])) $perms = array_diff ($perms, ['create']);
      }
    } else $viewer = 'subformlist-spj';

    $data['permitted_actions'] = $perms;
    $this->loadview($viewer, $data);
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
}