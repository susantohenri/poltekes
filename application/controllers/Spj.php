<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spj extends MY_Controller {

  function subformlist ($uuid) {
    $data = array();
    $model = $this->model;
    $data['item'] = $this->$model->getListItem($uuid);
    $this->loadview('subformlist-spj', $data);
  }

}