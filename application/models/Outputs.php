<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Outputs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'output';
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
    	'name' => 'uraian',
    	'label'=> 'Uraian'
    );
  }

}