<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'item';
    $this->thead = array();
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'uraian',
    	'label'=> 'Uraian',
      'width'=> 5
    );
    $this->form[]= array(
      'name' => 'vol',
      'label'=> 'Volume',
      'attributes' => array(
        array('data-number' => true)
      )
    );
    $this->form[]= array(
      'name' => 'sat',
      'label'=> 'Satuan',
    );
    $this->form[]= array(
      'name' => 'hargasat',
      'label'=> 'Harga Satuan',
      'attributes' => array(
        array('data-number' => true)
      )
    );
  }

}