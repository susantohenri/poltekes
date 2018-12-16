<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AkunProgram extends MY_Controller {

  function readlist ($id) {
    $data = array();
    $data['page_name'] = 'list';
    $model = $this->model;
    $data['item'] = $this->$model->getListItem($id);

    $this->load->model('Permissions');
    $data['show_link_update_pagu'] = in_array('update', $this->Permissions->getPermittedActions('Detail'));

    $this->loadview('index', $data);
  }

  function subformlist ($uuid) {
    $this->load->model('Permissions');
    $perms = $this->Permissions->getPermittedActions($this->controller);
    if (!in_array('read', $perms)) return false;
    $data = array();
    $model = $this->model;
    $data['item'] = $this->$model->getListItem($uuid);

    $this->load->model('Permissions');
    $data['show_link_update_pagu'] = in_array('update', $this->Permissions->getPermittedActions('Detail'));

    $this->loadview('subformlist', $data);
  }

}