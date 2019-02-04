<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'program';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'kode', 'sTitle' => 'Kode', 'className' => 'text-right', 'width' => '5%'),
      (object) array('mData' => 'uraian', 'sTitle' => 'Uraian', 'width' => '50%'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'className' => 'text-right', 'searchable' => false, 'width' => '15%'),
      (object) array('mData' => 'total_spj', 'sTitle' => 'SPJ', 'searchable' => 'false', 'className' => 'text-right', 'width' => '15%'),
      (object) array('mData' => 'paid', 'sTitle' => 'Dibayar', 'searchable' => 'false', 'className' => 'text-right', 'width' => '15%'),
    );

    $this->form[]= array(
      'name' => 'uraian',
      'label'=> 'Copy-Paste RKA-KL',
      'value'=> '',
      'type' => 'textarea'
    );

    $this->childs[] = array('label' => '', 'controller' => 'Kegiatan', 'model' => 'Kegiatans');
  }

  function create ($data) {
    $xlsString = $data[$this->form[0]['name']];
    $this->load->model(array(
      'Kegiatans',
      'Outputs',
      'SubOutputs',
      'Komponens',
      'SubKomponens',
      'Akuns',
      'Details',
      'JabatanGroups',
      'Assignments'
    ));
    $breakdown = array();
    foreach ($this->JabatanGroups->find() as $formula) $breakdown[$formula->kode] = $formula->uuid;
    $program = false;
    $kegiatan = false;
    $output = false;
    $subOutput = false;
    $komponen = false;
    $subKomponen = false;
    $jabatanGroup= false;
    $akun = false;
    $Detail = false;
    foreach (explode ("\n", str_replace("\n[Base Line]", '', $xlsString)) as $rowIndex => $rowContent) {
      if (0 === $rowIndex) continue;
      $cell = explode ("\t", $rowContent);
      $cell[0] = trim($cell[0]);
      $codeDotCount = substr_count($cell[0], '.');
      $codeLength = strlen($cell[0]);

      if (2 === $codeDotCount && $codeLength <= 9) {
        $program = parent::create(array(
          'kode' => $cell[0],
          'uraian' => $cell[1]
        ));
      } else if ($codeLength === 4) {
        if (!$program) {
          $program = parent::create(array(
            'kode' => '',
            'uraian' => 'Tanpa Program'
          ));
        }
        $kegiatan = $this->Kegiatans->save(array(
          'program' => $program, 'kode' => $cell[0], 'uraian' => $cell[1]
        ));
        $output = false;
      } else if (1 === $codeDotCount) {
        if (!$kegiatan) {
          $kegiatan = $this->Kegiatans->save(array(
            'program' => $program, 'kode' => '', 'uraian' => 'Tanpa Kegiatan'
          ));
        }
        $output = $this->Outputs->save(array(
          'kegiatan' => $kegiatan, 'kode' => $cell[0], 'uraian' => $cell[1]
        ));
        $subOutput = false;
      } else if (2 === $codeDotCount) {
        if (!$output) {
          $output = $this->Outputs->save(array(
            'kegiatan' => $kegiatan, 'kode' => '', 'uraian' => 'Tanpa Output'
          ));
        }
        $subOutput = $this->SubOutputs->save(array(
          'output' => $output, 'kode' => $cell[0], 'uraian' => $cell[1]
        ));
        $komponen = false;
      } else if (3 === $codeLength) {
        if (!$subOutput) {
          $subOutput = $this->SubOutputs->save(array(
            'output' => $output, 'kode' => '', 'uraian' => 'Tanpa Sub Output'
          ));
        }
        $komponen = $this->Komponens->save(array(
          'sub_output' => $subOutput, 'kode' => $cell[0], 'uraian' => $cell[1]
        ));
        $subKomponen = false;
      } else if (ctype_alpha ($cell[0])) {
        if (!$komponen) {
          $komponen = $this->Komponens->save(array(
            'sub_output' => $subOutput, 'kode' => '', 'uraian' => 'Tanpa Komponen'
          ));
        }
        $subKomponen = $this->SubKomponens->save(array(
          'komponen' => $komponen, 'kode' => $cell[0], 'uraian' => $cell[1]
        ));
        if (isset ($breakdown[$cell[0]])) $jabatanGroup = $breakdown[$cell[0]];
        $akun = false;
      } else if (6 === $codeLength) {
        if (!$subKomponen) $subKomponen = $this->SubKomponens->save(array(
          'komponen' => $komponen, 'kode' => '', 'uraian' => 'Tanpa Sub Komponen'
        ));
        $akun = $this->Akuns->save(array(
          'sub_komponen' => $subKomponen, 'kode' => $cell[0], 'uraian' => $cell[1]
        ));
        $Detail = false;
      } else if (0 === $codeLength) {
        if (!$akun) $akun = $this->Akuns->save(array(
          'sub_komponen' => $subKomponen, 'kode' => '', 'uraian' => 'Tanpa Akun'
        ));
        $Detail = $this->Details->save(array(
          'akun' => $akun,
          'uraian' => $cell[1],
          'vol' => $cell[2],
          'sat' => $cell[3],
          'hargasat' => $cell[4],
        ));
        $this->Assignments->save(array(
          'jabatan_group' => $jabatanGroup,
          'detail' => $Detail
        ));
      }
    }
    return $program;
  }

  function getListItem ($uuid, $jabatanGroup = null) {
    $this->load->model('Users');
    $this->Users->filterListItem();
    return 
    $this->db
      ->where("{$this->table}.uuid", $uuid)
      ->select("{$this->table}.*")
      ->select("'' parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("SUM(spj_item.submitted_amount + spj.ppn + spj.pph) as total_spj", false)
      ->select("FORMAT(SUM(payment_sent.paid_amount), 0) as paid", false)
      ->select("GROUP_CONCAT(DISTINCT kegiatan.uuid) childUuid", false)
      ->select("'Kegiatan' childController", false)
      ->group_by("{$this->table}.uuid")
      ->get()
      ->row_array();
  }

  function dt () {
    $this->load->model('Users');
    $this->Users->filterDt();
    return $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.kode")
      ->select("{$this->table}.uraian")
      ->select("SUM(detail.hargasat * detail.vol) as pagu", false)
      ->select("SUM(spj_item.submitted_amount + spj.ppn + spj.pph) as total_spj", false)
      ->select("SUM(payment_sent.paid_amount) as paid", false)
      ->group_by("{$this->table}.uuid")
      ->generate();
  }

  function getForm ($uuid = false, $isSubform = false) {
    if ($isSubform) unset($this->form[0]);
    if (!$uuid) $this->childs = array();
    else {
      $this->form = array();
      $this->form[]= array(
        'name' => 'kode',
        'label'=> 'Kode',
      );
      $this->form[]= array(
        'name' => 'uraian',
        'label'=> 'Uraian',
        'width'=> 9
      );
    }
    return parent::getForm ($uuid, $isSubform);
  }

  function findIn ($field, $value) {
    $this->db
      ->select("{$this->table}.*")
      ->select("CONCAT({$this->table}.kode, ' - ', {$this->table}.uraian) uraian", false);
    return parent::findIn("{$this->table}.{$field}", $value);
  }

}