<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Assignments extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'assignment';
    $this->thead = array();
  }

  function bulkInsert ($jabatan_groups, $details) {
  	if (empty ($jabatan_groups) || empty($details)) return false;
  	$query = "INSERT INTO assignment (uuid, jabatan_group, detail) VALUES";
  	foreach ($jabatan_groups as $jg) foreach ($details as $d) $query .= ", (UUID(), '{$jg}', '{$d}')";
  	$query = str_replace('VALUES, ', 'VALUES ', $query);
  	return $this->db->query($query);
  }

  function bulkDelete ($jabatan_groups, $details) {
  	$query = "DELETE FROM assignment WHERE FALSE";
  	foreach ($jabatan_groups as $jg) foreach ($details as $d) $query .= " OR (jabatan_group = '{$jg}' AND detail = '{$d}')";
  	return $this->db->query($query);
  }

}