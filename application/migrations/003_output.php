<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_output extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `output` (
        `uuid` varchar(255) NOT NULL,
        `kode` varchar(255) NOT NULL,
        `uraian` varchar(255) NOT NULL,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `output`");
  }

}