<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prodis extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'prodi';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'kode', 'sTitle' => 'Kode', 'width' => '10%', 'className' => 'text-center'),
      (object) array('mData' => 'nama', 'sTitle' => 'Prodi'),
      (object) array('mData' => 'nama_jurusan', 'sTitle' => 'Jurusan'),
    );

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Nama Prodi'
    );
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.*")
      ->select("jurusan.nama as nama_jurusan", false)
      ->join('jurusan', "jurusan.uuid = {$this->table}.jurusan", 'left');
    return parent::dt();
  }

}