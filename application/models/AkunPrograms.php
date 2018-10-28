<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AkunPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'akun_program';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No'),
      (object) array('mData' => 'kode_akun', 'sTitle' => 'Kode'),
      (object) array('mData' => 'nama_akun', 'sTitle' => 'Akun'),
      (object) array('mData' => 'jumlah_format', 'sTitle' => 'Jumlah', 'searchable' => 'false', 'searchable' => 'false'),
    );

    $this->form = array();
    $this->form[]= array(
    	'name' => 'akun',
    	'width'=> 5,
    	'label'=> 'Akun',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Akuns'), 
        array('disabled' => 'disabled'), 
        array('data-field' => 'nama')
      ),
    );
    $this->form[]= array(
    	'name' => 'jumlah_format',
    	'label'=> 'Jumlah',
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
      'value' => 0
    );
    $this->childs[] = array('label' => '', 'controller' => 'Spj', 'model' => 'Spjs');

  }

  function getListItem ($uuid) {
    $this->db
      ->select("{$this->table}.*")
      ->select("{$this->table}.sub_komponen_program parent", false)
      ->select("FORMAT(SUM(vol*hargasat), 0) jumlah", false)
      ->select("GROUP_CONCAT(DISTINCT spj.uuid) childUuid", false)
      ->select("'Spj' childController", false)
      ->select('akun.kode kode', false)
      ->select('akun.nama uraian', false)
      ->join('akun', "{$this->table}.akun = akun.uuid", 'left')
      ->join('spj', "{$this->table}.uuid = spj.akun_program", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::getListItem ($uuid);
  }

  function findOne ($param) {
  	$param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
  	$this->db
  		->select("{$this->table}.*")
  		->select("CONCAT('Rp ', FORMAT(SUM(hargasat * vol), 0)) jumlah_format", false)
  		->join('spj', "{$this->table}.uuid = spj.akun_program", 'left')
  		->group_by("{$this->table}.uuid");
  	return parent::findOne($param);
  }

  function dt () {
  	$this->datatables
  		->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
  		->select('akun.kode as kode_akun', false)
  		->select('akun.nama as nama_akun', false)
  		->select("CONCAT('Rp ', FORMAT(SUM(hargasat * vol), 0)) as jumlah_format", false)
  		->join('akun', "{$this->table}.akun = akun.uuid", 'left')
  		->join('spj', "{$this->table}.uuid = spj.akun_program", 'left')
  		->group_by("{$this->table}.uuid");
  	return parent::dt();
  }

  function updateByList ($data) {
    foreach ($data as $uuid => $child) {
      $child = array('uuid' => $uuid) + $child;
      foreach ($child as &$c) if (is_array ($c)) $c = implode(',', $c);
      $this->update($child);
    }
  }

}