<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_akunprogram extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `akun_program` (
        `uuid` varchar(255) NOT NULL,
        `sub_komponen_program` varchar(255) NOT NULL,
        `akun` varchar(255) NOT NULL,
        `pagu` float NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT ,
        PRIMARY KEY (`uuid`),
        KEY `program` (`sub_komponen_program`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE `akun_program`");
  }

}