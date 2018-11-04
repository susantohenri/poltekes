<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'jabatan';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Jabatan'),
    );

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Jabatan'
    );
  }

  function dt () {
    $this->datatables->select('uuid,urutan, nama');
    return parent::dt();
  }

}