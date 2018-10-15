<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CodeOfAccounts extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'code_of_account';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'code', 'sTitle' => 'Code'),
      (object) array('mData' => 'name', 'sTitle' => 'Name'),
      (object) array('mData' => 'account_classification_name', 'sTitle' => 'Account Classification'),
    );

    $this->form[]= array(
      'name' => 'code',
      'label'=> 'Code'
    );

    $this->form[]= array(
      'name' => 'name',
      'label'=> 'Name'
    );

    $this->form[]= array(
      'name'    => 'account_classification',
      'label'   => 'Account Classification',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'AccountClassifications'), 
        array('data-field' => 'name')
      ),
    );
  }

  function find ($where = array()) {
  	$this->db
  	->select("{$this->table}.*")
  	->select('account_classification.name account_classification_name', false)
  	->join('account_classification', "account_classification.uuid = {$this->table}.account_classification", 'left');
  	return parent::find($where);
  }

}