<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_lampiran extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `lampiran` (
        `uuid` varchar(255) NOT NULL,
        `spj` varchar(255) NOT NULL,
        `uraian` varchar(255) NOT NULL,
        `vol` double NOT NULL DEFAULT '0',
        `sat` varchar(255) NOT NULL,
        `hargasat` double NOT NULL DEFAULT '0',
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT ,
        PRIMARY KEY (`uuid`),
        KEY `program` (`spj`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `lampiran`");
  }

}