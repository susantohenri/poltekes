<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'jabatan';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Jabatan'),
      (object) array('mData' => 'akses_level', 'sTitle' => 'Akses Level'),
      (object) array('mData' => 'kode', 'sTitle' => 'Kode Filter'),
    );

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Jabatan'
    );
  
    $this->form[]= array(
      'name' => 'akses_level',
      'label'=> 'Akses Level',
      'options' => array(
        array('text' => 'Administator', 'value' => ''),
        array('text' => 'Program', 'value' => 'Program'),
        array('text' => 'Kegiatan', 'value' => 'Kegiatan'),
        array('text' => 'Output', 'value' => 'Output'),
        array('text' => 'Sub Output', 'value' => 'Sub Output'),
        array('text' => 'Komponen', 'value' => 'Komponen'),
        array('text' => 'Sub Komponen', 'value' => 'Sub Komponen'),
        array('text' => 'Akun', 'value' => 'Akun'),
        array('text' => 'Detail', 'value' => 'Detail'),
        array('text' => 'SPJ', 'value' => 'SPJ'),
      )
    );

    $this->form[]= array(
      'name' => 'kode',
      'label'=> 'Kode Filter'
    );

    $this->form[]= array(
      'name'    => 'items',
      'label'   => 'Item Filter',
      'multiple'=> true,
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Komponens'), 
        array('data-field' => 'kode')
      ),
    );

  }

  function dt () {
    $this->datatables->select('uuid,urutan, nama, akses_level, kode');
    return parent::dt();
  }

}