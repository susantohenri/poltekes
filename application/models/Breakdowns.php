<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Breakdowns extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'jabatan_group';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Group Jabatan'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'className' => 'text-right', 'searchable' => false),
    );
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid, {$this->table}.urutan, {$this->table}.nama")
      ->select("IFNULL(SUM(detail.hargasat * detail.vol), 0) as pagu", false)
      ->join('assignment', "{$this->table}.uuid = assignment.jabatan_group", 'left')
      ->join('detail', 'detail.uuid = assignment.detail', 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

  function getListItem ($uuid, $jabatanGroup = null) {
    $this->table = 'program';

    return $this->db
      ->select("{$this->table}.*")
      ->select("'' parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("SUM(spj_item.submitted_amount + spj.ppn + spj.pph) as total_spj", false)
      ->select("FORMAT(SUM(payment_sent.paid_amount), 0) as paid", false)
      ->select("GROUP_CONCAT(DISTINCT kegiatan.uuid) childUuid", false)
      ->select("'Kegiatan' childController", false)

      ->join('kegiatan', "program.uuid = kegiatan.program", 'left')
      ->join('output', "kegiatan.uuid = output.kegiatan", 'left')
      ->join('sub_output', "output.uuid = sub_output.output", 'left')
      ->join('komponen', "sub_output.uuid = komponen.sub_output", 'left')
      ->join('sub_komponen', "komponen.uuid = sub_komponen.komponen", 'left')
      ->join('akun', "sub_komponen.uuid = akun.sub_komponen", 'left')

      ->join('detail', "akun.uuid = detail.akun", 'left')
      ->join('spj', "detail.uuid = spj.detail", 'left')
      ->join('(SELECT payment.spj, SUM(payment.amount) as paid_amount FROM payment GROUP BY payment.spj) as payment_sent', "payment_sent.spj = spj.uuid", 'left')
      ->join('(SELECT item.spj, SUM(IFNULL(item.vol, 0) * IFNULL(item.hargasat, 0)) as submitted_amount FROM item GROUP BY item.spj) as spj_item', "spj_item.spj = spj.uuid", 'left')

      ->join('assignment', 'assignment.detail = detail.uuid', 'right')
      ->where('assignment.jabatan_group', $jabatanGroup)

      ->group_by("{$this->table}.uuid")
      ->get('program')
      ->row_array();
  }

  function getAssignmentForm ($entity, $uuid) {
    $model = $entity['model'];
    $entity= $entity['table'];
    $this->load->model($model);
    $record = $this->{$model}->findOne($uuid);
    $details= $this->getDetails($entity, $uuid);
    $groups = $this->getGroup($entity, $uuid);
    $options= array();
    foreach ($groups as $group) $options[] = array(
      'text' => $group->nama,
      'value'=> $group->jabatan_group,
    );

    $this->form[]= array(
      'name' => 'uraian',
      'label'=> 'Uraian',
      'value'=> $record['uraian']
    );
    $this->form[]= array(
      'name' => 'jabatan_group',
      'label'=> 'Group Jabatan',
      'options' => $options,
      'multiple'=> true,
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'JabatanGroups'), 
        array('data-field' => 'nama')
      ),
      'value' => array_column($groups, 'jabatan_group')
    );
    $this->form[] = array(
      'name' => 'entity',
      'type' => 'hidden',
      'value'=> $entity
    );
    $this->form[] = array(
      'name' => 'model',
      'type' => 'hidden',
      'value'=> $model
    );
    $this->form[] = array(
      'name' => 'uuid',
      'type' => 'hidden',
      'value'=> $uuid
    );
    $form = $this->form;

    foreach ($form as &$f) {
      if (!isset ($f['attributes'])) $f['attributes']   = array();
      if (isset ($f['options'])) $f['type'] = 'select';
      if (isset ($f['multiple'])) {
        $f['name']= $f['name'] . '[]';
        $f['attributes'][] = array('multiple' => 'true');
      }
      if (!isset ($f['type'])) $f['type']   = 'text';
      if (!isset ($f['width'])) $f['width'] = 2;
      if (!isset ($f['value'])) $f['value']       = '';
      if (!isset ($f['required'])) $f['required'] = '';
      else $f['required'] = 'required="required"';

      $f['disabled'] = !isset($f['disabled']) ? '' : 'disabled="disabled"';

      if (in_array(array('data-suggestion' => true), $f['attributes'])) {
        $fname = str_replace('[]', '', $f['name']);
        if (isset ($f['multiple'])) {
          $alloptions = array();
          $f['options'] = array();
          foreach ($this->db->select($fname)->get($this->table)->result() as $record)
            if (strlen($record->$fname) > 0) foreach (explode(',', $record->$fname) as $option) $alloptions[] = $option;
          foreach (array_unique ($alloptions) as $distinct) $f['options'][] = array('text' => $distinct, 'value' => $distinct);
        } else {
          $f['options'] = array();
          foreach ($this->db->select($fname)->distinct()->get($this->table)->result() as $record)
            if (strlen($record->$fname) > 0) $f['options'][] = array('text' => $record->$fname, 'value' => $record->$fname);
        }
      }

      $f['attr'] = '';
      foreach ($f['attributes'] as $attribute) foreach ($attribute as $key => $value) $f['attr'] .= " $key=\"$value\"";
    }
    return $form;
  }

  function getDetails ($entity, $uuid) {
    return $this->db
      ->distinct()
      ->select('detail.uuid')
      ->join('kegiatan', 'program.uuid = kegiatan.program', 'left')
      ->join('output', 'kegiatan.uuid = output.kegiatan', 'left')
      ->join('sub_output', 'output.uuid = sub_output.output', 'left')
      ->join('komponen', 'sub_output.uuid = komponen.sub_output', 'left')
      ->join('sub_komponen', 'komponen.uuid = sub_komponen.komponen', 'left')
      ->join('akun', 'sub_komponen.uuid = akun.sub_komponen', 'left')
      ->join('detail', 'akun.uuid = detail.akun', 'left')
      ->where("{$entity}.uuid", $uuid)
      ->get('program')
      ->result();
  }

  function getGroup ($entity, $uuid) {
    return $this->db
      ->distinct()
      ->select('jabatan_group')
      ->select('nama')
      ->where_in('detail', "
        SELECT DISTINCT `detail`.`uuid` FROM `program`
        LEFT JOIN `kegiatan` ON `program`.`uuid` = `kegiatan`.`program`
        LEFT JOIN `output` ON `kegiatan`.`uuid` = `output`.`kegiatan`
        LEFT JOIN `sub_output` ON `output`.`uuid` = `sub_output`.`output`
        LEFT JOIN `komponen` ON `sub_output`.`uuid` = `komponen`.`sub_output`
        LEFT JOIN `sub_komponen` ON `komponen`.`uuid` = `sub_komponen`.`komponen`
        LEFT JOIN `akun` ON `sub_komponen`.`uuid` = `akun`.`sub_komponen`
        LEFT JOIN `detail` ON `akun`.`uuid` = `detail`.`akun`
        WHERE `{$entity}`.`uuid` = '{$uuid}'
      ", false)
      ->join('jabatan_group', 'assignment.jabatan_group = jabatan_group.uuid', 'left')
      ->group_by('assignment.uuid')
      ->get('assignment')
      ->result();
  }

  function setGroup ($groups, $details) {
    $this->load->model('Assignments');
    $this->db
      ->where_in('detail', $details)
      ->delete('assignment');
    foreach ($groups as $group) {
      foreach ($details as $detail) {
        $this->Assignments->save(array(
          'jabatan_group' => $group,
          'detail' => $detail
        ));
      }
    }
  }

  function updateAssignment ($entity, $uuid, $groups) {
    $details = $this->getDetails($entity, $uuid);
    $this->setGroup($groups, $details);
    return true;
  }

}