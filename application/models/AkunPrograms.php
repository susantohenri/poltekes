<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AkunPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'akun_program';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'kode_akun', 'sTitle' => 'Kode', 'className' => 'text-right'),
      (object) array('mData' => 'nama_akun', 'sTitle' => 'Akun'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'className' => 'text-right', 'searchable' => false),
      (object) array('mData' => 'realisasi', 'sTitle' => 'Realisasi', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'sisa', 'sTitle' => 'Sisa', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'prosentase', 'sTitle' => 'Serapan', 'searchable' => 'false', 'className' => 'text-right')
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
    	'name' => 'pagu',
    	'label'=> 'Pagu',
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
      'value' => 0
    );
    $this->childs[] = array('label' => '', 'controller' => 'Detail', 'model' => 'Details');

  }

  function komposisiRealisasi () {
    $this->load->model('Users');
    $this->Users->filterListItem();
    return $this->db
      ->where_in("SUBSTR(akun.kode, 1, 2)", array(51, 52, 53))
      ->select("CONCAT(SUBSTR(akun.kode, 1, 2), ' ', CASE WHEN SUBSTR(akun.kode, 1, 2) = 51 THEN 'B. Pegawai' WHEN SUBSTR(akun.kode, 1, 2) = 52 THEN 'B. Barang' WHEN SUBSTR(akun.kode, 1, 2) = 53 THEN 'B. Modal' END) as absis", false)
      ->select("IFNULL(SUM(spj.vol * spj.hargasat), 0) / IFNULL(SUM(detail.vol * detail.hargasat), 0) * 100 ordinat", false)
      ->group_by("SUBSTR(akun.kode, 1, 2)")
      ->get()
      ->result();
  }

  function getListItem ($uuid) {
    $this->load->model('Users');
    $this->Users->filterListItem();
    return $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("{$this->table}.sub_komponen_program parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("FORMAT(SUM(spj.vol * spj.hargasat), 0) realisasi", false)
      ->select("GROUP_CONCAT(DISTINCT detail.uuid) childUuid", false)
      ->select("'Detail' childController", false)
      ->select('akun.kode kode', false)
      ->select('akun.nama uraian', false)
      ->group_by("{$this->table}.uuid")
      ->get()
      ->row_array();
  }

  function findOne ($param) {
  	$param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
  	$this->db
  		->select("{$this->table}.*")
  		->select("FORMAT(SUM(detail.hargasat * detail.vol), 0) pagu", false)
  		->join('detail', "{$this->table}.uuid = detail.akun_program", 'left')
      ->join('spj', "detail.uuid = spj.detail", 'left')
      ->group_by("{$this->table}.uuid");
  	return parent::findOne($param);
  }

  function dt () {
  	$this->load->model('Users');
    $this->Users->filterDt();
    return $this->datatables
  		->select("{$this->table}.uuid")
  		->select("{$this->table}.urutan")
      ->select('akun.kode as kode_akun', false)
  		->select('akun.nama as nama_akun', false)
      ->select("SUM(detail.hargasat * detail.vol) as pagu", false)
      ->select("SUM(spj.hargasat * spj.vol) as realisasi", false)
  		->select("IF(SUM(detail.hargasat * detail.vol) - SUM(spj.hargasat * spj.vol) > 0, SUM(detail.hargasat * detail.vol) - SUM(spj.hargasat * spj.vol), 0) as sisa")
      ->select("SUM(spj.hargasat * spj.vol) / SUM(detail.hargasat * detail.vol) * 100 as prosentase")
  		->group_by("{$this->table}.uuid")
      ->generate();
  }

  function select2 ($field, $term) {
    return $this->db
      ->select("{$this->table}.uuid id", false)
      ->select("CONCAT(akun.kode, ' ', akun.uraian) text", false)
      ->limit(10)
      ->like("CONCAT(akun.kode, ' ', akun.uraian)", $term)
      ->join('akun', "{$this->table}.akun = akun.uuid", 'left')
      ->get($this->table)->result();
  }

  function findIn ($field, $value) {
    $this->db
      ->select("{$this->table}.*")
      ->select("CONCAT(akun.kode, ' ', akun.uraian) uraian", false)
      ->join('akun', "{$this->table}.akun = akun.uuid", 'left');
    return parent::findIn("{$this->table}.{$field}", $value);
  }

}