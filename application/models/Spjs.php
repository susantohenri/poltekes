<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spjs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'spj';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'uraian', 'sTitle' => 'Uraian'),
      (object) array('mData' => 'vol', 'sTitle' => 'Volume'),
      (object) array('mData' => 'nama_satuan', 'sTitle' => 'Satuan'),
      (object) array('mData' => 'hargasat_format', 'sTitle' => 'Harga'),
      (object) array('mData' => 'jumlah_format', 'sTitle' => 'Jumlah'),
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
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Satuans'), 
        array('data-field' => 'nama')
      ),
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

  function find ($param = array()) {
    $this->db
      ->select("{$this->table}.*")
      ->select("satuan.nama nama_satuan",false)
      ->select("CONCAT('Rp ', FORMAT(hargasat, 0)) hargasat_format", false)
      ->select("CONCAT('Rp ', FORMAT(hargasat * vol, 0)) jumlah_format", false)
      ->join('satuan', "{$this->table}.sat = satuan.uuid", false);
    return parent::find($param);
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