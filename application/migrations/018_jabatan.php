<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_jabatan extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `jabatan` (
        `uuid` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        `parent` varchar(255) NOT NULL,
        `akses_level` varchar(255) NOT NULL,
        `kode` varchar(255) NOT NULL,
        `items` varchar(255) NOT NULL,
        `allow_edit_spj` TINYINT(1) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->load->model('Jabatans');
    $this->Jabatans->save(array('nama' => 'Perencanaan'));

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

    foreach (array (
      array ("A", "Jurusan Keperawatan"), 
      array ("B", "Jurusan Kebidanan"), 
      array ("C", "Jurusan Keperawatan Gigi"), 
      array ("D", "Jurusan Kesehatan Lingkungan"), 
      array ("E", "Jurusan Gizi"), 
      array ("F", "Jurusan Analis Kesehatan"), 
      array ("G", "Jurusan Teknik Radiodiagnostik & Radioterapi"), 
      array ("H", "Jurusan Rekam Medis dan Informasi Kesehatan"),
    ) as $jur) {
      $parent = array();
      foreach (array ('Kepala / Sekretaris', 'Bendahara') as $jabatan) {
        $kode = $jur[0];
        $jurusan = $jur[1];
        $parent[] = $this->Jabatans->save(array(
          'nama' => "{$jabatan} {$jurusan}",
          'akses_level' => 'Sub Komponen',
          'kode' => "{$kode}*",
          'parent' => 0 < count($parent) ? implode(',', $parent) : $verifDir
        ));
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
      $kode = $prod[0];
      $prodi= $prod[1];
      $parent = array();
      $jurusan= $this->Jabatans->findOne(array('kode' => substr($kode, 0, -1) . '*', 'nama LIKE' => 'Bendahara%'));
      foreach (array ('Kaprodi / Sekretaris Prodi', 'Bendahara Prodi') as $jabatan) {
        $parent[] = $this->Jabatans->save(array(
          'nama' => "{$jabatan} {$prodi}",
          'akses_level' => 'Sub Komponen',
          'kode' => $kode,
          'parent' => 0 < count($parent) ? implode(',', $parent) : $jurusan['uuid'],
          'allow_edit_spj' => 1
        ));
      }
    }

    foreach (array ('Bendahara Gaji', 'Bendahara Pembantu Pengeluaran Direktorat') as $custom) $this->Jabatans->save(array(
      'nama' => $custom,
      'parent' => $verifDir,
      'allow_edit_spj' => 1
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
    ) as $unit) $this->Jabatans->save(array(
      'nama' => "Kepala Unit {$unit}",
      'parent' => $verifDir,
      'allow_edit_spj' => 1
    ));

    foreach (array(
      'Umum'
    ) as $urusan) $this->Jabatans->save(array(
      'nama' => "Kepala Urusan {$urusan}",
      'parent' => $verifDir,
      'allow_edit_spj' => 1
    ));
  }

  function down () {
    $this->db->query("DROP TABLE `jabatan`");
  }

}