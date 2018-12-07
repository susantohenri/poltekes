<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = '';
    $this->form = array();
    $this->load->model('Users');
  }

  function penyerapanAnggaran () {
  	$this->Users->filterListItem();
  	return $this->db
  		->select("DATE_FORMAT(transfer_time, '%Y-%m') x", false)
  		->select("SUM(amount) y", false)
  		->where('YEAR(transfer_time)', 'YEAR(CURDATE())', false)

  		->join('payment', 'spj.uuid = payment.spj', 'left')

  		->group_by("DATE_FORMAT(transfer_time, '%m/%Y')")
  		->order_by('transfer_time')
  		->get()
  		->result();
  }

  function gauge () {
    $this->Users->filterListItem();
    return $this->db
      ->select("IFNULL(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("IFNULL(SUM(payment.amount), 0) realisasi", false)

      ->join('payment', 'spj.uuid = payment.spj', 'left')

      ->group_by("program.uuid")
      ->order_by("program.urutan", 'desc')
      ->limit(1)
      ->get()
      ->row_array();
  }

  function komposisiRealisasi () {
    $this->Users->filterListItem();
    return $this->db
      ->where_in("SUBSTR(akun.kode, 1, 2)", array(51, 52, 53))
      ->select("CONCAT(SUBSTR(akun.kode, 1, 2), ' ', CASE WHEN SUBSTR(akun.kode, 1, 2) = 51 THEN 'B. Pegawai' WHEN SUBSTR(akun.kode, 1, 2) = 52 THEN 'B. Barang' WHEN SUBSTR(akun.kode, 1, 2) = 53 THEN 'B. Modal' END) as absis", false)
      ->select("IFNULL(SUM(payment.amount), 0) ordinat", false)

			->join('payment', 'spj.uuid = payment.spj', 'left')

      ->group_by("SUBSTR(akun.kode, 1, 2)")
      ->get()
      ->result();
  }

  function komposisiAlokasi () {
    $this->Users->filterListItem();
    $result = $this->db
      ->where_in("SUBSTR(akun.kode, 1, 2)", array(51, 52, 53))
      ->select("CONCAT(SUBSTR(akun.kode, 1, 2), ' ', CASE WHEN SUBSTR(akun.kode, 1, 2) = 51 THEN 'Belanja Pegawai' WHEN SUBSTR(akun.kode, 1, 2) = 52 THEN 'Belanja Barang' WHEN SUBSTR(akun.kode, 1, 2) = 53 THEN 'Belanja Modal' END) as label", false)
      ->select("IFNULL(SUM(detail.vol * detail.hargasat), 0) value", false)
      ->group_by("SUBSTR(akun.kode, 1, 2)")
      ->get()
      ->result();
    $total = 0;
    foreach ($result as $res) $total += (int) $res->value;
    foreach ($result as &$res) {
      $res->value /= $total / 100;
      $res->value = number_format ((float) $res->value, 2, '.', '');
    }
    return $result;
  }
}