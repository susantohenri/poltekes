<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SubOutputs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'sub_output';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'kode_sub_output', 'sTitle' => 'Kode', 'className' => 'text-right', 'width' => '5%'),
      (object) array('mData' => 'uraian_sub_output', 'sTitle' => 'Sub Output', 'width' => '50%'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'className' => 'text-right', 'searchable' => false, 'width' => '15%'),
      (object) array('mData' => 'total_spj', 'sTitle' => 'SPJ', 'searchable' => 'false', 'className' => 'text-right', 'width' => '15%'),
      (object) array('mData' => 'paid', 'sTitle' => 'Dibayar', 'searchable' => 'false', 'className' => 'text-right', 'width' => '15%'),
    );
    $this->form = array();
    $this->form[]= array(
      'name' => 'output',
      'label'=> 'Output',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Outputs'), 
        array('data-field' => 'uraian')
      ),
    );
    $this->form[]= array(
      'name' => 'kode',
      'label'=> 'Kode',
    );
    $this->form[]= array(
      'name' => 'uraian',
      'label'=> 'Uraian',
      'width'=> 9
    );
    $this->childs[] = array('label' => '', 'controller' => 'Komponen', 'model' => 'Komponens');

  }

  function getListItem ($uuid, $jabatanGroup = null) {
    $this->load->model('Users');
    if (!is_null($jabatanGroup)) $this->Users->filterByJabatanGroup($this->db, $this->table, $jabatanGroup);
    else $this->Users->filterByJabatan($this->db);
    return $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("{$this->table}.output parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("FORMAT(SUM(spj_lampiran.submitted_amount + spj.ppn + spj.pph), 0) as total_spj", false)
      ->select("FORMAT(SUM(payment_sent.paid_amount), 0) as paid", false)
      ->select("GROUP_CONCAT(DISTINCT komponen.uuid) childUuid", false)
      ->select("'Komponen' childController", false)
      ->select('sub_output.kode kode', false)
      ->select('sub_output.uraian uraian', false)
      ->group_by("{$this->table}.uuid")
      ->get()
      ->row_array();
  }

  function dt () {
    $this->load->model('Users');
    $this->Users->filterByJabatan($this->datatables, $this->table);
    return $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select('sub_output.kode as kode_sub_output', false)
      ->select('sub_output.uraian as uraian_sub_output', false)
      ->select("SUM(detail.hargasat * detail.vol) as pagu", false)
      ->select("FORMAT(SUM(spj_lampiran.submitted_amount + spj.ppn + spj.pph), 0) as total_spj", false)
      ->select("SUM(payment_sent.paid_amount) as paid", false)
      ->group_by("{$this->table}.uuid")
      ->generate();
  }

  function select2 ($field, $term) {
    return $this->db
      ->select("{$this->table}.uuid id", false)
      ->select("CONCAT(sub_output.kode, ' - ', sub_output.uraian) text", false)
      ->limit(10)
      ->like("CONCAT(sub_output.kode, ' - ', sub_output.uraian)", $term)
      ->get($this->table)->result();
  }

  function findIn ($field, $value) {
    $this->db
      ->select("{$this->table}.*")
      ->select("CONCAT({$this->table}.kode, ' - ', {$this->table}.uraian) uraian", false);
    return parent::findIn("{$this->table}.{$field}", $value);
  }

  function getForm ($uuid = false, $isSubform = false) {
    if ($isSubform) unset($this->form[0]);
    return parent::getForm ($uuid, $isSubform);
  }

}