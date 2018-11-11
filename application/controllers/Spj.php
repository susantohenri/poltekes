<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spj extends MY_Controller {

  function subformlist ($uuid) {
    $data = array();
    $model = $this->model;
    $data['item'] = $this->$model->getListItem($uuid);
    $viewer = 'form' === $data['item']['viewer'] ? 'subformlist-spj-editable' : 'subformlist-spj';
    $this->loadview($viewer, $data);
  }

  function subformlistcreate ($parentUuid) {
    $this->loadview('subformlistcreate-spj', array('item' => array ('parent' => $parentUuid)));
  }

}