<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KegiatanPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'kegiatan_program';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'className' => 'text-right'),
      (object) array('mData' => 'kode_kegiatan', 'sTitle' => 'Kode', 'className' => 'text-right'),
      (object) array('mData' => 'uraian_kegiatan', 'sTitle' => 'Kegiatan', 'width' => '30%'),
      (object) array('mData' => 'pagu_format', 'sTitle' => 'Pagu', 'className' => 'text-right'),
      (object) array('mData' => 'jumlah_format', 'sTitle' => 'Realisasi', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'sisa', 'sTitle' => 'Sisa', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'prosentase', 'sTitle' => 'Penyerapan', 'searchable' => 'false', 'className' => 'text-right'),
    );

    $this->childs[] = array('label' => '', 'controller' => 'OutputProgram', 'model' => 'OutputPrograms');

  }

  function getListItem ($uuid) {
    $this->db
      ->select("{$this->table}.*")
      ->select("{$this->table}.program parent", false)
      ->select("FORMAT(SUM(vol*hargasat), 0) jumlah", false)
      ->select("GROUP_CONCAT(DISTINCT output_program.uuid) childUuid", false)
      ->select("'OutputProgram' childController", false)
      ->select('kegiatan.kode kode', false)
      ->select('kegiatan.uraian uraian', false)
      ->join('kegiatan', "{$this->table}.kegiatan = kegiatan.uuid", 'left')
      ->join('output_program', "{$this->table}.uuid = output_program.{$this->table}", 'left')
      ->join('sub_output_program', "output_program.uuid = sub_output_program.output_program", 'left')
      ->join('komponen_program', "sub_output_program.uuid = komponen_program.sub_output_program", 'left')
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
      ->select('kegiatan.kode as kode_kegiatan', false)
      ->select('kegiatan.uraian as uraian_kegiatan', false)
      ->select("CONCAT('Rp ', FORMAT(SUM(pagu), 0)) pagu_format", false)
      ->select("CONCAT('Rp ', FORMAT(SUM(hargasat * vol), 0)) jumlah_format", false)
      ->select("CONCAT('Rp ', FORMAT(IF(SUM(pagu) - SUM(hargasat * vol) > 0, SUM(pagu) - SUM(hargasat * vol), 0), 0)) as sisa")
      ->select("CONCAT(FORMAT(SUM(hargasat * vol) / SUM(pagu) * 100, 0), ' %') as prosentase")
      ->join('kegiatan', "{$this->table}.kegiatan = kegiatan.uuid", 'left')
      ->join('output_program', "{$this->table}.uuid = output_program.{$this->table}", 'left')
      ->join('sub_output_program', "output_program.uuid = sub_output_program.output_program", 'left')
      ->join('komponen_program', "sub_output_program.uuid = komponen_program.sub_output_program", 'left')
      ->join('sub_komponen_program', "komponen_program.uuid = sub_komponen_program.komponen_program", 'left')
      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('spj', "akun_program.uuid = spj.akun_program", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

}