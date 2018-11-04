<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_urusan extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `urusan` (
        `uuid` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `urusan`");
  }

}