<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KegiatanPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'kegiatan_program';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'kode_kegiatan', 'sTitle' => 'Kode', 'className' => 'text-right'),
      (object) array('mData' => 'uraian_kegiatan', 'sTitle' => 'Kegiatan', 'width' => '30%'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'className' => 'text-right', 'searchable' => false),
      (object) array('mData' => 'realisasi', 'sTitle' => 'Realisasi', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'sisa', 'sTitle' => 'Sisa', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'prosentase', 'sTitle' => 'Serapan', 'searchable' => 'false', 'className' => 'text-right'),
    );

    $this->childs[] = array('label' => '', 'controller' => 'OutputProgram', 'model' => 'OutputPrograms');

  }

  function getListItem ($uuid) {
    $this->load->model('Users');
    $this->Users->filterListItem();
    return $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("{$this->table}.program parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("FORMAT(SUM(spj.vol * spj.hargasat), 0) realisasi", false)
      ->select("GROUP_CONCAT(DISTINCT output_program.uuid) childUuid", false)
      ->select("'OutputProgram' childController", false)
      ->select('kegiatan.kode kode', false)
      ->select('kegiatan.uraian uraian', false)
      ->group_by("{$this->table}.uuid")
      ->get()
      ->row_array();
  }

  function dt () {
    $this->load->model('Users');
    $this->Users->filterDt();
    return $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select('kegiatan.kode as kode_kegiatan', false)
      ->select('kegiatan.uraian as uraian_kegiatan', false)
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
      ->select("CONCAT(kegiatan.kode, ' ', kegiatan.uraian) text", false)
      ->limit(10)
      ->like("CONCAT(kegiatan.kode, ' ', kegiatan.uraian)", $term)
      ->join('kegiatan', "{$this->table}.kegiatan = kegiatan.uuid", 'left')
      ->get($this->table)->result();
  }

  function findIn ($field, $value) {
    $this->db
      ->select("{$this->table}.*")
      ->select("CONCAT(kegiatan.kode, ' ', kegiatan.uraian) uraian", false)
      ->join('kegiatan', "{$this->table}.kegiatan = kegiatan.uuid", 'left');
    return parent::findIn("{$this->table}.{$field}", $value);
  }

}