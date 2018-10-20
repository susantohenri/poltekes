<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KomponenPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'komponen_program';
  }

}