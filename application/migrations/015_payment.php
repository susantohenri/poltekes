<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_payment extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `payment` (
        `uuid` varchar(255) NOT NULL,
        `spj` varchar(255) NOT NULL,
        `sender` varchar(255) NOT NULL,
        `recipient` varchar(255) NOT NULL,
        `transfer_time` date NOT NULL,
        `amount` double NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `payment`");
  }

}