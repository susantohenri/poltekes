<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SpjPayments extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'spj';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'uraian', 'sTitle' => 'Uraian'),
      (object) array('mData' => 'total_spj', 'sTitle' => 'Jumlah', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency'),
      (object) array('mData' => 'paid', 'sTitle' => 'Dibayar', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency'),
    );

    $this->form[]= array(
      'name' => 'uraian',
      'label'=> 'Uraian',
      'width'=> 4
    );

    $this->form[]= array(
      'name' => 'total_spj',
      'label'=> 'Total SPJ',
      'value'=> 0,
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
    );

    $this->form[]= array(
      'name' => 'paid',
      'label'=> 'Total Dibayar',
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
    $param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
    $this->db
      ->select("{$this->table}.*")
      ->select("{$this->table}.detail parent", false)
      ->select("FORMAT(SUM(amount), 0) paid", false)
      ->select("FORMAT(SUM(spj_item.submitted_amount + spj.ppn + spj.pph), 0) total_spj", false)
      ->join('(SELECT item.spj, SUM(IFNULL(item.vol, 0) * IFNULL(item.hargasat, 0)) as submitted_amount FROM item GROUP BY item.spj) as spj_item', "spj_item.spj = spj.uuid", 'left')
      ->join('payment', 'payment.spj = spj.uuid', 'left');
    return parent::findOne($param);
  }

  function dt () {
    $this->load->model('Users');
    $this->Users->filterByJabatan($this->datatables);
    return $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.uraian")
      ->select("SUM(spj_item.submitted_amount + spj.ppn + spj.pph) as total_spj", false)
      ->select("SUM(payment_sent.paid_amount) as paid", false)
      ->group_by("{$this->table}.uuid")
      ->where("{$this->table}.uuid IS", 'NOT NULL', false)
      ->generate();
  }

}