<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_kegiatan extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `kegiatan` (
        `uuid` varchar(255) NOT NULL,
        `kode` varchar(255) NOT NULL,
        `uraian` varchar(255) NOT NULL,
        `program` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`),
        KEY `program` (`program`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `kegiatan`");
  }

}