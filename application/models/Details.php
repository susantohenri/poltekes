<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'detail';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'uraian', 'sTitle' => 'Detail'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency', 'width' => '14%'),
      (object) array('mData' => 'total_spj', 'sTitle' => 'SPJ', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency', 'width' => '14%'),
      (object) array('mData' => 'paid', 'sTitle' => 'Dibayar', 'searchable' => 'false', 'className' => 'text-right', 'width' => '14%'),
      (object) array('mData' => 'nama_jabatan_group', 'sTitle' => 'Breakdown', 'searchable' => false),
    );

    $this->form[]= array(
      'name' => 'akun',
      'label'=> 'Akun',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Akuns'),
        array('data-field' => 'uraian')
      ),
      'width' => 6
    );

    $this->form[]= array(
      'name' => 'uraian',
      'label'=> 'Uraian',
      'width'=> 6
    );

    $this->form[]= array(
      'name' => 'vol',
      'label'=> 'Volume',
      'attributes' => array(
        array('data-number' => 'true')
      ),
      'width'=> 3
    );

    $this->form[]= array(
      'name'    => 'sat',
      'label'   => 'Satuan',
      'width'=> 2
    );

    $this->form[]= array(
      'name' => 'hargasat',
      'label'=> 'Harga Satuan',
      'attributes' => array(
        array('data-number' => 'true')
      ),
      'width'=> 3
    );

    $this->form[]= array(
      'name' => 'pagu',
      'label'=> 'Pagu',
      'value'=> 0,
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
      'width'=> 4
    );

    $this->form[]= array(
      'name' => 'total_spj',
      'label'=> 'Total SPJ',
      'value'=> 0,
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
      'width'=> 2
    );

    $this->childs[] = array('label' => '', 'controller' => 'Spj', 'model' => 'Spjs', 'label' => 'SPJ');

  }

  function findOne ($param) {
    $param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
    $this->db
      ->select("{$this->table}.*")
      ->select("FORMAT({$this->table}.vol, 0) vol", false)
      ->select("FORMAT({$this->table}.hargasat, 0) hargasat", false)
      ->select("FORMAT({$this->table}.hargasat * {$this->table}.vol, 0) pagu", false)
      ->select("FORMAT(SUM(IFNULL(spj_lampiran.submitted_amount, 0) + spj.ppn + spj.pph), 0) total_spj", false)
      ->join('spj', "{$this->table}.uuid = spj.detail", 'left')
      ->join('(SELECT lampiran.spj, SUM(IFNULL(lampiran.vol, 0) * IFNULL(lampiran.hargasat, 0)) as submitted_amount FROM lampiran GROUP BY lampiran.spj) as spj_lampiran', "spj_lampiran.spj = spj.uuid", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::findOne($param);
  }

  function dt () {
    $this->load->model('Users');
    $this->Users->filterByJabatan($this->datatables, $this->table);
    return
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.uraian")
      ->select("{$this->table}.hargasat * {$this->table}.vol as pagu", false)
      ->select("SUM(spj_lampiran.submitted_amount + spj.ppn + spj.pph) as total_spj", false)
      ->select("SUM(payment_sent.paid_amount) as paid", false)

      ->select('jabatan_group.nama nama_jabatan_group', false)
      ->join('assignment', "{$this->table}.uuid = assignment.detail", 'left')
      ->join('jabatan_group', 'assignment.jabatan_group = jabatan_group.uuid', 'left')

      ->group_by("{$this->table}.uuid")
      ->generate();
  }

  function getListItem ($uuid, $jabatanGroup = null) {
    $this->load->model('Users');
    if (!is_null($jabatanGroup)) $this->Users->filterByJabatanGroup($this->db, $this->table, $jabatanGroup);
    else $this->Users->filterByJabatan($this->db);
    return $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("{$this->table}.akun parent", false)
      ->select("FORMAT({$this->table}.vol, 0) vol_format", false)
      ->select("FORMAT({$this->table}.hargasat, 0) hargasat_format", false)
      ->select("FORMAT({$this->table}.vol * {$this->table}.hargasat, 0) pagu", false)
      ->select("FORMAT(SUM(spj_lampiran.submitted_amount + spj.ppn + spj.pph), 0) as total_spj", false)
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

  function getForm ($uuid = false, $isSubform = false) {
    if ($isSubform) {
      unset($this->form[0]);
      unset($this->form[count ($this->form)]);
    }
    return parent::getForm ($uuid, $isSubform);
  }

  function getSisaPagu ($detail, $spj) {
    $this->db->where('detail.uuid', $detail);
    if ($spj) $this->db->where('spj.uuid <>', $spj);
    $calc = $this->db
      ->select('detail.vol * detail.hargasat - IFNULL(SUM(IFNULL(lampiran.vol, 0) * IFNULL(lampiran.hargasat, 0)) + SUM(IFNULL(spj.pph, 0) + IFNULL(spj.ppn, 0)), 0) as sisaPagu', false)
      ->join('spj', 'detail.uuid = spj.detail', 'left')
      ->join('lampiran', 'spj.uuid = lampiran.spj', 'left')
      ->get($this->table)
      ->row_array();
    return (int) $calc['sisaPagu'];
  }

  function select2 ($field, $term) {
    return $this->db
      ->select("{$this->table}.uuid as id", false)
      ->select("{$this->table}.{$field} as text", false)
      ->join('assignment', "{$this->table}.uuid = assignment.detail", 'left')
      ->join('jabatan_group', 'assignment.jabatan_group = jabatan_group.uuid', 'left')
      ->join('jabatan', 'jabatan.jabatan_group = jabatan_group.uuid', 'left')
      ->limit(10)
      ->where('jabatan.uuid', $this->session->userdata('jabatan'))
      ->like($field, $term)->get($this->table)->result();
  }

}
