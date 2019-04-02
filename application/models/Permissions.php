<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'permission';
    $this->form = array();
    $this->thead = array();

    $this->form[]= array(
    	'name' => 'entity',
    	'label'=> 'Entitas',
      'options' => $this->getEntities(),
      'width' => 4
    );

    $this->form[]= array(
    	'name' => 'action',
    	'label'=> 'Aksi',
      'options' => $this->getActions()
    );
  }

  function getEntities () {
    return array(
      array('text' => 'Program', 'value' => 'Program'),
      array('text' => 'Kegiatan', 'value' => 'Kegiatan'),
      array('text' => 'Output', 'value' => 'Output'),
      array('text' => 'Sub Output', 'value' => 'SubOutput'),
      array('text' => 'Komponen', 'value' => 'Komponen'),
      array('text' => 'Sub Komponen', 'value' => 'SubKomponen'),
      array('text' => 'Akun', 'value' => 'Akun'),
      array('text' => 'Detail', 'value' => 'Detail'),
      array('text' => 'SPJ', 'value' => 'Spj'),
      array('text' => 'Lampiran', 'value' => 'Lampiran'),
      array('text' => 'SPJ Payment', 'value' => 'SpjPayment'),
      array('text' => 'User', 'value' => 'User'),
      array('text' => 'Jabatan', 'value' => 'Jabatan'),
    );
  }

  function getActions () {
    return array(
      array('text' => 'Index', 'value' => 'index'),
      array('text' => 'Create', 'value' => 'create'),
      array('text' => 'Read', 'value' => 'read'),
      array('text' => 'Update', 'value' => 'update'),
      array('text' => 'Delete', 'value' => 'delete')
    );
  }

  function setPermission ($jabatan, $entity, $action) {
    return $this->create(array(
      'jabatan' => $jabatan,
      'entity' => $entity,
      'action' => $action,
    ));
  }

  function getGeneralEntities () {
    return array (
    'Program', 'Kegiatan', 'Output', 'SubOutput',
    'Komponen', 'SubKomponen', 'Akun', 'Lampiran');
  }

  function setGeneralPermission ($jabatan) {
    foreach ($this->getGeneralEntities() as $entity) {
      foreach (array('index', 'read') as $action) {
        $this->setPermission($jabatan, $entity, $action);
      }
    }
    foreach (array('Detail', 'Spj') as $entity) foreach (array('index', 'read') as $action) $this->setPermission($jabatan, $entity, $action);
  }

  function getPermissions () {
    $permission = array();
    foreach ($this->find(array('jabatan' => $this->session->userdata('jabatan'))) as $perm) $permission[] = "{$perm->action}_{$perm->entity}";
    return $permission;
  }

  function getPermittedMenus () {
    $allowed = array();
    foreach ($this->find(array(
      'jabatan'=> $this->session->userdata('jabatan'),
      'action' => 'index'
    )) as $perms) $allowed[] = $perms->entity;
    return $allowed;
  }
}