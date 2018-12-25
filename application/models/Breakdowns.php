<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Breakdowns extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'jabatan';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Jabatan'),
      (object) array('mData' => 'parent_name', 'sTitle' => 'Atasan', 'width' => '30%', 'searchable' => false),
    );

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Jabatan'
    );

    $this->form[]= array(
      'name'    => 'parent',
      'label'   => 'Atasan',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Jabatans'), 
        array('data-field' => 'nama')
      ),
    );

    $this->childs[] = array('label' => '', 'controller' => 'JabatanFilter', 'model' => 'JabatanFilters');

  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid, {$this->table}.urutan, {$this->table}.nama")
      ->select("GROUP_CONCAT(parent.nama SEPARATOR ', ') as parent_name", false)
      ->join('`jabatan` `parent`', "parent.uuid = {$this->table}.parent", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

}