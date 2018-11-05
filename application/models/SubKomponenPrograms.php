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
      (object) array('mData' => 'realisasi', 'sTitle' => 'Realisasi', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'sisa', 'sTitle' => 'Sisa', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'prosentase', 'sTitle' => 'Serapan', 'searchable' => 'false', 'className' => 'text-right')
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
      'name' => 'realisasi',
      'label'=> 'Realisasi',
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
      ->select("FORMAT(SUM(spj.vol * spj.hargasat), 0) realisasi", false)
      ->select("GROUP_CONCAT(DISTINCT akun_program.uuid) childUuid", false)
      ->select("'AkunProgram' childController", false)
      ->select('sub_komponen.kode kode', false)
      ->select('sub_komponen.uraian uraian', false)
      ->join('sub_komponen', "{$this->table}.sub_komponen = sub_komponen.uuid", 'left')
      ->join('akun_program', "{$this->table}.uuid = akun_program.{$this->table}", 'left')
      ->join('detail', "akun_program.uuid = detail.akun_program", 'left')
      ->join('spj', "detail.uuid = spj.detail", 'left')
      ->group_by("{$this->table}.uuid")
      ->get()
      ->row_array();
  }

  function findOne ($param) {
    $param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
    $this->db
      ->select("{$this->table}.*")
      ->select("CONCAT('Rp ', FORMAT(SUM(detail.hargasat * detail.vol), 0)) pagu", false)
      ->select("CONCAT('Rp ', FORMAT(SUM(spj.hargasat * spj.vol), 0)) realisasi", false)
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
      ->select("SUM(spj.hargasat * spj.vol) as realisasi", false)
      ->select("IF(SUM(detail.hargasat * detail.vol) - SUM(spj.hargasat * spj.vol) > 0, SUM(detail.hargasat * detail.vol) - SUM(spj.hargasat * spj.vol), 0) as sisa")
      ->select("SUM(spj.hargasat * spj.vol) / SUM(detail.hargasat * detail.vol) * 100 as prosentase")
      ->group_by("{$this->table}.uuid")
      ->generate();
  }

}