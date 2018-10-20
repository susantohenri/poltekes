<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_komponenprogram extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `komponen_program` (
        `uuid` varchar(255) NOT NULL,
        `sub_output_program` varchar(255) NOT NULL,
        `komponen` varchar(255) NOT NULL,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE `komponen_program`");
  }

}