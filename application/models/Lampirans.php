<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lampirans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'lampiran';
    $this->thead = array();
  }

}