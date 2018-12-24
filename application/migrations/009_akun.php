<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_akun extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `akun` (
        `uuid` varchar(255) NOT NULL,
        `klasifikasi_akun` varchar(255) NOT NULL,
        `kode` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        `sub_komponen` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `akun`");
  }

}
