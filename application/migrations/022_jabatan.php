<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_jabatan extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `jabatan` (
        `uuid` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $jabatans = array (
      'Perencanaan',
      'Atasan Langsung Bendahara Pengeluaran',
      'Bendahara Pengeluaran Direktorat',
      'Bendahara Pembantu Pengeluaran Direktorat',
      'Bendahara Gaji',
      'Sekretaris Jurusan',
      'Bendahara Jurusan',
      'Kaprodi',
      'Sekretaris Prodi',
      'Bendahara Prodi',
      'Kepala Unit',
      'Kepala Urusan'
    );

    $this->load->model('Jabatans');
    foreach ($jabatans as $jabatan) $this->Jabatans->save(array('nama' => $jabatan));
  }

  function down () {
    $this->db->query("DROP TABLE `jabatan`");
  }

}