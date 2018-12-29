<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_item extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `item` (
        `uuid` varchar(255) NOT NULL,
        `spj` varchar(255) NOT NULL,
        `uraian` varchar(255) NOT NULL,
        `vol` float NOT NULL,
        `sat` varchar(255) NOT NULL,
        `hargasat` float NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT ,
        PRIMARY KEY (`uuid`),
        KEY `program` (`spj`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `item`");
  }

}