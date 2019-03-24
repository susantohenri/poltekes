<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spjs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'spj';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'uraian', 'sTitle' => 'SPJ'),
      (object) array('mData' => 'total_spj', 'sTitle' => 'Jumlah', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency', 'width' => '14%'),
      (object) array('mData' => 'paid', 'sTitle' => 'Dibayar', 'searchable' => 'false', 'className' => 'text-right', 'width' => '14%'),
      (object) array('mData' => 'nama_jabatan_group', 'sTitle' => 'Breakdown'),
    );

    $this->form[]= array(
      'name' => 'detail',
      'label'=> 'Detail',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Details'),
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
      'name' => 'ppn',
      'label'=> 'PPN',
      'attributes' => array(
        array('data-number' => 'true')
      ),
      'width' => 3
    );

    $this->form[]= array(
      'name' => 'pph',
      'label'=> 'PPH',
      'attributes' => array(
        array('data-number' => 'true')
      ),
      'width' => 3
    );

    $this->form[]= array(
      'name' => 'total_lampiran',
      // 'type' => 'hidden',
      'label'=> 'Total Lampiran',
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
      'width' => 5
    );

    $this->form[]= array(
      'name' => 'total_spj',
      'label'=> 'Total SPJ',
      'value'=> 0,
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
      'width' => 5
    );

    $this->form[]= array(
      'name' => 'sisa_pagu',
      'label'=> 'Sisa Pagu',
      'value'=> 0,
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
    );

    $this->childs[] = array('label' => '', 'controller' => 'Lampiran', 'model' => 'Lampirans');
    $this->childs[] = array('label' => '', 'controller' => 'SpjLog', 'model' => 'SpjLogs');
    $this->childs[] = array('label' => '', 'controller' => 'Payment', 'model' => 'Payments');
    $this->load->model('Spjlogs');
  }

  function _save ($data) {
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
    $this->load->model('Lampirans');
    $uuid = $data['uuid'];
    $spj_before = $this->findOne($uuid);
    $lampiran_before = $this->Lampirans->find(array('spj' => $uuid));

    parent::update($data);

    $spj_after = $this->findOne($uuid);
    $lampiran_after = $this->Lampirans->find(array('spj' => $uuid));

    if (json_encode($spj_before) != json_encode($spj_after) || json_encode($lampiran_before) != json_encode($lampiran_after)) $this->Spjlogs->create(array(
      'spj'   => $data['uuid'],
      'action'=> 'update'
    ));

    return $data['uuid'];
  }

  function _delete ($uuid) {
    $this->childs[] = array('label' => '', 'controller' => 'Payment', 'model' => 'Payments');
    return parent::delete($uuid);
  }

  function verify ($uuid) {
    $this->Spjlogs->create(array(
      'spj'   => $uuid,
      'action'=> 'verify'
    ));
    $this->db->where('uuid', $uuid)->set('unverify_reason', '')->update($this->table);
  }

  function unverify ($uuid, $unverify_reason) {
    $this->Spjlogs->create(array(
      'spj'   => $uuid,
      'action'=> 'unverify'
    ));
    if (strlen($unverify_reason) > 0) $this->db->where('uuid', $uuid)->set('unverify_reason', $unverify_reason)->update($this->table);
  }

  function findOne ($param) {
    $param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
    $this->db
      ->select("0 sisa_pagu", false)// fullfilled by ajax
      ->select("{$this->table}.*")
      ->select("{$this->table}.detail parent", false)
      ->select('FORMAT(ppn, 0) ppn', false)
      ->select('FORMAT(pph, 0) pph', false)
      ->select("FORMAT(SUM(IFNULL(lampiran.hargasat, 0) * IFNULL(lampiran.vol, 0)) + ppn + pph, 0) total_spj", false)
      ->select('FORMAT(SUM(IFNULL(lampiran.hargasat, 0) * IFNULL(lampiran.vol, 0)), 0) total_lampiran', false)
      ->join('lampiran', "lampiran.spj = {$this->table}.uuid", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::findOne($param);
  }

  function dt () {
    $this->load->model('Users');
    $this->Users->filterByJabatan($this->datatables, $this->table);
    return $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.uraian")
      ->select('SUM(IFNULL(lampiran.vol, 0) * IFNULL(lampiran.hargasat, 0)) + IFNULL(ppn, 0) + IFNULL (pph, 0) total_spj', false)
      ->select("SUM(payment_sent.paid_amount) as paid", false)

      ->select('jabatan_group.nama nama_jabatan_group', false)
      ->join('assignment', "detail.uuid = assignment.detail", 'left')
      ->join('jabatan_group', 'assignment.jabatan_group = jabatan_group.uuid', 'left')

      ->join('lampiran', 'spj.uuid = lampiran.spj', 'left')
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
      ->select("{$this->table}.detail parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("FORMAT(SUM(spj_lampiran.submitted_amount + spj.ppn + spj.pph), 0) as total_spj", false)
      ->select("FORMAT(SUM(payment_sent.paid_amount), 0) as paid", false)
      ->select("GROUP_CONCAT(DISTINCT detail.uuid) childUuid", false)
      ->select("'Lampiran' childController", false)
      ->select('"" kode', false)
      ->select('spj.uraian', false)
      ->group_by("{$this->table}.uuid")
      ->get()
      ->row_array();
  }

  function getStatus ($spj) {
    $this->load->model(array('Jabatans', 'Spjlogs'));
    $user = $this->session->all_userdata();
    $this->Jabatans->getUserAttr($user);
    $lastLog = $this->Spjlogs->getLastVerification($spj['uuid']);

    $status = 'unverifiable';
    if ('verified' === $spj['global_status']) $status = 'verified';
    else if (in_array($lastLog['user'], $user['atasan'])) {
      // if ('verify' === $lastLog['action']) $status = 'verified';// let it wait for global status
      if ('unverify' === $lastLog['action']) $status = 'verifiable';
    } else if (in_array($lastLog['user'], $user['letting'])) {

    } else if (in_array($lastLog['user'], $user['bawahan'])) {
      if ('verify' === $lastLog['action']) $status = 'verifiable';
    }
    return $status;
  }

  function getCreator ($uuid) {
    $creator = $this->Spjlogs->findOne(array('spj' => $uuid, 'action' => 'create'));
    return $creator['user'];
  }

  function getJabatanCreator ($uuid) {
    $creatorId = $this->getCreator($uuid);
    $this->load->model('Users');
    $creator = $this->Users->findOne($creatorId);
    return $creator['jabatan'];
  }

  function getTotal ($uuid) {
    $record = $this->db->query("
      SELECT SUM(IFNULL(vol, 0) * IFNULL(hargasat, 0)) + ppn + pph as total
      FROM spj
      LEFT JOIN lampiran ON spj.uuid = lampiran.spj
      WHERE spj.uuid = '{$uuid}'
      GROUP BY spj.uuid")->row_array();
    return $record['total'];
  }

  function getForm ($uuid = false, $isSubform = false) {
    if ($isSubform) {
      unset($this->form[0]);
      unset($this->form[count($this->form)]);
    }
    return parent::getForm ($uuid, $isSubform);
  }

  function isMine ($uuid) {
    $records = $this->db->query("
      SELECT `assignment`.*
      FROM `assignment`
      LEFT JOIN detail ON `assignment`.detail = detail.uuid
      LEFT JOIN jabatan_group ON `assignment`.jabatan_group = jabatan_group.uuid
      LEFT JOIN jabatan ON jabatan.jabatan_group = jabatan_group.uuid
      LEFT JOIN spj ON spj.detail = detail.uuid
      WHERE spj.uuid = '{$uuid}'
      AND jabatan.uuid = '{$this->session->userdata('jabatan')}'
    ")->result();
    return count($records) > 0;
  }

}
