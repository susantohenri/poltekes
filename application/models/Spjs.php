<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spjs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'spj';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'uraian', 'sTitle' => 'Uraian'),
      (object) array('mData' => 'vol', 'sTitle' => 'Vol', 'className' => 'text-right'),
      (object) array('mData' => 'sat', 'sTitle' => 'Sat'),
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
      'label'=> 'Vol',
      'attributes' => array(
        array('data-number' => 'true')
      ),
      'width'=> 1
    );

    $this->form[]= array(
      'name'    => 'sat',
      'label'   => 'Sat',
    );

    $this->form[]= array(
      'name' => 'hargasat',
      'label'=> 'Harga Sat',
      'attributes' => array(
        array('data-number' => 'true')
      ),
    );

    $this->form[]= array(
      'name' => 'realisasi',
      'label'=> 'Realisasi',
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
      ->select("FORMAT({$this->table}.vol, 0) vol")
      ->select("FORMAT({$this->table}.hargasat, 0) hargasat")
      ->select("{$this->table}.detail parent", false)
      ->select("FORMAT(hargasat * vol, 0) realisasi", false);
    return parent::findOne($param);
  }

  function dt () {
    $this->load->model('Users');
    $this->Users->filterDt();
    return $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.uraian")
      ->select("{$this->table}.vol")
      ->select("{$this->table}.sat")
      ->select("{$this->table}.hargasat")
      ->group_by("{$this->table}.uuid")
      ->where("{$this->table}.uuid", 'IS NOT NULL')
      ->generate();
  }

  function getListItem ($uuid) {
    $this->load->model('Users');
    $this->Users->filterListItem();
    return $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("{$this->table}.detail parent", false)
      ->select("FORMAT(vol, 0) vol_format", false)
      ->select("FORMAT(hargasat, 0) hargasat_format", false)
      ->select("FORMAT(vol*hargasat, 0) realisasi", false)
      ->select("'' childUuid", false)
      ->select("'' childController", false)
      ->select("''  kode", false)
      ->group_by("{$this->table}.uuid")
      ->get()
      ->row_array();
  }

}