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
      (object) array('mData' => 'total_spj', 'sTitle' => 'Jumlah', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency'),
      (object) array('mData' => 'paid', 'sTitle' => 'Dibayar', 'searchable' => 'false', 'className' => 'text-right'),
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
      'name' => 'ppn',
      'label'=> 'PPN',
      'attributes' => array(
        array('data-number' => 'true')
      ),
    );

    $this->form[]= array(
      'name' => 'pph',
      'label'=> 'PPH',
      'attributes' => array(
        array('data-number' => 'true')
      ),
    );

    $this->form[]= array(
      'name' => 'total_spj',
      'label'=> 'Total SPJ',
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
    if (isset ($data['payment_status'])) unset($data['payment_status']);
    if (isset ($data['status'])) {
      if ('verify' === $data['status']) {
        $data['unverify_reason'] = '';
        $this->verify($data['uuid']);
        $this->load->model('Jabatans');
        $jab = $this->Jabatans->findOne($this->session->userdata('jabatan'));
        if ($jab && empty ($jab['parent'])) $data['global_status'] = 'verified';
      } else if ('unverify' === $data['status']) $this->unverify($data['uuid']);
      unset($data['status']);
    }
    return parent::save($data);
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
    $changes = array();
    $prev = $this->db->get_where($this->table, array('uuid' => $data['uuid']))->row_array();
    foreach ($data as $field => $value) {
      if (isset ($prev[$field]) && $prev[$field] !== $value) $changes[] = array($field, $prev[$field], $value);
    }
    if (!empty ($changes)) {
      $this->db->where('uuid', $data['uuid'])->update($this->table, $data);
      $this->Spjlogs->create(array(
        'spj'   => $data['uuid'],
        'action'=> 'update'
      ));
    }
    return $data['uuid'];
  }

  function delete ($uuid) {
    $this->childs[] = array('label' => '', 'controller' => 'Payment', 'model' => 'Payments');
    return parent::delete($uuid);
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
      ->select("FORMAT(hargasat * vol + ppn + pph, 0) total_spj", false);
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
      ->select("{$this->table}.vol * {$this->table}.hargasat + {$this->table}.ppn + {$this->table}.pph as total_spj", false)
      ->select("SUM(payment_sent.paid_amount) as paid", false)
      ->select("{$this->table}.hargasat")
      ->group_by("{$this->table}.uuid")
      ->where("{$this->table}.uuid IS", 'NOT NULL', false)
      ->generate();
  }

  function getListItem ($uuid, $jabatanGroup = null) {
    $this->load->model('Users');
    $this->Users->filterListItem();
    $spj = $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("FORMAT(detail.vol * detail.hargasat, 0) as pagu", false)
      ->select("{$this->table}.detail parent", false)
      ->select("FORMAT({$this->table}.vol, 0) vol_format", false)
      ->select("FORMAT({$this->table}.hargasat, 0) hargasat_format", false)
      ->select("FORMAT({$this->table}.ppn, 0) ppn_format", false)
      ->select("FORMAT({$this->table}.pph, 0) pph_format", false)
      ->select("FORMAT({$this->table}.vol * {$this->table}.hargasat + {$this->table}.ppn + {$this->table}.pph, 0) total_spj", false)
      ->select("FORMAT(SUM(payment_sent.paid_amount), 0) as paid", false)
      ->select("'' childUuid", false)
      ->select("'' childController", false)
      ->select("''  kode", false)
      ->group_by("{$this->table}.uuid")
      ->get()
      ->row_array();
    $this->putStatus($spj);
    return $spj;
  }

  function putStatus (&$spj) {
    $this->load->model(array('Jabatans', 'Spjlogs'));
    $user = $this->session->all_userdata();
    $this->Jabatans->getUserAttr($user);
    $lastLog = $this->Spjlogs->getLastVerification($spj['uuid']);

    $spj['viewer'] = 'list';
    $spj['status'] = 'unverifiable';

    if ('verified' === $spj['global_status']) $spj['status'] = 'verified';
    else if (in_array($lastLog['user'], $user['atasan'])) {
      // if ('verify' === $lastLog['action']) $spj['status'] = 'verified';// let it wait for global status
      if ('unverify' === $lastLog['action']) {
        $spj['status'] = 'verifiable';
        $spj['viewer'] = 'form';
      }
    } else if (in_array($lastLog['user'], $user['letting'])) {

    } else if (in_array($lastLog['user'], $user['bawahan'])) {
      if ('verify' === $lastLog['action']) {
        $spj['status'] = 'verifiable';
        $spj['viewer'] = 'form';
      }
    }
    $this->load->model('Payments');
    $spj['payment_status'] = $this->Payments->getStatusPayment($spj['uuid'], $spj['hargasat'] * $spj['vol']);
  }

  function getCreator ($uuid) {
    $creator = $this->Spjlogs->findOne(array('spj' => $uuid, 'action' => 'create'));
    return $creator['user'];
  }

}