<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akuns extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'akun';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'kode_akun', 'sTitle' => 'Kode', 'className' => 'text-right', 'width' => '5%'),
      (object) array('mData' => 'nama_akun', 'sTitle' => 'Akun', 'width' => '50%'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'className' => 'text-right', 'searchable' => false, 'width' => '15%'),
      (object) array('mData' => 'total_spj', 'sTitle' => 'SPJ', 'searchable' => 'false', 'className' => 'text-right', 'width' => '15%'),
      (object) array('mData' => 'paid', 'sTitle' => 'Dibayar', 'searchable' => 'false', 'className' => 'text-right', 'width' => '15%'),
    );

    $this->form = array();
    $this->form[]= array(
      'name' => 'sub_komponen',
      'label'=> 'Sub Komponen',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'SubKomponens'), 
        array('data-field' => 'uraian')
      ),
    );
    $this->form[]= array(
      'name' => 'kode',
      'label'=> 'Kode',
    );
    $this->form[]= array(
      'name' => 'nama',
      'label'=> 'Uraian',
      'width'=> 9
    );
    $this->childs[] = array('label' => '', 'controller' => 'Detail', 'model' => 'Details');

  }

  function getListItem ($uuid) {
    $this->load->model('Users');
    $this->Users->filterListItem();
    return $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("{$this->table}.sub_komponen parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("FORMAT(SUM(spj.vol * spj.hargasat + spj.ppn + spj.pph), 0) total_spj", false)
      ->select("FORMAT(SUM(payment_sent.paid_amount), 0) as paid", false)
      ->select("GROUP_CONCAT(DISTINCT detail.uuid) childUuid", false)
      ->select("'Detail' childController", false)
      ->select('akun.kode kode', false)
      ->select('akun.nama uraian', false)
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
      ->select('akun.kode as kode_akun', false)
  		->select('akun.nama as nama_akun', false)
      ->select("SUM(detail.hargasat * detail.vol) as pagu", false)
      ->select("SUM(spj.hargasat * spj.vol + spj.ppn + spj.pph) as total_spj", false)
      ->select("SUM(payment_sent.paid_amount) as paid", false)
  		->group_by("{$this->table}.uuid")
      ->generate();
  }

  function select2 ($field, $term) {
    return $this->db
      ->select("{$this->table}.uuid id", false)
      ->select("CONCAT(akun.kode, ' - ', akun.uraian) text", false)
      ->limit(10)
      ->like("CONCAT(akun.kode, ' - ', akun.uraian)", $term)
      ->join('akun', "{$this->table}.akun = akun.uuid", 'left')
      ->get($this->table)->result();
  }

  function getForm ($uuid = false, $isSubform = false) {
    if ($isSubform) unset($this->form[0]);
    return parent::getForm ($uuid, $isSubform);
  }
}