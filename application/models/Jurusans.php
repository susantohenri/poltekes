<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'jurusan';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'kode', 'sTitle' => 'Kode', 'width' => '10%', 'className' => 'text-center'),
      (object) array('mData' => 'nama', 'sTitle' => 'Jurusan'),
    );

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Nama Jurusan'
    );
  }

}