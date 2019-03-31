<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spjlogs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'spj_log';
    $this->form  = array();
    $this->thead = array(
      (object) array('mData' => 'taken', 'sTitle' => 'Waktu'),
      (object) array('mData' => 'action', 'sTitle' => 'Uraian'),
      (object) array('mData' => 'nama_user', 'sTitle' => 'User'),
      (object) array('mData' => 'nama_jabatan', 'sTitle' => 'Jabatan'),
    );

    $this->form[]= array(
    	'name' => 'taken',
    	'label'=> 'Taken',
      'attributes' => array(
        array('disabled' => 'disabled')
      ),
      'width' => 5
    );

    $this->form[]= array(
      'name' => 'action',
      'label'=> 'Action',
      'attributes' => array(
        array('disabled' => 'disabled')
      ),
      'width' => 4
    );

    $this->form[]= array(
      'name'    => 'user',
      'label'   => 'User',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Users'), 
        array('data-field' => 'email'),
        array('disabled' => 'disabled')
      ),
      'width' => 5
    );

    $this->form[]= array(
      'name' => 'nama_jabatan',
      'label'=> 'Jabatan',
      'attributes' => array(
        array('disabled' => 'disabled')
      ),
      'width' => 4
    );
  }

  function findOne($param) {
    $param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
    $this->db
      ->select("{$this->table}.*")
      ->select("DATE_FORMAT(taken, '%d %b %Y %H:%i:%s') taken", false)
      ->select("jabatan.nama as nama_jabatan", false)
      ->join('user', "user.uuid = {$this->table}.user", 'left')
      ->join('jabatan', "jabatan.uuid = user.jabatan", 'left');
    return parent::findOne($param);
  }

  function getLastVerification($spjUuid) {
    $this->db
      ->like('action', 'verif')
      ->order_by('urutan', 'desc')
      ->limit(1);
    return parent::findOne(array('spj' => $spjUuid));
  }

  function create ($data) {
    date_default_timezone_set("Asia/Jakarta");
    $data['taken']= date('Y-m-d H:i:s');
    $data['user'] = $this->session->userdata('uuid');
    return parent::create($data);
  }

}