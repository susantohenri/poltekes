<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akuns extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'akun';
    $this->thead = array(
      (object) array('mData' => 'urutan', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'kode_akun', 'sTitle' => 'Kode', 'className' => 'text-right', 'width' => '5%'),
      (object) array('mData' => 'nama_akun', 'sTitle' => 'Akun', 'width' => '50%'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'className' => 'text-right', 'searchable' => false, 'width' => '15%'),
      (object) array('mData' => 'total_spj', 'sTitle' => 'SPJ', 'searchable' => 'false', 'className' => 'text-right', 'width' => '15%'),
      (object) array('mData' => 'paid', 'sTitle' => 'Dibayar', 'searchable' => 'false', 'className' => 'text-right', 'width' => '15%'),
    );

    $this->form = array();
    $this->form[]= array(
      'name' => 'sub_komponen',
      'label'=> 'Sub Komponen',
      'options' => array(),
      'attributes' => array(
        array('data-autocomplete' => 'true'),
        array('data-model' => 'SubKomponens'),
        array('data-field' => 'uraian')
      ),
    );
    $this->form[]= array(
      'name' => 'kode',
      'label'=> 'Kode',
    );
    $this->form[]= array(
      'name' => 'uraian',
      'label'=> 'Uraian',
      'width'=> 8
    );
    $this->form[]= array(
      'name' => 'pagu',
      'label'=> 'Pagu',
      'value'=> 0,
      'attributes' => array(
        array('disabled' => 'disabled'),
        array('data-number' => 'true')
      ),
      'width'=> 2
    );
    $this->childs[] = array('label' => '', 'controller' => 'Detail', 'model' => 'Details');

  }

  function findOne ($param) {
    $param = !is_array($param) ? array("{$this->table}.uuid" => $param) : $param;
    $this->db
      ->select("{$this->table}.*")
      ->select('FORMAT(SUM(IFNULL(vol, 0) * IFNULL(hargasat, 0)), 0) pagu')
      ->join('detail', "{$this->table}.uuid = detail.akun", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::findOne($param);
  }

  function getListItem ($uuid, $jabatanGroup = null) {
    $this->load->model('Users');
    if (!is_null($jabatanGroup)) $this->Users->filterByJabatanGroup($this->db, $this->table, $jabatanGroup);
    else $this->Users->filterByJabatan($this->db);
    return $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("{$this->table}.sub_komponen parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("FORMAT(SUM(spj_lampiran.submitted_amount + spj.ppn + spj.pph), 0) as total_spj", false)
      ->select("FORMAT(SUM(payment_sent.paid_amount), 0) as paid", false)
      ->select("GROUP_CONCAT(DISTINCT detail.uuid) childUuid", false)
      ->select("'Detail' childController", false)
      ->select("{$this->table}.kode kode", false)
      ->select("{$this->table}.uraian uraian", false)
      ->group_by("{$this->table}.uuid")
      ->get()
      ->row_array();
  }

  function dt () {
  	$this->load->model('Users');
    $this->Users->filterByJabatan($this->datatables, $this->table);
    return $this->datatables
  		->select("{$this->table}.uuid")
  		->select("{$this->table}.urutan")
      ->select('akun.kode as kode_akun', false)
  		->select('akun.uraian as nama_akun', false)
      ->select("SUM(detail.hargasat * detail.vol) as pagu", false)
      ->select("SUM(spj_lampiran.submitted_amount + spj.ppn + spj.pph) as total_spj", false)
      ->select("SUM(payment_sent.paid_amount) as paid", false)
  		->group_by("{$this->table}.uuid")
      ->generate();
  }

  function select2 ($field, $term) {
    return $this->db
      ->select("{$this->table}.uuid id", false)
      ->select("CONCAT(akun.kode, ' - ', akun.uraian) text", false)
      ->limit(10)
      ->like("CONCAT(akun.kode, ' - ', akun.uraian)", $term)
      ->get($this->table)->result();
  }

  function findIn ($field, $value) {
    $this->db
      ->select("{$this->table}.*")
      ->select("CONCAT({$this->table}.kode, ' - ', {$this->table}.uraian) uraian", false);
    return parent::findIn("{$this->table}.{$field}", $value);
  }

  function getForm ($uuid = false, $isSubform = false) {
    if ($isSubform) {
      unset($this->form[0]);
      unset($this->form[count ($this->form)]);
    }
    return parent::getForm ($uuid, $isSubform);
  }

  function getSPTJ ($uuid) {
    $result = array();
    $akun = $this->db->get_where($this->table, array('uuid' => $uuid))->row_array();
    $data = $this->db->query("
      SELECT
        DATE_FORMAT(CURRENT_DATE, '%d %b %Y') tgl_cetak
        , program.kode kode_program
        , program.tahun_anggaran
        , kegiatan.kode kode_kegiatan
        , output.kode kode_output
        , komponen.kode kode_komponen
        , sub_komponen.kode kode_subkomponen
        , akun.kode kode_akun
        , user.email penerima
        , spj.uraian
        , DATE_FORMAT(spj.createdAt, '%d-%m-%Y') tanggal_e
        , SUM(lampiran.vol * lampiran.hargasat) jumlah
        , spj.ppn
        , spj.pph
        , spj.uuid spj_uuid
      FROM spj
      LEFT JOIN lampiran ON lampiran.spj = spj.uuid
      LEFT JOIN detail ON spj.detail = detail.uuid
      LEFT JOIN akun ON detail.akun = akun.uuid
      LEFT JOIN sub_komponen ON akun.sub_komponen = sub_komponen.uuid
      LEFT JOIN komponen ON sub_komponen.komponen = komponen.uuid
      LEFT JOIN sub_output ON komponen.sub_output = sub_output.uuid
      LEFT JOIN output ON sub_output.output = output.uuid
      LEFT JOIN kegiatan ON output.kegiatan = kegiatan.uuid
      LEFT JOIN program ON kegiatan.program = program.uuid
      LEFT JOIN spj_log ON spj.uuid = spj_log.spj AND spj_log.action = 'create'
      LEFT JOIN user ON spj_log.user = user.uuid
      LEFT JOIN jabatan ON user.jabatan = jabatan.uuid
      WHERE TRUE
      AND akun.kode = {$akun['kode']}
      AND spj.sptj_printed = 0
      GROUP BY spj.uuid
    ")->result();

    if (count($data) < 1) return $result;
    $header = $data[0];

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

    $result['Tanggal/No. DIPA'] = array(
      'col' => 3,
      'row' => 5,
      'value' => ": {$header->tgl_cetak} / No. SP DIPA-{$header->kode_program}.632242/{$header->tahun_anggaran}"
    );

    $kode_output = explode('.', $header->kode_output);
    $result['Klasifikasi Anggaran'] = array(
      'col' => 3,
      'row' => 6,
      'value' => ": 01 / 01 / {$header->kode_program} / {$kode_output[0]} / {$kode_output[1]} / {$header->kode_komponen}.{$header->kode_subkomponen}/ {$header->kode_akun}"
    );

    $walkingRow = 15;
    $noUrut = 1;
    $totalJumlah = 0;
    $totalPPN = 0;
    $totalPPH = 0;
    $spjUuids = array();
    foreach ($data as $spj) {

      $totalJumlah += $spj->jumlah;
      $totalPPH += $spj->pph;
      $totalPPN += $spj->ppn;
      $spjUuids[] = $spj->spj_uuid;

      $result["SPJ-No-{$noUrut}"] = array(
        'col' => 0,
        'row' => $walkingRow,
        'value' => $noUrut
      );
      $result["SPJ-AKUN-{$noUrut}"] = array(
        'col' => 1,
        'row' => $walkingRow,
        'value' => $spj->kode_akun
      );
      $result["SPJ-Penerima-{$noUrut}"] = array(
        'col' => 2,
        'row' => $walkingRow,
        'value' => $spj->penerima
      );
      $result["SPJ-Uraian-{$noUrut}"] = array(
        'col' => 3,
        'row' => $walkingRow,
        'value' => $spj->uraian
      );
      $result["SPJ-Tanggal-{$noUrut}"] = array(
        'col' => 4,
        'row' => $walkingRow,
        'value' => $spj->tanggal_e
      );
      $result["SPJ-f-{$noUrut}"] = array(
        'col' => 5,
        'row' => $walkingRow,
        'value' => ''
      );
      $result["SPJ-Nomor-{$noUrut}"] = array(
        'col' => 6,
        'row' => $walkingRow,
        'value' => $noUrut < 10 ? "0{$noUrut}" : $noUrut
      );
      $result["SPJ-Jumlah-{$noUrut}"] = array(
        'col' => 7,
        'row' => $walkingRow,
        'value' => $spj->jumlah
      );
      $result["SPJ-PPN-{$noUrut}"] = array(
        'col' => 8,
        'row' => $walkingRow,
        'value' => $spj->ppn
      );
      $result["SPJ-PPH-{$noUrut}"] = array(
        'col' => 9,
        'row' => $walkingRow,
        'value' => $spj->pph
      );
      $walkingRow++;
      $noUrut++;
    }
    $this->db->where_in('uuid', $spjUuids)->set('sptj_printed', 1)->update('spj');

    $walkingRow ++;
    $result["Total Jumlah"] = array(
      'col' => 7,
      'row' => $walkingRow,
      'value' => $totalJumlah
    );
    $result["Total PPN"] = array(
      'col' => 8,
      'row' => $walkingRow,
      'value' => $totalPPN
    );
    $result["Total PPH"] = array(
      'col' => 9,
      'row' => $walkingRow,
      'value' => $totalPPH
    );

    $walkingRow += 10;

    $result['Nama Atasan Langsung'] = array(
      'col' => 0,
      'row' => $walkingRow,
      'value' => $atasan_langsung['email']
    );
    $result['Nama Bendahara Pengeluaran'] = array(
      'col' => 6,
      'row' => $walkingRow,
      'value' => $bendahara_pengeluaran['email']
    );

    $walkingRow++;
    $result['Nip Atasan Langsung'] = array(
      'col' => 0,
      'row' => $walkingRow,
      'value' => "NIP. {$atasan_langsung['nip']}"
    );
    $result['Nip  Bendahara Pengeluaran'] = array(
      'col' => 6,
      'row' => $walkingRow,
      'value' => "NIP. {$bendahara_pengeluaran['nip']}"
    );
    return $result;
  }

}
