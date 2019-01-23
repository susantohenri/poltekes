<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanGroups extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'jabatan_group';
    $this->form = array();
  }

}