<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SpjPayments extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'spj';
    $this->form = array();
    $this->thead = array();

    $this->form[]= array(
      'name' => 'uraian',
      'label'=> 'Uraian',
      'width'=> 4
    );

    $this->form[]= array(
      'name' => 'vol',
      'label'=> 'Vol',
      'attributes' => array(
        array('data-number' => 'true')
      ),
      'width'=> 1
    );

    $this->form[]= array(
      'name'    => 'sat',
      'label'   => 'Sat',
    );

    $this->form[]= array(
      'name' => 'hargasat',
      'label'=> 'Harga Sat',
      'attributes' => array(
        array('data-number' => 'true')
      ),
    );

    $this->form[]= array(
      'name' => 'realisasi',
      'label'=> 'Realisasi',
      'value'=> 0,
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
    );

    $this->form[]= array(
      'name'    => 'unpaid_reason',
      'label'   => 'Alasan Tidak Dibayar',
    );

    $this->childs[] = array('label' => '', 'controller' => 'Payment', 'model' => 'Payments');
    $this->load->model('Spjlogs');
  }

  function findOne ($param) {
    $this->db
      ->select("{$this->table}.*")
      ->select("FORMAT({$this->table}.vol, 0) vol")
      ->select("FORMAT({$this->table}.hargasat, 0) hargasat")
      ->select("{$this->table}.detail parent", false)
      ->select("FORMAT(hargasat * vol, 0) realisasi", false);
    return parent::findOne($param);
  }

}