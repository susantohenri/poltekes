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
      'name' => 'kode',
      'label'=> 'Kode'
    );

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Nama Prodi'
    );

    $this->form[]= array(
      'name' => 'jurusan',
      'label'=> 'Jurusan',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Jurusans'),
        array('data-field' => 'nama'),
      ),
    );

  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.kode")
      ->select("{$this->table}.nama")
      ->select("jurusan.nama as nama_jurusan", false)
      ->join('jurusan', "jurusan.uuid = {$this->table}.jurusan", 'left');
    return parent::dt();
  }

}