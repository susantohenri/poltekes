<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KomponenPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'komponen_program';

    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'className' => 'text-right'),
      (object) array('mData' => 'kode_komponen', 'sTitle' => 'Kode', 'className' => 'text-right'),
      (object) array('mData' => 'uraian_komponen', 'sTitle' => 'Komponen'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'className' => 'text-right'),
      (object) array('mData' => 'realisasi', 'sTitle' => 'Realisasi', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'sisa', 'sTitle' => 'Sisa', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'prosentase', 'sTitle' => 'Penyerapan', 'searchable' => 'false', 'className' => 'text-right')
    );

    $this->childs[] = array('label' => '', 'controller' => 'SubKomponenProgram', 'model' => 'SubKomponenPrograms');

  }

  function getListItem ($uuid) {
    $this->db
      ->select("{$this->table}.*")
      ->select("{$this->table}.sub_output_program parent", false)
      ->select("FORMAT(SUM(pagu), 0) pagu", false)
      ->select("FORMAT(SUM(vol*hargasat), 0) realisasi", false)
      ->select("GROUP_CONCAT(DISTINCT sub_komponen_program.uuid) childUuid", false)
      ->select("'SubKomponenProgram' childController", false)
      ->select('komponen.kode kode', false)
      ->select('komponen.uraian uraian', false)
      ->join('komponen', "{$this->table}.komponen = komponen.uuid", 'left')
      ->join('sub_komponen_program', "{$this->table}.uuid = sub_komponen_program.{$this->table}", 'left')
      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('spj', "akun_program.uuid = spj.akun_program", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::getListItem ($uuid);
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select('komponen.kode as kode_komponen', false)
      ->select('komponen.uraian as uraian_komponen', false)
      ->select('akun_program.pagu')
      ->select("SUM(hargasat * vol) as realisasi", false)
      ->select("IF(SUM(pagu) - SUM(hargasat * vol) > 0, SUM(pagu) - SUM(hargasat * vol), 0) as sisa")
      ->select("SUM(hargasat * vol) / SUM(pagu) * 100 as prosentase")
      ->join('komponen', "{$this->table}.komponen = komponen.uuid", 'left')
      ->join('sub_komponen_program', "{$this->table}.uuid = sub_komponen_program.{$this->table}", 'left')
      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('spj', "akun_program.uuid = spj.akun_program", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

}