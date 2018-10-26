<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_outputprogram extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `output_program` (
        `uuid` varchar(255) NOT NULL,
        `kegiatan_program` varchar(255) NOT NULL,
        `output` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT ,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE `output_program`");
  }

}