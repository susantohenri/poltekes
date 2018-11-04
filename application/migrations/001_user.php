<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_user extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `user` (
        `uuid` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `role` varchar(255) NOT NULL,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $generate = $this->db->select('UUID() uuid', false)->get()->row_array();
    $record['uuid'] = $generate['uuid'];

    $this->db->insert('user', array(
      'uuid' => $record['uuid'],
      'email' => 'admin',
      'password' => md5('admin'),
      'role' => 'admin'
    ));

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `user`");
  }

}