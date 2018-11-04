<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_prodi extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `prodi` (
        `uuid` varchar(255) NOT NULL,
        `kode` varchar(255) NOT NULL,
        `jurusan` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        `urutan` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->db->query("
      INSERT INTO `prodi` (`uuid`, `kode`, `jurusan`, `nama`, `urutan`)
      VALUES
        ('b3c65072-e070-11e8-80ef-b957869c7a8d', 'AA', 'b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'D-III Keperawatan Semarang', 1),
        ('b3c65392-e070-11e8-80ef-b957869c7a8d', 'AB', 'b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'D-III Keperawatan Purwokerto', 2),
        ('b3c6552c-e070-11e8-80ef-b957869c7a8d', 'AC', 'b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'D-III Keperawatan Pekalongan', 3),
        ('b3c65630-e070-11e8-80ef-b957869c7a8d', 'AD', 'b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'D-III Keperawatan Blora', 4),
        ('b3c656f8-e070-11e8-80ef-b957869c7a8d', 'AE', 'b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'D-III Keperawatan Magelang', 5),
        ('b3c657f2-e070-11e8-80ef-b957869c7a8d', 'AF', 'b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'D IV Keperawatan Semarang', 6),
        ('b3c658e2-e070-11e8-80ef-b957869c7a8d', 'AG', 'b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'D IV Keperawatan Medikal Bedah', 7),
        ('b3c65996-e070-11e8-80ef-b957869c7a8d', 'AH', 'b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'D IV Keperawatan Gawat Darurat', 8),
        ('b3c65a5e-e070-11e8-80ef-b957869c7a8d', 'AI', 'b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'D IV Keperawatan Kardiovaskuler', 9),
        ('b3c65b1c-e070-11e8-80ef-b957869c7a8d', 'AJ', 'b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'D-IV Keperawatan Magelang', 10),
        ('b3c65bd0-e070-11e8-80ef-b957869c7a8d', 'AK', 'b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'Profesi Ners', 11),
        ('b3c65c84-e070-11e8-80ef-b957869c7a8d', 'BA', 'b3c032dc-e070-11e8-80ef-b957869c7a8d', 'D-III Kebidanan Blora', 12),
        ('b3c65d42-e070-11e8-80ef-b957869c7a8d', 'BB', 'b3c032dc-e070-11e8-80ef-b957869c7a8d', 'D-III Kebidanan Semarang', 13),
        ('b3c65dec-e070-11e8-80ef-b957869c7a8d', 'BC', 'b3c032dc-e070-11e8-80ef-b957869c7a8d', 'D-III Kebidanan Magelang', 14),
        ('b3c65f54-e070-11e8-80ef-b957869c7a8d', 'BD', 'b3c032dc-e070-11e8-80ef-b957869c7a8d', 'D-III Kebidanan Purwokerto', 15),
        ('b3c6601c-e070-11e8-80ef-b957869c7a8d', 'BE', 'b3c032dc-e070-11e8-80ef-b957869c7a8d', 'D-IV Bidan Pendidik Semarang', 16),
        ('b3c660e4-e070-11e8-80ef-b957869c7a8d', 'BF', 'b3c032dc-e070-11e8-80ef-b957869c7a8d', 'D-IV Kebidanan Semarang', 17),
        ('b3c661b6-e070-11e8-80ef-b957869c7a8d', 'BG', 'b3c032dc-e070-11e8-80ef-b957869c7a8d', 'D-IV Kebidanan Komunitas Magelang', 18),
        ('b3c66274-e070-11e8-80ef-b957869c7a8d', 'BH', 'b3c032dc-e070-11e8-80ef-b957869c7a8d', 'D IV Kebidanan Magelang', 19),
        ('b3c6631e-e070-11e8-80ef-b957869c7a8d', 'BI', 'b3c032dc-e070-11e8-80ef-b957869c7a8d', 'Profesi Bidan', 20),
        ('b3c663dc-e070-11e8-80ef-b957869c7a8d', 'AL', 'b3c02ad0-e070-11e8-80ef-b957869c7a8d', 'Keperawatan Magister Terapan Kesehatan', 21),
        ('b3c6649a-e070-11e8-80ef-b957869c7a8d', 'BJ', 'b3c032dc-e070-11e8-80ef-b957869c7a8d', 'Kebidanan Magister Terapan Kesehatan', 22),
        ('b3c66544-e070-11e8-80ef-b957869c7a8d', 'GD', 'b3c03df4-e070-11e8-80ef-b957869c7a8d', 'Imaging Diagnostik Magister Terapan Kesehatan', 23),
        ('b3c665f8-e070-11e8-80ef-b957869c7a8d', 'CC', 'b3c034f8-e070-11e8-80ef-b957869c7a8d', 'Terapis Gigi dan Mulut Magister Terapan Kesehatan', 24),
        ('b3c666b6-e070-11e8-80ef-b957869c7a8d', 'CA', 'b3c034f8-e070-11e8-80ef-b957869c7a8d', 'D-III Keperawatan Gigi Semarang', 25),
        ('b3c6676a-e070-11e8-80ef-b957869c7a8d', 'CB', 'b3c034f8-e070-11e8-80ef-b957869c7a8d', 'D-IV Keperawatan Gigi', 26),
        ('b3c6681e-e070-11e8-80ef-b957869c7a8d', 'DA', 'b3c03638-e070-11e8-80ef-b957869c7a8d', 'D-III Kesehatan Lingkungan Purwokerto', 27),
        ('b3c668d2-e070-11e8-80ef-b957869c7a8d', 'DB', 'b3c03638-e070-11e8-80ef-b957869c7a8d', 'D-IV Kesehatan Lingkungan Purwokerto', 28),
        ('b3c66986-e070-11e8-80ef-b957869c7a8d', 'EA', 'b3c0376e-e070-11e8-80ef-b957869c7a8d', 'D-III Gizi Semarang', 29),
        ('b3c66a3a-e070-11e8-80ef-b957869c7a8d', 'EB', 'b3c0376e-e070-11e8-80ef-b957869c7a8d', 'D-IV Gizi Semarang', 30),
        ('b3c66aee-e070-11e8-80ef-b957869c7a8d', 'EC', 'b3c0376e-e070-11e8-80ef-b957869c7a8d', 'Dietisien', 31),
        ('b3c66b98-e070-11e8-80ef-b957869c7a8d', 'FA', 'b3c038d6-e070-11e8-80ef-b957869c7a8d', 'D-III Analis Kesehatan Semarang', 32),
        ('b3c66cf6-e070-11e8-80ef-b957869c7a8d', 'FB', 'b3c038d6-e070-11e8-80ef-b957869c7a8d', 'D-III Teknologi Bank Darah', 33),
        ('b3c66dbe-e070-11e8-80ef-b957869c7a8d', 'FC', 'b3c038d6-e070-11e8-80ef-b957869c7a8d', 'D-IV Teknik Laboratorium Medis', 34),
        ('b3c66e86-e070-11e8-80ef-b957869c7a8d', 'GA', 'b3c03df4-e070-11e8-80ef-b957869c7a8d', 'D-III TRR Semarang', 35),
        ('b3c66f44-e070-11e8-80ef-b957869c7a8d', 'GB', 'b3c03df4-e070-11e8-80ef-b957869c7a8d', 'D-IV Teknik Radiologi', 36),
        ('b3c67002-e070-11e8-80ef-b957869c7a8d', 'GC', 'b3c03df4-e070-11e8-80ef-b957869c7a8d', 'D-III TRR Purwokerto', 37),
        ('b3c670b6-e070-11e8-80ef-b957869c7a8d', 'HA', 'b3c0406a-e070-11e8-80ef-b957869c7a8d', 'D-III Rekam Medis dan Informasi Kesehatan', 38),
        ('b3c6716a-e070-11e8-80ef-b957869c7a8d', 'HB', 'b3c0406a-e070-11e8-80ef-b957869c7a8d', 'D-IV Rekam Medis dan Informasi Kesehatan', 39)
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `prodi`");
  }

}