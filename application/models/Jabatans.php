<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'jabatan';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Jabatan'),
      (object) array('mData' => 'parent_name', 'sTitle' => 'Atasan', 'width' => '30%', 'searchable' => false),
      (object) array('mData' => 'akses_level', 'sTitle' => 'Akses Level'),
      (object) array('mData' => 'kode', 'sTitle' => 'Kode Filter'),
      (object) array('mData' => 'edit_spj', 'sTitle' => 'Edit SPJ'),
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
      'name' => 'allow_edit_spj',
      'label'=> 'Izinkan Edit SPJ',
      'options' => array(
        array('text' => 'Diizinkan', 'value' => '1'),
        array('text' => 'Tidak Diizinkan', 'value' => '0'),
      )
    );

  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid, {$this->table}.urutan, {$this->table}.nama, {$this->table}.akses_level, {$this->table}.kode")
      ->select("IF({$this->table}.allow_edit_spj = 1, 'Diizinkan', 'Tidak Diizinkan') as edit_spj", false)
      ->select("GROUP_CONCAT(parent.nama SEPARATOR ', ') as parent_name", false)
      ->join('`jabatan` `parent`', "parent.uuid = {$this->table}.parent", 'left')
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

  function getUserAttr (&$user) {
    $user['filter'] = array();
    $user['atasan'] = array();
    $user['letting']= array();
    $user['bawahan']= array();

    $userAttr = $this->db
      ->select('jabatan.akses_level')
      ->select('jabatan.kode')
      ->select('jabatan.items')
      ->select('jabatan.allow_edit_spj')
      ->select("GROUP_CONCAT(user_atasan.uuid) as atasans", false)
      ->select("GROUP_CONCAT(user_letting.uuid) as lettings", false)
      ->select("GROUP_CONCAT(user_bawahan.uuid) as bawahans", false)
      ->join('user', 'user.jabatan = jabatan.uuid', 'left')
      ->join('`jabatan` `jab_atasan`', 'jabatan.parent = jab_atasan.uuid', 'left')
      ->join('`user` `user_atasan`', 'user_atasan.jabatan = jab_atasan.uuid', 'left')
      ->join('`user` `user_letting`', 'user_letting.jabatan = jabatan.uuid', 'left')
      ->join('`jabatan` `jab_bawahan`', 'jab_bawahan.parent= jabatan.uuid', 'left')
      ->join('`user` `user_bawahan`', 'user_bawahan.jabatan = jab_bawahan.uuid', 'left')
      ->where('user.uuid', $user['uuid'])
      ->group_by('user.uuid')
      ->get($this->table)
      ->row_array();

    if ($userAttr) {
      $user['atasan'] = explode(',', $userAttr['atasans']);
      $user['letting']= explode(',', $userAttr['lettings']);
      $user['bawahan']= explode(',', $userAttr['bawahans']);
      $user['allow_edit_spj']= $userAttr['allow_edit_spj'];

      $akses_level = $userAttr['akses_level'];
      $akses_level = strtolower($akses_level);
      $akses_level = str_replace(' ', '_', $akses_level);
      $kode = $userAttr['kode'];
      $items= $userAttr['items'];

      if ($akses_level) {
        if (strlen($userAttr['items']) > 0) $user['filter']['where_in'] = array("{$akses_level}_program.uuid", explode(',', $items));
        if (strlen ($kode) > 0) {
          if (strpos($kode, '*') > -1) $user['filter']['where'] = array("{$akses_level}.kode LIKE", str_replace('*', '%', $kode));
          else $user['filter']['where'] = array("{$akses_level}.kode", $kode);
        }
      }
    }
  }

}