<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Units extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'unit';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Unit'),
    );

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Nama Unit'
    );
  }

  function dt () {
    $this->datatables->select('urutan, nama');
    return parent::dt();
  }

}