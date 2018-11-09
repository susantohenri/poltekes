<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'jabatan';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Jabatan'),
      (object) array('mData' => 'akses_level', 'sTitle' => 'Akses Level'),
      (object) array('mData' => 'kode', 'sTitle' => 'Kode Filter'),
      (object) array('mData' => 'parent_name', 'sTitle' => 'Atasan', 'width' => '40%', 'searchable' => false),
    );

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Jabatan'
    );
  
    $this->form[]= array(
      'name' => 'akses_level',
      'label'=> 'Akses Level',
      'options' => array(
        array('text' => 'Administator', 'value' => ''),
        array('text' => 'Program', 'value' => 'Program'),
        array('text' => 'Kegiatan', 'value' => 'Kegiatan'),
        array('text' => 'Output', 'value' => 'Output'),
        array('text' => 'Sub Output', 'value' => 'Sub Output'),
        array('text' => 'Komponen', 'value' => 'Komponen'),
        array('text' => 'Sub Komponen', 'value' => 'Sub Komponen'),
        array('text' => 'Akun', 'value' => 'Akun'),
        array('text' => 'Detail', 'value' => 'Detail'),
        array('text' => 'SPJ', 'value' => 'SPJ'),
      )
    );

    $this->form[]= array(
      'name' => 'kode',
      'label'=> 'Akses Kode'
    );

    $this->form[]= array(
      'name'    => 'items',
      'label'   => 'Akses Item',
      'multiple'=> true,
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'KomponenPrograms'), 
        array('data-field' => 'uraian')
      ),
    );

    $this->form[]= array(
      'name'    => 'parent',
      'label'   => 'Atasan',
      'multiple'=> true,
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Jabatans'), 
        array('data-field' => 'nama')
      ),
    );

  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid, {$this->table}.urutan, {$this->table}.nama, {$this->table}.akses_level, {$this->table}.kode")
      ->select("GROUP_CONCAT(parent.nama SEPARATOR ', ') as parent_name", false)
      ->join('`jabatan` `parent`', "FIND_IN_SET(parent.uuid, {$this->table}.parent)", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

  function getAssignmentForm ($controller) {
    $akses_level = trim(implode(' ', preg_split('/(?=[A-Z])/', str_replace('Program', '', $controller))));
    $this->form = $options = array();
    foreach($this->find(array('akses_level' => $akses_level)) as $jbtn) $options[] = array('value' => $jbtn->uuid, 'text' => $jbtn->nama);
    $this->form[]= array(
      'name' => 'jabatan',
      'label'=> 'Pilih Jabatan',
      'options' => $options
    );
    return $this->getForm();
  }

  function assign ($jabatanUuid, $itemUuid) {
    $jabatan = $this->findOne($jabatanUuid);
    if (strpos($jabatan['items'], $itemUuid) > -1) return true;
    else {
      $items = strlen ($jabatan['items']) > 0 ? explode(',', $jabatan['items']) : array();
      $items[] = $itemUuid;
      $jabatan['items'] = implode(',', $items);
      return $this->update($jabatan);
    }
  }

}