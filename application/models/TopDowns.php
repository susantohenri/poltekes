<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TopDowns extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'topdown';
    $this->thead = array();
    $this->form = array();
  }

  function recalculate () {

    $this->db->query("TRUNCATE topdown");
    $this->load->model(array('Jabatans', 'JabatanGroups'));
    foreach ($this->JabatanGroups->find() as $jgroup) {
      $jabatan = $this->Jabatans->findOne(array('jabatan_group' => $jgroup->uuid));

      $uuid = $jabatan['uuid'];
      $queue= $jabatans = array($uuid);
      $query= "
        SELECT jabatan.uuid, GROUP_CONCAT(bawahan.uuid) jab_bwh
        FROM jabatan
        LEFT JOIN jabatan bawahan ON jabatan.uuid = bawahan.parent
        WHERE jabatan.uuid = '{uuid}'
      ";
      while (count($queue) > 0) {
        $result = $this->db->query(str_replace('{uuid}', $queue[0], $query))->row_array();
        array_shift($queue);
        if (strlen ($result['jab_bwh']) > 0) foreach (explode(',', $result['jab_bwh']) as $bwhn) if (strlen($bwhn) > 0) $queue[] = $jabatans[] = $bwhn;
      }

      $groups = array();
      $getGroup = $this->db
        ->distinct()
        ->select('jabatan_group')
        ->where_in('uuid', $jabatans)
        ->get('jabatan');
      foreach ($getGroup->result() as $g) $groups[] = $g->jabatan_group;

      $record = array('jabatan_group' => $jgroup->uuid);
      if (isset ($groups[0]) && !empty ($groups[0])) $record['bawahan'] = $this->arrayToWhereIn($groups);
      $this->create($record);

    }
  }

  function arrayToWhereIn ($array) {
    $string = json_encode($array);
    $string = str_replace('"', "'", $string);
    $string = str_replace('[', '', $string);
    $string = str_replace(']', '', $string);
    return $string;
  }

  function getHierarchi ($groups) {
    foreach ($groups as $group) {
      $topdown = $this->TopDowns->findOne(array('jabatan_group' => $group));
      if (isset ($topdown['bawahan']) && strlen($topdown['bawahan']) > 0) {
        foreach (explode(',', $topdown['bawahan']) as $bwh) {
          if (!in_array($bwh, $groups)) $groups[] = str_replace("'", '', $bwh);
        }
      }
    }
    return $groups;
  }

}