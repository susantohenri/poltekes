<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Satuans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'satuan';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'nama', 'sTitle' => 'Satuan'),
    );

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Satuan'
    );
  }

  function findOrCreate ($nama) {
    if ($found = $this->findOne(array('nama' => $nama))) return $found['uuid'];
    else return $this->create(array('nama' => $nama));
  }

}