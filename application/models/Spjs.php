<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spjs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'spj';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'uraian', 'sTitle' => 'Uraian'),
      (object) array('mData' => 'vol', 'sTitle' => 'Vol', 'className' => 'text-right'),
      (object) array('mData' => 'sat', 'sTitle' => 'Sat'),
      (object) array('mData' => 'hargasat', 'sTitle' => 'Harga', 'className' => 'text-right'),
      (object) array('mData' => 'realisasi', 'sTitle' => 'Jumlah', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency'),
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
      'name' => 'realisasi',
      'label'=> 'Realisasi',
      'value'=> 0,
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
    );

    $this->childs[] = array('label' => '', 'controller' => 'Spjlog', 'model' => 'Spjlogs');
    $this->load->model('Spjlogs');
  }

  function save ($data) {
    if (isset ($data['status'])) {
      if ('verify' === $data['status']) $this->verify($data['uuid']);
      else if ('unverify' === $data['status']) $this->unverify($data['uuid']);
      unset($data['status']);
    }
    if (isset ($data['uraian'])) return parent::save($data);
    else return $data['uuid'];
  }

  function create ($data) {
    $result = parent::create($data);
    $this->Spjlogs->create(array(
      'spj'   => $result,
      'action'=> 'create'
    ));
    $this->verify($result);
    return $result;
  }

  function update ($data) {
    $this->db->where('uuid', $data['uuid'])->update($this->table, $data);
    $this->Spjlogs->create(array(
      'spj'   => $data['uuid'],
      'action'=> 'update'
    ));
    return $result;
  }

  function verify ($uuid) {
    $this->Spjlogs->create(array(
      'spj'   => $uuid,
      'action'=> 'verify'
    ));
  }

  function unverify ($uuid) {
    $this->Spjlogs->create(array(
      'spj'   => $uuid,
      'action'=> 'unverify'
    ));
  }

  function findOne ($param) {
    $this->db
      ->select("{$this->table}.*")
      ->select("FORMAT({$this->table}.vol, 0) vol")
      ->select("FORMAT({$this->table}.hargasat, 0) hargasat")
      ->select("{$this->table}.detail parent", false)
      ->select("FORMAT(hargasat * vol, 0) realisasi", false);
    return parent::findOne($param);
  }

  function dt () {
    $this->load->model('Users');
    $this->Users->filterDt();
    return $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.uraian")
      ->select("{$this->table}.vol")
      ->select("{$this->table}.sat")
      ->select("{$this->table}.vol * {$this->table}.hargasat as realisasi", false)
      ->select("{$this->table}.hargasat")
      ->group_by("{$this->table}.uuid")
      ->where("{$this->table}.uuid IS", 'NOT NULL', false)
      ->generate();
  }

  function getListItem ($uuid) {
    $this->load->model('Users');
    $this->Users->filterListItem();
    $spj = $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("FORMAT(detail.vol * detail.hargasat, 0) as pagu", false)
      ->select("{$this->table}.detail parent", false)
      ->select("FORMAT({$this->table}.vol, 0) vol_format", false)
      ->select("FORMAT({$this->table}.hargasat, 0) hargasat_format", false)
      ->select("FORMAT({$this->table}.vol * {$this->table}.hargasat, 0) realisasi", false)
      ->select("'' childUuid", false)
      ->select("'' childController", false)
      ->select("''  kode", false)
      ->group_by("{$this->table}.uuid")
      ->get()
      ->row_array();
    $this->setStatus($spj);
    return $spj;
  }

  function setStatus (&$spj) {
    $this->load->model(array('Jabatans', 'Spjlogs'));
    $user = $this->session->all_userdata();
    $this->Jabatans->getUserAttr($user);
    $lastLog = $this->Spjlogs->getLast($spj['uuid']);

    $spj['viewer'] = 'list';
    $spj['status'] = 'unverifiable';
    if (in_array($lastLog['user'], $user['atasan'])) {
      if ('verify' === $lastLog['action']) $spj['status'] = 'verified';
      if ('unverify' === $lastLog['action']) {
        $spj['status'] = 'verifiable';
        $spj['viewer'] = 'form';
      }
    } else if (in_array($lastLog['user'], $user['letting'])) {

    } else if (in_array($lastLog['user'], $user['bawahan'])) {
      if ('verify' === $lastLog['action']) $spj['status'] = 'verifiable';
    }
    if (0 == $user['allow_edit_spj']) $spj['viewer'] = 'list';
  }

}