<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Breakdowns extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'jabatan_group';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Group Jabatan'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'className' => 'text-right', 'searchable' => false),
    );
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid, {$this->table}.urutan, {$this->table}.nama")
      ->select("IFNULL(SUM(detail.hargasat * detail.vol), 0) as pagu", false)
      ->join('assignment', "{$this->table}.uuid = assignment.jabatan_group", 'left')
      ->join('detail', 'detail.uuid = assignment.detail', 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

  function getListItem ($jabatanGroup) {
    $this->table = 'program';

    return $this->db
      ->select("{$this->table}.*")
      ->select("'' parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("SUM(spj_item.submitted_amount + spj.ppn + spj.pph) as total_spj", false)
      ->select("FORMAT(SUM(payment_sent.paid_amount), 0) as paid", false)
      ->select("GROUP_CONCAT(DISTINCT kegiatan.uuid) childUuid", false)
      ->select("'Kegiatan' childController", false)

      ->join('kegiatan', "program.uuid = kegiatan.program", 'left')
      ->join('output', "kegiatan.uuid = output.kegiatan", 'left')
      ->join('sub_output', "output.uuid = sub_output.output", 'left')
      ->join('komponen', "sub_output.uuid = komponen.sub_output", 'left')
      ->join('sub_komponen', "komponen.uuid = sub_komponen.komponen", 'left')
      ->join('akun', "sub_komponen.uuid = akun.sub_komponen", 'left')

      ->join('detail', "akun.uuid = detail.akun", 'left')
      ->join('spj', "detail.uuid = spj.detail", 'left')
      ->join('(SELECT payment.spj, SUM(payment.amount) as paid_amount FROM payment GROUP BY payment.spj) as payment_sent', "payment_sent.spj = spj.uuid", 'left')
      ->join('(SELECT item.spj, SUM(IFNULL(item.vol, 0) * IFNULL(item.hargasat, 0)) as submitted_amount FROM item GROUP BY item.spj) as spj_item', "spj_item.spj = spj.uuid", 'left')

      ->join('assignment', 'assignment.detail = detail.uuid', 'right')
      ->where('assignment.jabatan_group', $jabatanGroup)

      ->group_by("{$this->table}.uuid")
      ->get('program')
      ->row_array();
  }

}