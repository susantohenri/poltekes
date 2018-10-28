<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SubOutputPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'sub_output_program';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No'),
      (object) array('mData' => 'kode_sub_output', 'sTitle' => 'Kode'),
      (object) array('mData' => 'uraian_sub_output', 'sTitle' => 'Sub Output'),
      (object) array('mData' => 'jumlah_format', 'sTitle' => 'Jumlah', 'searchable' => 'false'),
    );

    $this->childs[] = array('label' => '', 'controller' => 'KomponenProgram', 'model' => 'KomponenPrograms');

  }

  function getListItem ($uuid) {
    $this->db
      ->select("{$this->table}.*")
      ->select("{$this->table}.output_program parent", false)
      ->select("FORMAT(SUM(vol*hargasat), 0) jumlah", false)
      ->select("GROUP_CONCAT(DISTINCT komponen_program.uuid) childUuid", false)
      ->select("'KomponenProgram' childController", false)
      ->select('sub_output.kode kode', false)
      ->select('sub_output.uraian uraian', false)
      ->join('sub_output', "{$this->table}.sub_output = sub_output.uuid", 'left')
      ->join('komponen_program', "{$this->table}.uuid = komponen_program.{$this->table}", 'left')
      ->join('sub_komponen_program', "komponen_program.uuid = sub_komponen_program.komponen_program", 'left')
      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('spj', "akun_program.uuid = spj.akun_program", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::getListItem ($uuid);
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select('sub_output.kode as kode_sub_output', false)
      ->select('sub_output.uraian as uraian_sub_output', false)
      ->select("CONCAT('Rp ', FORMAT(SUM(hargasat * vol), 0)) jumlah_format", false)
      ->join('sub_output', "{$this->table}.sub_output = sub_output.uuid", 'left')
      ->join('komponen_program', "{$this->table}.uuid = komponen_program.{$this->table}", 'left')
      ->join('sub_komponen_program', "komponen_program.uuid = sub_komponen_program.komponen_program", 'left')
      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('spj', "akun_program.uuid = spj.akun_program", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

}