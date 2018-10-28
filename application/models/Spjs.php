<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spjs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'spj';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No'),
      (object) array('mData' => 'uraian', 'sTitle' => 'Uraian'),
      (object) array('mData' => 'vol', 'sTitle' => 'Volume', 'className' => 'text-right'),
      (object) array('mData' => 'sat', 'sTitle' => 'Satuan'),
      (object) array('mData' => 'hargasat', 'sTitle' => 'Harga', 'className' => 'text-right'),
      (object) array('mData' => 'realisasi', 'sTitle' => 'Jumlah', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency'),
    );

    $this->form[]= array(
      'name' => 'uraian',
      'label'=> 'Uraian',
      'width'=> 4
    );

    $this->form[]= array(
      'name' => 'vol',
      'label'=> 'Volume',
      'attributes' => array(
        array('data-number' => 'true')
      ),
      'width'=> 1
    );

    $this->form[]= array(
      'name'    => 'sat',
      'label'   => 'Satuan',
    );

    $this->form[]= array(
      'name' => 'hargasat',
      'label'=> 'Harga Satuan',
      'attributes' => array(
        array('data-number' => 'true')
      ),
    );

    $this->form[]= array(
      'name' => 'jumlah',
      'label'=> 'Jumlah',
      'value'=> 0,
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
    );

  }

  function findOne ($param) {
    $this->db
      ->select("{$this->table}.*")
      ->select("{$this->table}.akun_program parent", false)
      ->select("CONCAT('Rp ', FORMAT(hargasat * vol, 0)) jumlah", false);
    return parent::findOne($param);
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.uraian")
      ->select("{$this->table}.vol")
      ->select("{$this->table}.sat")
      ->select("{$this->table}.hargasat")
      ->select("hargasat * vol as realisasi", false)
      ;
    return parent::dt();
  }

  function getListItem ($uuid) {
    $this->db
      ->select("{$this->table}.*")
      ->select("{$this->table}.akun_program parent", false)
      ->select("FORMAT(vol, 0) vol_format", false)
      ->select("FORMAT(hargasat, 0) hargasat_format", false)
      ->select("FORMAT(vol*hargasat, 0) jumlah", false)
      ->select("'' childUuid", false)
      ->select("'' childController", false)
      ->select("''  kode", false)
      ->group_by("{$this->table}.uuid");
    return parent::getListItem ($uuid);
  }

}