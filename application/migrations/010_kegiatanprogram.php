<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_kegiatanprogram extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `kegiatan_program` (
        `uuid` varchar(255) NOT NULL,
        `program` varchar(255) NOT NULL,
        `kegiatan` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT ,
        PRIMARY KEY (`uuid`),
        KEY `program` (`program`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE `kegiatan_program`");
  }

}