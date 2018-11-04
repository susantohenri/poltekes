<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_unit extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `unit` (
        `uuid` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->db->query("
      INSERT INTO `unit` (`uuid`, `nama`)
      VALUES
        (UUID(), 'Penjaminan Mutu'),
        (UUID(), 'Penelitian dan Pengabdian Masyarakat'),
        (UUID(), 'IT'),
        (UUID(), 'Pengembangan Pendidikan dan Laboratorium'),
        (UUID(), 'Perpustakaan'),
        (UUID(), 'CDC'),
        (UUID(), 'Asrama'),
        (UUID(), 'Pengembangan Bahasa')
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `unit`");
  }

}