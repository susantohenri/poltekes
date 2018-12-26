<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanFilters extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'jabatan_filter';
    $this->form = array();

    $this->form[]= array(
      'name' => 'type',
      'label'=> 'Tipe Filter',
      'options' => array(
        array('text' => 'Kombinasi', 'value' => 'AND'),
        array('text' => 'Tambahan', 'value' => 'OR'),
      ),
    );

    $this->form[]= array(
      'name' => 'level',
      'label'=> 'Level Filter',
      'options' => array(
        array('text' => 'Program', 'value' => 'Program'),
        array('text' => 'Kegiatan', 'value' => 'Kegiatan'),
        array('text' => 'Output', 'value' => 'Output'),
        array('text' => 'Sub Output', 'value' => 'Sub Output'),
        array('text' => 'Komponen', 'value' => 'Komponen'),
        array('text' => 'Sub Komponen', 'value' => 'Sub Komponen'),
        array('text' => 'Akun', 'value' => 'Akun'),
        array('text' => 'Detail', 'value' => 'Detail'),
      )
    );

    $this->form[]= array(
      'name' => 'kode',
      'label'=> 'Filter Kode'
    );

    $this->form[]= array(
      'name'    => 'item',
      'label'   => 'Filter Item',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Programs'), 
        array('data-field' => 'uraian')
      ),
      'width' => 5
    );
  }

  function prepopulate ($uuid) {
    $record = $this->findOne($uuid);
    foreach ($this->form as &$f) {
      if (isset ($f['attributes']) && in_array(array('data-autocomplete' => 'true'), $f['attributes'])) {
        $model = '';
        $field = '';
        foreach ($f['attributes'] as $attr) foreach ($attr as $key => $value) switch ($key) {
          case 'data-model': $model = $value; break;
          case 'data-field': $field = $value; break;
        }
        if ('item' === $f['name'] && strlen($record['level']) > 0) {
          $model = str_replace(' ', '', $record['level']) . 's';
          foreach ($f['attributes'] as &$attr) if (isset ($attr['data-model'])) $attr['data-model'] = $model;
        }
        if (strlen($model) > 0) {
          $this->load->model($model);
          foreach ($this->$model->findIn('uuid', explode(',', $record[$f['name']])) as $option)
            $f['options'][] = array('text' => $option->$field, 'value' => $option->uuid);
        }
      }
      if (isset ($f['multiple'])) $f['value'] = explode(',', $record[$f['name']]);
      else if ($f['name'] === 'password') $f['value'] = '';
      else $f['value'] = $record[$f['name']];
    }
    return $this->form;
  }

  function getFilter () {
    $filters = array();
    foreach ($this->find(array('jabatan' => $this->session->userdata('jabatan'))) as $record) {
      $record->level = strtolower(str_replace(' ', '_', $record->level));

      if (strlen($record->kode) > 0) {
        $field = strpos($record->kode, '%') > -1 ? "{$record->level}.kode LIKE" : "{$record->level}.kode";
        if ('AND' === $record->type) $filters[] = array('fn' => 'where', 'field' => $field, 'value' => $record->kode);
        if ('OR' === $record->type) $filters[] = array('fn' => 'or_where', 'field' => $field, 'value' => $record->kode);
      }

      if (strlen ($record->item) > 0) {
        if ('AND' === $record->type) $filters[] = array('fn' => 'where_in', 'field' => "{$record->level}.uuid", 'value' => $record->item);
        if ('OR' === $record->type) $filters[] = array('fn' => 'or_where_in', 'field' => "{$record->level}.uuid", 'value' => $record->item);
      }

    }
    return $filters;
  }
}