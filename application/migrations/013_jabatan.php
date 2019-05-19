<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_jabatan extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `jabatan_group` (
        `uuid` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        `kode` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->db->query("
      CREATE TABLE `jabatan` (
        `uuid` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        `parent` varchar(255) NOT NULL,
        `jabatan_group` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->db->query("
      CREATE TABLE `topdown` (
        `uuid` varchar(255) NOT NULL,
        `jabatan_group` varchar(255) NOT NULL,
        `bawahan` text NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT ,
        PRIMARY KEY (`uuid`),
        KEY `jabatan_group` (`jabatan_group`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->load->model(array('Jabatans', 'Permissions', 'JabatanGroups'));
    $entities = $this->Permissions->getEntities();

    $planner = $this->Jabatans->save(array('nama' => 'Perencanaan'));
    $this->db->set('jabatan', $planner)->update('user');
    foreach (array('User', 'Jabatan') as $e) {
      foreach (array('index', 'create', 'read', 'update', 'delete') as $a) {
        $this->Permissions->setPermission($planner, $e, $a);
      }
    }
    foreach ($this->Permissions->getGeneralEntities() as $e) {
      foreach (array('index', 'create', 'update', 'delete') as $a) $this->Permissions->setPermission($planner, $e, $a);
    }
    foreach (array('index', 'create', 'update', 'delete') as $action) $this->Permissions->setPermission($planner, 'Detail', $action);
    foreach (array('index', 'read', 'update') as $action) $this->Permissions->setPermission($planner, 'Breakdown', $action);
    foreach (array('index', 'create', 'update', 'delete') as $action) $this->Permissions->setPermission($planner, 'Permission', $action);
    $atasan = '';
    foreach (array (
      'Atasan Langsung Bendahara Pengeluaran',
      'Bendahara Pengeluaran Direktorat',
      'Verifikator Direktorat',
    ) as $jabatan) {
      $atasan = $this->Jabatans->save(array(
        'nama'  => $jabatan,
        'parent'=> $atasan
      ));
    }
    $verifDir = $atasan;
    $this->Permissions->setPermission($verifDir, 'Akun', 'print');

    $jurusans = array (
      array ("A", "Jurusan Keperawatan"), 
      array ("B", "Jurusan Kebidanan"), 
      array ("C", "Jurusan Keperawatan Gigi"), 
      array ("D", "Jurusan Kesehatan Lingkungan"), 
      array ("E", "Jurusan Gizi"), 
      array ("F", "Jurusan Analis Kesehatan"), 
      array ("G", "Jurusan Teknik Radiodiagnostik & Radioterapi"), 
      array ("H", "Jurusan Rekam Medis dan Informasi Kesehatan"),
    );
    $benjurs = array();
    foreach ($jurusans as $jur) {
      $group = $this->JabatanGroups->create(array('nama' => $jur[1], 'kode' => $jur[0]));
      $parent = array();
      foreach (array ('Kepala / Sekretaris', 'Bendahara') as $jabatan) {
        $kode = $jur[0];
        $jurusan = $jur[1];
        $jab = $this->Jabatans->save(array(
          'nama' => "{$jabatan} {$jurusan}",
          'parent' => 0 < count($parent) ? implode(',', $parent) : $verifDir,
          'jabatan_group' => $group
        ));
        if ('Bendahara' === $jabatan) $benjurs[$kode] = $jab;
        $parent[] = $jab;
      }
    }

    foreach (array (
      array ("AA", "D-III Keperawatan Semarang"), 
      array ("AB", "D-III Keperawatan Purwokerto"), 
      array ("AC", "D-III Keperawatan Pekalongan"), 
      array ("AD", "D-III Keperawatan Blora"), 
      array ("AE", "D-III Keperawatan Magelang"), 
      array ("AF", "D IV Keperawatan Semarang"), 
      array ("AG", "D IV Keperawatan Medikal Bedah"), 
      array ("AH", "D IV Keperawatan Gawat Darurat"), 
      array ("AI", "D IV Keperawatan Kardiovaskuler"), 
      array ("AJ", "D-IV Keperawatan Magelang"), 
      array ("AK", "Profesi Ners"), 
      array ("BA", "D-III Kebidanan Blora"), 
      array ("BB", "D-III Kebidanan Semarang"), 
      array ("BC", "D-III Kebidanan Magelang"), 
      array ("BD", "D-III Kebidanan Purwokerto"), 
      array ("BE", "D-IV Bidan Pendidik Semarang"), 
      array ("BF", "D-IV Kebidanan Semarang"), 
      array ("BG", "D-IV Kebidanan Komunitas Magelang"), 
      array ("BH", "D IV Kebidanan Magelang"), 
      array ("BI", "Profesi Bidan"), 
      array ("AL", "Keperawatan Magister Terapan Kesehatan"), 
      array ("BJ", "Kebidanan Magister Terapan Kesehatan"), 
      array ("GD", "Imaging Diagnostik Magister Terapan Kesehatan"), 
      array ("CC", "Terapis Gigi dan Mulut Magister Terapan Kesehatan"), 
      array ("CA", "D-III Keperawatan Gigi Semarang"), 
      array ("CB", "D-IV Keperawatan Gigi"), 
      array ("DA", "D-III Kesehatan Lingkungan Purwokerto"), 
      array ("DB", "D-IV Kesehatan Lingkungan Purwokerto"), 
      array ("EA", "D-III Gizi Semarang"), 
      array ("EB", "D-IV Gizi Semarang"), 
      array ("EC", "Dietisien"), 
      array ("FA", "D-III Analis Kesehatan Semarang"), 
      array ("FB", "D-III Teknologi Bank Darah"), 
      array ("FC", "D-IV Teknik Laboratorium Medis"), 
      array ("GA", "D-III TRR Semarang"), 
      array ("GB", "D-IV Teknik Radiologi"), 
      array ("GC", "D-III TRR Purwokerto"), 
      array ("HA", "D-III Rekam Medis dan Informasi Kesehatan"), 
      array ("HB", "D-IV Rekam Medis dan Informasi Kesehatan")
    ) as $prod) {
      $group = $this->JabatanGroups->create(array('nama' => "Prodi {$prod[1]}", 'kode' => "{$prod[0]}"));
      $kode = $prod[0];
      $prodi= $prod[1];
      $parent = array();
      $jurusan = $benjurs[substr($kode, 0, -1)];
      foreach (array ('Kaprodi / Sekretaris Prodi', 'Bendahara Prodi') as $jabatan) {
        $jab = $this->Jabatans->save(array(
          'nama' => "{$jabatan} {$prodi}",
          'parent' => 0 < count($parent) ? implode(',', $parent) : $jurusan,
          'jabatan_group' => $group
        ));
        $parent[] = $jab;
      }
    }

    $group_direktorat = $this->JabatanGroups->create(array(
      'nama' => 'Direktorat'
    ));
    foreach (array ('Bendahara Gaji', 'Bendahara Pembantu Pengeluaran Direktorat') as $custom) $this->Jabatans->save(array(
      'nama' => $custom,
      'parent' => $verifDir,
      'jabatan_group' => $group_direktorat
    ));

    foreach (array(
      'Penjaminan Mutu',
      'Penelitian dan Pengabdian Masyarakat',
      'IT',
      'Pengembangan Pendidikan dan Laboratorium',
      'Perpustakaan',
      'CDC',
      'Asrama',
      'Pengembangan Bahasa'
    ) as $unit) {
      $group = $this->JabatanGroups->create(array('nama' => "Unit {$unit}"));
      $kepalaUnit = $this->Jabatans->save(array(
        'nama' => "Kepala Unit {$unit}",
        'parent' => $verifDir,
        'jabatan_group' => $group
      ));
      $this->Jabatans->save(array(
        'nama' => "Bendahara Unit {$unit}",
        'parent' => $kepalaUnit,
        'jabatan_group' => $group
      ));
    }

    foreach (array(
      'PPM'
    ) as $urusan) {
      $group = $this->JabatanGroups->create(array('nama' => "Urusan {$urusan}"));
      $kepalaUrusan = $this->Jabatans->save(array(
        'nama' => "Kepala Urusan {$urusan}",
        'parent' => $verifDir,
        'jabatan_group' => $group
      ));
      $this->Jabatans->save(array(
        'nama' => "Bendahara Urusan {$urusan}",
        'parent' => $kepalaUrusan,
        'jabatan_group' => $group
      ));
    }

    foreach ($this->Jabatans->find() as $jbtn) {
      $this->Permissions->setGeneralPermission($jbtn->uuid);
      $this->Users->save(array(
        'email' => $jbtn->nama,
        'password' => '123',
        'confirm_password' => '123',
        'jabatan' => $jbtn->uuid
      ));
    }

    $para_bendahara = $this->db
      ->where(array('nama LIKE' => 'Bendahara%'))
      ->where(array('nama <>' => 'Bendahara Pengeluaran Direktorat'))
      ->get('jabatan')
      ->result();
    foreach ($para_bendahara as $bendahara) {
      foreach (array('Spj', 'Lampiran') as $entity) {
        foreach(array('create', 'update', 'delete') as $action) {
          $this->Permissions->setPermission($bendahara->uuid, $entity, $action);
        }
      }
    }

    $para_kepala = $this->db
      ->where(array('nama LIKE' => 'kepala%'))
      ->or_where(array('nama LIKE' => 'kaprodi%'))
      ->get('jabatan')
      ->result();
    foreach ($para_kepala as $kepala) {
      foreach (array('Spj', 'Lampiran') as $entity) {
        foreach(array('create', 'update', 'delete') as $action) {
          if ('Spj' === $entity && 'delete' === $action) continue;
          $this->Permissions->setPermission($kepala->uuid, $entity, $action);
        }
      }
    }

    $allow_create_payment = $this->db
      ->where('nama', 'Bendahara Pengeluaran Direktorat')
      ->get('jabatan')
      ->row_array();
    $this->Permissions->setPermission($allow_create_payment['uuid'], 'SpjPayment', 'create');
    $this->Permissions->setPermission($allow_create_payment['uuid'], 'SpjPayment', 'update');
    $this->Permissions->setPermission($allow_create_payment['uuid'], 'SpjPayment', 'delete');
    foreach ($this->Jabatans->find() as $jab) {
      $this->Permissions->setPermission($jab->uuid, 'SpjPayment', 'index');
      $this->Permissions->setPermission($jab->uuid, 'SpjPayment', 'read');
    }

    $para_bendahara = $this->db
      ->where(array('nama LIKE' => 'Bendahara%'))
      ->get('jabatan')
      ->result();
    foreach ($para_bendahara as $bendahara) {
      $this->Permissions->setPermission($bendahara->uuid, 'SpjPayment', 'print');
      $this->Permissions->setPermission($bendahara->uuid, 'Spj', 'print');
      $this->Permissions->setPermission($bendahara->uuid, 'Akun', 'print');
    }

  }

  function down () {
    $this->db->query("DROP TABLE `jabatan`");
    $this->db->query("DROP TABLE `jabatan_group`");
    $this->db->query("DROP TABLE `topdown`");
  }

}