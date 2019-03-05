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
      'name' => 'uraian',
      'label'=> 'Uraian',
      'width'=> 9
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
    $this->childs[] = array('label' => '', 'controller' => 'Detail', 'model' => 'Details');

  }

  function findOne ($param) {
    $param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
    $this->db
      ->select("{$this->table}.*")
      ->select('FORMAT(SUM(IFNULL(vol, 0) * IFNULL(hargasat, 0)), 0) pagu')
      ->join('detail', "{$this->table}.uuid = detail.akun", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::findOne($param);
  }

  function getListItem ($uuid, $jabatanGroup = null) {
    $this->load->model('Users');
    if (!is_null($jabatanGroup)) $this->Users->filterByJabatanGroup($this->db, $this->table, $jabatanGroup);
    else $this->Users->filterByJabatan($this->db);
    return $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("{$this->table}.sub_komponen parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("FORMAT(SUM(spj_lampiran.submitted_amount + spj.ppn + spj.pph), 0) as total_spj", false)
      ->select("FORMAT(SUM(payment_sent.paid_amount), 0) as paid", false)
      ->select("GROUP_CONCAT(DISTINCT detail.uuid) childUuid", false)
      ->select("'Detail' childController", false)
      ->select('akun.kode kode', false)
      ->select('akun.uraian', false)
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
      ->select('akun.kode as kode_akun', false)
  		->select('akun.uraian as nama_akun', false)
      ->select("SUM(detail.hargasat * detail.vol) as pagu", false)
      ->select("SUM(spj_lampiran.submitted_amount + spj.ppn + spj.pph) as total_spj", false)
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
      ->get($this->table)->result();
  }

  function findIn ($field, $value) {
    $this->db
      ->select("{$this->table}.*")
      ->select("CONCAT({$this->table}.kode, ' - ', {$this->table}.uraian) uraian", false);
    return parent::findIn("{$this->table}.{$field}", $value);
  }

  function getForm ($uuid = false, $isSubform = false) {
    if ($isSubform) {
      unset($this->form[0]);
      unset($this->form[count ($this->form)]);
    }
    return parent::getForm ($uuid, $isSubform);
  }
}
