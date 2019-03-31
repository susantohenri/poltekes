<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'user';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'email', 'sTitle' => 'Email'),
      (object) array('mData' => 'nama_jabatan', 'sTitle' => 'Jabatan'),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'email',
    	'label'=> 'Email'
    );

    $this->form[]= array(
    	'type' => 'password',
    	'name' => 'password',
    	'label'=> 'Password'
    );

    $this->form[]= array(
        'type' => 'password',
        'name' => 'confirm_password',
        'label'=> 'Ulangi Password'
    );

    $this->form[]= array(
      'name' => 'jabatan',
      'label'=> 'Jabatan',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Jabatans'),
        array('data-field' => 'nama')
      ),
    );
  }

  function delete ($uuid) {
    $user = $this->findOne($uuid);
    if ('admin' !== $user['email']) return parent::delete($uuid);
  }

  function save ($data) {
    if (strlen ($data['password']) > 0) {
      if ($data['password'] !== $data['confirm_password']) return array('error' => array('message' => 'Password tidak sesuai'));
      else $data['password'] = md5($data['password']);
    } else unset ($data['password']);
    unset ($data['confirm_password']);
    return parent::save ($data);
  }

  function findOne ($param) {
    $record = parent::findOne ($param);
    $record['confirm_password'] = '';
    return $record;
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.email")
      ->select("jabatan.nama as nama_jabatan", false)
      ->join('jabatan', 'user.jabatan = jabatan.uuid', 'left');
    return parent::dt();
  }

  function filterByJabatanGroup ($class, $rightTable = 'Program', $jabatanGroup) {
    $this->load->model('TopDowns');
    $topdown = $this->TopDowns->findOne(array('jabatan_group' => $jabatanGroup));
    if ($topdown && strlen ($topdown['bawahan']) > 0) {
      $class->where("detail.uuid IN (SELECT assignment.detail FROM assignment WHERE jabatan_group IN ({$topdown['bawahan']}))");
    }

    $tables = array(
      'program',
      'kegiatan',
      'output',
      'sub_output',
      'komponen',
      'sub_komponen',
      'akun',
      'detail',
      'spj',
    );
    foreach ($tables as $index => $table) if ($index > 0) {
      $class->join($table, "{$tables[$index - 1]}.uuid = {$table}.{$tables[$index - 1]}", $table === $rightTable ? 'right' : 'left');
    }

    $class->join('(SELECT payment.spj, SUM(payment.amount) as paid_amount FROM payment GROUP BY payment.spj) as payment_sent', "payment_sent.spj = spj.uuid", 'left');
    $class->join('(SELECT lampiran.spj, SUM(IFNULL(lampiran.vol, 0) * IFNULL(lampiran.hargasat, 0)) as submitted_amount FROM lampiran GROUP BY lampiran.spj) as spj_lampiran', "spj_lampiran.spj = spj.uuid", 'left');
    $class->from('program');
  }

  function filterByJabatan ($class, $rightTable = 'Program', $jabatan = false) {
    if (!$jabatan) $jabatan = $this->session->userdata('jabatan');
    $this->load->model('Jabatans');
    $jab = $this->Jabatans->findOne($jabatan);
    $this->filterByJabatanGroup($class, $rightTable, $jab['jabatan_group']);
  }

}
