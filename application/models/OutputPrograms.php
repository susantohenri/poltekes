<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OutputPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'output_program';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No'),
      (object) array('mData' => 'kode_output', 'sTitle' => 'Kode'),
      (object) array('mData' => 'uraian_output', 'sTitle' => 'Output'),
      (object) array('mData' => 'jumlah_format', 'sTitle' => 'Jumlah'),
    );

    $this->childs[] = array('label' => '', 'controller' => 'SubOutputProgram', 'model' => 'SubOutputPrograms');

  }

  function getListItem ($uuid) {
    $this->db
      ->select("{$this->table}.*")
      ->select("{$this->table}.kegiatan_program parent", false)
      ->select("FORMAT(SUM(vol*hargasat), 0) jumlah", false)
      ->select("GROUP_CONCAT(DISTINCT sub_output_program.uuid) childUuid", false)
      ->select("'SubOutputProgram' childController", false)
      ->select('output.kode kode', false)
      ->select('output.uraian uraian', false)
      ->join('output', "{$this->table}.output = output.uuid", 'left')
      ->join('sub_output_program', "{$this->table}.uuid = sub_output_program.{$this->table}", 'left')
      ->join('komponen_program', "sub_output_program.uuid = komponen_program.sub_output_program", 'left')
      ->join('sub_komponen_program', "komponen_program.uuid = sub_komponen_program.komponen_program", 'left')
      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('spj', "akun_program.uuid = spj.akun_program", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::getListItem ($uuid);
  }

  function dt () {
    $this->db
      ->select("{$this->table}.*")
      ->select('output.kode kode_output', false)
      ->select('output.uraian uraian_output', false)
      ->select("CONCAT('Rp ', FORMAT(SUM(hargasat * vol), 0)) jumlah_format", false)
      ->join('output', "{$this->table}.output = output.uuid", 'left')
      ->join('sub_output_program', "{$this->table}.uuid = sub_output_program.{$this->table}", 'left')
      ->join('komponen_program', "sub_output_program.uuid = komponen_program.sub_output_program", 'left')
      ->join('sub_komponen_program', "komponen_program.uuid = sub_komponen_program.komponen_program", 'left')
      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('spj', "akun_program.uuid = spj.akun_program", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

}