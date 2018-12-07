<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SubKomponenPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'sub_komponen_program';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'kode_sub_komponen', 'sTitle' => 'Kode', 'className' => 'text-center'),
      (object) array('mData' => 'uraian_sub_komponen', 'sTitle' => 'Sub Komponen'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'className' => 'text-right', 'searchable' => false),
      (object) array('mData' => 'total_spj', 'sTitle' => 'SPJ', 'searchable' => 'false', 'className' => 'text-right')
    );

    $this->form = array();
    $this->form[]= array(
    	'name' => 'sub_komponen',
    	'label'=> 'Sub Komponen',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'SubKomponens'), 
        array('disabled' => 'disabled'), 
        array('data-field' => 'uraian')
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
    $this->form[]= array(
      'name' => 'total_spj',
      'label'=> 'SPJ',
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
      'value' => 0
    );

    $this->childs[] = array('label' => '', 'controller' => 'AkunProgram', 'model' => 'AkunPrograms');

  }

  function getListItem ($uuid) {
    $this->load->model('Users');
    $this->Users->filterListItem();
    return $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("{$this->table}.komponen_program parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("FORMAT(SUM(spj.vol * spj.hargasat + spj.ppn + spj.pph), 0) total_spj", false)
      ->select("GROUP_CONCAT(DISTINCT akun_program.uuid) childUuid", false)
      ->select("'AkunProgram' childController", false)
      ->select('sub_komponen.kode kode', false)
      ->select('sub_komponen.uraian uraian', false)
      ->group_by("{$this->table}.uuid")
      ->get()
      ->row_array();
  }

  function findOne ($param) {
    $param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
    $this->db
      ->select("{$this->table}.*")
      ->select("CONCAT('Rp ', FORMAT(SUM(detail.hargasat * detail.vol), 0)) pagu", false)
      ->select("CONCAT('Rp ', FORMAT(SUM(spj.hargasat * spj.vol + spj.ppn + spj.pph), 0)) total_spj", false)
      ->join('akun_program', "{$this->table}.uuid = akun_program.{$this->table}", 'left')
      ->join('detail', "akun_program.uuid = detail.akun_program", 'left')
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
      ->select('sub_komponen.kode as kode_sub_komponen', false)
      ->select('sub_komponen.uraian as uraian_sub_komponen', false)
      ->select("SUM(detail.hargasat * detail.vol) as pagu", false)
      ->select("SUM(spj.hargasat * spj.vol + spj.ppn + spj.pph) as total_spj", false)
      ->group_by("{$this->table}.uuid")
      ->generate();
  }

  function select2 ($field, $term) {
    return $this->db
      ->select("{$this->table}.uuid id", false)
      ->select("CONCAT(sub_komponen.kode, ' ', sub_komponen.uraian) text", false)
      ->limit(10)
      ->like("CONCAT(sub_komponen.kode, ' ', sub_komponen.uraian)", $term)
      ->join('sub_komponen', "{$this->table}.sub_komponen = sub_komponen.uuid", 'left')
      ->get($this->table)->result();
  }

  function findIn ($field, $value) {
    $this->db
      ->select("{$this->table}.*")
      ->select("CONCAT(sub_komponen.kode, ' ', sub_komponen.uraian) uraian", false)
      ->join('sub_komponen', "{$this->table}.sub_komponen = sub_komponen.uuid", 'left');
    return parent::findIn("{$this->table}.{$field}", $value);
  }

}