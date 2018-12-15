<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spj extends MY_Controller {

  function subformlist ($uuid) {
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
    } else $viewer = 'subformlist-spj';
    $this->loadview($viewer, $data);
  }

  function subformlistcreate ($parentUuid) {
    $this->load->model('Permissions');
    $perms = $this->Permissions->getPermittedActions($this->controller);
    if (!in_array('create', $perms)) return false;
    $this->loadview('subformlistcreate-spj', array('item' => array ('parent' => $parentUuid)));
  }

  function save () {
    $post = $this->input->post();
    echo $this->{$this->model}->save($post);
  }

}