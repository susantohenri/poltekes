<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_spj extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `spj` (
        `uuid` varchar(255) NOT NULL,
        `akun_program` varchar(255) NOT NULL,
        `uraian` varchar(255) NOT NULL,
        `vol` float NOT NULL,
        `sat` varchar(255) NOT NULL,
        `hargasat` float NOT NULL,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE `spj`");
  }

}