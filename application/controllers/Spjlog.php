<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SpjLog extends MY_Controller {
  function _subformcreate () {
    $model= $this->model;
    $vars = array();
    $vars['form'] = $this->$model->getForm();
    $vars['subformlabel'] = $this->subformlabel;
    $vars['controller'] = $this->controller;
    $vars['uuid'] = '';
    $this->loadview('subform-spjlog', $vars);
  }

  function _subformread ($uuid) {
    $data = array();
    $model = $this->model;
    $data['form'] = $this->$model->getForm($uuid);
    $data['subformlabel'] = $this->subformlabel;
    $data['controller'] = $this->controller;
    $data['uuid'] = $uuid;
    $data['item'] = $this->{$this->model}->findOne($uuid);
    $this->loadview('subform-spjlog', $data);
  }
}