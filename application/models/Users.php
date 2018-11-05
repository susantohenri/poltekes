<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'user';
    $this->thead = array(
      (object) array('mData' => 'email', 'sTitle' => 'Email'),
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
  
    $this->form[]= array(
      'name' => 'jurusan',
      'label'=> 'Jurusan',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Jurusans'), 
        array('data-field' => 'nama')
      ),
    );
  
    $this->form[]= array(
      'name' => 'prodi',
      'label'=> 'Prodi',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Prodis'), 
        array('data-field' => 'nama')
      ),
    );
  
    $this->form[]= array(
      'name' => 'unit',
      'label'=> 'Unit',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Units'), 
        array('data-field' => 'nama')
      ),
    );
  
    $this->form[]= array(
      'name' => 'urusan',
      'label'=> 'Urusan',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Urusans'), 
        array('data-field' => 'nama')
      ),
    );
  }

  function save ($data) {
    if (strlen ($data['password']) > 0) {
      if ($data['password'] !== $data['confirm_password']) return array('error' => array('message' => 'password did not match'));
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

  function filterDt () {
    $this->datatables
      // ->where('sub_komponen.kode', 'A')
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
      ->from('program');
  }

  function filterListItem () {
    $this->db
      // ->where('sub_komponen.kode', 'A')
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
      ->from('program');
  }

}