<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_jurusan extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `jurusan` (
        `uuid` varchar(255) NOT NULL,
        `kode` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->db->query("
      INSERT INTO `jurusan` (`uuid`, `kode`, `nama`, `urutan`)
      VALUES
        ('b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'A', 'Keperawatan', 1),
        ('b3c032dc-e070-11e8-80ef-b957869c7a8d', 'B', 'Kebidanan', 2),
        ('b3c034f8-e070-11e8-80ef-b957869c7a8d', 'C', 'Keperawatan Gigi', 3),
        ('b3c03638-e070-11e8-80ef-b957869c7a8d', 'D', 'Kesehatan Lingkungan', 4),
        ('b3c0376e-e070-11e8-80ef-b957869c7a8d', 'E', 'Gizi', 5),
        ('b3c038d6-e070-11e8-80ef-b957869c7a8d', 'F', 'Analis Kesehatan', 6),
        ('b3c03df4-e070-11e8-80ef-b957869c7a8d', 'G', 'Teknik Radiodiagnostik & Radioterapi', 7),
        ('b3c0406a-e070-11e8-80ef-b957869c7a8d', 'H', 'Rekam Medis dan Informasi Kesehatan', 8)
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `jurusan`");
  }

}