<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'payment';
    $this->form  = array();
    $this->thead = array();

    $this->form[]= array(
      'name' => 'sender',
      'label'=> 'Rekening Pengirim',
    );

    $this->form[]= array(
      'name' => 'recipient',
      'label'=> 'Rekening Penerima',
    );

    $this->form[]= array(
      'name' => 'transfer_time',
      'label'=> 'Tanggal transfer',
      'attributes' => array (
        array ('data-date' => 'datepicker')
      )
    );

    $this->form[]= array(
      'name' => 'amount',
      'label'=> 'Nominal',
      'attributes' => array (
        array ('data-number' => 'true')
      )
    );
  }

  function getStatusPayment ($spjUuid, $requestedAmount) {
    $unpaid = (int) $requestedAmount;
    foreach ($this->find(array('spj' => $spjUuid)) as $payment) {
      $requestedAmount -= $payment->amount;
    }
    if ($requestedAmount === $unpaid) return 'unpaid';
    else if ($requestedAmount > 0) return 'partially-paid';
    else if ($requestedAmount <= 0) return 'fully-paid';
  }

}