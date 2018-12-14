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

  function filterByRole () {
    $user = $this->session->all_userdata();
    $this->load->model('Jabatans');
    $this->Jabatans->getUserAttr($user);
    return $user['filter'];
  }

  function filterDt () {
    $index = 0;
    foreach ($this->filterByRole() as $fn => $query) {
      if (0 !== $index) $fn = "or_{$fn}";
      $this->datatables->$fn($query[0], $query[1]);
      $index++;
    }
    $this->datatables

      ->join('kegiatan_program', "program.uuid = kegiatan_program.program", 'left')
      ->join('kegiatan', "kegiatan.uuid = kegiatan_program.kegiatan", 'left')

      ->join('output_program', "kegiatan_program.uuid = output_program.kegiatan_program", 'left')
      ->join('output', "output.uuid = output_program.output", 'left')

      ->join('sub_output_program', "output_program.uuid = sub_output_program.output_program", 'left')
      ->join('sub_output', "sub_output.uuid = sub_output_program.sub_output", 'left')

      ->join('komponen_program', "sub_output_program.uuid = komponen_program.sub_output_program", 'left')
      ->join('komponen', "komponen.uuid = komponen_program.komponen", 'left')

      ->join('sub_komponen_program', "komponen_program.uuid = sub_komponen_program.komponen_program", 'left')
      ->join('sub_komponen', "sub_komponen.uuid = sub_komponen_program.sub_komponen", 'left')

      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('akun', "akun_program.akun = akun.uuid", 'left')

      ->join('detail', "akun_program.uuid = detail.akun_program", 'left')
      ->join('spj', "detail.uuid = spj.detail", 'left')
      ->join('(SELECT payment.spj, SUM(payment.amount) as paid_amount FROM payment GROUP BY payment.spj) as payment_sent', "payment_sent.spj = spj.uuid", 'left')
      ->from('program');
  }

  function filterListItem () {
    $index = 0;
    foreach ($this->filterByRole() as $fn => $query) {
      if (0 !== $index) $fn = "or_{$fn}";
      $this->db->$fn($query[0], $query[1]);
      $index++;
    }
    $this->db

      ->join('kegiatan_program', "program.uuid = kegiatan_program.program", 'left')
      ->join('kegiatan', "kegiatan.uuid = kegiatan_program.kegiatan", 'left')

      ->join('output_program', "kegiatan_program.uuid = output_program.kegiatan_program", 'left')
      ->join('output', "output.uuid = output_program.output", 'left')

      ->join('sub_output_program', "output_program.uuid = sub_output_program.output_program", 'left')
      ->join('sub_output', "sub_output.uuid = sub_output_program.sub_output", 'left')

      ->join('komponen_program', "sub_output_program.uuid = komponen_program.sub_output_program", 'left')
      ->join('komponen', "komponen.uuid = komponen_program.komponen", 'left')

      ->join('sub_komponen_program', "komponen_program.uuid = sub_komponen_program.komponen_program", 'left')
      ->join('sub_komponen', "sub_komponen.uuid = sub_komponen_program.sub_komponen", 'left')

      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('akun', "akun_program.akun = akun.uuid", 'left')

      ->join('detail', "akun_program.uuid = detail.akun_program", 'left')
      ->join('spj', "detail.uuid = spj.detail", 'left')
      ->join('(SELECT payment.spj, SUM(payment.amount) as paid_amount FROM payment GROUP BY payment.spj) as payment_sent', "payment_sent.spj = spj.uuid", 'left')
      ->from('program');
  }

}