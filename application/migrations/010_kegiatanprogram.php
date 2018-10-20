<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_kegiatanprogram extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `kegiatan_program` (
        `uuid` varchar(255) NOT NULL,
        `program` varchar(255) NOT NULL,
        `kegiatan` varchar(255) NOT NULL,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE `kegiatan_program`");
  }

}