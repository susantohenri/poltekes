<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_detail extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `detail` (
        `uuid` varchar(255) NOT NULL,
        `akun` varchar(255) NOT NULL,
        `uraian` varchar(255) NOT NULL,
        `vol` bigint(20) NOT NULL,
        `sat` varchar(255) NOT NULL,
        `hargasat` bigint(20) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT ,
        PRIMARY KEY (`uuid`),
        KEY `program` (`akun`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `detail`");
  }

}