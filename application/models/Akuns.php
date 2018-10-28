<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akuns extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'akun';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'kode', 'sTitle' => 'Kode', 'className' => 'text-right'),
      (object) array('mData' => 'nama', 'sTitle' => 'Nama'),
      (object) array('mData' => 'nama_klasifikasi_akun', 'sTitle' => 'Klasifikasi Akun'),
    );

    $this->form[]= array(
      'name' => 'kode',
      'label'=> 'kode'
    );

    $this->form[]= array(
      'name' => 'nama',
      'label'=> 'nama'
    );

    $this->form[]= array(
      'name'    => 'klasifikasi_akun',
      'label'   => 'Klasifikasi Akun',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'KlasifikasiAkuns'), 
        array('data-field' => 'nama')
      ),
    );
  }

  function dt () {
  	$this->datatables
  	->select("{$this->table}.*")
  	->select('klasifikasi_akun.nama nama_klasifikasi_akun', false)
  	->join('klasifikasi_akun', "klasifikasi_akun.uuid = {$this->table}.klasifikasi_akun", 'left');
  	return parent::dt();
  }

}