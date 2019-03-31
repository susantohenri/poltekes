<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SpjPayments extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'payment';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'uraian', 'sTitle' => 'Uraian'),
      (object) array('mData' => 'total_spj', 'sTitle' => 'Jumlah', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency'),
      (object) array('mData' => 'paid', 'sTitle' => 'Dibayar', 'searchable' => 'false', 'className' => 'text-right', 'type' => 'currency'),
    );

    $this->form[]= array(
      'name' => 'spj',
      'label'=> 'Uraian SPJ',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Spjs'),
        array('data-field' => 'uraian')
      ),
    );

    $this->form[]= array(
      'name' => 'sender',
      'label'=> 'Rekening Pengirim',
      'width'=> 5
    );

    $this->form[]= array(
      'name' => 'recipient',
      'label'=> 'Rekening Penerima',
      'width'=> 5
    );

    $this->form[]= array(
      'name' => 'transfer_time',
      'label'=> 'Waktu Transfer',
      'attributes' => array (
        array ('data-date' => 'datepicker')
      ),
      'width'=> 5
    );

    $this->form[]= array(
      'name' => 'amount',
      'label'=> 'Nominal',
      'attributes' => array(
        array('data-number' => 'true')
      ),
      'width'=> 5
    );

  }

  function getForm ($uuid = false, $isSubform = false) {
    if ($isSubform) unset($this->form[0]);
    $form = parent::getForm ($uuid, $isSubform);
    if ($isSubform) {
      foreach ($form as &$field) {
        if ('amount' === $field['name']) $field['value'] = number_format($field['value']);
        if ('transfer_time' === $field['name']) $field['value'] = date('d F Y', strtotime($field['value']));
      }
    }
    return $form;
  }

  function dt () {
    $this->load->model('Users');
    $this->Users->filterByJabatan($this->datatables, $this->table);
    return $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.urutan")
      ->select("{$this->table}.uraian")
      ->select("SUM(spj_lampiran.submitted_amount + spj.ppn + spj.pph) as total_spj", false)
      ->select("SUM(payment_sent.paid_amount) as paid", false)
      ->group_by("{$this->table}.uuid")
      ->where("{$this->table}.uuid IS", 'NOT NULL', false)
      ->generate();
  }

}