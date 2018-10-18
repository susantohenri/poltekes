<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'program';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'kode', 'sTitle' => 'Kode'),
      (object) array('mData' => 'uraian', 'sTitle' => 'Uraian'),
    );

    $this->form[]= array(
    	'name' => 'kode',
    	'label'=> 'Kode'
    );

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Uraian'
    );
  }

}