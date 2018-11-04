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
    	'label'=> 'Email Address'
    );

    $this->form[]= array(
    	'type' => 'password',
    	'name' => 'password',
    	'label'=> 'Password'
    );

    $this->form[]= array(
        'type' => 'password',
        'name' => 'confirm_password',
        'label'=> 'Confirm Password'
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

}