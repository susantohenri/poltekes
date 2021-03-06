<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_payment extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `payment` (
        `uuid` varchar(255) NOT NULL,
        `spj` varchar(255) NOT NULL,
        `payment_method` varchar(255) NOT NULL,
        `check_no` varchar(255) NOT NULL,
        `sender` varchar(255) NOT NULL,
        `recipient` varchar(255) NOT NULL,
        `user_recipient` varchar(255) NOT NULL,
        `transfer_time` date NOT NULL,
        `amount` double NOT NULL DEFAULT '0',
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`),
        KEY `spj` (`spj`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `payment`");
  }

}