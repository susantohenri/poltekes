<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'program';
    $this->form = array();
    $this->thead = array(
      (object) array('mData' => 'kode', 'sTitle' => 'Kode', 'className' => 'text-right'),
      (object) array('mData' => 'uraian', 'sTitle' => 'Uraian', 'width' => '30%'),
      (object) array('mData' => 'pagu', 'sTitle' => 'Pagu', 'className' => 'text-right'),
      (object) array('mData' => 'realisasi', 'sTitle' => 'Realisasi', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'sisa', 'sTitle' => 'Sisa', 'searchable' => 'false', 'className' => 'text-right'),
      (object) array('mData' => 'prosentase', 'sTitle' => 'Serapan', 'searchable' => 'false', 'className' => 'text-right'),
    );

    $this->form[]= array(
      'name' => 'uraian',
      'label'=> 'Copy-Paste RKA-KL',
      'value'=> '',
      'type' => 'textarea'
    );

    $this->childs[] = array('label' => '', 'controller' => 'KegiatanProgram', 'model' => 'KegiatanPrograms');
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
      'KegiatanPrograms',
      'OutputPrograms',
      'SubOutputPrograms',
      'KomponenPrograms',
      'SubKomponenPrograms',
      'AkunPrograms',
      'Details',
    ));
    $program = false;
    $kegiatanProgram = false;
    $outputProgram = false;
    $subOutputProgram = false;
    $komponenProgram = false;
    $subKomponenProgram = false;
    $akunProgram = false;
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
        $kegiatanProgram = $this->KegiatanPrograms->save(array(
          'program' => $program,
          'kegiatan' => $this->Kegiatans->findOrCreate(array('kode' => $cell[0], 'uraian' => $cell[1]))
        ));
        $outputProgram = false;
      } else if (1 === $codeDotCount) {
        if (!$kegiatanProgram) {
          $kegiatanProgram = $this->KegiatanPrograms->save(array(
            'program' => $program,
            'kegiatan' => $this->Kegiatans->findOrCreate(array('kode' => '', 'uraian' => 'Tanpa Kegiatan'))
          ));
        }
        $outputProgram = $this->OutputPrograms->save(array(
          'kegiatan_program' => $kegiatanProgram,
          'output' => $this->Outputs->findOrCreate(array('kode' => $cell[0], 'uraian' => $cell[1]))
        ));
        $subOutputProgram = false;
      } else if (2 === $codeDotCount) {
        if (!$outputProgram) {
          $outputProgram = $this->OutputPrograms->save(array(
            'kegiatan_program' => $kegiatanProgram,
            'output' => $this->Outputs->findOrCreate(array('kode' => '', 'uraian' => 'Tanpa Output'))
          ));
        }
        $subOutputProgram = $this->SubOutputPrograms->save(array(
          'output_program' => $outputProgram,
          'sub_output' => $this->SubOutputs->findOrCreate(array('kode' => $cell[0], 'uraian' => $cell[1])),
        ));
        $komponenProgram = false;
      } else if (3 === $codeLength) {
        if (!$subOutputProgram) {
          $subOutputProgram = $this->SubOutputPrograms->save(array(
            'output_program' => $outputProgram,
            'sub_output' => $this->SubOutputs->findOrCreate(array('kode' => '', 'uraian' => 'Tanpa Sub Output')),
          ));
        }
        $komponenProgram = $this->KomponenPrograms->save(array(
          'sub_output_program' => $subOutputProgram,
          'komponen' => $this->Komponens->findOrCreate(array('kode' => $cell[0], 'uraian' => $cell[1]))
        ));
        $subKomponenProgram = false;
      } else if (ctype_alpha ($cell[0])) {
        if (!$komponenProgram) {
          $komponenProgram = $this->KomponenPrograms->save(array(
            'sub_output_program' => $subOutputProgram,
            'komponen' => $this->Komponens->findOrCreate(array('kode' => '', 'uraian' => 'Tanpa Komponen'))
          ));
        }
        $subKomponenProgram = $this->SubKomponenPrograms->save(array(
          'komponen_program' => $komponenProgram,
          'sub_komponen' => $this->SubKomponens->findOrCreate(array('kode' => $cell[0], 'uraian' => $cell[1]))
        ));
        $akunProgram = false;
      } else if (6 === $codeLength) {
        if (!$subKomponenProgram) $subKomponenProgram = $this->SubKomponenPrograms->save(array(
          'komponen_program' => $komponenProgram,
          'sub_komponen' => $this->SubKomponens->findOrCreate(array('kode' => '', 'uraian' => 'Tanpa Sub Komponen'))
        ));
        $akunProgram = $this->AkunPrograms->save(array(
          'sub_komponen_program' => $subKomponenProgram,
          'akun' => $this->Akuns->findOrCreate(array('kode' => $cell[0], 'nama' => $cell[1])),
        ));
        $Detail = false;
      } else if (0 === $codeLength) {
        if (!$akunProgram) $akunProgram = $this->AkunPrograms->save(array(
          'sub_komponen_program' => $subKomponenProgram,
          'akun' => $this->Akuns->findOrCreate(array('kode' => '', 'nama' => 'Tanpa Akun')),
        ));
        $Detail = $this->Details->save(array(
          'akun_program' => $akunProgram,
          'uraian' => $cell[1],
          'vol' => $cell[2],
          'sat' => $cell[3],
          'hargasat' => $cell[4],
        ));
      }
    }
    return $program;
  }

  function getListItem ($uuid) { // sing iki durung
    $this->db
      ->select("{$this->table}.*")
      ->select("'' parent", false)
      ->select("FORMAT(SUM(detail.vol * detail.hargasat), 0) pagu", false)
      ->select("FORMAT(SUM(spj.vol * spj.hargasat), 0) realisasi", false)
      ->select("GROUP_CONCAT(DISTINCT kegiatan_program.uuid) childUuid", false)
      ->select("'KegiatanProgram' childController", false)
      ->join('kegiatan_program', "{$this->table}.uuid = kegiatan_program.program", 'left')
      ->join('output_program', "kegiatan_program.uuid = output_program.kegiatan_program", 'left')
      ->join('sub_output_program', "output_program.uuid = sub_output_program.output_program", 'left')
      ->join('komponen_program', "sub_output_program.uuid = komponen_program.sub_output_program", 'left')
      ->join('sub_komponen_program', "komponen_program.uuid = sub_komponen_program.komponen_program", 'left')
      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('detail', "akun_program.uuid = detail.akun_program", 'left')
      ->join('spj', "detail.uuid = spj.detail", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::getListItem ($uuid);
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.kode")
      ->select("{$this->table}.uraian")
      ->select("SUM(detail.hargasat * detail.vol) as pagu", false)
      ->select("SUM(spj.hargasat * spj.vol) as realisasi", false)
      ->select("IF(SUM(detail.hargasat * detail.vol) - SUM(spj.hargasat * spj.vol) > 0, SUM(detail.hargasat * detail.vol) - SUM(spj.hargasat * spj.vol), 0) as sisa")
      ->select("SUM(spj.hargasat * spj.vol) / SUM(detail.hargasat * detail.vol) * 100 as prosentase")
      ->join('kegiatan_program', "{$this->table}.uuid = kegiatan_program.{$this->table}", 'left')
      ->join('output_program', "kegiatan_program.uuid = output_program.kegiatan_program", 'left')
      ->join('sub_output_program', "output_program.uuid = sub_output_program.output_program", 'left')
      ->join('komponen_program', "sub_output_program.uuid = komponen_program.sub_output_program", 'left')
      ->join('sub_komponen_program', "komponen_program.uuid = sub_komponen_program.komponen_program", 'left')
      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('detail', "akun_program.uuid = detail.akun_program", 'left')
      ->join('spj', "detail.uuid = spj.detail", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

  function getForm ($uuid = false) {
    $this->childs = array();
    return parent::getForm ($uuid = false);
  }

}