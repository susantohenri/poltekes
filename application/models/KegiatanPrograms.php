<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KegiatanPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'kegiatan_program';
  }

}