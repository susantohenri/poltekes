<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'detail';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'uraian', 'sTitle' => 'Uraian'),
      (object) array('mData' => 'vol', 'sTitle' => 'Vol', 'className' => 'text-right'),
      (object) array('mData' => 'sat', 'sTitle' => 'Sat'),
      (object) array('mData' => 'hargasat', 'sTitle' => 'Harga', 'className' => 'text-right'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency'),
      (object) array('mData' => 'total_spj', 'sTitle' => 'SPJ', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency'),
      (object) array('mData' => 'paid', 'sTitle' => 'Dibayar', 'searchable' => 'false', 'className' => 'text-right'),
    );

    $this->form[]= array(
      'name' => 'uraian',
      'label'=> 'Uraian',
      'width'=> 5
    );

    $this->form[]= array(
      'name' => 'vol',
      'label'=> 'Vol',
      'attributes' => array(
        array('data-number' => 'true')
      ),
      'width'=> 1
    );

    $this->form[]= array(
      'name'    => 'sat',
      'label'   => 'Sat',
      'width'=> 1
    );

    $this->form[]= array(
      'name' => 'hargasat',
      'label'=> 'Harga Sat',
      'attributes' => array(
        array('data-number' => 'true')
      ),
      'width'=> 2
    );

    $this->form[]= array(
      'name' => 'pagu',
      'label'=> 'Pagu',
      'value'=> 0,
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
      'width'=> 2
    );

    // $this->form[]= array(
    //   'name' => 'total_spj',
    //   'label'=> 'SPJ',
    //   'value'=> 0,
    //   'attributes' => array(
    //     array('disabled' => 'disabled'),
    //     array('data-number' => 'true')
    //   ),
    //   'width'=> 2
    // );

    $this->childs[] = array('label' => '', 'controller' => 'Spj', 'model' => 'Spjs');

  }

  function findOne ($param) {
    $param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
    $this->db
      ->select("{$this->table}.*")
      ->select("FORMAT({$this->table}.vol, 0) vol", false)
      ->select("FORMAT({$this->table}.hargasat, 0) hargasat", false)
      ->select("FORMAT({$this->table}.hargasat * {$this->table}.vol, 0) pagu", false)
      ->select("FORMAT(SUM(spj_item.submitted_amount + spj.ppn + spj.pph), 0) total_spj", false)
      ->join('spj', "{$this->table}.uuid = spj.detail", 'left')
      ->join('(SELECT item.spj, SUM(IFNULL(item.vol, 0) * IFNULL(item.hargasat, 0)) as submitted_amount FROM item GROUP BY item.spj) as spj_item', "spj_item.spj = spj.uuid", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::findOne($param);
  }

  function dt () {
    $this->load->model('Users');
    $this->Users->filterByJabatan($this->datatables);
    return 
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.uraian")
      ->select("{$this->table}.vol")
      ->select("{$this->table}.sat")
      ->select("{$this->table}.hargasat")
      ->select("{$this->table}.hargasat * {$this->table}.vol as pagu", false)
      ->select("SUM(spj_item.submitted_amount + spj.ppn + spj.pph) as total_spj", false)
      ->select("SUM(payment_sent.paid_amount) as paid", false)
      ->group_by("{$this->table}.uuid")
      ->generate();
  }

  function getListItem ($uuid, $jabatanGroup = null) {
    $this->load->model('Users');
    if (!is_null($jabatanGroup)) {
      $this->Users->joinRelatedTables($this->db);
      $this->db
      ->join('assignment', 'assignment.detail = detail.uuid', 'right')
      ->where('assignment.jabatan_group', $jabatanGroup);
    } else $this->Users->filterByJabatan($this->db);
    return $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("{$this->table}.akun parent", false)
      ->select("FORMAT({$this->table}.vol, 0) vol_format", false)
      ->select("FORMAT({$this->table}.hargasat, 0) hargasat_format", false)
      ->select("FORMAT({$this->table}.vol * {$this->table}.hargasat, 0) pagu", false)
      ->select("SUM(spj_item.submitted_amount + spj.ppn + spj.pph) as total_spj", false)
      ->select("FORMAT(SUM(payment_sent.paid_amount), 0) as paid", false)
      ->select("GROUP_CONCAT(DISTINCT spj.uuid) childUuid", false)
      ->select("'Spj' childController", false)
      ->select("''  kode", false)
      ->group_by("{$this->table}.uuid")
      ->get()
      ->row_array();
  }

  function updateByList ($data) {
    foreach ($data as $uuid => $child) {
      $child = array('uuid' => $uuid) + $child;
      foreach ($child as &$c) if (is_array ($c)) $c = implode(',', str_replace(',', '[comma-replacement]', $c));
      $this->update($child);
    }
  }

  function delete ($uuid) {
    parent::delete($uuid);
    $this->db
      ->where('detail', $uuid)
      ->delete('assignment');
  }

}