<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KomponenPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'komponen_program';

    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No'),
      (object) array('mData' => 'kode_komponen', 'sTitle' => 'Kode'),
      (object) array('mData' => 'uraian_komponen', 'sTitle' => 'Komponen'),
      (object) array('mData' => 'jumlah_format', 'sTitle' => 'Jumlah'),
    );

    $this->childs[] = array('label' => '', 'controller' => 'SubKomponenProgram', 'model' => 'SubKomponenPrograms');

  }

  function getListItem ($uuid) {
    $this->db
      ->select("{$this->table}.*")
      ->select("{$this->table}.sub_output_program parent", false)
      ->select("FORMAT(SUM(vol*hargasat), 0) jumlah", false)
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
    $this->db
      ->select("{$this->table}.*")
      ->select('komponen.kode kode_komponen', false)
      ->select('komponen.uraian uraian_komponen', false)
      ->select("CONCAT('Rp ', FORMAT(SUM(hargasat * vol), 0)) jumlah_format", false)
      ->join('komponen', "{$this->table}.komponen = komponen.uuid", 'left')
      ->join('sub_komponen_program', "{$this->table}.uuid = sub_komponen_program.{$this->table}", 'left')
      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('spj', "akun_program.uuid = spj.akun_program", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

}