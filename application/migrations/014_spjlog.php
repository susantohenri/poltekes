<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_spjlog extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `spj_log` (
        `uuid` varchar(255) NOT NULL,
        `spj` varchar(255) NOT NULL,
        `user` varchar(255) NOT NULL,
        `action` varchar(255) NOT NULL,
        `taken` datetime NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`),
        KEY `spj` (`spj`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `spj_log`");
  }

}