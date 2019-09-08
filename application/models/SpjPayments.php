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
      'name' => 'user_recipient',
      'label'=> 'Nama Penerima',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'Users'),
        array('data-field' => 'email')
      ),
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

    $this->form[]= array(
      'name' => 'payment_method',
      'label'=> 'Jenis Pembayaran',
      'options' => array(
        array('text' => 'Transfer Bank', 'value' => 'transfer'),
        array('text' => 'Check', 'value' => 'check')
      ),
      'width'=> 5
    );

    $this->form[]= array(
      'name' => 'check_no',
      'label'=> 'Nomor Check',
      'attributes' => array(
        array('data-pymt-mthd' => 'check')
      ),
      'width'=> 5
    );

    $this->form[]= array(
      'name' => 'sender',
      'label'=> 'Rekening Pengirim',
      'attributes' => array(
        array('data-pymt-mthd' => 'transfer')
      ),
      'width'=> 5
    );

    $this->form[]= array(
      'name' => 'recipient',
      'label'=> 'Rekening Penerima',
      'attributes' => array(
        array('data-pymt-mthd' => 'transfer')
      ),
      'width'=> 5
    );

  }

  function getForm ($uuid = false, $isSubform = false) {
    if ($isSubform) unset($this->form[0]);
    $form = parent::getForm ($uuid, $isSubform);
    if ($isSubform) {
      foreach ($form as &$field) {
        if ('transfer_time' === $field['name']) $field['value'] = date('d F Y', strtotime($field['value']));
      }
    }
    return $form;
  }

  function findOne ($param) {
    $this->db
      ->select('*')
      ->select('FORMAT(amount, 0) amount', false);
    return parent::findOne($param);
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

  function getKwitansi ($uuid) {
    $data = $this->db->query("
      SELECT
        program.tahun_anggaran
        , spj.mak
        , spj.no_bukti
        , spj.uraian
        , spj.uuid as spj_uuid
        , payment.amount
        , SUM(lampiran.vol * lampiran.hargasat) total_lampiran
      FROM payment
      LEFT JOIN spj ON payment.spj = spj.uuid
      LEFT JOIN lampiran ON lampiran.spj = payment.spj
      LEFT JOIN detail ON spj.detail = detail.uuid
      LEFT JOIN akun ON detail.akun = akun.uuid
      LEFT JOIN sub_komponen ON akun.sub_komponen = sub_komponen.uuid
      LEFT JOIN komponen ON sub_komponen.komponen = komponen.uuid
      LEFT JOIN sub_output ON komponen.sub_output = sub_output.uuid
      LEFT JOIN output ON sub_output.output = output.uuid
      LEFT JOIN kegiatan ON output.kegiatan = kegiatan.uuid
      LEFT JOIN program ON kegiatan.program = program.uuid
      WHERE payment.uuid = '{$uuid}'
    ")->row_array();

    $atasan_langsung = $this->db->query("
      SELECT `user`.email, `user`.nip
      FROM `user`
      LEFT JOIN jabatan ON jabatan.uuid = `user`.jabatan
      WHERE jabatan.nama = 'Atasan Langsung Bendahara Pengeluaran'
    ")->row_array();

    $bendahara_pengeluaran = $this->db->query("
      SELECT `user`.email, `user`.nip
      FROM `user`
      LEFT JOIN jabatan ON jabatan.uuid = `user`.jabatan
      WHERE jabatan.nama = 'Bendahara Pengeluaran Direktorat'
    ")->row_array();

    $result['T.A'] = array(
      'col' => 9,
      'row' => 2,
      'value' => ": {$data['tahun_anggaran']}"
    );

    $result['MAK'] = array(
      'col' => 9,
      'row' => 3,
      'value' => ": {$data['mak']}"
    );

    $result['Nomor Bukti'] = array(
      'col' => 9,
      'row' => 4,
      'value' => ": {$data['no_bukti']}"
    );

    $result['Uang sebesar'] = array(
      'col' => 3,
      'row' => 9,
      'value' => 'Rp ' . number_format($data['amount'])
    );

    $result['Terbilang'] = array(
      'col' => 3,
      'row' => 10,
      'value' => "{$this->terbilang($data['amount'])} Rupiah"
    );

    $result['Guna Membayar'] = array(
      'col' => 3,
      'row' => 11,
      'value' => $data['uraian']
    );

    $this->load->model("Lampirans");
    $lampirans = $this->Lampirans->find(array('spj' => $data['spj_uuid']));
    $row = 13;
    foreach($lampirans as $lampiran) {
      $lampiran->total = number_format($lampiran->hargasat * $lampiran->vol);
      $lampiran->hargasat = number_format($lampiran->hargasat);
      $result["Lampiran {$row}:2"] = array(
        'col' => 2,
        'row' => $row,
        'value' => '-'
      );
      $result["Lampiran {$row}:3"] = array(
        'col' => 3,
        'row' => $row,
        'value' => "{$lampiran->uraian} : {$lampiran->vol} {$lampiran->sat} @ Rp. {$lampiran->hargasat},-"
      );
      $result["Lampiran {$row}:7"] = array(
        'col' => 7,
        'row' => $row,
        'value' => '='
      );
      $result["Lampiran {$row}:8"] = array(
        'col' => 8,
        'row' => $row,
        'value' => "Rp {$lampiran->total}"
      );
      $row++;
    }
 
    $result['Total Lampiran'] = array(
      'col' => 8,
      'row' => $row,
      'value' => 'Rp ' . number_format($data['total_lampiran'])
    );

    $result['Nama Atasan Langsung'] = array(
      'col' => 0,
      'row' => $row + 21,
      'value' => $atasan_langsung['email']
    );
    $result['Nip Atasan Langsung'] = array(
      'col' => 0,
      'row' => $row + 22,
      'value' => $atasan_langsung['nip']
    );

    $result['Nama Bendahara Pengeluaran'] = array(
      'col' => 0,
      'row' => $row + 32,
      'value' => $bendahara_pengeluaran['email']
    );
    $result['Nip  Bendahara Pengeluaran'] = array(
      'col' => 0,
      'row' => $row + 33,
      'value' => $bendahara_pengeluaran['nip']
    );
    return $result;
  }

  function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
      $temp = $this->penyebut($nilai - 10). " Belas";
    } else if ($nilai < 100) {
      $temp = $this->penyebut($nilai/10)." Puluh". $this->penyebut($nilai % 10);
    } else if ($nilai < 200) {
      $temp = " Seratus" . $this->penyebut($nilai - 100);
    } else if ($nilai < 1000) {
      $temp = $this->penyebut($nilai/100) . " Ratus" . $this->penyebut($nilai % 100);
    } else if ($nilai < 2000) {
      $temp = " Seribu" . $this->penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
      $temp = $this->penyebut($nilai/1000) . " Ribu" . $this->penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
      $temp = $this->penyebut($nilai/1000000) . " Juta" . $this->penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
      $temp = $this->penyebut($nilai/1000000000) . " Milyar" . $this->penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
      $temp = $this->penyebut($nilai/1000000000000) . " Trilyun" . $this->penyebut(fmod($nilai,1000000000000));
    }
    return $temp;
  }

  function terbilang($nilai) {
    if($nilai<0) {
      $hasil = "minus ". trim($this->penyebut($nilai));
    } else {
      $hasil = trim($this->penyebut($nilai));
    }
    return $hasil;
  }

}