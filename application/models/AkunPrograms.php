<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AkunPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'akun_program';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No'),
      (object) array('mData' => 'kode_akun', 'sTitle' => 'Kode'),
      (object) array('mData' => 'nama_akun', 'sTitle' => 'Akun'),
      (object) array('mData' => 'jumlah_format', 'sTitle' => 'Jumlah'),
    );

    $this->form = array();
    $this->form[]= array(
    	'name' => 'akun',
    	'width'=> 5,
    	'label'=> 'Akun',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'), 
        array('data-model' => 'Akuns'), 
        array('disabled' => 'disabled'), 
        array('data-field' => 'nama')
      ),
    );
    $this->form[]= array(
    	'name' => 'jumlah_format',
    	'label'=> 'Jumlah',
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
      'value' => 0
    );
    $this->childs[] = array('label' => '', 'controller' => 'Spj', 'model' => 'Spjs');

  }

  function getListItem ($uuid) {
    $this->db
      ->select("{$this->table}.*")
      ->select("{$this->table}.sub_komponen_program parent", false)
      ->select("FORMAT(SUM(vol*hargasat), 0) jumlah", false)
      ->select("GROUP_CONCAT(DISTINCT spj.uuid) childUuid", false)
      ->select("'Spj' childController", false)
      ->select('akun.kode kode', false)
      ->select('akun.nama uraian', false)
      ->join('akun', "{$this->table}.akun = akun.uuid", 'left')
      ->join('spj', "{$this->table}.uuid = spj.akun_program", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::getListItem ($uuid);
  }

  function findOne ($param) {
  	$param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
  	$this->db
  		->select("{$this->table}.*")
  		->select("CONCAT('Rp ', FORMAT(SUM(hargasat * vol), 0)) jumlah_format", false)
  		->join('spj', "{$this->table}.uuid = spj.akun_program", 'left')
  		->group_by("{$this->table}.uuid");
  	return parent::findOne($param);
  }

  function find ($param = array ()) {
  	$this->db
  		->select("{$this->table}.*")
  		->select('akun.kode kode_akun', false)
  		->select('akun.nama nama_akun', false)
  		->select("CONCAT('Rp ', FORMAT(SUM(hargasat * vol), 0)) jumlah_format", false)
  		->join('akun', "{$this->table}.akun = akun.uuid", 'left')
  		->join('spj', "{$this->table}.uuid = spj.akun_program", 'left')
  		->group_by("{$this->table}.uuid");
  	return parent::find($param);
  }

  function savechild ($record) {
    $childrecords = array();
    $savedchilds  = array();

    foreach ($this->childs as $child) {
      $child_controller = $child['controller'];
      $child_model = $child['model'];
      $childrecords[$child_model]= array();
      $savedchilds[$child_model]  = array('');
      foreach ($record as $key => $value) if (strpos($key, $child_controller) > -1) {
        unset ($record[$key]);
        $childrecords[$child_model][str_replace("{$child_controller}_", '', $key)] = $value;
      }
    }

    foreach ($childrecords as $childmodel => $values) {
      if (empty ($values)) continue;
      $this->load->model($childmodel);
      $fields = array_keys($values);
      for ($index =0; $index < count(explode(',', $childrecords[$childmodel][$fields[0]])); $index++) {
        $child_record = array();
        foreach ($fields as $field) {
          $childinput = explode(',', $childrecords[$childmodel][$field]);
          if (isset ($childinput[$index])) $child_record[$field] = $childinput[$index];
        }
        $child_record[$this->table] = $record['uuid'];
        $savedchilds[$childmodel][] = $this->$childmodel->save($child_record);
      }
    }

    foreach ($this->childs as $child) {
      $childxmodel = $child['model'];
      $this->load->model($childxmodel);
      $this->db
        ->where(array($this->table => $record['uuid']))
        ->where_not_in('uuid', $savedchilds[$childxmodel])
        ->delete($this->$childxmodel->table);
    }

    return $record;
  }

}