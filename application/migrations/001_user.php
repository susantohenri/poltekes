<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_user extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `user` (
        `uuid` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `jabatan` varchar(255) NOT NULL,
        `jurusan` varchar(255) NOT NULL,
        `prodi` varchar(255) NOT NULL,
        `unit` varchar(255) NOT NULL,
        `urusan` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->load->model('Users');
    $this->Users->save(array(
      'email' => 'admin',
      'password' => 'admin',
      'confirm_password' => 'admin'
    ));

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `user`");
  }

}