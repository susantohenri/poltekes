<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spjs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'spj';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'kode', 'sTitle' => 'Kode'),
      (object) array('mData' => 'uraian', 'sTitle' => 'Uraian'),
      (object) array('mData' => 'vol', 'sTitle' => 'Volume'),
      (object) array('mData' => 'sat', 'sTitle' => 'Satuan'),
      (object) array('mData' => 'hargasat', 'sTitle' => 'Harga Satuan'),
    );

    $this->form[]= array(
    	'name' => 'kode',
    	'label'=> 'Kode'
    );

    $this->form[]= array(
      'name' => 'nama',
      'label'=> 'Uraian'
    );

    $this->form[]= array(
      'name' => 'vol',
      'label'=> 'Volume'
    );

    $this->form[]= array(
      'name'    => 'sat',
      'label'   => 'Satuan',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Satuans'), 
        array('data-field' => 'nama')
      ),
    );

    $this->form[]= array(
      'name' => 'hargasat',
      'label'=> 'Harga Satuan'
    );
  }

}