<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prodis extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'prodi';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'jurusan', 'sTitle' => 'Jurusan'),
      (object) array('mData' => 'nama', 'sTitle' => 'Prodi'),
      (object) array('mData' => 'kode', 'sTitle' => 'Kode Jurusan'),
    );

    $this->form[]= array(
      'name' => 'jurusan',
      'label'=> 'Nama Jurusan'
    );

    $this->form[]= array(
      'name' => 'nama',
      'label'=> 'Nama Prodi'
    );

    $this->form[]= array(
    	'name' => 'kode',
    	'label'=> 'Kode Jurusan'
    );
  }

}