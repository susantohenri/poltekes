<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AccountClassifications extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'account_classification';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'code', 'sTitle' => 'Code'),
      (object) array('mData' => 'name', 'sTitle' => 'Name'),
    );

    $this->form[]= array(
    	'name' => 'code',
    	'label'=> 'Code'
    );

    $this->form[]= array(
    	'name' => 'name',
    	'label'=> 'Name'
    );
  }

}