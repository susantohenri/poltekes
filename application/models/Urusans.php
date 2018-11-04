<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Urusans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'urusan';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Urusan'),
    );

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Nama Urusan'
    );
  }

  function dt () {
    $this->datatables->select('uuid, urutan, nama');
    return parent::dt();
  }

}