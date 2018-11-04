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
      (object) array('mData' => 'realisasi', 'sTitle' => 'Realisasi', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency'),
      (object) array('mData' => 'sisa', 'sTitle' => 'Sisa', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'prosentase', 'sTitle' => 'Serapan', 'searchable' => 'false', 'className' => 'text-right')
    );

    $this->form[]= array(
      'name' => 'uraian',
      'label'=> 'Uraian',
      'width'=> 4
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
    );

    $this->form[]= array(
      'name' => 'hargasat',
      'label'=> 'Harga Sat',
      'attributes' => array(
        array('data-number' => 'true')
      ),
    );

    $this->form[]= array(
      'name' => 'pagu',
      'label'=> 'Pagu',
      'value'=> 0,
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
    );

    $this->form[]= array(
      'name' => 'realisasi',
      'label'=> 'Realisasi',
      'value'=> 0,
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
    );

    $this->childs[] = array('label' => '', 'controller' => 'Spj', 'model' => 'Spjs');

  }

  function findOne ($param) {
    $param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
    $this->db
      ->select("{$this->table}.*")
      ->select("FORMAT({$this->table}.vol, 0) vol", false)
      ->select("FORMAT({$this->table}.hargasat, 0) hargasat", false)
      ->select("FORMAT({$this->table}.hargasat * {$this->table}.vol, 0) pagu", false)
      ->select("FORMAT(SUM(spj.hargasat * spj.vol), 0) realisasi", false)
      ->join('spj', "{$this->table}.uuid = spj.detail", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::findOne($param);
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.uraian")
      ->select("{$this->table}.vol")
      ->select("{$this->table}.sat")
      ->select("{$this->table}.hargasat")
      ->select("{$this->table}.hargasat * {$this->table}.vol as pagu", false)
      ->select("SUM(spj.vol * spj.hargasat) realisasi")
      ->select("IF(SUM(detail.hargasat * detail.vol) - SUM(spj.hargasat * spj.vol) > 0, SUM(detail.hargasat * detail.vol) - SUM(spj.hargasat * spj.vol), 0) as sisa")
      ->select("SUM(spj.hargasat * spj.vol) / SUM(detail.hargasat * detail.vol) * 100 as prosentase")
      ->join('spj', "{$this->table}.uuid = spj.detail", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

  function getListItem ($uuid) {
    $this->db
      ->select("{$this->table}.*")
      ->select("{$this->table}.akun_program parent", false)
      ->select("FORMAT({$this->table}.vol, 0) vol_format", false)
      ->select("FORMAT({$this->table}.hargasat, 0) hargasat_format", false)
      ->select("FORMAT({$this->table}.vol * {$this->table}.hargasat, 0) pagu", false)
      ->select("FORMAT(spj.vol * spj.hargasat, 0) realisasi", false)
      ->select("GROUP_CONCAT(DISTINCT spj.uuid) childUuid", false)
      ->select("'Spj' childController", false)
      ->select("''  kode", false)
      ->join('spj', "{$this->table}.uuid = spj.detail", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::getListItem ($uuid);
  }

  function updateByList ($data) {
    foreach ($data as $uuid => $child) {
      $child = array('uuid' => $uuid) + $child;
      foreach ($child as &$c) if (is_array ($c)) $c = implode(',', $c);
      $this->update($child);
    }
  }

}