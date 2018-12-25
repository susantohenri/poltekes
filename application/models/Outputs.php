<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Outputs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'output';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'kode_output', 'sTitle' => 'Kode', 'className' => 'text-right', 'width' => '5%'),
      (object) array('mData' => 'uraian_output', 'sTitle' => 'Output', 'width' => '50%'),
      (object) array('mData' => 'detail_sat', 'sTitle' => 'Satuan', 'width' => '10%'),
      (object) array('mData' => 'detail_vol', 'sTitle' => 'Pagu', 'className' => 'text-right', 'searchable' => 'false'),
      (object) array('mData' => 'spj_vol', 'sTitle' => 'SPJ', 'className' => 'text-right', 'searchable' => 'false'),
    );
    $this->form = array();
    $this->form[]= array(
      'name' => 'kegiatan',
      'label'=> 'Kegiatan',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Kegiatans'), 
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
    $this->childs[] = array('label' => '', 'controller' => 'SubOutput', 'model' => 'SubOutputs');

  }

  function getListItem ($uuid) {
    $this->load->model('Users');
    $this->Users->filterListItem();
    return $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("{$this->table}.kegiatan parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("FORMAT(SUM(spj.vol * spj.hargasat + spj.ppn + spj.pph), 0) total_spj", false)
      ->select("FORMAT(SUM(payment_sent.paid_amount), 0) as paid", false)
      ->select("GROUP_CONCAT(DISTINCT sub_output.uuid) childUuid", false)
      ->select("'SubOutput' childController", false)
      ->select('output.kode kode', false)
      ->select('output.uraian uraian', false)
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
      ->select('output.kode as kode_output', false)
      ->select('output.uraian as uraian_output', false)

      ->select('SUM(detail.vol) as detail_vol', false)
      ->select('detail.sat as detail_sat', false)
      ->select('SUM(spj.vol) as spj_vol', false)
      ->select('spj.sat as spj_sat', false)
      ->group_by("{$this->table}.uuid")
      ->generate();
  }

  function select2 ($field, $term) {
    return $this->db
      ->select("{$this->table}.uuid id", false)
      ->select("CONCAT(output.kode, ' - ', output.uraian) text", false)
      ->limit(10)
      ->like("CONCAT(output.kode, ' - ', output.uraian)", $term)
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