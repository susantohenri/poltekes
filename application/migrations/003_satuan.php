<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_satuan extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `satuan` (
        `uuid` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE `satuan`");
  }

}