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
      (object) array('mData' => 'prosentase', 'sTitle' => 'Penyerapan', 'searchable' => 'false', 'className' => 'text-right'),
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
      'Spjs',
    ));
    $program = false;
    $kegiatanProgram = false;
    $outputProgram = false;
    $subOutputProgram = false;
    $komponenProgram = false;
    $subKomponenProgram = false;
    $akunProgram = false;
    $spj = false;
    foreach (explode ("\n", $xlsString) as $rowIndex => $rowContent) {
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
        $kegiatan = $this->Kegiatans->findOrCreate(array('kode' => $cell[0], 'uraian' => $cell[1]));
        $kegiatanProgram = $this->KegiatanPrograms->save(array(
          'program' => $program,
          'kegiatan' => $kegiatan
        ));
      } else if (1 === $codeDotCount) {
        $output = $this->Outputs->findOrCreate(array('kode' => $cell[0], 'uraian' => $cell[1]));
        $outputProgram = $this->OutputPrograms->save(array(
          'kegiatan_program' => $kegiatanProgram,
          'output' => $output
        ));
      } else if (2 === $codeDotCount) {
        $subOutput = $this->SubOutputs->findOrCreate(array('kode' => $cell[0], 'uraian' => $cell[1]));
        $subOutputProgram = $this->SubOutputPrograms->save(array(
          'output_program' => $outputProgram,
          'sub_output' => $subOutput,
        ));
      } else if (3 === $codeLength) {
        $komponen = $this->Komponens->findOrCreate(array('kode' => $cell[0], 'uraian' => $cell[1]));
        $komponenProgram = $this->KomponenPrograms->save(array(
          'sub_output_program' => $subOutputProgram,
          'komponen' => $komponen
        ));
      } else if (ctype_alpha ($cell[0])) {
        $subKomponen = $this->SubKomponens->findOrCreate(array('kode' => $cell[0], 'uraian' => $cell[1]));
        $subKomponenProgram = $this->SubKomponenPrograms->save(array(
          'komponen_program' => $komponenProgram,
          'sub_komponen' => $subKomponen
        ));
      } else if (6 === $codeLength) {
        $akun = $this->Akuns->findOrCreate(array('kode' => $cell[0], 'nama' => $cell[1]));
        $akunProgram = $this->AkunPrograms->save(array(
          'sub_komponen_program' => $subKomponenProgram,
          'akun' => $akun,
          // 'pagu' => 10000000 TESTING PURPOSE
        ));
      } else if (0 === $codeLength) {
        $spj = $this->Spjs->save(array(
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
      ->select("FORMAT(SUM(vol*hargasat), 0) jumlah", false)
      ->select("GROUP_CONCAT(DISTINCT kegiatan_program.uuid) childUuid", false)
      ->select("'KegiatanProgram' childController", false)
      ->join('kegiatan_program', "{$this->table}.uuid = kegiatan_program.program", 'left')
      ->join('output_program', "kegiatan_program.uuid = output_program.kegiatan_program", 'left')
      ->join('sub_output_program', "output_program.uuid = sub_output_program.output_program", 'left')
      ->join('komponen_program', "sub_output_program.uuid = komponen_program.sub_output_program", 'left')
      ->join('sub_komponen_program', "komponen_program.uuid = sub_komponen_program.komponen_program", 'left')
      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('spj', "akun_program.uuid = spj.akun_program", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::getListItem ($uuid);
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.kode")
      ->select("{$this->table}.uraian")
      ->select('akun_program.pagu')
      ->select("SUM(hargasat * vol) as realisasi", false)
      ->select("IF(SUM(pagu) - SUM(hargasat * vol) > 0, SUM(pagu) - SUM(hargasat * vol), 0) as sisa")
      ->select("SUM(hargasat * vol) / SUM(pagu) * 100 as prosentase")
      ->join('kegiatan_program', "{$this->table}.uuid = kegiatan_program.{$this->table}", 'left')
      ->join('output_program', "kegiatan_program.uuid = output_program.kegiatan_program", 'left')
      ->join('sub_output_program', "output_program.uuid = sub_output_program.output_program", 'left')
      ->join('komponen_program', "sub_output_program.uuid = komponen_program.sub_output_program", 'left')
      ->join('sub_komponen_program', "komponen_program.uuid = sub_komponen_program.komponen_program", 'left')
      ->join('akun_program', "sub_komponen_program.uuid = akun_program.sub_komponen_program", 'left')
      ->join('spj', "akun_program.uuid = spj.akun_program", 'left')
      ->group_by("{$this->table}.uuid");
    return parent::dt();
  }

}