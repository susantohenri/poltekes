<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SubKomponens extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'sub_komponen';
    $this->form = array();

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