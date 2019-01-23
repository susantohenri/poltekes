<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatans extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'jabatan';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Jabatan'),
      (object) array('mData' => 'nama_group', 'sTitle' => 'Group'),
      (object) array('mData' => 'parent_name', 'sTitle' => 'Atasan', 'width' => '30%', 'searchable' => false),
    );

    $this->form[]= array(
    	'name' => 'nama',
    	'label'=> 'Jabatan'
    );

    $this->form[]= array(
      'name'    => 'group',
      'label'   => 'Group',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'JabatanGroups'), 
        array('data-field' => 'nama')
      ),
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

    $this->childs[] = array('label' => '', 'controller' => 'Permission', 'model' => 'Permissions');

  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid, {$this->table}.urutan, {$this->table}.nama")
      ->select("jabatan_group.nama as nama_group", false)
      ->select("GROUP_CONCAT(parent.nama SEPARATOR ', ') as parent_name", false)
      ->join('`jabatan` `parent`', "parent.uuid = {$this->table}.parent", 'left')
      ->join('`jabatan_group`', "jabatan_group.uuid = {$this->table}.group", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

  function getUserAttr (&$user) {
    $user['filter'] = array();
    $user['atasan'] = array();
    $user['letting']= array();
    $user['bawahan']= array();

    $userAttr = $this->db
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
    }
  }

}