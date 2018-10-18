<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_akun extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `akun` (
        `uuid` varchar(255) NOT NULL,
        `klasifikasi_akun` varchar(255) NOT NULL,
        `kode` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $this->db->query("
      CREATE TABLE `klasifikasi_akun` (
        `uuid` varchar(255) NOT NULL,
        `kode` varchar(255) NOT NULL,
        `nama` varchar(255) NOT NULL,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    // http://www.convertcsv.com/csv-to-json.htm
    $lines = json_decode('      [
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": ".NULL.",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "11",
         "FIELD2": "ASET LANCAR",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111111",
         "FIELD2": "Kas di Rekening BUN (502.000.000)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111112",
         "FIELD2": "Kas di Rekening Ditjen PBN Pusat (500.000.000)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111113",
         "FIELD2": "Kas di Rekening SAL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111114",
         "FIELD2": "Kas di Rekening Talangan Reksus Kosong",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111115",
         "FIELD2": "Kas di Rekening Penempatan dalam Rupiah ( 519.000.122)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111116",
         "FIELD2": "Kas di Rekening Antara Reksus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111117",
         "FIELD2": "Kas di Rekening Khusus dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111118",
         "FIELD2": "Kas di Rekening SUBBUN Talangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111123",
         "FIELD2": "Kas di Rekening Penerimaan Penyetoran Retur SP2D dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111151",
         "FIELD2": "Kas di Rekening Pengeluaran Kuasa BUN Pusat SPAN - Non Gaji",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111152",
         "FIELD2": "Kas di Rekening Pengeluaran Kuasa BUN Pusat SPAN - Gaji",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111211",
         "FIELD2": "Kas di Rekening KUN dalam Valuta USD ( 600.502.411)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111212",
         "FIELD2": "Kas di Rekening Penerimaan PPH dalam valuta USD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111213",
         "FIELD2": "Kas di Rekening Penerimaan Migas (600.000.411)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111214",
         "FIELD2": "Kas di Rekening Khusus dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111215",
         "FIELD2": "Kas di Rekening Penempatan dalam Valuta USD (608.001411)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111216",
         "FIELD2": "Kas di Rekening Kas Umum Negara Dalam Valuta Yen (600.502111)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111217",
         "FIELD2": "Kas di rekening Penempatan Dalam Valuta Yen (608.000111)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111221",
         "FIELD2": "Kas di Rekening Penerimaan Penyetoran Retur SP2D dalam Valuta Asing JPY",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111222",
         "FIELD2": "Kas di Rekening Penerimaan Penyetoran Retur SP2D dalam Valuta Asing USD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111223",
         "FIELD2": "Kas di Rekening Penerimaan Penyetoran Retur SP2D dalam Valuta Asing Euro",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111311",
         "FIELD2": "Kas Pemerintah Lainnya dalam rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111312",
         "FIELD2": "Kas Pemerintah Lainnya dalam valuta USD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111313",
         "FIELD2": "Kas di Rekening Penerimaan - Dana Investasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111314",
         "FIELD2": "Kas di Rekening Penerimaan - Dana Pembangunan Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111315",
         "FIELD2": "Kas di Rekening Penerimaan Migas (baru)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111316",
         "FIELD2": "Kas di Rekening Penerimaan Panas Bumi pada Kuasa BUN Pusat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111317",
         "FIELD2": "Kas di Rekening Pertambangan dan Perikanan pada Kuasa BUN Pusat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111321",
         "FIELD2": "Kas di Rekening Pengeluaran Kuasa BUN Pusat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111322",
         "FIELD2": "Kas Pemerintah yang ada di K/L",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111323",
         "FIELD2": "Kas Pemerintah yang ada di BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111324",
         "FIELD2": "Kas di Rekening PFK",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111325",
         "FIELD2": "Kas di Rekening Pemerintah di Bank Umum Dalam Rangka Penempatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111329",
         "FIELD2": "Kas lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111411",
         "FIELD2": "Kas di Rekening Pengeluaran di Bank Tunggal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111412",
         "FIELD2": "Kas di Rekening Pengeluaran BI  dalam rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111413",
         "FIELD2": "Kas di Rekening Pengeluaran BI  dalam valuta USD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111414",
         "FIELD2": "Kas di Rekening Pengeluaran BI  dalam valuta Yen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111421",
         "FIELD2": "Kas di Rekening Pengeluaran di Bank Operasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111422",
         "FIELD2": "Kas di Rekening Penerimaan (Persepsi/Devisa Persepsi)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111441",
         "FIELD2": "Kas di Rekening Penerimaan (Persepsi/ Devisa Persepsi) dalam Valuta USD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111511",
         "FIELD2": "Kas dalam Transito",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111512",
         "FIELD2": "Kas dalam Transito Rekening Pinjaman/ Hibah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111519",
         "FIELD2": "Kas dalam Transito Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111611",
         "FIELD2": "Kas di Bendahara Pengeluaran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111711",
         "FIELD2": "Kas di Bendahara Penerimaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111811",
         "FIELD2": "Surat Berharga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111819",
         "FIELD2": "Setara Kas lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111821",
         "FIELD2": "Kas Lainnya di Bendahara Pengeluaran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "Hal :",
         "FIELD5": 1
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111822",
         "FIELD2": "Kas Lainnya di Kementerian Negara/ Lembaga dari Hibah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111824",
         "FIELD2": "Kas Lainnya dari Reklasifikasi Kas Besi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111911",
         "FIELD2": "Kas dan Bank - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111912",
         "FIELD2": "Dana yang akan Dijaminkan - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111913",
         "FIELD2": "Dana yang akan dipadankan - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111914",
         "FIELD2": "Dana yang akan digulirkan - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111921",
         "FIELD2": "Surat Berharga - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "111929",
         "FIELD2": "Setara kas Lainnya - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "112111",
         "FIELD2": "Uang Muka KUN UP - PP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "112121",
         "FIELD2": "Uang Muka KUN Pengeluaran Ineligible",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "112211",
         "FIELD2": "Uang Muka Reksus UP - PP Reksus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "112221",
         "FIELD2": "Uang Muka Reksus Kosong",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "112311",
         "FIELD2": "Talangan Dana Cadangan Subsidi kepada RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "112312",
         "FIELD2": "Talangan Dana Cadangan DBH kepada RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "112313",
         "FIELD2": "Talangan Dana Cadangan PMN kepada RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113111",
         "FIELD2": "Piutang PPh Minyak Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113112",
         "FIELD2": "Piutang PPh Gas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113119",
         "FIELD2": "Piutang PPh Migas Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113121",
         "FIELD2": "Piutang PPh Pasal 21",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113122",
         "FIELD2": "Piutang PPh Pasal 22",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113123",
         "FIELD2": "Piutang PPh Pasal 22 Impor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113124",
         "FIELD2": "Piutang PPh Pasal 23",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113125",
         "FIELD2": "Piutang PPh Pasal 25/29 Orang Pribadi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113126",
         "FIELD2": "Piutang PPh Pasal 25/29 Badan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113127",
         "FIELD2": "Piutang PPh Pasal 26",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113128",
         "FIELD2": "Piutang PPh Final",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113129",
         "FIELD2": "Piutang PPh Piutang PPh Fiskal Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113131",
         "FIELD2": "Piutang PPN Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113132",
         "FIELD2": "Piutang PPN Impor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113139",
         "FIELD2": "Piutang PPN Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113141",
         "FIELD2": "Piutang PPnBM dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113142",
         "FIELD2": "Piutang PPnBM Impor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113149",
         "FIELD2": "Piutang PPnBM Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113151",
         "FIELD2": "Piutang PBB Pedesaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113152",
         "FIELD2": "Piutang PBB Perkotaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113153",
         "FIELD2": "Piutang PBB Perkebunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113154",
         "FIELD2": "Piutang PBB Kehutanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113155",
         "FIELD2": "Piutang PBB Pertambangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113156",
         "FIELD2": "Piutang BPHTB",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113159",
         "FIELD2": "Piutang PBB Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113161",
         "FIELD2": "Piutang Cukai Hasil Tembakau",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113162",
         "FIELD2": "Piutang Cukai Ethyl Alkohol",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113163",
         "FIELD2": "Piutang Cukai Minuman mengandung Ethyl Alkohol",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113164",
         "FIELD2": "Piutang Pendapatan Denda Administrasi Cukai",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113166",
         "FIELD2": "Piutang Bea Meterai",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113169",
         "FIELD2": "Piutang Pendapatan Cukai Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113171",
         "FIELD2": "Piutang Pendapatan dari Penjualan Benda Materai",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113172",
         "FIELD2": "Piutang Pajak Tidak Langsung Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113173",
         "FIELD2": "Piutang Bunga Penagihan PPh",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113174",
         "FIELD2": "Piutang Bunga Penagihan PPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113175",
         "FIELD2": "Piutang Bunga Penagihan PPnBM",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "2",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113176",
         "FIELD2": "Piutang Bunga Penagihan PTLL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113181",
         "FIELD2": "Piutang Bea masuk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113182",
         "FIELD2": "Piutang Bea Masuk ditanggung Pemerintah atas Hibah (SPM Nihil)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113183",
         "FIELD2": "Piutang Pendapatan Denda Administrasi Pabean",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113184",
         "FIELD2": "Piutang Pendapatan Pabean Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113185",
         "FIELD2": "Piutang Pajak/pungutan ekspor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113186",
         "FIELD2": "Piutang Pendapatan Denda Administrasi Bea Keluar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113187",
         "FIELD2": "Piutang Pendapatan Bunga Bea Keluar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113211",
         "FIELD2": "Piutang Penerimaan Negara Bukan Pajak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113212",
         "FIELD2": "Piutang Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113221",
         "FIELD2": "Piutang PT. PPA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113231",
         "FIELD2": "Bagian Lancar Piutang Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113232",
         "FIELD2": "Bagian Lancar RDI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113233",
         "FIELD2": "Potensi Tunggakan Yang Dapat Ditagih",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113241",
         "FIELD2": "Bagian Lancar Piutang Kredit Investasi Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113311",
         "FIELD2": "Bagian Lancar Tagihan Penjualan Angsuran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113411",
         "FIELD2": "Bagian Lancar Tagihan Tuntutan Peberndaharaan/Tuntutan Ganti Rugi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113511",
         "FIELD2": "Bagian Lancar Investasi Permanen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113611",
         "FIELD2": "uang muka belanja pegawai",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113612",
         "FIELD2": "uang muka belanja barang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113613",
         "FIELD2": "uang muka belanja modal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113614",
         "FIELD2": "uang muka belanja pembayaran bunga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113615",
         "FIELD2": "uang muka belanja subsidi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113616",
         "FIELD2": "uang muka belanja hibah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113617",
         "FIELD2": "uang muka belanja bantuan sosial",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113618",
         "FIELD2": "Uang Muka Belanja Lain-Lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113621",
         "FIELD2": "Uang muka belanja dana perimbangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113622",
         "FIELD2": "Uang muka belanja otonomi khusus dan penyesuaian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113631",
         "FIELD2": "Belanja Pegawai Dibayar di muka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113632",
         "FIELD2": "Belanja barang yang dibayar dimuka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113633",
         "FIELD2": "Belanja pembayaran bunga dibayar dimuka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113634",
         "FIELD2": "Belanja Lain-Lain Dibayar Dimuka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113635",
         "FIELD2": "Belanja Modal Dibayar dimuka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113641",
         "FIELD2": "Piutang Transfer Dana Perimbangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113642",
         "FIELD2": "Piutang Transfer Dana Otonomi Khusus dan Penyesuaian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113711",
         "FIELD2": "Piutang dari BUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113712",
         "FIELD2": "Piutang dari KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113721",
         "FIELD2": "Piutang dari Kementerian Negara/Lembaga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113731",
         "FIELD2": "Piutang dari Kas BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113751",
         "FIELD2": "Piutang Kepada RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113811",
         "FIELD2": "Piutang BLU Pelayanan Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113812",
         "FIELD2": "Piutang BLU Pelayanan Pendidikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113813",
         "FIELD2": "Piutang BLU Penunjang Konstruksi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113814",
         "FIELD2": "Piutang BLU Penyedia Jasa Telekomunikasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113819",
         "FIELD2": "Piutang BLU penyedia Barang dan JasaLainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113821",
         "FIELD2": "Piutang BLU Pengelola Kawasan Otorita",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113822",
         "FIELD2": "Piutang BLU Pengelola Kawasan Ekonomi Terpadu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113829",
         "FIELD2": "Piutang BLU Pengelola Kawasan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113831",
         "FIELD2": "Piutang BLU Pengelola Dana Investasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113832",
         "FIELD2": "Piutang BLU Pengelola Dana Bergulir",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113839",
         "FIELD2": "Piutang BLU Pengelola Dana Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "3",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113891",
         "FIELD2": "Piutang dari Kegiatan Operasional Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113911",
         "FIELD2": "Piutang Sewa Tanah - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113912",
         "FIELD2": "Piutang Sewa Gedung - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113913",
         "FIELD2": "Piutang Sewa Ruangan - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113914",
         "FIELD2": "Piutang Sewa Peralatan dan Mesin - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113919",
         "FIELD2": "Piutang Sewa Lainnya - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113921",
         "FIELD2": "Piutang dari Penjualan Aset Tetap - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113929",
         "FIELD2": "Piutang dari penjualan Aset lainnya - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "113991",
         "FIELD2": "Piutang dari kegiatan non operasional lainnya - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "114111",
         "FIELD2": "Belanja Pegawai Dibayar Dimuka (prepaid)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "114116",
         "FIELD2": "Belanja Hibah Dibayar Dimuka (prepaid)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "114117",
         "FIELD2": "Belanja Subsidi Dibayar Dimuka (prepaid)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "114118",
         "FIELD2": "Belanja Bantuan Sosial Dibayar Dimuka (prepaid)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "114211",
         "FIELD2": "Investasi dalam Surat Perbendaharaan  Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "114311",
         "FIELD2": "Pendapatan PNBP Yang Masih Harus Diterima",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "114319",
         "FIELD2": "Investasi Lainnya - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "114911",
         "FIELD2": "Investasi Jangka Pendek Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115111",
         "FIELD2": "Barang Konsumsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115112",
         "FIELD2": "Amunisi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115113",
         "FIELD2": "Bahan untuk Pemeliharaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115114",
         "FIELD2": "Suku Cadang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115121",
         "FIELD2": "Pita Cukai, Materai dan Leges",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115122",
         "FIELD2": "Tanah Bangunan untuk dijual atau diserahkan kepada Masyarakat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115123",
         "FIELD2": "Hewan dan Tanaman untuk dijual atau diserahkan kepada Masyarakat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115124",
         "FIELD2": "Peralatan dan Mesin untuk dijual atau diserahkan kepada Masyarakat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115125",
         "FIELD2": "Jalan, Irigasi dan Jaringan untuk diserahkan kepada Masyarakat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115126",
         "FIELD2": "Aset Tetap Lainnya untuk diserahkan kepada Masyarakat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115127",
         "FIELD2": "Aset Lain-Lain untuk diserahkan kepada Masyarakat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115128",
         "FIELD2": "Barang Persediaan Lainnya untuk Dijual/Diserahkan ke Masyarakat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115131",
         "FIELD2": "Bahan Baku",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115132",
         "FIELD2": "Barang dalam Proses",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115191",
         "FIELD2": "Persediaan untuk tujuan strategis/berjaga - jaga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115192",
         "FIELD2": "Persediaan Barang Hasil Sitaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115199",
         "FIELD2": "Persediaan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115211",
         "FIELD2": "Persediaan BLU Pelayanan Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115212",
         "FIELD2": "Persediaan BLU Pelayanan Pendidikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115213",
         "FIELD2": "Persediaan BLU penunjang Konstruksi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115214",
         "FIELD2": "Persediaan BLU Penyedia Jasa Telekomunikasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115219",
         "FIELD2": "Persediaan BLU Penyedia Barang dan Jasa Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115221",
         "FIELD2": "Persediaan BLU Pengelola Kawasan Otorita",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115222",
         "FIELD2": "Persediaan BLU Pengelola Kawasan Ekonomi Terpadu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115229",
         "FIELD2": "Persediaan BLU Pengelola Kawasan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115231",
         "FIELD2": "Piutang Transfer ke Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115232",
         "FIELD2": "Piutang Dana Desa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115239",
         "FIELD2": "Piutang Transfer ke Daerah dan Dana Desa Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115524",
         "FIELD2": "Piutang Jasa Bank Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115525",
         "FIELD2": "Piutang Biaya Lain-lain Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115526",
         "FIELD2": "Piutang Denda atas Keterlambatan Penyampaian Laporan oleh debitur Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115531",
         "FIELD2": "Piutang Bunga Penerusan Pinjaman Penyesuaian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115532",
         "FIELD2": "Piutang Denda Penerusan Penerusan Pinjaman Penyesuaian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115591",
         "FIELD2": "Suspen Bagian Lancar Piutang Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "4",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115592",
         "FIELD2": "Suspen Piutang Bunga PP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115593",
         "FIELD2": "Suspen Piutang Denda PP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115594",
         "FIELD2": "Suspen Piutang Jasa Bank PP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115595",
         "FIELD2": "Suspen Piutang Biaya Lain2 PP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115613",
         "FIELD2": "Piutang dari Uang Persediaan yang  akan Diterima",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115912",
         "FIELD2": "Piutang Bunga Kredit Pemerintah (KUMK)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115913",
         "FIELD2": "Piutang Denda Keterlambatan Bunga KUMK",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115914",
         "FIELD2": "Piutang Denda Penyaluran KUMK",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115915",
         "FIELD2": "Piutang Denda atas Keterlambatan Penyampaian Laporan oleh debitur Kredit Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "(KUMK)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "115921",
         "FIELD2": "Bagian Lancar Piutang Penjaminan Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "116118",
         "FIELD2": "Penyisihan Piutang Tidak Tertagih - Piutang Pajak Perdagangan Internasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "116243",
         "FIELD2": "Penyisihan Piutang Tidak Tertagih - Bagian Lancar Piutang Jangka Panjang Penanggulangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Lumpur Sidoarjo",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "116261",
         "FIELD2": "Penyisihan Piutang Tidak Tertagih - Bagian Lancar Piutang Penjaminan Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "116411",
         "FIELD2": "Penyisihan Piutang Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "116412",
         "FIELD2": "Penyisihan Piutang RDI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "116511",
         "FIELD2": "Penyisihan Piutang Kredit Pemerintah Bidang Perkebunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "116512",
         "FIELD2": "Penyisihan Piutang Kredit Investasi Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "117122",
         "FIELD2": "Tanah bangunan untuk dijual atau diserahkan kepada Masyarakat/Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "117124",
         "FIELD2": "Peralatan dan mesin untuk dijual atau diserahkan kepada Masyarakat/Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "117125",
         "FIELD2": "Jalan, Irigasi dan jaringan untuk diserahkan kepada Masyarakat/Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "117129",
         "FIELD2": "Persediaan Lainnya Untuk Diserahkan Kepada Masyarakat - Dalam Proses",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "117141",
         "FIELD2": "Persediaan dalam Rangka Bantuan Sosial",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "117191",
         "FIELD2": "Persediaan untuk Tujuan Strategis/Berjaga-jaga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "118112",
         "FIELD2": "Piutang PFK 2% Pensiunan PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "118114",
         "FIELD2": "Piutang PFK 8% Gaji",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "118116",
         "FIELD2": "Piutang PFK 2 % Pensiunan TNI/PNS Kemhan dan Polri/PNS Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "118117",
         "FIELD2": "Piutang PFK 3 % Iuran Jaminan Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "118121",
         "FIELD2": "Piutang PFK Wesel Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "118211",
         "FIELD2": "Piutang Pengembalian Escrow Pajak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "118221",
         "FIELD2": "Piutang Pengembalian Escrow PNBP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "12",
         "FIELD2": "INVESTASI JANGKA PANJANG",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121111",
         "FIELD2": "Rekening Dana Investasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121112",
         "FIELD2": "Rekening Pembangunan Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121211",
         "FIELD2": "Dana Restrukturisasi Perbankan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121311",
         "FIELD2": "Program Kemitraan (PK)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121321",
         "FIELD2": "Dana Bergulir Kementerian Negara/Lembaga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121331",
         "FIELD2": "Dana Bergulir Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121411",
         "FIELD2": "Investasi dalam Obligasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121511",
         "FIELD2": "Penyertaan Modal Pemerintah dalam Proyek Pembangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121611",
         "FIELD2": "Investasi BLU Pelayanan Kesehatan - Non Permanen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121613",
         "FIELD2": "Investasi BLU Pelayanan Pendidikan - Non Permanen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121614",
         "FIELD2": "Investasi BLU Penunjang Konstruksi - Non Permanen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121615",
         "FIELD2": "Investasi BLU Penyedia Jasa Telekomunikasi - Non Permanen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121619",
         "FIELD2": "Investasi BLU Penyedia Barang dan Jasa Lainnya - Non Permanen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121621",
         "FIELD2": "Investasi BLU Pengelola Kawasan Otorita - Non Permanen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121622",
         "FIELD2": "Investasi BLU Pengelola Kawasan Ekonomi Terpadu - Non Permanen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121629",
         "FIELD2": "Investasi BLU Pengelola Kawasan Lainnya - Non Permanen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121631",
         "FIELD2": "Investasi BLU Pengelola Dana Investasi - Non Permanen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121632",
         "FIELD2": "Investasi BLU Pengelola Dana Bergulir - Non Permanen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "5",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121639",
         "FIELD2": "",
         "FIELD3": "Investasi BLU Pengelola Dana Lainnya - Non Permanen",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "121911",
         "FIELD2": "Investasi Non Permanen Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122111",
         "FIELD2": "",
         "FIELD3": "Penyertaan Modal Pemerintah pada Persero",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122112",
         "FIELD2": "",
         "FIELD3": "Penyertaan Modal Pemerintah pada PERUM",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122121",
         "FIELD2": "Penyertaan Modal Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122131",
         "FIELD2": "",
         "FIELD3": "Penyertaan Modal Pemerintah pada Badan Usaha Lainnya",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122211",
         "FIELD2": "",
         "FIELD3": "Investasi BLU Pelayanan Kesehatan - Permanen",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122212",
         "FIELD2": "",
         "FIELD3": "Investasi BLU Pelayanan Pendidikan - Permanen",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122213",
         "FIELD2": "",
         "FIELD3": "Investasi BLU Penunjang Konstruksi - Permanen",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122214",
         "FIELD2": "",
         "FIELD3": "Investasi BLU Penyedia Jasa Telekomunikasi - Permanen",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122219",
         "FIELD2": "",
         "FIELD3": "Investasi BLU Penyedia Barang dan Jasa Lainnya - Permanen",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122221",
         "FIELD2": "",
         "FIELD3": "Investasi BLU Pengelola Kawasan Otorita - Permanen",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122222",
         "FIELD2": "",
         "FIELD3": "Investasi BLU Pengelola Kawasan Ekonomi Terpadu - Permanen",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122223",
         "FIELD2": "",
         "FIELD3": "Investasi BLU Pengelola Kawasan Lainnya - Permanen",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122231",
         "FIELD2": "",
         "FIELD3": "Investasi BLU Pengelola Dana Investasi - Permanen",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122232",
         "FIELD2": "",
         "FIELD3": "Investasi BLU Pengelola Dana Bergulir - Permanen",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122239",
         "FIELD2": "",
         "FIELD3": "Investasi BLU Pengelola Dana Lainnya - Permanen",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122911",
         "FIELD2": "Investasi dalam Obligasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122912",
         "FIELD2": "Investasi pada Otorita",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "122919",
         "FIELD2": "Investasi Lain-lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "ASET TETAP",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131111",
         "FIELD2": "Tanah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131211",
         "FIELD2": "Tanah Sebelum Disesuaikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131311",
         "FIELD2": "Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131411",
         "FIELD2": "",
         "FIELD3": "Peralatan dan Mesin Sebelum Disesuaikan",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131511",
         "FIELD2": "Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131611",
         "FIELD2": "",
         "FIELD3": "Gedung dan Bangunan Sebelum Disesuaikan",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131711",
         "FIELD2": "Jalan dan Jembatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131712",
         "FIELD2": "Irigasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131713",
         "FIELD2": "Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131811",
         "FIELD2": "",
         "FIELD3": "Jalan dan Jembatan Sebelum Disesuaikan",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131812",
         "FIELD2": "Irigasi Sebelum Disesuaikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131813",
         "FIELD2": "Jaringan Sebelum Disesuaikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131911",
         "FIELD2": "Aset Tetap dalam Renovasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "131921",
         "FIELD2": "Aset Tetap Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "132111",
         "FIELD2": "Konstruksi Dalam pengerjaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "132411",
         "FIELD2": "",
         "FIELD3": "Peralatan dan Mesin Sebelum Disesuaikan - BLU",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "133111",
         "FIELD2": "",
         "FIELD3": "Akumulasi Penyusutan Peralatan dan Mesin",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "133211",
         "FIELD2": "",
         "FIELD3": "Akumulasi Penyusutan Gedung dan Bangunan",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "133311",
         "FIELD2": "",
         "FIELD3": "Akumulasi Penyusutan Jalan dan Jembatan",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "133312",
         "FIELD2": "",
         "FIELD3": "Akumulasi Penyusutan Jaringan dan Irigasi",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "133411",
         "FIELD2": "",
         "FIELD3": "Akumulasi Penyusutan Aset Tetap Lainnya",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "134411",
         "FIELD2": "",
         "FIELD3": "Jalan, Irigasi dan Jaringan Sebelum Disesuaikan",
         "FIELD4": "- BLU",
         "FIELD5": null
       },
       {
         "FIELD1": "135111",
         "FIELD2": "Aset Tetap Renovasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "135211",
         "FIELD2": "Peralatan dan Mesin - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "135221",
         "FIELD2": "",
         "FIELD3": "Akumulasi Penyusutan Peralatan dan Mesin - BLU",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "135311",
         "FIELD2": "Gedung dan Bangunan - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "135321",
         "FIELD2": "",
         "FIELD3": "Akumulasi Penyusutan Gedung dan Bangunan - BLU",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "135411",
         "FIELD2": "Jalan, Irigasi, dan Jaringan - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "135421",
         "FIELD2": "",
         "FIELD3": "Akumulasi Penyusutan Jalan,Irigasi dan Jaringan - BLU",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "135511",
         "FIELD2": "Aset Tetap Lainnya",
         "FIELD3": "- BLU",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "6",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "135521",
         "FIELD2": "Akumulasi Penyusutan Aset Tetap Lainnya - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "135611",
         "FIELD2": "Konstruksi Dalam Pengerjaan Badan Layanan Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "136211",
         "FIELD2": "Konstruksi Dalam Pengerjaan - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "14",
         "FIELD2": "",
         "FIELD3": "DANA CADANGAN",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "141111",
         "FIELD2": "Dana Cadangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "15",
         "FIELD2": "ASET LAINNYA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "151111",
         "FIELD2": "Tagihan Penjualan Angsuran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "151211",
         "FIELD2": "Tagihan Tuntutan Perbendaharaan/Tuntutan Ganti Rugi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "151311",
         "FIELD2": "Tagihan Penjualan Angsuran-Badan Layanan Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "151411",
         "FIELD2": "Tagihan Tuntutan Perbendaharaan/Tuntutan Ganti Rugi-Badan Layanan Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "151511",
         "FIELD2": "Piutang Jangka Panjang atas Kredit Pemerintah KUT-TP 1999/2000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "151512",
         "FIELD2": "Piutang Jangka Panjang atas Kredit Pemerintah Dana Cadangan KUT-TP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "151513",
         "FIELD2": "Piutang Jangka Panjang atas Kredit Pemerintah KKop Pangan MP2000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "151514",
         "FIELD2": "Piutang Jangka Panjang atas Kredit Pemerintah PIR dan UPP Perkebunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "151521",
         "FIELD2": "Piutang Jangka Panjang atas Kredit Investasi Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "151611",
         "FIELD2": "Piutang Jangka Panjang Penerusan pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "151612",
         "FIELD2": "Aset Lainnya RDI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "152111",
         "FIELD2": "Piutang Tagihan Tuntutan Perbendaharaan/ Tuntutan Ganti Rugi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "152211",
         "FIELD2": "Piutang Tagihan Tuntutan Perbendaharaan/ Tuntutan Ganti Rugi-Badan Layanan Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153111",
         "FIELD2": "Goodwill",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153119",
         "FIELD2": "Piutang Transito Pengalihan Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153121",
         "FIELD2": "Hak Cipta",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153131",
         "FIELD2": "Royalti",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153141",
         "FIELD2": "Paten",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153151",
         "FIELD2": "Software",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153161",
         "FIELD2": "Lisensi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153171",
         "FIELD2": "Hasil Kajian/Penelitian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153191",
         "FIELD2": "Suspen Piutang Jangka Panjang Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153211",
         "FIELD2": "Software-Badan Layanan Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153221",
         "FIELD2": "Hak Cipta BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153231",
         "FIELD2": "Royalti BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153241",
         "FIELD2": "Paten BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "153291",
         "FIELD2": "Aset Tak Berwujud Lainnya-Badan Layanan Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154111",
         "FIELD2": "Aset Lain-lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154112",
         "FIELD2": "Aset Tetap yang tidak digunakan dalam operasi pemerintahan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154116",
         "FIELD2": "Piutang yang belum tertagih (unbilled) atas Kredit Pemerintah (KUMK)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154121",
         "FIELD2": "TP BPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154122",
         "FIELD2": "Aset Pada PT Perusahaan Pengelola Aset",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154123",
         "FIELD2": "Aset Pada Pertamina",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154124",
         "FIELD2": "Aset Pada Kontraktor Kontrak Kerja Sama (KKSK)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154131",
         "FIELD2": "Piutang Jangka Panjang atas Penjaminan Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154211",
         "FIELD2": "Rekening Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154212",
         "FIELD2": "Cadangan Dana Reboisasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154213",
         "FIELD2": "Cadangan Dana Subsidi/PSO",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154214",
         "FIELD2": "Cadangan Dana Bagi Hasil SDA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154215",
         "FIELD2": "Dana untuk Penyertaan Modal Negara (PMN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154216",
         "FIELD2": "Rekening Jaminan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154217",
         "FIELD2": "DAU yang belum dibagi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154218",
         "FIELD2": "Dana pada Bapertarum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154219",
         "FIELD2": "Dana lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154221",
         "FIELD2": "Trust Fund Aceh Nias",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "Hal :",
         "FIELD4": "7",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154222",
         "FIELD2": "RANTF",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154223",
         "FIELD2": "ReKOMPAK",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154224",
         "FIELD2": "Dana Beasiswa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154231",
         "FIELD2": "Kas di Rekening Retur pada Kantor Pusat BO I atau Kantor Cabang yang ditunjuk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154232",
         "FIELD2": "Kas di Rekening Retur di Bank Operasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154233",
         "FIELD2": "Kas di Rekening Retur pada Kantor Cabang Bank Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154234",
         "FIELD2": "Kas di Rekening Penampungan Retur pada Kantor Pusat Bank Indonesia (rekening RPR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154311",
         "FIELD2": "Dana Penjaminan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154411",
         "FIELD2": "Aset Lain-lain-Badan Layanan Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154412",
         "FIELD2": "Aset Tetap yang tidak digunakan dalam operasi pemerintahan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154413",
         "FIELD2": "Kas BLU yang dibatasi Penggunaannya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154511",
         "FIELD2": "Dana Kelolaan BLU yang belum digulirkan/diinvestasikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "154611",
         "FIELD2": "Aset Lainnya Reklasifikasi dari Kas di Bendahara Pengeluaran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "155121",
         "FIELD2": "Piutang Jangka Panjang Penanggulangan Lumpur Sidoarjo",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "155411",
         "FIELD2": "Penyisihan Piutang Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "155412",
         "FIELD2": "Penyisihan Piutang RDI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "155511",
         "FIELD2": "Penyisihan Piutang Kredit Pemerintah Bidang Perkebunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "155512",
         "FIELD2": "Penyisihan Piutang Kredit Investasi  Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "156621",
         "FIELD2": "Penyisihan Piutang Tidak Tertagih - Penjaminan Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "156921",
         "FIELD2": "Penyisihan Piutang Tidak Tertagih- Piutang Jangka Panjang Penanggulangan Lumpur Sidoarjo",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "156931",
         "FIELD2": "Bagian Lancar Piutang Jangka Panjang Penanggulangan Lumpur Sidoarjo",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "163211",
         "FIELD2": "Kas Besi di Perwakilan RI di Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "164111",
         "FIELD2": "Dana Cadangan Penjaminan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "169212",
         "FIELD2": "Akumulasi Penyusutan Aset Tetap yang Tidak Digunakan dalam Operasi Pemerintahan Badan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Layanan Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "21",
         "FIELD2": "KEWAJIBAN JANGKA PENDEK",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211111",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) 10% Gaji",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211112",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) 2% Pensiunan PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211113",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) Beras Bulog",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211114",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) 8% Gaji",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211115",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) Tabungan Wajib Perumahan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211116",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) 2 % Pensiunan TNI/PNS Kemhan dan Polri/PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211117",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) 3 % Iuran Jaminan Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211118",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) 2 % Asuransi Kesehatan Bidan/Dokter PTT",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211119",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) Lain-lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211121",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) Dana Tabungan Pesangon Tenaga Kerja",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pemborong Minyak dan Gas Bumi (PFK DTP Migas)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211122",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) Penutupan Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211123",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga Wesel Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211141",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) Dana Tabungan Pesangon Tenaga Kerja",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pemborong Minyak dan Gas Bumi (PFK DTP Migas)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211142",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) Penutupan Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211161",
         "FIELD2": "Utang Perwalian/Perhitungan Fihak Ketiga (PFK) Setoran Pajak Rokok",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211211",
         "FIELD2": "Belanja pegawai yang masih harus dibayar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211212",
         "FIELD2": "Belanja barang yang masih harus dibayar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211213",
         "FIELD2": "Belanja modal yang masih harus dibayar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211214",
         "FIELD2": "Belanja hibah yang masih harus dibayar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211215",
         "FIELD2": "Belanja bantuan sosial yang masih harus dibayar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211216",
         "FIELD2": "Belanja bunga yang masih harus dibayar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211217",
         "FIELD2": "Belanja subsidi yang masih harus dibayar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "8",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211218",
         "FIELD2": "Belanja lain-lain yang masih harus dibayar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211221",
         "FIELD2": "Transfer dana perimbangan yang masih harus dibayar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211222",
         "FIELD2": "Transfer dana otonomi khusus dan penyesuaian yang masih harus dibayar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211231",
         "FIELD2": "Utang kepada Pihak Ketiga BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211291",
         "FIELD2": "Utang kepada Pihak Ketiga Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211311",
         "FIELD2": "Utang Kelebihan Bayar Pajak PPh",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211312",
         "FIELD2": "Utang Kelebihan Bayar Pajak PPN/PPnBM",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211313",
         "FIELD2": "Utang Kelebihan Bayar Cukai",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211314",
         "FIELD2": "Utang Kelebihan Bayar Pajak PBB",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211315",
         "FIELD2": "Utang Kelebihan Bayar Pajak BPHTB",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211316",
         "FIELD2": "Utang Kelebihan Bayar Bea Masuk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211317",
         "FIELD2": "Utang Kelebihan Bayar Bea Keluar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211321",
         "FIELD2": "Utang  Kelebihan pembayaran Pendapatan Sumber Daya Alam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211322",
         "FIELD2": "Utang  Kelebihan pembayaran Pendapatan Bagian Laba BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211323",
         "FIELD2": "Utang Kelebihan pembayaran Pendapatan Non Pajak Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211411",
         "FIELD2": "Bagian Lancar Utang Jangka Panjang Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211412",
         "FIELD2": "Bagian Lancar Utang Jangka Panjang Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211421",
         "FIELD2": "Bagian Lancar Obligasi Negara dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211431",
         "FIELD2": "Bagian Lancar Obligasi Negara dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211441",
         "FIELD2": "Bagian Lancar Surat Berharga Syariah Negara dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211451",
         "FIELD2": "Bagian Lancar Surat Berharga Syariah Negara dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211511",
         "FIELD2": "Utang Bunga Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211512",
         "FIELD2": "Utang Bunga Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211513",
         "FIELD2": "Utang Bunga-Pinjaman Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211521",
         "FIELD2": "Discount Surat Perbendaharaan Negara dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211522",
         "FIELD2": "Discount Bagian Lancar Obligasi Negara dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211523",
         "FIELD2": "Discount Surat Perbendaharaan Negara dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211524",
         "FIELD2": "Discount Bagian Lancar Obligasi Negara dalam Valuta asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211531",
         "FIELD2": "Premium Bagian Lancar Obligasi Negara Rupiah.",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211532",
         "FIELD2": "Premium Bagian Lancar Obligasi Negara valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211611",
         "FIELD2": "Utang Subsidi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211711",
         "FIELD2": "Surat Perbendaharaan Negara dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211712",
         "FIELD2": "Utang Obligasi Negara dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211721",
         "FIELD2": "Surat Perbendaharaan Negara dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211731",
         "FIELD2": "Surat Berharga Syariah Negara dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211732",
         "FIELD2": "Surat Perbendaharaan Negara Syariah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211741",
         "FIELD2": "Surat Berharga Syariah Negara dalam valuta asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211811",
         "FIELD2": "Pendapatan Sewa Diterima Dimuka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "211819",
         "FIELD2": "Pendapatan Bukan pajak lainnya Diterima Dimuka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212111",
         "FIELD2": "Uang Muka Rekening Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212116",
         "FIELD2": "Belanja Pembayaran Kewajiban Utang Yang Masih Harus Dibayar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212137",
         "FIELD2": "Pengeluaran pembiayaan lain-lain yang masih harus dibayar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212146",
         "FIELD2": "Utang kepada Pihak Ketiga-Pajak Rokok",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212151",
         "FIELD2": "Utang Pihak Ketiga - Fee Penjualan Migas Bagian Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212154",
         "FIELD2": "Utang Pihak Ketiga Migas-Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212158",
         "FIELD2": "Utang Pihak Ketiga Migas Transito",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212159",
         "FIELD2": "Utang Pihak Ketiga Migas - Fee Penjualan Migas Bagian Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212169",
         "FIELD2": "Utang Pihak Ketiga Non Migas Transito",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212191",
         "FIELD2": "Utang kepada Pihak Ketiga Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212211",
         "FIELD2": "Uang Muka dari KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212221",
         "FIELD2": "Uang Muka dari Kementerian Negara/Lembaga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "9",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212311",
         "FIELD2": "Uang Muka dari KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212411",
         "FIELD2": "Pendapatan Yang Ditangguhkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212511",
         "FIELD2": "Utang Kepada KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212521",
         "FIELD2": "Utang Kepada kas BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212811",
         "FIELD2": "Utang Kepada RPL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212911",
         "FIELD2": "Utang Jangka Pendek Perbankan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212912",
         "FIELD2": "Dana yang akan diserahkan kepada BLU Bidang Pendidikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "212919",
         "FIELD2": "Utang Jangka Pendek Lain-lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "213125",
         "FIELD2": "Discount Surat Perbendaharaan Negara Syariah dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "213126",
         "FIELD2": "Discount Bagian Lancar Surat Berharga Syariah Negara dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "213127",
         "FIELD2": "Discount Bagian Lancar Surat Berharga Syariah Negara dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "213128",
         "FIELD2": "Discount Surat Perbendaharaan Negara Syariah dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "213133",
         "FIELD2": "Premium Surat Berharga Syariah Negara dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "213134",
         "FIELD2": "Premium Surat Berharga Syariah Negara dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "215111",
         "FIELD2": "Kewajiban Transfer ke Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "215112",
         "FIELD2": "Kewajiban Dana Desa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "215121",
         "FIELD2": "Kewajiban Transfer ke Daerah Diestimasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "215122",
         "FIELD2": "Kewajiban Dana Desa Diestimasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "219821",
         "FIELD2": "Talangan Dana Cadangan Subsidi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "219822",
         "FIELD2": "Talangan Dana Cadangan DBH",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "219823",
         "FIELD2": "Talangan Dana Cadangan PMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "219934",
         "FIELD2": "Utang Escrow dana Penyertaan Modal Negara (PMN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "219935",
         "FIELD2": "Utang Pengembalian Escrow Pajak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "219936",
         "FIELD2": "Utang Pengembalian Escrow PNBP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "219944",
         "FIELD2": "Utang Jangka Pendek sementara karena kesalahan Sistem Perbankan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "219993",
         "FIELD2": "Pembiayaan Pinjaman Program yang Ditangguhkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "219994",
         "FIELD2": "Pembiayaan Pinjaman Proyek yang Ditangguhkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "22",
         "FIELD2": "KEWAJIBAN JANGKA PANJANG",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221111",
         "FIELD2": "Utang Perbankan Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221112",
         "FIELD2": "Utang Jangka Panjang-Pinjaman Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221121",
         "FIELD2": "Utang Perbankan Jangka Panjang BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221211",
         "FIELD2": "Utang Dalam Negeri Obligasi Negara Dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221221",
         "FIELD2": "Utang Dalam Negeri Obligasi Negara Dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221231",
         "FIELD2": "Surat Berharga Syariah Negara Jangka Panjang dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221241",
         "FIELD2": "Surat Berharga Syariah Negara Jangka Panjang dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221251",
         "FIELD2": "Discount Obligasi Negara - dalam rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221252",
         "FIELD2": "Discount Obligasi Negara - dalam valuta asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221253",
         "FIELD2": "Discount SBSN - dalam rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221254",
         "FIELD2": "Discount SBSN - dalam valuta asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221261",
         "FIELD2": "Premium Obligasi Negara - dalam rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221262",
         "FIELD2": "Premium Obligasi Negara - dalam valuta asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221263",
         "FIELD2": "Premium SBSN - dalam rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221264",
         "FIELD2": "Premium SBSN - dalam valuta asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221311",
         "FIELD2": "Utang Kepada Dana Pensiun dan THT",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221919",
         "FIELD2": "Utang Jangka Panjang Dalam Negeri Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "221929",
         "FIELD2": "Utang Jangka Panjang Dalam Negeri Lainnya BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222111",
         "FIELD2": "Utang Bilateral",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222112",
         "FIELD2": "Utang Multilateral",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222113",
         "FIELD2": "Utang Kredit Ekspor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222114",
         "FIELD2": "Utang Kredit Komersial",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222115",
         "FIELD2": "Utang Program",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "10",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222116",
         "FIELD2": "Utang Proyek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222119",
         "FIELD2": "Utang Jangka Panjang Luar Negeri Perbankan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222211",
         "FIELD2": "Utang Sewa Beli",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222221",
         "FIELD2": "Utang Obligasi Negara dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222231",
         "FIELD2": "Utang Obligasi Negara dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222241",
         "FIELD2": "Utang Surat Berharga Syariah Negara dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222251",
         "FIELD2": "Utang Surat Berharga Syariah Negara dalam Valuta asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222261",
         "FIELD2": "Discount Obligasi Negara dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222262",
         "FIELD2": "Discount Obligasi Negara dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222263",
         "FIELD2": "Discount SBSN dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222264",
         "FIELD2": "Discount SBSN dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222271",
         "FIELD2": "Utang Sewa Beli",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222272",
         "FIELD2": "Premium Obligasi Negara dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222273",
         "FIELD2": "Premium SBSN dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222274",
         "FIELD2": "Premium SBSN dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "222311",
         "FIELD2": "Utang Jangka Panjang Luar Negeri Lain-lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "231111",
         "FIELD2": "Dicadangkan untuk Komitmen Belanja",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "31",
         "FIELD2": "EKUITAS DANA LANCAR",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311111",
         "FIELD2": "S A L",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311211",
         "FIELD2": "SILPA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311212",
         "FIELD2": "Koreksi pendapatan tahun anggaran yang lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311213",
         "FIELD2": "Koreksi belanja tahun anggaran yang lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311214",
         "FIELD2": "Surplus/Defisit",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311215",
         "FIELD2": "Pembiayaan Netto",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311221",
         "FIELD2": "Dana Lancar BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311291",
         "FIELD2": "Dana Lancar lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311311",
         "FIELD2": "Cadangan Piutang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311321",
         "FIELD2": "Cadangan Piutang BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311411",
         "FIELD2": "Cadangan Persediaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311421",
         "FIELD2": "Cadangan Persediaan BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311511",
         "FIELD2": "Pendapatan yang ditangguhkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311521",
         "FIELD2": "Pendapatan yang ditangguhkan BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311611",
         "FIELD2": "Dana yang harus disediakan untuk pembayaran Utang Jangka Pendek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311621",
         "FIELD2": "Dana yang harus disediakan untuk pembayaran Utang Jangka Pendek BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311711",
         "FIELD2": "Selisih Kurs",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311712",
         "FIELD2": "Selisih Kurs Yang Belum Terealisasi Satker Perwakilan RI/Atase Teknis",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311713",
         "FIELD2": "Selisih Kurs Bagian Lancar Piutang Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311714",
         "FIELD2": "Selisih Kurs Bagian Lancar Utang Jangka Panjang Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311721",
         "FIELD2": "Keuntungan Kerugian yang Belum Terealisasi - SBN  Stabilisasi Pasar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311722",
         "FIELD2": "Keuntungan Kerugian yang Belum Terealisasi - SBN Optimalisasi Kas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311811",
         "FIELD2": "Dana Lancar BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311911",
         "FIELD2": "Ekuitas Dana Lancar Lainnya dari Hibah Langsung",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "311912",
         "FIELD2": "Dana Lancar Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "312111",
         "FIELD2": "Barang/Jasa Yang Harus Diterima",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "312211",
         "FIELD2": "Barang/Jasa Yang Harus Diserahkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "313121",
         "FIELD2": "Diterima dari Entitas Lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "313211",
         "FIELD2": "Transfer Keluar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "313221",
         "FIELD2": "Transfer Masuk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "32",
         "FIELD2": "EKUITAS DANA INVESTASI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "321111",
         "FIELD2": "Diinvestasikan dalam Investasi Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "321121",
         "FIELD2": "Diinvestasikan dalam Investasi Jangka Panjang BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "Hal :",
         "FIELD4": "11",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "321211",
         "FIELD2": "Diinvestasikan Dalam Aset Tetap",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "321221",
         "FIELD2": "Diinvestasikan Dalam Aset Tetap BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "321311",
         "FIELD2": "Diinvestasikan Dalam Aset Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "321321",
         "FIELD2": "Diinvestasikan Dalam Aset Lainnya BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "321411",
         "FIELD2": "Dana Yang Harus Disediakan Untuk Pembayaran Utang Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "321421",
         "FIELD2": "Dana Yang Harus Disediakan Untuk Pembayaran Utang Jangka Panjang BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "321511",
         "FIELD2": "Selisih Kurs Bagian Jangka Panjang Utang Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "321512",
         "FIELD2": "Selisih Kurs Bagian Jangka Panjang Piutang Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "321513",
         "FIELD2": "Selisih Kurs Utang jangka Panjang Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "33",
         "FIELD2": "EKUITAS DANA CADANGAN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "331111",
         "FIELD2": "Diinvestasikan dalam Dana Cadangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "331121",
         "FIELD2": "Diinvestasikan dalam Dana Cadangan BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "391116",
         "FIELD2": "Koreksi Nilai Aset Tetap Non Revaluasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "391119",
         "FIELD2": "Koreksi Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "391141",
         "FIELD2": "Setoran Surplus BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "41",
         "FIELD2": "PENERIMAAN PERPAJAKAN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411111",
         "FIELD2": "Pendapatan PPh Minyak Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411112",
         "FIELD2": "Pendapatan PPh Gas Alam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411119",
         "FIELD2": "Pendapatan PPh Migas Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411121",
         "FIELD2": "Pendapatan PPh Pasal 21",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411122",
         "FIELD2": "Pendapatan PPh Pasal 22",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411123",
         "FIELD2": "Pendapatan PPh Pasal 22 Impor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411124",
         "FIELD2": "Pendapatan PPh Pasal 23",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411125",
         "FIELD2": "Pendapatan PPh Pasal 25/29 Orang Pribadi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411126",
         "FIELD2": "Pendapatan PPh Pasal 25/29 Badan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411127",
         "FIELD2": "Pendapatan PPh Pasal 26",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411128",
         "FIELD2": "Pendapatan PPh Final",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411129",
         "FIELD2": "Pendapatan PPh Nonmigas Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411131",
         "FIELD2": "Pendapatan PPh Fiskal Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411141",
         "FIELD2": "Pendapatan PPh pasal 21 Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411142",
         "FIELD2": "Pendapatan PPh pasal 22 Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411143",
         "FIELD2": "Pendapatan PPh pasal 22 Impor Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411144",
         "FIELD2": "Pendapatan PPh pasal 23 Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411145",
         "FIELD2": "Pendapatan PPh pasal 25/29 Orang Pribadi Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411146",
         "FIELD2": "Pendapatan PPh pasal 25/29 Badan Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411147",
         "FIELD2": "Pendapatan PPh pasal 26 Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411148",
         "FIELD2": "Pendapatan PPh final Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411149",
         "FIELD2": "Pendapatan PPh non migas lainnya Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411211",
         "FIELD2": "Pendapatan PPN Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411212",
         "FIELD2": "Pendapatan PPN Impor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411219",
         "FIELD2": "Pendapatan PPN Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411221",
         "FIELD2": "Pendapatan PPnBM dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411222",
         "FIELD2": "Pendapatan PPnBM Impor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411229",
         "FIELD2": "Pendapatan PPnBM Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411231",
         "FIELD2": "Pendapatan PPN Dalam Negeri Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411232",
         "FIELD2": "Pendapatan PPN Impor Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411239",
         "FIELD2": "Pendapatan PPN Lainnya Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411311",
         "FIELD2": "Pendapatan PBB Pedesaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411312",
         "FIELD2": "Pendapatan PBB Perkotaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411313",
         "FIELD2": "Pendapatan PBB Perkebunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411314",
         "FIELD2": "Pendapatan PBB Kehutanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "Hal :",
         "FIELD4": "12",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411315",
         "FIELD2": "Pendapatan PBB Pertambangan Mineral dan Batubara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411316",
         "FIELD2": "Pendapatan PBB  Pertambangan Minyak Bumi dan Gas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411317",
         "FIELD2": "Pendapatan PBB Pertambangan Panas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411319",
         "FIELD2": "Pendapatan PBB Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411411",
         "FIELD2": "Pendapatan BPHTB",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411511",
         "FIELD2": "Pendapatan Cukai Hasil Tembakau",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411512",
         "FIELD2": "Pendapatan Cukai Ethyl Alkohol",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411513",
         "FIELD2": "Pendapatan Cukai Minuman mengandung Ethyl Alkohol",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411514",
         "FIELD2": "Pendapatan Denda Administrasi Cukai",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411519",
         "FIELD2": "Pendapatan Cukai Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411611",
         "FIELD2": "Pendapatan Bea Meterai",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411612",
         "FIELD2": "Pendapatan dari Penjualan Benda Materai",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411613",
         "FIELD2": "Pendapatan PPn Batubara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411619",
         "FIELD2": "Pendapatan Pajak Tidak Langsung Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411621",
         "FIELD2": "Pendapatan Bunga Penagihan PPh",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411622",
         "FIELD2": "Pendapatan Bunga Penagihan PPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411623",
         "FIELD2": "Pendapatan Bunga Penagihan PPnBM",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411624",
         "FIELD2": "Pendapatan Bunga Penagihan PTLL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411631",
         "FIELD2": "Pendapatan Bunga Penagihan PPh Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "411632",
         "FIELD2": "Pendapatan Bunga Penagihan PPN Ditanggung Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412111",
         "FIELD2": "Pendapatan Bea Masuk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412112",
         "FIELD2": "Pendapatan Bea Masuk ditanggung Pemerintah atas Hibah (SPM Nihil)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412113",
         "FIELD2": "Pendapatan Denda Administrasi Pabean",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412114",
         "FIELD2": "Pendapatan Bea Masuk dalam rangka Kemudahan Impor Tujuan Ekspor (KITE)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412115",
         "FIELD2": "Denda atas sanksi administrasi dari pelaksanaan pengawasan terhadap barang tertentu yang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "pengangkutannya di dalam daerah pabean (antar pulau)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412116",
         "FIELD2": "Pendapatan BM-DTP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412119",
         "FIELD2": "Pendapatan Pabean Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412121",
         "FIELD2": "Pendapatan Bea Masuk Antidumping",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412122",
         "FIELD2": "Pendapatan Bea Masuk Imbalan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412123",
         "FIELD2": "Pendapatan Bea Masuk Tindakan Pengamanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412211",
         "FIELD2": "Pendapatan Bea Keluar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412212",
         "FIELD2": "Pendapatan Denda Administrasi Bea Keluar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "412213",
         "FIELD2": "Pendapatan Bunga Bea Keluar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "42",
         "FIELD2": "PENERIMAAN NEGARA BUKAN PAJAK",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421111",
         "FIELD2": "Pendapatan Minyak Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421211",
         "FIELD2": "Pendapatan Gas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421321",
         "FIELD2": "Pendapatan Iuran Tetap Pertambangan Mineral dan Batubara ? Eksplorasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421322",
         "FIELD2": "Pendapatan Iuran Tetap Pertambangan Mineral dan Batubara - Operasi Produksi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421323",
         "FIELD2": "Pendapatan Iuran Tetap Pertambangan Mineral dan Batubara - Izin Pertambangan Rakyat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421331",
         "FIELD2": "Pendapatan Iuran Produksi/Royalti Pertambangan Batubara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421332",
         "FIELD2": "Pendapatan Iuran Produksi/Royalti Pertambangan Tembaga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421333",
         "FIELD2": "Pendapatan Iuran Produksi/Royalti Pertambangan Emas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421334",
         "FIELD2": "Pendapatan Iuran Produksi/Royalti Pertambangan Perak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421335",
         "FIELD2": "Pendapatan Iuran Produksi/Royalti Pertambangan Nikel",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421336",
         "FIELD2": "Pendapatan Iuran Produksi/Royalti Pertambangan Timah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421337",
         "FIELD2": "Pendapatan Iuran Produksi/Royalti Pertambangan Besi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421339",
         "FIELD2": "Pendapatan Iuran Produksi/Royalti Pertambangan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421341",
         "FIELD2": "Pendapatan Bagian Pemerintah dari Keuntungan Bersih Pemegang Izin Usaha Pertambangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Khusus (IUPK)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421411",
         "FIELD2": "Pendapatan Dana Reboisasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "13",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421421",
         "FIELD2": "Pendapatan Provisi Sumber Daya Hutan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421435",
         "FIELD2": "Pendapatan Iuran Izin Usaha Pemanfaatan Hasil Hutan (IIUPHH)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421441",
         "FIELD2": "Pendapatan Penggunaan Kawasan Hutan Untuk Kepentingan Pembangunan Di Luar Kegiatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Kehutanan",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421521",
         "FIELD2": "Pendapatan Pungutan Pengusahaan Perikanan Bidang Perikanan Tangkap",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421522",
         "FIELD2": "Pendapatan Pungutan Pengusahaan Perikanan Bidang Pembudidayaan Ikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421531",
         "FIELD2": "Pendapatan Pungutan Hasil Perikanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421621",
         "FIELD2": "Pendapatan Pengusahaan Panas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421631",
         "FIELD2": "Pendapatan Iuran Tetap Panas Bumi-Eksplorasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421632",
         "FIELD2": "Pendapatan Iuran Tetap Panas Bumi-Operasi Produksi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "421641",
         "FIELD2": "Pendapatan Iuran Produksi/Royalti Panas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "422131",
         "FIELD2": "Pendapatan Bagian Laba BUMN Perbankan di Bawah Kementerian BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "422132",
         "FIELD2": "Pendapatan Bagian Laba BUMN Non Perbankan di Bawah Kementerian BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "422141",
         "FIELD2": "Pendapatan Bagian Laba BUMN/Lembaga Perbankan di Bawah Kementerian Keuangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "422142",
         "FIELD2": "Pendapatan Bagian Laba BUMN/Lembaga Non Perbankan di Bawah Kementerian Keuangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "422211",
         "FIELD2": "Pendapatan dari Surplus Bank Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "422212",
         "FIELD2": "Pendapatan dari Surplus Otoritas Jasa Keuangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "422213",
         "FIELD2": "Pendapatan dari Surplus Lembaga Penjamin Simpanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "422219",
         "FIELD2": "Pendapatan dari Surplus Lembaga Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423111",
         "FIELD2": "Pendapatan Penjualan Hasil Pertanian, Kehutanan, dan Perkebunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423112",
         "FIELD2": "Pendapatan Penjualan Hasil Peternakan dan Perikanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423113",
         "FIELD2": "Pendapatan Penjualan Hasil Tambang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423114",
         "FIELD2": "Pendapatan Penjualan Hasil Sitaan/Rampasan dan Harta Peninggalan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423115",
         "FIELD2": "Pendapatan Penjualan Obat-obatan dan Hasil Farmasi Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423116",
         "FIELD2": "Pendapatan dari Hasil Penerbitan, Film, Survey, Pemetaan, Hasil Cetakan dan Informasi Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423117",
         "FIELD2": "Pendapatan Penjualan Dokumen-dokumen Pelelangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423118",
         "FIELD2": "Pendapatan Penjualan Cadangan Beras Pemerintah Dalam Rangka Operasi Pasar Murni.",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423119",
         "FIELD2": "Pendapatan Penjualan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423121",
         "FIELD2": "Pendapatan Penjualan Tanah, Gedung, dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423122",
         "FIELD2": "Pendapatan Penjualan Kendaraan Bermotor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423123",
         "FIELD2": "Pendapatan Penjualan Sewa Beli",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423124",
         "FIELD2": "Pendapatan Penjualan Aset Bekas Milik Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423129",
         "FIELD2": "Pendapatan Penjualan Aset Lainnya yang Berlebih/Rusak/Dihapuskan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423131",
         "FIELD2": "Pendapatan Bersih Hasil Penjualan Bahan Bakar Minyak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423132",
         "FIELD2": "Pendapatan Minyak Mentah (DMO)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423133",
         "FIELD2": "Pendapatan Denda, Bunga, dan Penalti terkait Kegiatan Usaha Hulu Migas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423139",
         "FIELD2": "Pendapatan Lainnya dari kegiatan Hulu Migas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423141",
         "FIELD2": "Pendapatan Sewa Tanah, Gedung, dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423142",
         "FIELD2": "Pendapatan Sewa Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423143",
         "FIELD2": "Pendapatan Sewa Jalan, Irigasi dan Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423144",
         "FIELD2": "Pendapatan dari KSP Tanah, Gedung, dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423145",
         "FIELD2": "Pendapatan dari KSP Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423146",
         "FIELD2": "Pendapatan dari KSP Jalan, Irigasi dan Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423147",
         "FIELD2": "Pendapatan dari Bangun, Guna, Serah (BGS)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423148",
         "FIELD2": "Pendapatan dari Bangun, Serah, Guna (BSG)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423149",
         "FIELD2": "Pendapatan dari Pemanfaatan BMN Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423154",
         "FIELD2": "Pendapatan atas Pemanfaatan Aset Properti",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423155",
         "FIELD2": "Pendapatan atas Aset Saham dan Surat Berharga Lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423211",
         "FIELD2": "Pendapatan Rumah Sakit dan Instansi Kesehatan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423212",
         "FIELD2": "Pendapatan Tempat Hiburan/Taman/ Museum dan Pungutan Usaha Pariwisata Alam (PUPA)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423213",
         "FIELD2": "Pendapatan Surat Keterangan, Visa, Paspor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "14",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423214",
         "FIELD2": "Pendapatan Hak dan Perijinan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423215",
         "FIELD2": "Pendapatan Sensor, Karantina, Pengawasan, Pemeriksaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423216",
         "FIELD2": "Pendapatan jasa tenaga, pekerjaan, informasi, pelatihan dan teknologi sesuai dengan tugas dan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "fungsi masing-masing Kementerian Negara/Lembaga",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423217",
         "FIELD2": "Pendapatan Jasa Kantor Urusan Agama",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423218",
         "FIELD2": "Pendapatan Jasa Bandar Udara, Kepelabuhan, dan Kenavigasian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423219",
         "FIELD2": "Pendapatan Pelayanan Pertanahan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423221",
         "FIELD2": "Pendapatan Jasa Lembaga Keuangan (Jasa Giro)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423222",
         "FIELD2": "Pendapatan Jasa Penyelenggaraan Telekomunikasi dan Jasa Penyelenggaraan Penyiaran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423223",
         "FIELD2": "Pendapatan Iuran Lelang untuk Fakir Miskin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423224",
         "FIELD2": "Pendapatan Jasa Catatan Sipil",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423225",
         "FIELD2": "Pendapatan Biaya Penagihan Pajak Negara dengan Surat Paksa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423226",
         "FIELD2": "Pendapatan Uang Pewarganegaraan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423227",
         "FIELD2": "Pendapatan Bea Lelang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423228",
         "FIELD2": "Pendapatan Biaya Pengurusan Piutang dan Lelang Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423229",
         "FIELD2": "Pendapatan Registrasi Dokter dan Dokter Gigi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423231",
         "FIELD2": "Pendapatan dari Pemberian Surat Perjalanan RI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423232",
         "FIELD2": "Pendapatan dari Jasa Pengurusan Dokumen Konsuler",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423233",
         "FIELD2": "Pendapatan Jasa Pelayanan pada Kantor Dagang dan Ekonomi Indonesia di Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423239",
         "FIELD2": "Pendapatan Rutin Lainnya dari Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423241",
         "FIELD2": "Pendapatan Layanan Jasa Perbankan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423242",
         "FIELD2": "Pendapatan jasa bank dari penerusan pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423243",
         "FIELD2": "Pendapatan biaya lain-lain penerusan pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423251",
         "FIELD2": "Pendapatan atas Penertiban SP2D dalam Rangka TSA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423252",
         "FIELD2": "Pendapatan atas Penempatan Uang Negara pada Bank Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423253",
         "FIELD2": "Pendapatan dari Pelaksanaan Treasury Notional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423254",
         "FIELD2": "Pendapatan atas Penempatan Uang Negara pada Bank Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423261",
         "FIELD2": "Pendapatan Penerbitan Surat Izin Mengemudi (SIM)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423262",
         "FIELD2": "Pendapatan Surat Tanda Nomor Kendaraan (STNK)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423263",
         "FIELD2": "Pendapatan Surat Tanda Coba Kendaraan (STCK)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423264",
         "FIELD2": "Pendapatan Buku Pemilik Kendaraan Bermotor (BPKB)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423265",
         "FIELD2": "Pendapatan Tanda Nomor Kendaraan Bermotor (TNKB)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423266",
         "FIELD2": "Pendapatan Uji Keterampilan Pengemudi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423267",
         "FIELD2": "Pendapatan Penerbitan Surat Ijin Senjata Api dan Bahan Peledak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423268",
         "FIELD2": "Pendapatan Perpanjangan Surat Izin Mengemudi (SIM)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423269",
         "FIELD2": "Pendapatan Nomor Registrasi Kendaraan Bermotor Pilihan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423271",
         "FIELD2": "Pendapatan Jasa Pelayanan Jalan Tol Suramadu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423272",
         "FIELD2": "Pendapatan yang berasal dari BPJS Kesehatan pada Fasilitas Kesehatan Tingkat Pertama",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423273",
         "FIELD2": "Pendapatan yang berasal dari BPJS Kesehatan pada Fasilitas Kesehatan Tingkat Lanjutan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423274",
         "FIELD2": "Pendapatan dari penggunaan spektrum dan frekuensi radio",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423281",
         "FIELD2": "Pendapatan Penerbitan Surat Mutasi Kendaraan Ke Luar Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423282",
         "FIELD2": "Pendapatan Penerbitan Surat Keterangan Catatan Kepolisian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423283",
         "FIELD2": "Pendapatan Penerbitan Surat Keterangan Lapor Diri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423284",
         "FIELD2": "Pendapatan Penerbitan Kartu Sidik Jari (Inafis Card)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423285",
         "FIELD2": "Pendapatan Denda Pelanggaran Lalu Lintas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423286",
         "FIELD2": "Pendapatan Pengamanan Obyek Vital",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423287",
         "FIELD2": "Pendapatan Pelayanan Satuan Pengamanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423289",
         "FIELD2": "Pendapatan Pelayanan Kepolisian Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423291",
         "FIELD2": "Pendapatan Jasa Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423292",
         "FIELD2": "Pendapatan Bea Lelang oleh Balai Lelang/ Pejabat Lelang Kelas II",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423293",
         "FIELD2": "Pendapatan Bea Lelang Pegadaian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "15",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423294",
         "FIELD2": "Pendapatan Jasa Siaran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423295",
         "FIELD2": "Pendapatan Jasa Non Siaran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423311",
         "FIELD2": "Pendapatan Bunga atas Investasi dalam Obligasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423312",
         "FIELD2": "Pendapatan PPA (eks BPPN) atas Bunga Obligasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423313",
         "FIELD2": "Pendapatan Bunga dari Piutang dan Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423314",
         "FIELD2": "Pendapatan Bunga dari Pemberian Kredit Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423315",
         "FIELD2": "Pendapatan Bunga dari Rekening Pembangunan Hutan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423316",
         "FIELD2": "Pendapatan komitmen penerusan pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423317",
         "FIELD2": "Pendapatan Bunga Kredit Program",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423319",
         "FIELD2": "Pendapatan Bunga Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423321",
         "FIELD2": "Pendapatan Gain on Bond Redemption atas Pembelian Kembali Obligasi Dalam Negeri Jangka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Panjang",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423322",
         "FIELD2": "Pendapatan dari transaksi security lending",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423331",
         "FIELD2": "Pendapatan Premium Obligasi Negara Dalam Negeri/Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423332",
         "FIELD2": "Pendapatan Premium Obligasi Negara Dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423333",
         "FIELD2": "Pendapatan Premium atas Surat Berharga Syariah Negara (SBSN) Dalam Negeri/ Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423334",
         "FIELD2": "Pendapatan Premium atas Surat Berharga Syariah Negara (SBSN) Dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423341",
         "FIELD2": "Pendapatan atas transaksi security lending SUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423361",
         "FIELD2": "Pendapatan Imbal Jasa Penjaminan Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423411",
         "FIELD2": "Pendapatan Legalisasi Tanda Tangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423412",
         "FIELD2": "Pendapatan Pengesahan Surat Dibawah Tangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423413",
         "FIELD2": "Pendapatan Uang Meja (Leges) dan Upah Pada Panitera Badan Pengadilan (Peradilan)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423414",
         "FIELD2": "Pendapatan Hasil Denda/Tilang dan sebagainya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423415",
         "FIELD2": "Pendapatan Ongkos Perkara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423416",
         "FIELD2": "Pendapatan Penjualan Hasil Lelang Tindak Pidana Korupsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423417",
         "FIELD2": "Pendapatan Penjualan Hasil Lelang Gratifikasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423419",
         "FIELD2": "Pendapatan Kejaksaan dan Peradilan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423421",
         "FIELD2": "Pendapatan Uang Sitaan Tindak Pidana Pencucian Uang yang Telah Ditetapkan Pengadilan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423422",
         "FIELD2": "Pendapatan Penjualan Hasil Lelang Tindak Pidana Pencucian Uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423511",
         "FIELD2": "Pendapatan Uang Pendidikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423512",
         "FIELD2": "Pendapatan Uang Ujian Masuk, Kenaikan Tingkat, dan Akhir Pendidikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423513",
         "FIELD2": "Pendapatan Uang Ujian untuk Menjalankan Praktek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423519",
         "FIELD2": "Pendapatan Pendidikan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423611",
         "FIELD2": "Pendapatan Uang Sitaan Hasil Korupsi yang Telah Ditetapkan Pengadilan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423612",
         "FIELD2": "Pendapatan Gratifikasi yang Ditetapkan KPK Menjadi Milik Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423613",
         "FIELD2": "Pendapatan dari Pengembalian Penyalahgunaan Penyelenggaraan Keuangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423614",
         "FIELD2": "Pendapatan uang pengganti tindak pidana korupsi yang ditetapkan di pengadilan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423615",
         "FIELD2": "Pendapatan Hasil Pengembalian Uang Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423711",
         "FIELD2": "Pendapatan Iuran Badan Usaha dari kegiatan usaha penyediaan dan pendistribusian BBM",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423712",
         "FIELD2": "Pendapatan Iuran Badan Usaha dari kegiatan usaha pengangkutan Gas Bumi melalui Pipa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423713",
         "FIELD2": "Pendapatan Iuran Badan Usaha di Bidang Pasar Modal dan Lembaga Keuangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423721",
         "FIELD2": "Pendapatan Dana Pengamanan Hutan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423722",
         "FIELD2": "Pendapatan Penyelesaian Sengketa Lingkungan hidup Melalui Pengadilan dan di Luar Pengadilan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423723",
         "FIELD2": "Pendapatan Ganti Rugi Penggantian Tanaman Hasil Reboisasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423731",
         "FIELD2": "Pendapatan Iuran Menangkap/Mengambil/ Mengangkut Satwa Liar/ Mengambil/ Mengangkut",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Tumbuhan Alam Hidup, Termasuk Sarang Burung Walet di Kawasan Konservasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423732",
         "FIELD2": "Pendapatan Pungutan  Izin Pengusahaan Pariwisata Alam (PIPPA)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423733",
         "FIELD2": "Pendapatan Pungutan Izin Pengusahaan Taman Buru (PIPTB)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423734",
         "FIELD2": "Pendapatan Pungutan Izin Berburu di Taman Buru dan Areal Buru (PIB)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423735",
         "FIELD2": "Pendapatan Pungutan Masuk Obyek Wisata Alam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423736",
         "FIELD2": "Pendapatan Iuran Hasil Usaha Pengusahaan Pariwisata Alam (IHUPA)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "16",
         "FIELD3": "Hal :",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423737",
         "FIELD2": "Pendapatan Iuran Hasil Usaha Perburuan di Taman Buru (IHUPTB)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423738",
         "FIELD2": "Pendapatan Penggantian Nilai Tegakan dan Ganti Rugi Tegakan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423739",
         "FIELD2": "Pendapatan Pungutan Hasil Usaha Jasa Wisata Alam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423741",
         "FIELD2": "Pendapatan Penerimaan Dana Kompensasi Pelestarian Sumber Daya Alam Kelautan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423751",
         "FIELD2": "Pendapatan Denda Pelanggaran Eksploitasi Hutan dan Denda Terkait Kegiatan Pidana",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423752",
         "FIELD2": "Pendapatan Denda Keterlambatan Penyelesaian Pekerjaan Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423753",
         "FIELD2": "Pendapatan Denda Administrasi BPHTB",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423754",
         "FIELD2": "Pendapatan Denda Pelanggaran di Bidang Pasar Modal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423755",
         "FIELD2": "Pendapatan Denda Pelanggaran di Bidang Persaingan Usaha",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423756",
         "FIELD2": "Pendapatan Denda Pelaksanaan Rekening Pengeluaran Bersaldo Nihil dalam Rangka TSA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423757",
         "FIELD2": "Pendapatan Denda atas Pelaksanaan Penempatan uang Negara di Bank Umum dan Bank",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423758",
         "FIELD2": "Pendapatan Denda atas Pelaksanaan Treasury Notional Pooling",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423759",
         "FIELD2": "Pendapatan Denda Pelaksanaan Rekening Penerimaan Bersaldo Nihil dalam Rangka TSA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423761",
         "FIELD2": "Pendapatan Denda atas Kekurangan/ Keterlambatan Pelimpahan Saldo BO II ke BO I",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423762",
         "FIELD2": "Pendapatan Denda atas Kekurangan/ Keterlambatan Pembagian PBB oleh BO III PBB",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423763",
         "FIELD2": "Pendapatan Denda atas Keterlambatan Pengembalian Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423765",
         "FIELD2": "Denda Administrasi bidang Perlindungan Hutan dan Konservasi Alam (PHKA)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423766",
         "FIELD2": "Pendapatan Denda Administrasi Akuntan Publik dan Kantor Akuntan Publik",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423767",
         "FIELD2": "Pendapatan Denda atas Keterlambatan Penyampaian Laporan oleh debitur Kredit Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "(KUMK)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423768",
         "FIELD2": "Pendapatan Denda atas Keterlambatan Penyampaian Laporan oleh debitur Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423769",
         "FIELD2": "Pendapatan Denda Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423771",
         "FIELD2": "Pendapatan Izin Pemanfaatan Kawasan Hutan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423772",
         "FIELD2": "Pendapatan Iuran Izin Usaha Pemanfaatan Jasa Lingkungan pada Hutan Produksi (IIUPJL)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423773",
         "FIELD2": "Pendapatan Iuran Izin Usaha Penyedia Jasa Wisata Alam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423911",
         "FIELD2": "Penerimaan Kembali Belanja Pegawai Pusat TAYL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423912",
         "FIELD2": "Penerimaan Kembali Belanja Pensiun TAYL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423913",
         "FIELD2": "Penerimaan Kembali Belanja Lainnya TAYL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423915",
         "FIELD2": "Penerimaan Kembali Belanja Lainnya Hibah TAYL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423921",
         "FIELD2": "Pendapatan Pelunasan Piutang Non Bendahara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423922",
         "FIELD2": "Pendapatan Pelunasan Ganti Rugi atas Kerugian yang Diderita Oleh Negara (Masuk TP/TGR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Bendahara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423931",
         "FIELD2": "Pendapatan dari Penutupan Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423941",
         "FIELD2": "Pendapatan dari Selisih kurs dalam pengelolaan RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423942",
         "FIELD2": "Pendapatan dari Untung Selisih Kurs Uang Persediaan Satker Perwakilan RI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423951",
         "FIELD2": "Penerimaan Kembali Belanja Pegawai Pusat TAYL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423952",
         "FIELD2": "Penerimaan Kembali Belanja Barang Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423953",
         "FIELD2": "Penerimaan Kembali Belanja Modal Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423954",
         "FIELD2": "Penerimaan Kembali Belanja Pembayaran Kewajiban Utang Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423955",
         "FIELD2": "Penerimaan Kembali Belanja Subsidi Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423956",
         "FIELD2": "Penerimaan Kembali Belanja Hibah Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423957",
         "FIELD2": "Penerimaan Kembali Belanja Bantuan Sosial Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423958",
         "FIELD2": "Penerimaan Kembali Belanja Lain-lain Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423959",
         "FIELD2": "Penerimaan Kembali Transfer ke Daerah dan Dana Desa Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423961",
         "FIELD2": "Pendapatan dalam Rangka Refund Dana PHLN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423962",
         "FIELD2": "Pendapatan dari Retur SP2D",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423963",
         "FIELD2": "Pendapatan Surplus Pungutan Otoritas Jasa Keuangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423964",
         "FIELD2": "Pendapatan dari Hibah yang Belum Disahkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423991",
         "FIELD2": "Penerimaan Kembali Persekot/Uang Muka Gaji",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423992",
         "FIELD2": "Penerimaan Premi Penjaminan Perbankan Nasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423993",
         "FIELD2": "Pendapatan  dari Gerakan Nasional Rehabilitasi Hutan dan Lahan (GNRHL)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "17",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423994",
         "FIELD2": "Pendapatan dari Biaya Pengawasan HET Minyak Tanah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423995",
         "FIELD2": "Pendapatan Bagian Pemerintah dari Sisa Surplus Bank Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423996",
         "FIELD2": "Pendapatan Jasa Perbendaharaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423997",
         "FIELD2": "Pendapatan Kelebihan Pelimpahan Pajak/PNBP dari Bank/Pos Persepsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "423999",
         "FIELD2": "Pendapatan Anggaran Lain-lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424111",
         "FIELD2": "Pendapatan Jasa Pelayanan  Rumah Sakit",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424112",
         "FIELD2": "Pendapatan Jasa Pelayanan Pendidikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424113",
         "FIELD2": "Pendapatan Jasa Pelayanan Tenaga, Pekerjaan, Informasi, Pelatihan dan Teknologi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424114",
         "FIELD2": "Pendapatan Jasa Pencetakan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424115",
         "FIELD2": "Pendapatan Jasa Bandar Udara, Kepelabuhan dan Kenavigasian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424116",
         "FIELD2": "Pendapatan Jasa Penyelenggaraan Telekomunikasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424117",
         "FIELD2": "Pendapatan Jasa Pelayanan Pemasaran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424118",
         "FIELD2": "Pendapatan Penyediaan Barang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424119",
         "FIELD2": "Pendapatan Jasa Penyediaan Barang dan Jasa Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424121",
         "FIELD2": "Pendapatan Pengelolaan Kawasan Otorita",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424122",
         "FIELD2": "Pendapatan Pengelolaan Kawasan Pengembangan Ekonomi Terpadu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424123",
         "FIELD2": "Pendapatan Pengelolaan Fasilitas Umum Milik Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424129",
         "FIELD2": "Pendapatan Pengelolaan Kawasan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424131",
         "FIELD2": "Pendapatan Program Dana Penjaminan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424132",
         "FIELD2": "Pendapatan Program Dana Penjaminan Syariah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424133",
         "FIELD2": "Pendapatan Program Modal Ventura",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424134",
         "FIELD2": "Pendapatan Program Dana Bergulir Sektoral",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424135",
         "FIELD2": "Pendapatan Program Dana Bergulir Syariah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424136",
         "FIELD2": "Pendapatan Investasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424137",
         "FIELD2": "Pendapatan Pengelolaan Dana Pengembangan Pendidikan Nasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424138",
         "FIELD2": "Pendapatan Dana Perkebunan Kelapa Sawit",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424139",
         "FIELD2": "Pendapatan Pengelolaan Dana Khusus Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424141",
         "FIELD2": "Pendapatan dari Pengelolaan Barang Milik Negara pada Pengelola Barang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424211",
         "FIELD2": "Pendapatan Hibah Terikat Dalam Negeri-Perorangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424212",
         "FIELD2": "Pendapatan Hibah Terikat Dalam Negeri-Lembaga/Badan Usaha",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424213",
         "FIELD2": "Pendapatan Hibah Terikat Dalam Negeri-Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424214",
         "FIELD2": "Pendapatan Hibah Terikat Luar Negeri-Perorangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424215",
         "FIELD2": "Pendapatan Hibah Terikat Luar Negeri-Lembaga/Badan Usaha",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424216",
         "FIELD2": "Pendapatan Hibah Terikat Luar Negeri-Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424219",
         "FIELD2": "Pendapatan Hibah Terikat Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424221",
         "FIELD2": "Pendapatan Hibah Tidak Terikat Dalam Negeri-Perorangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424222",
         "FIELD2": "Pendapatan Hibah Tidak Terikat Dalam Negeri-Lembaga/Badan Usaha",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424223",
         "FIELD2": "Pendapatan Hibah Tidak Terikat Dalam Negeri-Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424224",
         "FIELD2": "Pendapatan Hibah Tidak Terikat Luar Negeri-Perorangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424225",
         "FIELD2": "Pendapatan Hibah Tidak Terikat Luar Negeri-Lembaga/Badan Usaha",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424226",
         "FIELD2": "Pendapatan Hibah Tidak Terikat Luar Negeri-Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424229",
         "FIELD2": "Pendapatan Hibah Tidak Terikat -Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424311",
         "FIELD2": "Pendapatan Hasil Kerjasama Perorangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424312",
         "FIELD2": "Pendapatan Hasil Kerja Sama Lembaga/Badan Usaha",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424313",
         "FIELD2": "Pendapatan Hasil Kerja Sama Pemerintah Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424911",
         "FIELD2": "Pendapatan Jasa Layanan Perbankan BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "424912",
         "FIELD2": "Pendapatan Jasa Layanan Perbankan BLU yang dibatasi pengelolaannya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425111",
         "FIELD2": "Pendapatan Penjualan Hasil Tambang Batubara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425112",
         "FIELD2": "Pendapatan Penjualan Hasil Pertanian, Perkebunan, Peternakan dan Budidaya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425113",
         "FIELD2": "Pendapatan Penjualan Dokumen-dokumen Pelelangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425114",
         "FIELD2": "Pendapatan Penjualan Cadangan Beras Pemerintah Dalam Rangka Operasi Pasar Murni",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "18",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425119",
         "FIELD2": "Pendapatan Penjualan Hasil Produksi Non Litbang Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425121",
         "FIELD2": "Pendapatan dari Penjualan Tanah, Gedung, dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425122",
         "FIELD2": "Pendapatan dari Penjualan Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425123",
         "FIELD2": "Pendapatan Kompensasi Sewa Beli Rumah Negara Golongan III",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425124",
         "FIELD2": "Pendapatan dari Tukar Menukar Tanah, Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425125",
         "FIELD2": "Pendapatan dari Tukar Menukar Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425126",
         "FIELD2": "Pendapatan dari Tukar Menukar Jalan, Irigasi dan Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425129",
         "FIELD2": "Pendapatan dari Pemindahtanganan BMN Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425131",
         "FIELD2": "Pendapatan Sewa Tanah, Gedung, dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425132",
         "FIELD2": "Pendapatan Sewa Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425133",
         "FIELD2": "Pendapatan Sewa Jalan, Irigasi dan Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425134",
         "FIELD2": "Pendapatan dari KSP Tanah, Gedung, dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425135",
         "FIELD2": "Pendapatan dari KSP Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425136",
         "FIELD2": "Pendapatan dari KSP Jalan, Irigasi, dan Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425137",
         "FIELD2": "Pendapatan dari Bangun, Guna, dan Serah (BGS)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425138",
         "FIELD2": "Pendapatan dari Bangun, Serah, dan Guna (BSG)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425139",
         "FIELD2": "Pendapatan dari Pemanfaatan BMN Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425141",
         "FIELD2": "Pendapatan atas Pengelolaan BMN yang Berasal dari KKKS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425142",
         "FIELD2": "Pendapatan atas Pengelolaan BMN yang Berasal dari Kontraktor PKP2B",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425143",
         "FIELD2": "Pendapatan atas Pemanfaatan Aset Properti",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425144",
         "FIELD2": "Pendapatan Atas Aset Saham dan Surat Berharga Lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425145",
         "FIELD2": "Pendapatan Kompensasi Aset Bekas Milik Asing/Tionghoa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425149",
         "FIELD2": "Pendapatan atas Pengelolaan BMN dan Kekayaan Negara Lainnyadari Pengelola Barang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425151",
         "FIELD2": "Pendapatan Penggunaan Sarana dan Prasarana sesuai dengan Tusi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425161",
         "FIELD2": "Pendapatan Bersih Hasil Penjualan Bahan Bakar Minyak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425162",
         "FIELD2": "Pendapatan Minyak Mentah (DMO)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425169",
         "FIELD2": "Pendapatan Lainnya dari Kegiatan Hulu Migas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425171",
         "FIELD2": "Pendapatan Iuran Badan Usaha dari Kegiatan Usaha Penyediaan dan Pendistribusian BBM",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425172",
         "FIELD2": "Pendapatan Iuran Badan Usaha dari Kegiatan Usaha Gas Bumi Melalui Pipa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425211",
         "FIELD2": "Pendapatan Paspor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425212",
         "FIELD2": "Pendapatan Visa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425213",
         "FIELD2": "Pendapatan Izin Keimigrasiandan Izin Masuk Kembali (Re-entry permit)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425214",
         "FIELD2": "Pendapatan Pelayanan Keimigrasian Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425215",
         "FIELD2": "Pendapatan Pelayanan Fidusia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425216",
         "FIELD2": "Pendapatan Pelayanan Badan Hukum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425217",
         "FIELD2": "Pendapatan Pelayanan Jasa Hukum Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425218",
         "FIELD2": "Pendapatan Pelayanan Kekayaan Intelektual",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425219",
         "FIELD2": "Pendapatan Pelayanan dan Administrasi Hukum Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425221",
         "FIELD2": "Pendapatan Visa Republik Indonesia di Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425222",
         "FIELD2": "Pendapatan Paspor Republik Indonesia di Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425223",
         "FIELD2": "Pendapatan Dokumen Kekonsuleran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425224",
         "FIELD2": "Pendapatan Jasa Pelayanan pada Kantor Dagang dan Ekonomi Indonesia di Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425228",
         "FIELD2": "Pendapatan Pelayanan Lainnya di Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425229",
         "FIELD2": "Pendapatan Administrasi di Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425231",
         "FIELD2": "Pendapatan Pengesahan Surat di Bawah Tangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425232",
         "FIELD2": "Pendapatan Uang Meja (Leges) dan Upah pada Panitera Badan Peradilan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425233",
         "FIELD2": "Pendapatan Ongkos Perkara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425234",
         "FIELD2": "Pendapatan Gratifikasi yang Ditetapkan KPK Menjadi Milik Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425235",
         "FIELD2": "Pendapatan Penjualan Hasil Lelang Gratifikasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425236",
         "FIELD2": "Pendapatan Hasil Rampasan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425237",
         "FIELD2": "Pendapatan Denda Pelanggaran Lalu Lintas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "19",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425238",
         "FIELD2": "Pendapatan Denda Hasil Tindak Pidana Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425239",
         "FIELD2": "Pendapatan Kejaksaan dan Peradilan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425241",
         "FIELD2": "Pendapatan Uang Sitaan Hasil Korupsi yang Telah Ditetapkan Pengadilan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425242",
         "FIELD2": "Pendapatan Uang Sitaan Tindak Pidana Pencucian Uang yang Telah Ditetapkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425243",
         "FIELD2": "Pendapatan Uang Pengganti Tindak Pidana Korupsi yang Ditetapkan Pengadilan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425244",
         "FIELD2": "Pendapatan Penjualan Hasil Lelang Tindak Pidana Pencucian Uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425245",
         "FIELD2": "Pendapatan Penjualan Hasil Lelang Tindak Pidana Korupsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425246",
         "FIELD2": "Pendapatan Denda Hasil Tindak Pidana Korupsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425247",
         "FIELD2": "Pendapatan Denda Hasil Tindak Pidana Pencucian Uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425248",
         "FIELD2": "Pendapatan Hasil Pengembalian Uang Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425249",
         "FIELD2": "Pendapatan Uang Sitaan Tindak Pidana Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425251",
         "FIELD2": "Pendapatan Perizinan Tenaga Kerja Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425252",
         "FIELD2": "Pendapatan Perizinan Pertanian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425253",
         "FIELD2": "Pendapatan Perizinan di Bidang Perdagangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425254",
         "FIELD2": "Pendapatan Perizinan di Bidang Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425255",
         "FIELD2": "Pendapatan Perizinan di Bidang Lingkungan Hidup dan Kehutanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425259",
         "FIELD2": "Pendapatan Perizinan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425261",
         "FIELD2": "Pendapatan Penerbitan Surat Izin Mengemudi (SIM)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425262",
         "FIELD2": "Pendapatan Perpanjangan Surat Izin Mengemudi (SIM)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425263",
         "FIELD2": "Pendapatan Surat Tanda Nomor Kendaraan (STNK)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425264",
         "FIELD2": "Pendapatan Surat Tanda Coba Kendaraan (STCK)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425265",
         "FIELD2": "Pendapatan Buku Pemilik Kendaraan Bermotor (BPKB)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425266",
         "FIELD2": "Pendapatan Tanda Nomor Kendaraan Bermotor (TNKB)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425267",
         "FIELD2": "Pendapatan Ujian Keterampilan Mengemudi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425268",
         "FIELD2": "Pendapatan Penerbitan Surat Mutasi Kendaraan Ke Luar Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425269",
         "FIELD2": "Pendapatan Nomor Registrasi Kendaraan Bermotor Pilihan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425271",
         "FIELD2": "Pendapatan Surat Tanda Nomor Kendaraan Bermotor Lintas Batas Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425272",
         "FIELD2": "Pendapatan Tanda Nomor Kendaraan Bermotor Lintas Batas Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425273",
         "FIELD2": "Pendapatan Penerbitan Surat Izin Senjata Api dan Bahan Peledak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425274",
         "FIELD2": "Pendapatan Penerbitan Surat Keterangan Catatan Kepolisian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425275",
         "FIELD2": "Pendapatan Pelayanan Satuan Pengaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425276",
         "FIELD2": "Pendapatan Pengamanan Obyek Vital",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425279",
         "FIELD2": "Pendapatan Pelayanan Kepolisian Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425281",
         "FIELD2": "Pendapatan Akreditasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425282",
         "FIELD2": "Pendapatan Pengujian, Sertifikasi dan Standardisasi di Bidang Lingkungan Hidup dan Kehutanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425283",
         "FIELD2": "Pendapatan Pengujian, Sertifikasi, Kalibrasi, dan Standardisasi di Bidang Perindustrian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425284",
         "FIELD2": "Pendapatan Pengujian, Sertifikasi, Kalibrasi, dan Standardisasi di Bidang Perdagangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425285",
         "FIELD2": "Pendapatan Pengujian, Sertifikasi, Kalibrasi, dan Standardisasi di Bidang Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425286",
         "FIELD2": "Pendapatan Pengujian, Sertifikasi, Kalibrasi, dan Standardisasi di Bidang Pekerjaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425287",
         "FIELD2": "Pendapatan Pengujian, Sertifikasi dan Kalibrasidi Bidang Perhubungan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425288",
         "FIELD2": "Pendapatan Sertifikasi di Bidang Komunikasi dan Informatika",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425289",
         "FIELD2": "Pendapatan Pengujian, Sertifikasi, Kalibrasi, dan Standardisasi Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425311",
         "FIELD2": "Pendapatan dari Badan Penyelenggara Jaminan Sosial (BPJS) Kesehatan pada Fasilitas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Kesehatan Tingkat Pertama (FKTP)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425312",
         "FIELD2": "Pendapatan dari BPJS Kesehatan pada Fasilitas Kesehatan Tingkat Lanjutan (FKTL)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425313",
         "FIELD2": "Pendapatan Layanan Fasilitas Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425314",
         "FIELD2": "Pendapatan Jasa Karantina Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425315",
         "FIELD2": "Pendapatan Jasa Pemberian Vaksin Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425316",
         "FIELD2": "Pendapatan Registrasi Tenaga Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425321",
         "FIELD2": "Pendapatan Jasa Pengawasan Obat dan Makanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425331",
         "FIELD2": "Pendapatan Jasa Karantina Pertanian dan Peternakan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "20",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425332",
         "FIELD2": "Pendapatan Jasa Karantina Perikanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425341",
         "FIELD2": "Pendapatan Pelayanan Pertanahan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425342",
         "FIELD2": "Pendapatan Peneriman Hak Atas Tanah P3MB/Presidium Kabinet Dwikora",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425351",
         "FIELD2": "Pendapatan Jasa Kantor Urusan Agama",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425359",
         "FIELD2": "Pendapatan Jasa Pelayanan Keagamaan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425411",
         "FIELD2": "Pendapatan Ujian/Seleksi Masuk Pendidikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425412",
         "FIELD2": "Pendapatan Biaya Pendidikan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425413",
         "FIELD2": "Pendapatan Penelitian, Pengembangan, dan Pengabdian Masyarakat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425419",
         "FIELD2": "Pendapatan Pendidikan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425421",
         "FIELD2": "Pendapatan Layanan Pendidikan dan/atau Pelatihan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425429",
         "FIELD2": "Pendapatan Pengembangan Sumber Daya Manusia Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425431",
         "FIELD2": "Pendapatan Layanan Penelitian/Riset dan Pengembangan Iptek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425432",
         "FIELD2": "Pendapatan Layanan Survey dan Pemetaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425433",
         "FIELD2": "Pendapatan Layanan Meteorologi, Klimatologi dan Geofisika",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425434",
         "FIELD2": "Pendapatan Hasil Penelitian/Riset dan Hasil Pengembangan Iptek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425435",
         "FIELD2": "Pendapatan Hasil Survey dan Pemetaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425436",
         "FIELD2": "Pendapatan Royalti atas Kekayaan Intelektual",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425439",
         "FIELD2": "Pendapatan Penelitian/Riset, Survey, Pemetaan, dan Pengembangan Iptek Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425451",
         "FIELD2": "Pendapatan Museum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425459",
         "FIELD2": "Pendapatan Sejarah dan Kebudayaan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425511",
         "FIELD2": "Pendapatan Pelayanan Pengujian Kendaraan Bermotor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425512",
         "FIELD2": "Pendapatan Penggunaan Prasarana Perkeretaapian/Track Access Charge",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425513",
         "FIELD2": "Pendapatan Jasa Kepelabuhanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425514",
         "FIELD2": "Pendapatan Jasa Navigasi Pelayaran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425515",
         "FIELD2": "Pendapatan Jasa Perkapalan dan Kepelautan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425516",
         "FIELD2": "Pendapatan Jasa Kebandarudaraan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425517",
         "FIELD2": "Pendapatan Jasa Navigasi Penerbangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425518",
         "FIELD2": "Pendapatan dari Konsesi Bidang Transportasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425519",
         "FIELD2": "Pendapatan Jasa Transportasi Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425521",
         "FIELD2": "Pendapatan Penggunaan Spektrum Frekuensi Radio",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425522",
         "FIELD2": "Pendapatan Hak Penyelenggaraan Telekomunikasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425523",
         "FIELD2": "Pendapatan Izin Penyelenggaraan Penyiaran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425524",
         "FIELD2": "Pendapatan Izin Penyelenggaraan Pos",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425525",
         "FIELD2": "Pendapatan Kontribusi Penyelenggaraan Pos Untuk Pembiayaan Layanan Pos Universal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425526",
         "FIELD2": "Pendapatan Pengelolaan Nama Domain Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425529",
         "FIELD2": "Pendapatan Jasa Komunikasi dan Informatika Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425531",
         "FIELD2": "Pendapatan Jasa Siaran LPP RRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425532",
         "FIELD2": "Pendapatan Jasa Non Siaran LPP RRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425533",
         "FIELD2": "Pendapatan Jasa Siaran LPP TVRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425534",
         "FIELD2": "Pendapatan Jasa Non Siaran LPP TVRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425611",
         "FIELD2": "Pendapatan Wisata Alam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425612",
         "FIELD2": "Pendapatan Iuran di Bidang Lingkungan Hidup dan Kehutanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425619",
         "FIELD2": "Pendapatan Jasa di Bidang Lingkungan Hidup dan Kehutanan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425621",
         "FIELD2": "Pendapatan Jasa Pelabuhan Perikanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425629",
         "FIELD2": "Pendapatan Jasa Kelautan dan Perikanan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425691",
         "FIELD2": "Pendapatan Jasa Pengawasan/Pemeriksaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425692",
         "FIELD2": "Pendapatan Jasa Tenaga, Pekerjaan, dan Informasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425693",
         "FIELD2": "Pendapatan dari Jasa Layanan Jalan Tol",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425694",
         "FIELD2": "Pendapatan dari Biaya Jasa Pengelolaan Sumber Daya Air (BJPSDA)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425699",
         "FIELD2": "Pendapatan Jasa Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425711",
         "FIELD2": "Pendapatan Bunga atas Investasi dalam Obligasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "21",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425712",
         "FIELD2": "Pendapatan PPA (eks BPPN) atas Bunga Obligasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425713",
         "FIELD2": "Pendapatan Bunga dari Piutang dan Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425714",
         "FIELD2": "Pendapatan Bunga dari Pemberian Kredit Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425715",
         "FIELD2": "Pendapatan Komitmen Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425716",
         "FIELD2": "Pendapatan Bunga Kredit Program",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425717",
         "FIELD2": "Pendapatan Bunga dari Rekening Pembangunan Hutan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425719",
         "FIELD2": "Pendapatan Bunga Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425721",
         "FIELD2": "Pendapatan Gain on Bond Redemption atas Pembelian Kembali Obligasi Negara Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425722",
         "FIELD2": "Pendapatan dari Transaksi Security Lending",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425723",
         "FIELD2": "Pendapatan Gain on BondRedemption atas Pembelian Kembali Obligasi Negara Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425724",
         "FIELD2": "Pendapatan Gain on BondRedemption atas Pembelian Kembali SBSN Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425725",
         "FIELD2": "Pendapatan Gain on Bond Redemption atas Pembelian Kembali SBSN Valuta Asing Jangka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425731",
         "FIELD2": "Pendapatan Premium Obligasi Negara Dalam Negeri/Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425732",
         "FIELD2": "Pendapatan Premium Obligasi Negara Dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425733",
         "FIELD2": "Pendapatan Premium atas Surat Berharga Syariah Negara (SBSN) Dalam Negeri/Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425734",
         "FIELD2": "Pendapatan Premium atas Surat Berharga Syariah Negara (SBSN) Dalam Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425741",
         "FIELD2": "Pendapatan Imbal Jasa Penjaminan Infrastruktur",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425742",
         "FIELD2": "Pendapatan Selisih Harga SBN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425743",
         "FIELD2": "Pendapatan Kupon SBN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425744",
         "FIELD2": "Pendapatan Bunga Reverse Repo",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425745",
         "FIELD2": "Pendapatan Fee atas Transaksi Security Lending SUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425746",
         "FIELD2": "Pendapatan Lain-lain atas Rekening Tujuan Tertentu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425751",
         "FIELD2": "Pendapatan dari Selisih Kurs dalam Pengelolaan Rekening Milik BUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425752",
         "FIELD2": "Pendapatan dari Untung Selisih Kurs Uang Persediaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425753",
         "FIELD2": "Pendapatan dari Selisih Kurs yang Terealisasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425761",
         "FIELD2": "Pendapatan Layanan Jasa Perbankan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425762",
         "FIELD2": "Pendapatan Jasa Bank dari Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425763",
         "FIELD2": "Pendapatan Biaya Lain-lain Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425764",
         "FIELD2": "Pendapatan Jasa Lembaga Keuangan (Jasa Giro)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425765",
         "FIELD2": "Pendapatan dari Penutupan Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425771",
         "FIELD2": "Pendapatan atas Penerbitan SP2D Dalam Rangka TSA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425772",
         "FIELD2": "Pendapatan atas Penempatan Uang Negara Pada Bank Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425773",
         "FIELD2": "Pendapatan dari Pelaksanaan Treasury National Pooling",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425774",
         "FIELD2": "Pendapatan atas Penempatan Uang Negara pada Bank Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425775",
         "FIELD2": "Pendapatan dari Penempatan Uang Sebelum Rekonsiliasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425781",
         "FIELD2": "Pendapatan Biaya Penagihan Pajak Negara dengan Surat Paksa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425782",
         "FIELD2": "Pendapatan Bea Lelang Pejabat Lelang Kelas I",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425783",
         "FIELD2": "Pendapatan Bea Lelang Pejabat Lelang Kelas II",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425784",
         "FIELD2": "Pendapatan Bea Lelang Pegadaian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425785",
         "FIELD2": "Pendapatan Biaya Administrasi Pengurusan Piutang Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425791",
         "FIELD2": "Pendapatan Penyelesaian Tuntutan Ganti Rugi Non Bendahara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425792",
         "FIELD2": "Pendapatan Penyelesaian Tuntutan Perbendaharaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425811",
         "FIELD2": "Pendapatan Denda Penyelesaian Pekerjaan Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425812",
         "FIELD2": "Pendapatan Denda Pelanggaran di Bidang Persaingan Usaha",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425813",
         "FIELD2": "Pendapatan Denda Pelanggaran di Bidang Perdagangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425814",
         "FIELD2": "Pendapatan Denda Pelaksanaan Rekening Pengeluaran Bersaldo Nihil dalam Rangka TSA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425815",
         "FIELD2": "Pendapatan Denda atas Pelaksanaan Penempatan uang Negara di Bank Umum dan Bank",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425816",
         "FIELD2": "Pendapatan Denda atas Pelaksanaan Treasury National Pooling",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425817",
         "FIELD2": "Pendapatan Denda atas Kekurangan/Keterlambatan Pelimpahan Penerimaan Negara oleh",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Bank/Pos Persepsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "22",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425818",
         "FIELD2": "Pendapatan Denda, Bunga, dan Penalti terkait Kegiatan Usaha Hulu Migas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425819",
         "FIELD2": "Pendapatan Denda terkait Pengusahaan Panas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425821",
         "FIELD2": "Pendapatan Denda atas Kekurangan/Keterlambatan Pelimpahan Saldo BO II ke BO",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425822",
         "FIELD2": "Pendapatan Denda atas Kekurangan/Keterlambatan Pembagian PBB oleh BO III PBB",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425823",
         "FIELD2": "Pendapatan Denda atas Keterlambatan Pengembalian Penerusan Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425824",
         "FIELD2": "Pendapatan Denda Penyaluran Kredit Program",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425825",
         "FIELD2": "Pendapatan Denda Administrasi Akuntan Publik dan Kantor Akuntan Publik",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425826",
         "FIELD2": "Pendapatan Denda atas Keterlambatan Penyampaian Laporan oleh debitur Kredit Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "(KUMK)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425827",
         "FIELD2": "Pendapatan Denda atas Keterlambatan Penyampaian Laporan oleh debitur",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425828",
         "FIELD2": "Pendapatan Denda atas Keterlambatan Kompensasi Sewa Beli Rumah Negara Golongan III",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425829",
         "FIELD2": "Pendapatan Denda/Kompensasi di Bidang Lingkungan Hidup dan Kehutanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425839",
         "FIELD2": "Pendapatan Denda Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425911",
         "FIELD2": "Penerimaan Kembali Belanja Pegawai Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425912",
         "FIELD2": "Penerimaan Kembali Belanja Barang Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425913",
         "FIELD2": "Penerimaan Kembali Belanja Modal Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425914",
         "FIELD2": "Penerimaan Kembali Belanja Pembayaran Kewajiban Utang Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425915",
         "FIELD2": "Penerimaan Kembali Belanja Subsidi Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425916",
         "FIELD2": "Penerimaan Kembali Belanja Hibah Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425917",
         "FIELD2": "Penerimaan Kembali Belanja Bantuan Sosial Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425918",
         "FIELD2": "Penerimaan Kembali Belanja Lain-lain Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425919",
         "FIELD2": "Penerimaan Kembali Transfer ke Daerah dan Dana Desa Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425921",
         "FIELD2": "Penerimaan Kembali Belanja Kontribusi Sosial TAYL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425991",
         "FIELD2": "Penerimaan Kembali Persekot/Uang Muka Gaji",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425992",
         "FIELD2": "Penerimaan Premi Penjaminan Perbankan Nasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425993",
         "FIELD2": "Pendapatan Jasa Perbendaharaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425994",
         "FIELD2": "Pendapatan Kelebihan Pelimpahan Pajak/PNBP dari Bank/Pos Persepsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425995",
         "FIELD2": "Pendapatan Penyetoran Kelebihan Hasil Bersih Lelang yang Tidak Diambil oleh yang Berhak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425996",
         "FIELD2": "Pendapatan dalam rangka Refund Dana PHLN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425997",
         "FIELD2": "Pendapatan dari Hibah yang Belum Disahkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425998",
         "FIELD2": "Pendapatan dari Retur SP2D",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "425999",
         "FIELD2": "Pendapatan Anggaran Lain-lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "43",
         "FIELD2": "PENERIMAAN HIBAH",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431111",
         "FIELD2": "Pendapatan Hibah Dalam Negeri - Perorangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431112",
         "FIELD2": "Pendapatan Hibah Dalam Negeri - Lembaga/Badan Usaha",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431119",
         "FIELD2": "Pendapatan Hibah Dalam Negeri Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431121",
         "FIELD2": "Pendapatan Hibah Dalam Negeri - Langsung Bentuk Barang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431122",
         "FIELD2": "Pendapatan Hibah Dalam Negeri Berupa Jasa (Transaksi Non Kas)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431131",
         "FIELD2": "Pendapatan Hibah Dalam Negeri Langsung  -  Perorangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431132",
         "FIELD2": "Pendapatan Hibah Dalam Negeri Langsung Bentuk Uang - Lembaga/ Badan Usaha",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431133",
         "FIELD2": "Pendapatan Dalam Negeri Langsung-Pemerintah daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431139",
         "FIELD2": "Pendapatan Hibah Dalam Negeri Langsung Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431211",
         "FIELD2": "Pendapatan Hibah Luar Negeri - Perorangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431212",
         "FIELD2": "Pendapatan Hibah Luar Negeri - Terencana Bilateral",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431213",
         "FIELD2": "Pendapatan Hibah Luar Negeri - Terencana Multilateral",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431219",
         "FIELD2": "Pendapatan Hibah Luar Negeri Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431221",
         "FIELD2": "Pendapatan Hibah Luar Negeri Berupa Barang (Transaksi Non Kas)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431222",
         "FIELD2": "Pendapatan Hibah Luar Negeri - Langsung Bentuk Jasa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431231",
         "FIELD2": "Penerimaan Hibah Luar Negeri Langsung - Perorangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431232",
         "FIELD2": "Pendapatan Hibah Luar Negeri Langsung - Bilateral",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431233",
         "FIELD2": "Pendapatan Hibah Luar Negeri Langsung - Multilateral",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "23",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "431239",
         "FIELD2": "Pendapatan Hibah Luar Negeri Langsung Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "491421",
         "FIELD2": "Pendapatan Rampasan/Sitaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "498111",
         "FIELD2": "Suspense Pendapatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "51",
         "FIELD2": "BELANJA PEGAWAI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511111",
         "FIELD2": "Belanja Gaji Pokok PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511119",
         "FIELD2": "Belanja Pembulatan Gaji PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511121",
         "FIELD2": "Belanja Tunj. Suami/Istri PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511122",
         "FIELD2": "Belanja Tunj. Anak PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511123",
         "FIELD2": "Belanja Tunj. Struktural PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511124",
         "FIELD2": "Belanja Tunj. Fungsional PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511125",
         "FIELD2": "Belanja Tunj. PPh PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511126",
         "FIELD2": "Belanja Tunj. Beras PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511127",
         "FIELD2": "Belanja Tunj. Kemahalan PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511128",
         "FIELD2": "Belanja Tunj. Lauk pauk PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511129",
         "FIELD2": "Belanja Uang Makan PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511131",
         "FIELD2": "Belanja Tunj. Perbaikan Penghasilan PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511132",
         "FIELD2": "Belanja Tunj. Cacat PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511133",
         "FIELD2": "Belanja Tunj. Khusus Peralihan PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511134",
         "FIELD2": "Belanja Tunj. Kompensasi Kerja PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511135",
         "FIELD2": "Belanja Tunj. Daerah Terpencil/Sangat Terpencil PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511136",
         "FIELD2": "Belanja Tunj. Guru/Dosen/PNS yang Dipekerjakan pada Sekolah/ PT Swasta/ Badan/Komisi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511137",
         "FIELD2": "Belanja Tunj. Tugas Belajar Tenaga Pengajar Biasa pada PT untuk mengikuti pendidikan Pasca",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Sarjana PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511138",
         "FIELD2": "Belanja Tunjangan Khusus Papua PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511139",
         "FIELD2": "Belanja Tunjangan SAR PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511141",
         "FIELD2": "Belanja Tunj. Sewa Rumah PNS (Staff di LN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511142",
         "FIELD2": "Belanja Tunj. Restitusi Pengobatan PNS (Staff di LN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511143",
         "FIELD2": "Belanja Tunj. Social Security PNS (Staff di LN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511144",
         "FIELD2": "Belanja Tunj. Asuransi Kecelakaan PNS (Staff di LN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511145",
         "FIELD2": "Belanja Tunj. Penghidupan Luar Negeri untuk Home Staff  PNS (Staff di LN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511146",
         "FIELD2": "Belanja Tunj. Penghidupan Luar Negeri untuk Lokal Staff  PNS (Staff di LN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511147",
         "FIELD2": "Belanja Tunj. Lain lain termasuk uang duka PNS Dalam dan Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511149",
         "FIELD2": "Belanja Lokal Staff Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511151",
         "FIELD2": "Belanja Tunjangan Umum PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511152",
         "FIELD2": "Belanja Tunjangan Profesi Guru",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511153",
         "FIELD2": "Belanja Tunjangan Profesi Dosen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511154",
         "FIELD2": "Belanja Tunjangan Kehormatan Profesor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511155",
         "FIELD2": "Belanja Tunjangan Tambahan Penghasilan Guru PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511156",
         "FIELD2": "Belanja Tunjangan Khusus Guru/Dosen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511157",
         "FIELD2": "Belanja Tunjangan Kemahalan Hakim",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511158",
         "FIELD2": "Belanja Tunjangan Hakim Ad Hoc",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511161",
         "FIELD2": "Belanja Gaji Pokok PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511169",
         "FIELD2": "Belanja Pembulatan Gaji PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511171",
         "FIELD2": "Belanja Tunj. Suami/Istri PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511172",
         "FIELD2": "Belanja Tunj. Anak PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511173",
         "FIELD2": "Belanja Tunj. Struktural PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511174",
         "FIELD2": "Belanja Tunj. Fungsional PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511175",
         "FIELD2": "Belanja Tunj. PPh PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511176",
         "FIELD2": "Belanja Tunj. Beras PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511177",
         "FIELD2": "Belanja Tunj. Kemahalan PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511178",
         "FIELD2": "Belanja Tunj. Lauk pauk PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "24",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511179",
         "FIELD2": "Belanja Uang Makan PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511181",
         "FIELD2": "Belanja Tunj. Perbaikan Penghasilan PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511182",
         "FIELD2": "Belanja Tunj. Cacat PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511183",
         "FIELD2": "Belanja Tunj. Khusus Peralihan PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511184",
         "FIELD2": "Belanja Tunj. Kompensasi Kerja PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511185",
         "FIELD2": "Belanja Tunj. Daerah Terpencil/Sangat Terpencil PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511186",
         "FIELD2": "Belanja Tunj. Kewanitaan PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511187",
         "FIELD2": "Belanja Tunj. Guru/Dosen/PNS yang dipekerjakan pada sekolah/PT Swasta PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511188",
         "FIELD2": "Belanja Tunj. Tugas Belajar Tenaga Pengajar Biasa pada PT untuk mengikuti pendidikan Pasca",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Sarjana P",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511189",
         "FIELD2": "Belanja Tunjangan Khusus Papua PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511191",
         "FIELD2": "Belanja Tunjangan Medis PNS TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511192",
         "FIELD2": "Belanja Tunj. Lain lain termasuk uang duka PNS TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511193",
         "FIELD2": "Belanja Tunjangan Umum PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511194",
         "FIELD2": "Belanja Tunj. Kompensasi Kerja Bidang Persandian PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511195",
         "FIELD2": "Belanja Tunjangan Operasi Pengaman pada pulau terluar dan wilayah perbatasan PNS TNI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511196",
         "FIELD2": "Balanja Tunjangan Khusu Wilayah Pulau Kecil Terluar/ Perbatasan PNS POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511197",
         "FIELD2": "Belanja Tunjangan Profesi Dosen/Kehormatan Guru Besar PNS TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511211",
         "FIELD2": "Belanja Gaji Pokok  TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511219",
         "FIELD2": "Belanja Pembulatan Gaji TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511221",
         "FIELD2": "Belanja Tunj. Suami/Istri  TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511222",
         "FIELD2": "Belanja Tunj. Anak  TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511223",
         "FIELD2": "Belanja Tunj. Struktural TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511224",
         "FIELD2": "Belanja Tunj. Fungsional TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511225",
         "FIELD2": "Belanja Tunj. PPh TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511226",
         "FIELD2": "Belanja Tunj. Beras TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511227",
         "FIELD2": "Belanja Tunj. Kemahalan TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511228",
         "FIELD2": "Belanja Tunj. Lauk pauk TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511229",
         "FIELD2": "Belanja Uang Makan TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511231",
         "FIELD2": "Belanja Tunj. Anggota Cadangan TNI DDA TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511232",
         "FIELD2": "Belanja Tunj. Kowan/Polwan TNI TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511233",
         "FIELD2": "Belanja Tunj. Babinkamtibmas TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511234",
         "FIELD2": "Belanja Tunj. Khusus Papua untuk TNI/ POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511235",
         "FIELD2": "Belanja Tunj. Kompensasi Kerja Bidang Persandian TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511236",
         "FIELD2": "Belanja Tunj. Brevet TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511237",
         "FIELD2": "Belanja Tunj. Keahlian/ Keterampilan TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511238",
         "FIELD2": "Belanja Tunj. Keterampilan Khusus TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511239",
         "FIELD2": "Belanja Tunjangan Operasi Pengamanan pada pulau terluar dan wilayah perbatasan TNI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511241",
         "FIELD2": "Belanja Tunjangan Medis TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511242",
         "FIELD2": "Belanja Tunj. Lain lain termasuk uang duka TNI/POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511243",
         "FIELD2": "Belanja Tunjangan Daerah Terpencil/ Sangat Terpencil TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511244",
         "FIELD2": "Belanja Tunjangan Umum TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511245",
         "FIELD2": "Belanja Tunjangan Cacat dan Santunan TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511246",
         "FIELD2": "Belanja Tunjangan Khusus Wilayah Pulau Kecil Terluar/ Perbatasan POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511247",
         "FIELD2": "Belanja Tunjangan Profesi Dosen/Kehormatan Guru Besar TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511311",
         "FIELD2": "Belanja Gaji Pokok Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511319",
         "FIELD2": "Belanja Pembulatan Gaji Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511321",
         "FIELD2": "Belanja Tunj. Suami/Istri Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511322",
         "FIELD2": "Belanja Tunj. Anak Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511323",
         "FIELD2": "Belanja Tunj. Struktural Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511324",
         "FIELD2": "Belanja Tunj. PPh Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "25",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511325",
         "FIELD2": "Belanja Tunj. Beras Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511331",
         "FIELD2": "Belanja Tunj. Komunikasi Intensif Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511332",
         "FIELD2": "Belanja Uang Kehormatan Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511333",
         "FIELD2": "Belanja Uang Paket Harian Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511334",
         "FIELD2": "Belanja Bantuan Penunjang Kegiatan Dewan Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511335",
         "FIELD2": "Belanja Pelayanan Sidang dan Penyelesaian Tugas Mendesak Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511336",
         "FIELD2": "Belanja Tunjangan Pembinaan Kegiatan dan Khusus BPK Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511337",
         "FIELD2": "Belanja Tunjangan Lain-lain Termasuk Uang Duka Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511338",
         "FIELD2": "Belanja Tunjangan Fasilitas KPK",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511339",
         "FIELD2": "Belanja Tunjangan Penghasilan Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511411",
         "FIELD2": "Belanja Gaji Dokter dan Bidan PTT",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511412",
         "FIELD2": "Belanja Tunjangan Pajak PPh Dokter dan Bidan PTT",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511413",
         "FIELD2": "Belanja Tunjangan Daerah Terpencil Dokter dan Bidan PTT",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511414",
         "FIELD2": "Belanja Tunjangan Dokter dan Bidan PTT",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511511",
         "FIELD2": "Belanja Gaji Pokok Pegawai Non PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511512",
         "FIELD2": "Belanja Tunjangan Pegawai Non PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511513",
         "FIELD2": "Belanja Pembulatan Gaji Pegawai Non PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511519",
         "FIELD2": "Belanja Tunjangan Lainnya Non PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511521",
         "FIELD2": "Belanja Tunjangan Tenaga Pendidik Non PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511522",
         "FIELD2": "Belanja Tunjangan Tenaga Penyuluh Non PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "511529",
         "FIELD2": "Belanja Tunjangan Tenaga Pendidik dan Tenaga Penyuluh Lainnya Non PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "512111",
         "FIELD2": "Belanja Uang Honor Tetap",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "512211",
         "FIELD2": "Belanja uang lembur",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "512411",
         "FIELD2": "Belanja Pegawai (Tunjangan Khusus/ Kegiatan)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "512412",
         "FIELD2": "Belanja Pegawai Transito",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513111",
         "FIELD2": "Belanja Pensiun dan Uang Tunggu PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513112",
         "FIELD2": "Belanja Pensiun dan Uang Tunggu PNS Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513113",
         "FIELD2": "Belanja Pensiun dan Uang Tunggu PNS TNI/Kemhan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513114",
         "FIELD2": "Belanja Pensiun dan Uang Tunggu PNS Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513115",
         "FIELD2": "Belanja Pensiun dan Uang Tunggu PNS Eks Pegadaian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513121",
         "FIELD2": "Belanja Pensiun dan Uang Tunggu TNI/Polri (Lama)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513122",
         "FIELD2": "Belanja Pensiun dan Uang Tunggu TNI/Kemhan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513123",
         "FIELD2": "Belanja Pensiun dan Uang Tunggu Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513131",
         "FIELD2": "Belanja Pensiun dan Uang Tunggu Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513132",
         "FIELD2": "Belanja Pensiun dan Uang Tunggu Hakim",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513141",
         "FIELD2": "Kontribusi APBN sebagai pendanaan bersama dalam pembayaran pensiun Eks PNS Dephub pada",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "PT KAI",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513151",
         "FIELD2": "Belanja Tunjangan Veteran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513152",
         "FIELD2": "Belanja Dana Kehormatan Veteran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513153",
         "FIELD2": "Belanja Tunjangan PKRI dan KNIP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513161",
         "FIELD2": "Belanja Tunjangan Hari Tua (unfunded Liability)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513211",
         "FIELD2": "Belanja Askes PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513212",
         "FIELD2": "Belanja Askes Pejabat Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513221",
         "FIELD2": "Belanja Askes Penerima Pensiun",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513231",
         "FIELD2": "Belanja Askes TNI/Kemhan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513241",
         "FIELD2": "Belanja Askes Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513251",
         "FIELD2": "Belanja Askes Veteran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513261",
         "FIELD2": "Belanja Katastropik",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513271",
         "FIELD2": "Belanja Program Jaminan Kecelakaan Kerja Pegawai",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513281",
         "FIELD2": "Belanja Program Jaminan Kematian Pegawai",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513311",
         "FIELD2": "Belanja Tunjangan Kesehatan Veteran Non Tuvet",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "26",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513411",
         "FIELD2": "Belanja Cadangan Perubahan Sharing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "513511",
         "FIELD2": "Belanja Kontribusi APBN Pembayaran Pensiun Eks PNS Kemhub Pada PT. KAI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "52",
         "FIELD2": "BELANJA BARANG",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521111",
         "FIELD2": "Belanja Keperluan Perkantoran",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521112",
         "FIELD2": "Belanja pengadaan bahan makanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521113",
         "FIELD2": "Belanja Penambah Daya Tahan Tubuh",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521114",
         "FIELD2": "Belanja pengiriman surat dinas pos pusat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521115",
         "FIELD2": "Honor Operasional Satuan Kerja",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521116",
         "FIELD2": "Belanja Keperluan Perkantoran Atase Pertahanan Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521119",
         "FIELD2": "Belanja Barang Operasional Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521211",
         "FIELD2": "Belanja Bahan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521212",
         "FIELD2": "Belanja Barang Transito",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521213",
         "FIELD2": "Honor Output Kegiatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521214",
         "FIELD2": "Belanja karena rugi selisih kurs Uang Persediaan Satker Perwakilan RI/Atase Teknis",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521215",
         "FIELD2": "Belanja Biaya Operasional Penyelenggaraan Pembayaran Manfaat Pensiun",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521216",
         "FIELD2": "Belanja Pencairan Bantuan Pendanaan Perguruan Tinggi Negeri Badan Hukum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521217",
         "FIELD2": "Belanja Denda Keterlambatan Pembayaran Tagihan Kepada Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521218",
         "FIELD2": "Belanja dalam Rangka Refund Dana PHLN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521219",
         "FIELD2": "Belanja Barang Non Operasional Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521231",
         "FIELD2": "Belanja Barang Pemberian Penghargaan dalam bentuk uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521232",
         "FIELD2": "Belanja Barang Pemberian Beasiswa Non PNS dalam bentuk uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521233",
         "FIELD2": "Belanja Barang Pemberian Bantuan Operasiona; dalam bentuk uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521234",
         "FIELD2": "Belanja Barang Pemberian Penghargaan dalam bentuk barang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521511",
         "FIELD2": "Belanja Barang Pengganti PPN dalam rangka Hibah MCC",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521512",
         "FIELD2": "Belanja Barang Pengganti PPh dalam rangka Hibah MCC",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521513",
         "FIELD2": "Belanja Barang Pengganti Pajak Lainnya dalam rangka Hibah MCC",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521521",
         "FIELD2": "Belanja Barang Pengganti Pajak Pemda dalam rangka Hibah MCC",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521711",
         "FIELD2": "Belanja Kontribusi pada Organisasi Internasional dan Trust Fund",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521721",
         "FIELD2": "Belanja Kontribusi Dana Dukungan Kelayakan (Viability Gap Fund)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521722",
         "FIELD2": "Belanja Kontribusi Fasilitas Penyiapan Proyek (Project Development Facility)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521811",
         "FIELD2": "Belanja Barang Persediaan Barang Konsumsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521812",
         "FIELD2": "Belanja Barang Persediaan Amunisi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521813",
         "FIELD2": "Belanja Barang Persediaan Pita Cukai, Meterai dan Leges",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521821",
         "FIELD2": "Belanja Barang Persediaan bahan baku",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521822",
         "FIELD2": "Belanja Barang Persediaan barang dalam proses",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521831",
         "FIELD2": "Belanja Barang Persediaan untuk tujuan strategis/berjaga-jaga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "521832",
         "FIELD2": "Belanja Barang Persediaan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "522111",
         "FIELD2": "Belanja Langganan Listrik",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "522112",
         "FIELD2": "Belanja Langganan Telepon",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "522113",
         "FIELD2": "Belanja Langganan Air",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "522119",
         "FIELD2": "Belanja Langganan Daya dan Jasa Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "522121",
         "FIELD2": "Belanja Jasa Pos dan Giro",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "522131",
         "FIELD2": "Belanja Jasa Konsultan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "522141",
         "FIELD2": "Belanja Sewa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "522151",
         "FIELD2": "Belanja Jasa Profesi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "522191",
         "FIELD2": "Belanja Jasa Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523111",
         "FIELD2": "Belanja Biaya Pemeliharaan Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523112",
         "FIELD2": "Belanja Barang Persediaan Pemeliharaan Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523113",
         "FIELD2": "Beban Asuransi Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523119",
         "FIELD2": "Belanja Biaya Pemeliharaan Gedung dan Bangunan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523121",
         "FIELD2": "Belanja Biaya Pemeliharaan Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "27",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523122",
         "FIELD2": "Belanja Bahan Bakar Minyak dan Pelumas (BMP) dan Pelumas Khusus Non Pertamina",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523123",
         "FIELD2": "Belanja Barang Persediaan Pemeliharaan Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523124",
         "FIELD2": "Beban Asuransi Alat Angkutan Darat/Apung/Udara Bermotor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523129",
         "FIELD2": "Belanja Biaya Pemeliharaan Peralatan dan Mesin Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523131",
         "FIELD2": "Belanja Biaya Pemeliharaan Jalan dan Jembatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523132",
         "FIELD2": "Belanja Biaya Pemeliharaan Irigasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523133",
         "FIELD2": "Belanja Biaya Pemeliharaan Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523134",
         "FIELD2": "Belanja Barang Persediaan Pemeliharaan Jalan dan Jembatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523135",
         "FIELD2": "Belanja Barang Persediaan Pemeliharaan Irigasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523136",
         "FIELD2": "Belanja Barang Persediaan Pemeliharaan Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523191",
         "FIELD2": "Belanja Barang Persediaan Pemeliharaan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "523199",
         "FIELD2": "Belanja Biaya Pemeliharaan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "524111",
         "FIELD2": "Belanja perjalanan biasa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "524112",
         "FIELD2": "Belanja perjalanan tetap",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "524113",
         "FIELD2": "Belanja Perjalanan Dinas Dalam Kota",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "524114",
         "FIELD2": "Belanja Perjalanan Dinas Paket Meeting Dalam Kota",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "524119",
         "FIELD2": "Belanja Perjalanan Dinas Paket Meeting Luar Kota",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "524211",
         "FIELD2": "Belanja perjalanan biasa - luar negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "524212",
         "FIELD2": "Belanja perjalanan tetap - luar negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "524219",
         "FIELD2": "Belanja perjalanan lainnya - luar negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525111",
         "FIELD2": "Belanja Gaji dan Tunjangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525112",
         "FIELD2": "Belanja Barang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525113",
         "FIELD2": "Belanja Jasa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525114",
         "FIELD2": "Belanja Pemeliharaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525115",
         "FIELD2": "Belanja Perjalanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525116",
         "FIELD2": "Belanja atas Pengelolaan Endowment Fund",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525117",
         "FIELD2": "Belanja Pengelolaan Dana Perkebunan Kelapa Sawit",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525118",
         "FIELD2": "Beban Ketersediaan Layanan BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525119",
         "FIELD2": "Belanja Penyediaan Barang dan Jasa  BLU Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525121",
         "FIELD2": "Belanja Barang Persediaan Barang Konsumsi - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525122",
         "FIELD2": "Belanja Barang Persediaan Amunisi - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525123",
         "FIELD2": "Belanja Barang Persediaan Pemeliharaan - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525124",
         "FIELD2": "Belanja Barang Persediaan Pita Cukai, Materai dan Leges - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525125",
         "FIELD2": "Belanja Barang Persediaan untuk Dijual/Diserahkan kepada Masyarakat - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525126",
         "FIELD2": "Belanja Barang Persediaan Bahan Baku untuk Proses Produksi - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525127",
         "FIELD2": "Belanja Barang Persediaan Barang dalam Proses untuk Proses Produksi - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "525129",
         "FIELD2": "Belanja Barang Persediaan Lainnya - BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526111",
         "FIELD2": "Belanja Tanah untuk diserahkan kepada masyarakat/Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526112",
         "FIELD2": "Belanja Peralatan dan Mesin untuk diserahkan kepada masyarakat/Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526113",
         "FIELD2": "Belanja Gedung dan Bangunan untuk diserahkan kepada masyarakat/Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526114",
         "FIELD2": "Belanja Barang Jalan, Irigasi dan Jaringan untuk diserahkan kepada masyarakat/Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526115",
         "FIELD2": "Belanja Barang Fisik Lainnya untuk diserahkan kepada masyarakat/Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526122",
         "FIELD2": "Belanja Peralatan dan Mesin untuk diserahkan kepada masyarakat/Pemda dalam bentuk uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526123",
         "FIELD2": "Belanja Gedung dan Bangunan untuk diserahkan kepada masyarakat/Pemda dalam bentuk uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526124",
         "FIELD2": "Belanja Jalan, Irigasi dan Jaringan Untuk Diserahkan kepada Masyarakat/Pemda dalam bentuk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "uang",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526211",
         "FIELD2": "Belanja Barang Penunjang Kegiatan Dekonsentrasi untuk diserahkan kepada pemerintah daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526212",
         "FIELD2": "Belanja Barang Penunjang Tugas Pembantuan untuk diserahkan kepada pemerintah daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526222",
         "FIELD2": "Belanja Peralatan dan Mesin Tugas Pembantuan Untuk Diserahkan kepada Pemerintah Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526223",
         "FIELD2": "Belanja Gedung dan Bangunan Tugas Pembantuan Untuk Diserahkan kepada Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Daerah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "28",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526224",
         "FIELD2": "Belanja Jalan, Irigasi dan Jaringan Tugas Pembantuan Untuk Diserahkan kepada Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Daerah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526311",
         "FIELD2": "Belanja Barang Lainnya untuk diserahkan kepada masyarakat/Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "526312",
         "FIELD2": "Belanja Barang untuk Bantuan Lainnya yang Memiliki Karakteristik Bantuan Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "527111",
         "FIELD2": "Belanja Tanah Untuk Diserahkan kepada Mantan Presiden dan/atau Wakil Presiden",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "527112",
         "FIELD2": "Belanja Peralatan dan Mesin Untuk Diserahkan kepada Mantan Presiden dan/atau Wakil",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Presiden",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "527113",
         "FIELD2": "Belanja Gedung dan Bangunan Untuk Diserahkan kepada Mantan Presiden dan/atau Wakil",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Presiden",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "53",
         "FIELD2": "BELANJA MODAL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "531111",
         "FIELD2": "Belanja Modal Tanah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "531112",
         "FIELD2": "Belanja Modal Pembebasan Tanah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "531113",
         "FIELD2": "Belanja Modal Pembayaran Honor Tim Tanah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "531114",
         "FIELD2": "Belanja Modal Pembuatan Sertifikat Tanah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "531115",
         "FIELD2": "Belanja Modal Pengurukan dan Pematangan Tanah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "531116",
         "FIELD2": "Belanja Modal Biaya Pengukuran Tanah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "531117",
         "FIELD2": "Belanja Modal Perjalanan Pengadaan Tanah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "532111",
         "FIELD2": "Belanja Modal Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "532112",
         "FIELD2": "Belanja Modal Bahan Baku Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "532113",
         "FIELD2": "Belanja Modal Upah Tenaga Kerja dan Honor Pengelola Teknis  Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "532114",
         "FIELD2": "Belanja Modal Sewa Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "532115",
         "FIELD2": "Belanja Modal Perencanaan dan Pengawasan Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "532116",
         "FIELD2": "Belanja Modal Perijinan Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "532117",
         "FIELD2": "Belanja Modal Pemasangan Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "532118",
         "FIELD2": "Belanja Modal Perjalanan Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "532121",
         "FIELD2": "Belanja Penambahan Nilai Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "533111",
         "FIELD2": "Belanja Modal Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "533112",
         "FIELD2": "Belanja Modal Bahan Baku Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "533113",
         "FIELD2": "Belanja Modal Upah Tenaga Kerja dan Honor Pengelola Teknis Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "533114",
         "FIELD2": "Belanja Modal Sewa Peralatan Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "533115",
         "FIELD2": "Belanja Modal Perencanaan dan Pengawasan Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "533116",
         "FIELD2": "Belanja Modal Perizinan Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "533117",
         "FIELD2": "Belanja Modal Pengosongan dan Pembongkaran Bangunan Lama, Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "533118",
         "FIELD2": "Belanja Modal Perjalanan Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "533121",
         "FIELD2": "Belanja Penambahan Nilai Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534111",
         "FIELD2": "Belanja Modal Jalan dan Jembatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534112",
         "FIELD2": "Belanja Modal Bahan Baku Jalan dan Jembatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534113",
         "FIELD2": "Belanja Modal Upah Tenaga Kerja dan Honor Pengelola Teknis Jalan dan jembatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534114",
         "FIELD2": "Belanja Modal Sewa Peralatan Jalan dan Jembatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534115",
         "FIELD2": "Belanja Modal Perencanaan dan Pengawasan Jalan dan Jembatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534116",
         "FIELD2": "Belanja Modal Perijinan Jalan dan Jembatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534117",
         "FIELD2": "Belanja Modal  Pengosongan dan Pembongkaran Bangunan Lama Jalan dan Jembatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534118",
         "FIELD2": "Belanja Modal Perjalanan Jalan dan Jembatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534121",
         "FIELD2": "Belanja Modal Irigasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534122",
         "FIELD2": "Belanja Modal Bahan Baku Irigasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534123",
         "FIELD2": "Belanja Modal Upah Tenaga Kerja dan Honor Pengelola Teknis Irigasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534124",
         "FIELD2": "Belanja Modal Sewa Peralatan Irigasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534125",
         "FIELD2": "Belanja Modal Perencanaan dan Pengawasan Irigasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534126",
         "FIELD2": "Belanja Modal Perijinan Irigasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534127",
         "FIELD2": "Belanja Modal  Pengosongan dan Pembongkaran Bangunan Lama Irigasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534128",
         "FIELD2": "Belanja Modal Perjalanan Irigasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "29",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534131",
         "FIELD2": "Belanja Modal Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534132",
         "FIELD2": "Belanja Modal Bahan Baku  Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534133",
         "FIELD2": "Belanja Modal Upah Tenaga Kerja dan Honor Pengelola Teknis Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534134",
         "FIELD2": "Belanja Modal Sewa Peralatan Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534135",
         "FIELD2": "Belanja Modal Perencanaan dan Pengawasan Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534136",
         "FIELD2": "Belanja Modal Perijinan Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534137",
         "FIELD2": "Belanja Modal  Pengosongan dan Pembongkaran Bangunan  Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534138",
         "FIELD2": "Belanja Modal Perjalanan Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534141",
         "FIELD2": "Belanja Penambahan Nilai Jalan dan Jembatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534151",
         "FIELD2": "Belanja Penambahan Nilai Irigasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "534161",
         "FIELD2": "Belanja Penambahan Nilai Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "536111",
         "FIELD2": "Belanja Modal Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "536121",
         "FIELD2": "Belanja Penambahan Nilai Fisik Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "537111",
         "FIELD2": "Belanja Modal Tanah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "537112",
         "FIELD2": "Belanja Modal Peralatan dan Mesin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "537113",
         "FIELD2": "Belanja Modal Gedung dan Bangunan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "537114",
         "FIELD2": "Belanja Modal Jalan, Irigasi dan Jaringan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "537115",
         "FIELD2": "Belanja Modal Fisik Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "54",
         "FIELD2": "BELANJA PEMBAYARAN KEWAJIBAN UTANG",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541111",
         "FIELD2": "Belanja Pembayaran Bunga Surat Perbendaharaan  Negara - Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541112",
         "FIELD2": "Belanja Pembayaran Bunga SBN-TDR",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541113",
         "FIELD2": "Belanja Pembayaran Bunga Repo-TDR",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541119",
         "FIELD2": "Belanja Pembayaran Biaya/ kewajiban lainnya Bunga Surat Perbendaharan Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541122",
         "FIELD2": "Belanja Pembayaran Bunga SBN Valas-TDR",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541123",
         "FIELD2": "Belanja Pembayaran Bunga Repo Valas-TDR",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541211",
         "FIELD2": "Belanja Pembayaran Bunga Obligasi Negara - Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541219",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya Obligasi Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541221",
         "FIELD2": "Belanja Pembayaran Bunga Pinjaman Perbankan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541229",
         "FIELD2": "Belanja Pembayaran Biaya/Kewajiban Obligasi Negara lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541231",
         "FIELD2": "Belanja Pembayaran Bunga Pinjaman Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541232",
         "FIELD2": "Belanja Biaya/Kewajiban Lainnya terhadap Pinjaman DN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541241",
         "FIELD2": "Belanja Pembayaran Biaya Transfer Pinjaman Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541251",
         "FIELD2": "Belanja Pembayaran Bunga Obligasi Negara - Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541259",
         "FIELD2": "Belanja Pembayaran Biaya/Kewajiban Lainnya Obligasi Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541261",
         "FIELD2": "Belanja Bunga Obligasi Negara Rupiah diterima Muka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541262",
         "FIELD2": "Belanja Bunga Obligasi Negara Valas diterima di muka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541311",
         "FIELD2": "Belanja Pembayaran Imbalan SBSN - Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541312",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya - Imbalan SBSN Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541321",
         "FIELD2": "Belanja Pembayaran Imbalan SBSN - Jangka Pendek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541322",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya - Imbalan SBSN Jangka Pendek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541331",
         "FIELD2": "Belanja Pembayaran Imbalan SPN Syariah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541332",
         "FIELD2": "Belanja Pembayaran Biaya/Kewajiban Lainnya-Imbalan SPN Syariah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541341",
         "FIELD2": "Belanja Pembayaran Imbalan SBSN - Jangka Panjang Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541342",
         "FIELD2": "Belanja Pembayaran Biaya/Kewajiban Lainnya - Imbalan SBSN Jangka Panjang Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541361",
         "FIELD2": "Belanja Imbalan SBSN-jangka panjang diterima di muka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541362",
         "FIELD2": "Belanja Imbalan Surat Berharga Syariah Negara Jangka Panjang Valas diterima di Muka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541411",
         "FIELD2": "Belanja Bunga Pinjaman Program",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541419",
         "FIELD2": "Belanja Biaya/kewajiban lainnya Terhadap Pinjaman Program",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541421",
         "FIELD2": "Belanja Bunga Pinjaman Proyek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541429",
         "FIELD2": "Belanja Biaya/kewajiban lainnya Terhadap Pinjaman Proyek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541431",
         "FIELD2": "Belanja Bunga Obligasi Negara - Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "30",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541439",
         "FIELD2": "Belanja Biaya/kewajiban lainnya - Bunga Obligasi Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541441",
         "FIELD2": "Belanja Bunga Utang LN dari Penjadualan Kembali Pinjaman Program",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541442",
         "FIELD2": "Belanja Bunga Utang LN dari Penjadualan Kembali Pinjaman Proyek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541449",
         "FIELD2": "Belanja Biaya/kewajiban lainnya - Bunga Utang LN Melalui Penjadualan Kembali Pinjaman",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541451",
         "FIELD2": "Belanja Pembayaran Bunga Surat Perbendaharaan  Negara - Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541459",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya Bunga Surat Perbendaharan Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541461",
         "FIELD2": "Belanja Pembayaran Biaya Transfer Pinjaman Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541511",
         "FIELD2": "Belanja Pembayaran Imbalan SBSN - Jangka Panjang - Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541519",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya - Imbalan SBSN Jangka Panjang - Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541521",
         "FIELD2": "Belanja Pembayaran Imbalan SBSN - Jangka Pendek - Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "541529",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya - Imbalan SBSN Jangka Pendek - Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "542111",
         "FIELD2": "Belanja Pembayaran Discount Surat Perbendaharaan Negara Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "542119",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya - Discount Surat Perbendaharaan Negara Dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Negeri",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "542121",
         "FIELD2": "Belanja Pembayaran Discount Obligasi Negara Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "542129",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya - Discount Obligasi Negara Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "542141",
         "FIELD2": "Belanja Pembayaran Discount Obigasi Negara Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "542149",
         "FIELD2": "Belanja Pembayaran Biaya/Kewajiban Lainnya - Discount Obligasi Negara Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "543111",
         "FIELD2": "Belanja Pembayaran Discount Surat Perbendaharaan Negara Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "543119",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya - Discount Surat Perbendaharaan Negara Luar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Negeri",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "543121",
         "FIELD2": "Belanja Pembayaran Discount Obligasi  Negara Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "543129",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya - Discount Obligasi Negara Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "544111",
         "FIELD2": "Belanja Pembayaran Loss on Bond Redemption atas Pembelian Kembali Obligasi Negara Dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Negeri",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "544112",
         "FIELD2": "Belanja Pembayaran Loss on Bond Redemption atas Pembelian Kembali SBSN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "544113",
         "FIELD2": "Belanja Pembayaran Loss on Bond Redemption atas Pembelian Kembali Obligasi Negara Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "544114",
         "FIELD2": "Belanja Pembayaran Loss on Bond Redemption atas Pembelian Kembali SBSN Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "544211",
         "FIELD2": "Belanja Pembayaran Loss on Bond Redemption atas Pembelian Kembali Obligasi Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "545111",
         "FIELD2": "Belanja Pembayaran Discount SBSN jangka Panjang Dalam negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "545119",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya - Discount SBSN Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "545121",
         "FIELD2": "Belanja Pembayaran Discount SBSN - Jangka Pendek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "545129",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya - Disocunt SBSN Jangka Pendek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "545131",
         "FIELD2": "Belanja Pembayaran Discount SPN-S",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "545139",
         "FIELD2": "Belanja Pembayaran Biaya/Kewajiban Lainnya-Discount SPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "546111",
         "FIELD2": "Belanja Pembayaran Discount SBSN - Jangka Panjang - Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "546119",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya - Discount SBSN Jangka Panjang - Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "546121",
         "FIELD2": "Belanja Pembayaran Discount SBSN - Jangka Pendek - Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "546129",
         "FIELD2": "Belanja Pembayaran Biaya/kewajiban lainnya - Discount SBSN Jangka Pendek - Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "547111",
         "FIELD2": "Belanja Pembayaran Imbalan Bunga Pajak  (SPM-IB Pajak)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "547112",
         "FIELD2": "Belanja Pembayaran Bunga Pinjaman Perbankan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "547113",
         "FIELD2": "Belanja Pembayaran Imbalan Bunga Bea dan Cukai (SPM-IB Bea dan Cukai)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "547119",
         "FIELD2": "Belanja Pembayaran Biaya/Kewajiban Lainnya - Bunga Dalam Negeri Jangka Pendek Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "548111",
         "FIELD2": "Belanja terkait Pendapatan Hibah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "55",
         "FIELD2": "BELANJA SUBSIDI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551111",
         "FIELD2": "Belanja Subsidi Lembaga Keuangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551211",
         "FIELD2": "Belanja Subsidi Avgas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551212",
         "FIELD2": "Belanja Subsidi Avtur",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551213",
         "FIELD2": "Belanja Subsidi Premium",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551214",
         "FIELD2": "Belanja Subsidi Minyak Bakar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551215",
         "FIELD2": "Belanja Subsidi Minyak Solar",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "31",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551216",
         "FIELD2": "Belanja Subsidi Minyak Diesel",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551217",
         "FIELD2": "Belanja Subsidi Minyak Tanah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551218",
         "FIELD2": "Belanja Subsidi Elpiji",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551219",
         "FIELD2": "Belanja Subsidi Liquefied Gas For Vehicle (LGV)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551311",
         "FIELD2": "Belanja Subsidi pangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551312",
         "FIELD2": "Belanja Subsidi listrik",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551313",
         "FIELD2": "Belanja Subsidi benih",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551314",
         "FIELD2": "Belanja Subsidi obat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551315",
         "FIELD2": "Belanja Subsidi gula",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551316",
         "FIELD2": "Belanja Subsidi pupuk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551317",
         "FIELD2": "Belanja Subsidi perawatan beras",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551318",
         "FIELD2": "Belanja Subsidi pengawasan pupuk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551319",
         "FIELD2": "Belanja Subsidi harga/biaya lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551321",
         "FIELD2": "Belanja Subsidi PPh",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551322",
         "FIELD2": "Belanja Subsidi PPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551323",
         "FIELD2": "Belanja Subsidi BM-DTP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551331",
         "FIELD2": "Belanja Subsidi haji",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551332",
         "FIELD2": "Belanja Subsidi kendaraan bermotor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551339",
         "FIELD2": "Belanja Subsidi lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551341",
         "FIELD2": "Belanja Subsidi Minyak Goreng",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551411",
         "FIELD2": "Belanja Subsidi PT KAI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551412",
         "FIELD2": "Belanja Subsidi PT PELNI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551413",
         "FIELD2": "Belanja Subsidi PT Pos Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551414",
         "FIELD2": "Belanja Subsidi TVRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551415",
         "FIELD2": "Belanja Subsidi BULOG dihapuskan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "551419",
         "FIELD2": "Belanja Subsidi dalam rangka PSO Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552111",
         "FIELD2": "Belanja Subsidi Lembaga Keuangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552112",
         "FIELD2": "Belanja Subsidi Bantuan Uang Muka Perumahan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552121",
         "FIELD2": "Belanja Subsidi Bunga KUT",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552122",
         "FIELD2": "Belanja Subsidi Bunga KOP PIR",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552123",
         "FIELD2": "Belanja Subsidi Bunga KOP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552124",
         "FIELD2": "Belanja Subsidi Bunga KOP PRIM",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552125",
         "FIELD2": "Belanja Subsidi Bunga KPR",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552126",
         "FIELD2": "Belanja Subsidi Bunga Ketahanan Pangan (KKP) dan Energi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552127",
         "FIELD2": "Belanja Subsidi Bunga Kredit Program Eks KLBI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552128",
         "FIELD2": "Belanja Subsidi Bunga Kredit Biofuel (KPEN-RP)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552129",
         "FIELD2": "Belanja Subsidi Bunga kredit program lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552131",
         "FIELD2": "Belanja Subsidi Imbalan Jasa Penjaminan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552132",
         "FIELD2": "Belanja Subsidi Risk Sharing KKP dan Energi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552141",
         "FIELD2": "Belanja Subdidi Bunga Pengusaha NAD dan Nias",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552142",
         "FIELD2": "Belanja Subsidi Kredit Sektor Peternakan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552143",
         "FIELD2": "Belanja Subsidi Kredit Resi Gudang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "552211",
         "FIELD2": "Belanja Subsidi Lembaga Non Keuangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "56",
         "FIELD2": "BELANJA HIBAH",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "561111",
         "FIELD2": "Belanja Hibah Kepada Pemerintah Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "562111",
         "FIELD2": "Belanja Hibah Kepada Organisasi Internasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "563111",
         "FIELD2": "Belanja Hibah Kepada Pemerintah Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "564111",
         "FIELD2": "Belanja Hibah Kepada Organisasi Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "565111",
         "FIELD2": "Belanja Pembayaran Biaya/Kewajiban Lainnya Terkait Pendapatan/Belanja Hibah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "57",
         "FIELD2": "BELANJA BANTUAN SOSIAL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "571111",
         "FIELD2": "Belanja Rehabilitasi Sosial dalam Bentuk Uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "Hal :",
         "FIELD4": "32",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "571112",
         "FIELD2": "Belanja Rehabilitasi Sosial dalam Bentuk Barang/Jasa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "572111",
         "FIELD2": "Belanja Bantuan Sosial Untuk Jaminan Sosial dalam Bentuk Uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "572112",
         "FIELD2": "Belanja Bantuan Sosial Untuk Jaminan Sosial dalam Bentuk Barang/Jasa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "573111",
         "FIELD2": "Belanja Bantuan Sosial untuk Pemberdayaan Sosial dalam Bentuk Uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "573112",
         "FIELD2": "Belanja Bantuan Sosial untuk Pemberdayaan Sosial dalam bentuk barang/jasa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "574111",
         "FIELD2": "Belanja Bantuan Sosial Untuk Perlindungan Sosial dalam Bentuk Uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "574112",
         "FIELD2": "Belanja Bantuan Sosial Untuk Perlindungan Sosial dalam Bentuk Barang/Jasa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "575111",
         "FIELD2": "Belanja Bantuan Sosial Untuk Penanggulangan Kemiskinan dalam Bentuk Uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "575112",
         "FIELD2": "Belanja Bantuan Sosial Untuk Penanggulangan Kemiskinan dalam Bentuk Barang/Jasa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "576111",
         "FIELD2": "Belanja Bantuan Sosial Untuk Penanggulangan Bencana dalam Bentuk Uang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "576112",
         "FIELD2": "Belanja Bantuan Sosial Untuk Penanggulangan Bencana dalam Bentuk Barang/Jasa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "58",
         "FIELD2": "BELANJA LAIN-LAIN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581111",
         "FIELD2": "Belanja Cadangan Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581112",
         "FIELD2": "Belanja Cadangan Tanggap Darurat (Dana Kontinjensi)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581113",
         "FIELD2": "Belanja Cadangan Dana Reboisasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581114",
         "FIELD2": "Belanja Cadangan Tunjangan Beras PNS/TNI/Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581115",
         "FIELD2": "Belanja Cadangan Kenaikan Harga Tanah (Land Capping)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581116",
         "FIELD2": "Belanja Cadangan Risiko Perubahan Asumsi Makro",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581117",
         "FIELD2": "Belanja Cadangan Stabilisasi Harga Pangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581118",
         "FIELD2": "Belanja Cadangan Risiko Lifting",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581119",
         "FIELD2": "Belanja Cadangan Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581121",
         "FIELD2": "Belanja Cadangan Fiskal Lainnya (Risiko Kenaikan TTL Listrik)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581122",
         "FIELD2": "Belanja Cadangan Beras Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581123",
         "FIELD2": "Belanja Cadangan Benih Nasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581131",
         "FIELD2": "Belanja  Biaya/Upah Pungut PBB untuk DJP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581132",
         "FIELD2": "Belanja KONI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581133",
         "FIELD2": "Belanja Dana Penunjang (PHLN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581134",
         "FIELD2": "Belanja Non Modal-Otorita Batam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581135",
         "FIELD2": "Belanja karena rugi selisih kurs dalam pengelolaan Rekening Milik BUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581136",
         "FIELD2": "Jasa Surveyor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581137",
         "FIELD2": "Jasa Perbendaharaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581138",
         "FIELD2": "Jasa Pelayanan Bank Operasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581141",
         "FIELD2": "Belanja TVRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581142",
         "FIELD2": "Belanja RRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581143",
         "FIELD2": "Belanja Pengembalian Penerimaan Hibah Karena Pengeluaran Ineligible",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581144",
         "FIELD2": "Belanja Kompensasi Kenaikan Harga BBM",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581145",
         "FIELD2": "Dana Cadangan Resiko Kenaikan Harga Tanah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581149",
         "FIELD2": "Belanja lain-lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581211",
         "FIELD2": "Belanja Lain-lain Lembaga Non Kementerian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581212",
         "FIELD2": "Belanja Operasional Kegiatan SKK MIgas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581311",
         "FIELD2": "Belanja Fee Pelayanan Bank/Pos Persepsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581312",
         "FIELD2": "Jasa Surveyor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581313",
         "FIELD2": "Jasa Perbendaharaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581314",
         "FIELD2": "Jasa Pelayanan Bank Operasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581315",
         "FIELD2": "Belanja Jasa Pelayanan Perbendaharaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581316",
         "FIELD2": "Belanja Pembayaran Selisih Harga Beras Bulog",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581319",
         "FIELD2": "Belanja Lain-lain Jasa Pelayanan BUN Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581411",
         "FIELD2": "Belanja Iuran ke Lembaga Internasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581412",
         "FIELD2": "Belanja Ongkos Angkut Beras PNS Distrik Pedalaman Papua",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581413",
         "FIELD2": "Belanja Tunggakan dan Klaim Pihak Ketiga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581414",
         "FIELD2": "Belanja Dana Penunjang (PHLN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "33",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581415",
         "FIELD2": "Belanja karena rugi selisih kurs dalam pengelolaan Rekening Milik BUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581416",
         "FIELD2": "Belanja Penugasan PT SMI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581417",
         "FIELD2": "Belanja Kompensasi Kenaikan Harga BBM",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581418",
         "FIELD2": "Belanja Konversi BBM ke BBG untuk Transportasi Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581419",
         "FIELD2": "Belanja Lain-lain BUN Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581511",
         "FIELD2": "Belanja Keperluan Mendesak/Tak Terduga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581512",
         "FIELD2": "Belanja Tanggap Darurat Penanggulangan Bencana",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581911",
         "FIELD2": "Belanja Pemilu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "581919",
         "FIELD2": "Belanja Lain-lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592211",
         "FIELD2": "Beban Penyusutan Kemitraan dengan Pihak Ketiga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592221",
         "FIELD2": "Beban Penyusutan Aset Lain-lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592222",
         "FIELD2": "Beban Penyusutan Penyusutan Aset Tetap yang Tidak Digunakan dalam Operasional Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592231",
         "FIELD2": "Beban Penyusutan Aset Eks BPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592232",
         "FIELD2": "Beban Penyusutan Aset yang Diserahkelolakan pada PT. PPA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592233",
         "FIELD2": "Beban Penyusutan Aset BUMN yang Belum Ditetapkan Statusnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592234",
         "FIELD2": "Beban Penyusutan Aset yang Berasal dari Kontraktor Kontrak Kerja Sama",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592235",
         "FIELD2": "Beban Penyusutan Aset Eks Kelolaan PT. PPA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592236",
         "FIELD2": "Beban Penyusutan Aset Eks Pertamina",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592237",
         "FIELD2": "Beban Penyusutan Aset yang Berasal dari Kontraktor PKP2B",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592238",
         "FIELD2": "Beban Penyusutan Aset Idle yang Sudah Diserahkan ke DJKN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592239",
         "FIELD2": "Beban Penyusutan Aset Lain-lain BUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592241",
         "FIELD2": "Beban Penyusutan Aset Lain-lain BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "592242",
         "FIELD2": "Beban Penyusutan Aset Tetap yang Tidak Digunakan dalam Operasi Pemerintahan BLU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "594243",
         "FIELD2": "Beban Penyisihan Piutang Tidak Tertagih - Bagian Lancar Piutang Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Penanggulangan Lumpur Sidoarjo",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "594911",
         "FIELD2": "Beban Penyisihan Piutang Tidak Tertagih Jangka Panjang - Piutang Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Penanggulangan Lumpur Sidoarjo",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "596112",
         "FIELD2": "Beban Tuntutan Ganti Rugi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "596211",
         "FIELD2": "Beban Kerugian Selisih Kurs Belum Terealisasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "596311",
         "FIELD2": "Beban Pihak Ketiga Migas -  Pajak Air Tanah ke Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "596312",
         "FIELD2": "Beban Pihak Ketiga Migas -  Pajak Penerangan Jalan non PLN ke Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "596313",
         "FIELD2": "Beban Pihak Ketiga Migas -  DMO Fee KKKS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "596314",
         "FIELD2": "Beban Pihak Ketiga Migas -  Reimbursement PPN KKKS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "596315",
         "FIELD2": "Beban Pihak Ketiga Migas -  Underlifting KKKS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "596316",
         "FIELD2": "Beban Pihak Ketiga Migas -  Fee Penjualan Migas Bagian Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "596317",
         "FIELD2": "Beban Pihak Ketiga Migas -  Beban Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "598111",
         "FIELD2": "Suspense Beban",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "61",
         "FIELD2": "TRANSFER DANA BAGI HASIL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "611111",
         "FIELD2": "Dana Bagi Hasil PPh Pasal 21",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "611112",
         "FIELD2": "Dana Bagi Hasil PPh Pasal 25/29 OP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "611211",
         "FIELD2": "Dana Bagi Hasil PBB untuk Propinsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "611212",
         "FIELD2": "Dana Bagi Hasil PBB untuk Kabupaten/Kota",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "611213",
         "FIELD2": "Dana Bagi Hasil Biaya/Upah Pungut PBB untuk Propinsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "611214",
         "FIELD2": "Dana Bagi Hasil Biaya/Upah Pungut PBB untuk Kabupaten/Kota",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "611215",
         "FIELD2": "Dana Bagi Hasil PBB Bagian Pemerintah Pusat yang Dikembalikan Sama Rata ke",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Kabupaten/Kota",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "611216",
         "FIELD2": "Dana Bagi Hasil PBB Bagian Pemerintah Pusat yang Dikembalikan sebagai Insentif PBB ke",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Kabupaten/Kota",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "611311",
         "FIELD2": "Transfer DBH BPHTB untuk provinsi/kabupaten/kota",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "611312",
         "FIELD2": "Transfer DBH BPHTB Bagian Pemerintah Pusat yang dikembalikan sama rata ke kabupaten/kota",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612111",
         "FIELD2": "Dana Bagi Hasil Minyak Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "34",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612112",
         "FIELD2": "Dana Bagi Hasil Minyak Bumi 0.5%",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612113",
         "FIELD2": "Tambahan Dana Bagi Hasil Minyak Bumi Dalam Rangka Otonomi Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612211",
         "FIELD2": "Dana Bagi Hasil Gas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612212",
         "FIELD2": "Dana Bagi Hasil Gas Bumi 0.5%",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612213",
         "FIELD2": "Tambahan Dana Bagi Hasil Gas Bumi Dalam Rangka Otonomi Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612311",
         "FIELD2": "Dana Bagi Hasil Pertambangan Umum - Iuran Tetap",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612312",
         "FIELD2": "Dana Bagi Hasil Pertambangan Umum - Royalti",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612411",
         "FIELD2": "Dana Bagi Hasil Pertambangan Panas Bumi - Setoran Bagian Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612412",
         "FIELD2": "Dana Bagi Hasil Pertambangan Panas Bumi - Iuran Tetap",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612413",
         "FIELD2": "Dana Bagi Hasil Pertambangan Panas Bumi - Iuran Produksi (Royalti)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612511",
         "FIELD2": "Dana Bagi Hasil Kehutanan - IIUPH/IHPH",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612512",
         "FIELD2": "Dana Bagi Hasil Kehutanan - PSDH",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612513",
         "FIELD2": "Dana Bagi Hasil Kehutanan - Dana Reboisasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "612611",
         "FIELD2": "Dana Bagi Hasil Perikanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "613111",
         "FIELD2": "Dana Bagi Hasil Cukai Hasil Tembakau",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "62",
         "FIELD2": "TRANSFER DANA ALOKASI UMUM",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "621111",
         "FIELD2": "Dana Alokasi Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "621114",
         "FIELD2": "Koreksi Dana Alokasi Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "63",
         "FIELD2": "DANA ALOKASI KHUSUS FISIK",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "631111",
         "FIELD2": "Dana Alokasi Khusus Reguler",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "631113",
         "FIELD2": "Koreksi Dana Alokasi Khusus Reguler",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "631211",
         "FIELD2": "Dana Alokasi Khusus Infrastruktur Publik Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "631212",
         "FIELD2": "Dana Alokasi Khusus Penugasan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "631311",
         "FIELD2": "Dana Alokasi Khusus Affirmasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "64",
         "FIELD2": "DANA OTONOMI KHUSUS, DANA KEISTIMEWAAN DAERAH ISTIMEWA YOGYAKARTA DAN DANA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "INSENTIF DAERAH",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "641111",
         "FIELD2": "Dana Otonomi Khusus Provinsi Aceh",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "641211",
         "FIELD2": "Dana Otonomi Khusus Provinsi Papua",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "641212",
         "FIELD2": "Dana Tambahan Infrastruktur Papua",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "641311",
         "FIELD2": "Dana Otonomi Khusus Provinsi Papua Barat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "641312",
         "FIELD2": "Dana Tambahan Infrastruktur Papua Barat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "642111",
         "FIELD2": "Dana Keistimewaan Daerah Istimewa Yogyakarta",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "643111",
         "FIELD2": "Dana Insentif Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "65",
         "FIELD2": "DANA ALOKASI KHUSUS NONFISIK",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "651111",
         "FIELD2": "Transfer Dana Keistimewaan Daerah Istimewa Yogyakarta",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "651119",
         "FIELD2": "Dana Penyesuaian Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "652111",
         "FIELD2": "Dana Penguatan Desentrasilisasi Fiskal dan Percepatan Pembangunan Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "652112",
         "FIELD2": "Transfer Dana Tambahan Penghasilan Guru Pegawai Negeri Sipil Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "652113",
         "FIELD2": "Transfer Dana Kurang Bayar Dana Alokasi Khusus (DAK)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "652114",
         "FIELD2": "Transfer Dana Kurang Bayar Dana Penyesuaian infrastruktur Jalan dan Lainnya (DPIL)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "652115",
         "FIELD2": "Transfer Dana Insentif Daerah (DID)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "652116",
         "FIELD2": "Transfer Dana Kurang Bayar Dana Infrastruktur Sarana dan Prasarana (DISP)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "652117",
         "FIELD2": "Transfer Dana Penguatan Infrastruktur dan Prasarana Daerah (DPIPD)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "652118",
         "FIELD2": "Transfer Dana Percepatan Pembangunan Infrastruktur Pendidikan (DPPIP)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "653111",
         "FIELD2": "Dana Bantuan Operasional Sekolah (BOS)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "653112",
         "FIELD2": "Transfer Dana Bantuan Operasional Sekolah (BOS)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "653113",
         "FIELD2": "Transfer Dana Penyesuaian Insfrastruktur Daerah (DPID)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "653114",
         "FIELD2": "Transfer Dana Percepatan Pembangunan Infrastruktur Daerah (DPPID)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "653115",
         "FIELD2": "Transfer Dana Proyek Pemerintah Daerah dan Desentralisasi (P2D2)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654111",
         "FIELD2": "Dana Tunjangan Profesi Guru PNSD (TPG)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654112",
         "FIELD2": "Dana Tunjangan Khusus Guru PNSD di Daerah Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "35",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654211",
         "FIELD2": "Dana Tambahan Penghasilan Guru Pegawai Negeri Sipil Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654311",
         "FIELD2": "Dana Bantuan Operasional Sekolah (BOS)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654411",
         "FIELD2": "Dana Insentif Daerah (DID)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654511",
         "FIELD2": "Dana Proyek Pemerintah Daerah dan Desentralisasi (P2D2)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654611",
         "FIELD2": "Dana Darurat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654711",
         "FIELD2": "Dana Bantuan Operasional Kesehatan dan Bantuan Operasional Keluarga Berencana",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654712",
         "FIELD2": "Dana Bantuan Operasional Keluarga Berencana",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654811",
         "FIELD2": "Dana Peningkatan Kapasitas Koperasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654812",
         "FIELD2": "Dana Peningkatan Kapasitas Usaha Kecil Menengah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654813",
         "FIELD2": "Dana Peningkatan Kapasitas Ketenagakerjaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654814",
         "FIELD2": "Dana Pelayanan Administrasi Kependudukan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "654911",
         "FIELD2": "Dana Bantuan Operasional Penyelenggaraan - Pendidikan Anak Usia Dini (BOP-PAUD)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "655111",
         "FIELD2": "Dana Desa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "66",
         "FIELD2": "DANA DESA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "661111",
         "FIELD2": "Dana Keistimewaan Daerah Istimewa Yogyakarta",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "662111",
         "FIELD2": "Dana Desa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "67",
         "FIELD2": "DANA DESA",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "671111",
         "FIELD2": "Dana Desa",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "71",
         "FIELD2": "",
         "FIELD3": "PENERIMAAN  PEMBIAYAAN",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711111",
         "FIELD2": "Penerimaan Sisa Anggaran Lebih (SAL)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711112",
         "FIELD2": "Penerimaan Pembiayaan dari Rekening Dana Investasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711113",
         "FIELD2": "Penerimaan Pembiayaan dari Rekening BUN untuk Obligasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711114",
         "FIELD2": "Penerimaan Pembiayaan dari Rekening Pembangunan Hutan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711121",
         "FIELD2": "Penerimaan Pembiayaan dari Dana Eks Moratorium Pokok untuk Cadangan Aceh",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711211",
         "FIELD2": "Penerimaan Hasil Privatisasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711219",
         "FIELD2": "Penerimaan Kembalo Investasi Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711221",
         "FIELD2": "Penerimaan Pinjaman Dalam Negeri dari Pemerintah Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711222",
         "FIELD2": "Penerimaan Pinjaman Dalam Negeri dari BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711223",
         "FIELD2": "Penerimaan Pinjaman Dalam Negeri dari Pusahaan Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711311",
         "FIELD2": "Penerimaan Hasil Penjualan Aset Program Restrukturisasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711312",
         "FIELD2": "Penerimaan Hasil Penjualan/ Penyelesaian Aset eks BPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711313",
         "FIELD2": "Penerimaan Hasil Penjualan/ Penyelesaian Aset Bekas Milik Eks Bank Dalam Likuidasi (BDL)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711411",
         "FIELD2": "Penerimaan Penerbitan/Penjualan Surat Perbendaharaan Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711421",
         "FIELD2": "Penerimaan Penerbitan/Penjualan Obligasi Negara Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711422",
         "FIELD2": "Penerimaan Utang Bunga Obligasi Negara Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711431",
         "FIELD2": "Penerimaan Penerbitan/Penjualan SBSN - Jangka Pendek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711441",
         "FIELD2": "Penerimaan Penerbitan/Penjualan SBSN - Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711442",
         "FIELD2": "Penerimaan Imbalan Dibayar Di Muka SBSN -  Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711451",
         "FIELD2": "Penerimaan  dari Penjualan Surat Perbendaharaan Negara Syariah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711511",
         "FIELD2": "Penerimaan Pembiayaan Dana Bergulir",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711611",
         "FIELD2": "Penerimaan Penerbitan/ Penjualan Obligasi Negara - Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711612",
         "FIELD2": "Penerimaan Utang Bunga Obligasi Negara - Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711621",
         "FIELD2": "Penerimaan Penerbitan/ Penjualan Surat Perbendaharaan Negara - Valuta Asing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711631",
         "FIELD2": "Penerimaan Penerbitan/ Penjualan SBSN Valas - Jangka Pendek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711641",
         "FIELD2": "Penerimaan Penerbitan/ Penjualan SBSN Valas - Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "711642",
         "FIELD2": "Penerimaan Imbalan Dibayar Di Muka SBSN Valas - Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712111",
         "FIELD2": "Penarikan Pinjaman Program dari OECF",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712119",
         "FIELD2": "Penarikan Pinjaman Program Bilateral Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712121",
         "FIELD2": "Penarikan Pinjaman Program dari IBRD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712122",
         "FIELD2": "Penarikan Pinjaman Program dari ADB",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712129",
         "FIELD2": "Penarikan Pinjaman Program Multilateral Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "Hal :",
         "FIELD4": "36",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712131",
         "FIELD2": "Penarikan Pinjaman Program",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712211",
         "FIELD2": "Penarikan Pinjaman Proyek Bilateral",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712221",
         "FIELD2": "Penarikan Pinjaman Proyek Multilateral",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712231",
         "FIELD2": "Penarikan Pinjaman Proyek Fasilitas Kredit Ekspor",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712241",
         "FIELD2": "Penarikan Pinjaman Proyek Leasing",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712251",
         "FIELD2": "Penarikan Pinjaman Proyek Komersial",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712261",
         "FIELD2": "Penarikan Pinjaman Proyek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "712291",
         "FIELD2": "Penarikan Pinjaman Proyek Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "713111",
         "FIELD2": "Penerimaan Pinjaman Program dari Penjadualan Kembali Pokok Utang Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "713121",
         "FIELD2": "Penerimaan Pinjaman Proyek dari Penjadualan Kembali Pokok Utang Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "714111",
         "FIELD2": "Penerimaan Pembiayaan dari Penjadualan Kembali Bunga Utang Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "715111",
         "FIELD2": "Penerimaan Cicilan Pengembalian Penerusan Pinjaman dalam Negeri kepada Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "715112",
         "FIELD2": "Penerimaan Cicilan Pengembalian Penerusan Pinjaman dalam Negeri kepada BUMD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "715113",
         "FIELD2": "Penerimaan Cicilan Pengembalian Penerusan Pinjaman dalam Negeri Kepada BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "715114",
         "FIELD2": "Penerimaan Cicilan Pengembalian Penerusan Pinjaman dalam Negeri Kepada Non Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "715211",
         "FIELD2": "Penerimaan Cicilan Pengembalian Penerusan Pinjaman Luar negeri TAB  kepada Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "715212",
         "FIELD2": "Penerimaan Cicilan Pengembalian Penerusan Pinjaman Luar Negeri TAB kepada BUMD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "715213",
         "FIELD2": "Penerimaan Cicilan Pengembalian Penerusan Pinjaman Luar Negeri TAB kepada BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "715214",
         "FIELD2": "Penerimaan Cicilan Pengembalian Penerusan Pinjaman Luar Negeri Non Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "715221",
         "FIELD2": "Penerimaan Cicilan Pengembalian Penerusan Pinjaman Luar Negeri TAYL kepada Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "715222",
         "FIELD2": "Penerimaan Cicilan Pengembalian Penerusan Pinjaman Luar Negeri TAYL kepada BUMD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "715223",
         "FIELD2": "Penerimaan Cicilan Pengembalian Penerusan Pinjaman Luar Negeri TAYL kepada BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "717111",
         "FIELD2": "Penerimaan Cicilan Pokok Pembiayaan Kredit Investasi Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "717211",
         "FIELD2": "Penerimaan Cicilan atas Penjaminan Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "717212",
         "FIELD2": "Penerimaan atas Pencairan Dana Cadangan Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "717310",
         "FIELD2": "Penerimaan yang Berasal dari Manajemen Aset Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "717311",
         "FIELD2": "Penerimaan Kembali Modal Awal Badan Layanan Umum Lembaga Manajemen Aset Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "719111",
         "FIELD2": "Penyesuaian Penambahan Saldo Rekening Khusus Karena Selisih Kurs",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "719112",
         "FIELD2": "Penyesuaian Penambahan Saldo Rekening KUN Rekening Valuta USD Karena Selisih Kurs",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "719311",
         "FIELD2": "Penerimaan Pembiayaan atas Pemberian Pinjaman dalam Rangka Penanggulangan Lumpur",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Sidoarjo",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "72",
         "FIELD2": "PENGELUARAN PEMBIAYAAN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721111",
         "FIELD2": "Pembayaran Pinjaman Kredit Jangka Pendek dan uang Muka dari Sektor Perbankan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721112",
         "FIELD2": "Pengeluaran Pelunasan Pinjaman Jangka Pendek Perbankan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721121",
         "FIELD2": "Pengeluaran Pembiayaan Eks Moratorium Pokok untuk Cadangan Aceh",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721211",
         "FIELD2": "Pengeluaran untuk Program Restrukturisasi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721221",
         "FIELD2": "Pengeluaran Pembiayaan Pengembangan Pendidikan Nasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721231",
         "FIELD2": "Pengeluaran Pembiayaan DN-Cicilan Pokok Pinjaman DN dari Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721232",
         "FIELD2": "Pengeluaran Pembiayaan-Cicilan Pokok Pinjaman DN dari BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721233",
         "FIELD2": "Pengeluaran Pembiayaan-Cicilan Pokok Pinjaman DN dari Perusahaan Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721311",
         "FIELD2": "Pengeluaran Pelunasan Surat Perbendaharaan Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721312",
         "FIELD2": "Pengeluaran Pelunasan Surat Perbendaharaan Negara melalui Pembelian Kembali",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721321",
         "FIELD2": "Pengeluaran Pelunasan Obligasi Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721322",
         "FIELD2": "Pengeluaran Pelunasan Obligasi Dalam Negeri melalui Pembelian Kembali",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721324",
         "FIELD2": "Pembayaran Utang Bunga Obligasi Negara Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721331",
         "FIELD2": "Pengeluaran Pelunasan Surat Berharga Syariah Negara - Jangka Pendek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721332",
         "FIELD2": "Pengeluaran Pelunasan Surat Berharga Syariah Negara melalui Pembelian Kembali",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721341",
         "FIELD2": "Pengeluaran Pelunasan Surat Berharga Syariah Negara - Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721342",
         "FIELD2": "Pengeluaran Pelunasan Surat Berharga Syariah Negara Jangka Panjang melalui Pembelian",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Kembali",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721343",
         "FIELD2": "Pembayaran Imbalan dibayar di muka SBSN - Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "37",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721351",
         "FIELD2": "Pengeluaran Pelunasan Surat Perbendaharaan Negara-Syariah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721352",
         "FIELD2": "Pengeluaran Pelunasan Surat Perbendaharaan Negara-Syariah-melalui Pembelian Kembali",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721411",
         "FIELD2": "Pengeluaran Pembiayaan Dana Bergulir",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721511",
         "FIELD2": "Pengeluaran Pelunasan Obligasi Negara - Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721512",
         "FIELD2": "Pengeluaran Pelunasan Obligasi Negara Valas - melalui Pembelian Kembali",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721513",
         "FIELD2": "Pembayaran Utang Bunga Obligasi Negara Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721521",
         "FIELD2": "Pengeluaran Pelunasan Surat Perbendaharaan Negara Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721522",
         "FIELD2": "Pengeluaran Pelunasan Surat Perbendaharaan Negara Valas melalui Pembelian Kembali",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721531",
         "FIELD2": "Pengeluaran Pelunasan Surat Berharga Syariah Negara Valas - Jangka Pendek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721532",
         "FIELD2": "Pengeluaran Pelunasan Surat Berharga Syariah Negara Valas melalui Pembelian Kembali",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721541",
         "FIELD2": "Pengeluaran Pelunasan Surat Berharga Syariah Negara Valas - Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721542",
         "FIELD2": "Pengeluaran Pelunasan Surat Berharga Syariah Negara Valas - Jangka Panjang melalui",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pembelian Kembali",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "721543",
         "FIELD2": "Pembayaran Imbalan dibayar di muka Surat Berharga Syariah Negara Valas - Jangka Panjang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "722111",
         "FIELD2": "Pengeluaran Pembiayaan Cicilan Pokok (Amortisasi) Utang Luar Negeri - Pinjaman Program",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "722112",
         "FIELD2": "Pengeluaran Cicilan Pokok Utang LN Pinjaman Program",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "722113",
         "FIELD2": "Pengeluaran Pembiayaan Cicilan Pokok Utang Luar Negeri - Pinjaman Program",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "722211",
         "FIELD2": "Pengeluaran Pembiayaan Cicilan Pokok Utang Luar Negeri - Pinjaman Proyek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "722212",
         "FIELD2": "Pengeluaran Cicilan Pokok Utang LN Pinjaman Proyek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "722213",
         "FIELD2": "Pengeluaran Pembiayaan Cicilan Pokok Utang Luar Negeri - Pinjaman Proyek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "722411",
         "FIELD2": "Pengembalian Pinjaman karena Pengeluaran Ineligible",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "723111",
         "FIELD2": "Pengeluaran Penjadualan Kembali Utang LN Pinjaman Program",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "723211",
         "FIELD2": "Pengeluaran Penjadualan Kembali Utang LN Pinjaman Proyek",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "723311",
         "FIELD2": "Pengeluaran penjadwalan Kembali Bunga Utang Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "724111",
         "FIELD2": "PMN untuk Badan Usaha Milik Negara (BUMN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "724112",
         "FIELD2": "Dana Investasi Pemerintah untuk Restrukturisasi BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "724211",
         "FIELD2": "PMN untuk Badan Internasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "724911",
         "FIELD2": "Penyertaan Modal Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "724912",
         "FIELD2": "Penyertaan Modal Negara SMF",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "724913",
         "FIELD2": "Penyertaan Modal Negara ke Bank Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "725111",
         "FIELD2": "Penerusan Pinjaman Dalam Negeri Kepada Pemda",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "725112",
         "FIELD2": "Penerusan Pinjaman dalam Negeri kepada BUMD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "725113",
         "FIELD2": "Penerusan Pinjaman dalam Negeri Kepada BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "725114",
         "FIELD2": "Penerusan Pinjaman dalam Negeri Kepada Non Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "725211",
         "FIELD2": "Penerusan Pinjaman Luar Negeri Tahun Anggaran Berjalan Kepada Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "725212",
         "FIELD2": "Penerusan Pinjaman Luar Negeri Tahun Anggaran Berjalan Kepada BUMD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "725213",
         "FIELD2": "Penerusan Pinjaman Luar Negeri Tahun Anggaran Berjalan Kepada BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "725221",
         "FIELD2": "Penerusan Pinjaman Luar Negeri  Tahun Anggaran Yang Lalu Kepada Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "725222",
         "FIELD2": "Penerusan Pinjaman Luar Negeri  Tahun Anggaran Yang Lalu Kepada BUMD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "725223",
         "FIELD2": "Penerusan Pinjaman Luar Negeri  Tahun Anggaran yang Lalu Kepada BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "726111",
         "FIELD2": "Dukungan Infrastruktur",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "727111",
         "FIELD2": "Investasi Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "727112",
         "FIELD2": "Investasi Pemerintah untuk Pembiayaan Dana Geothermal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "727121",
         "FIELD2": "Pengeluaran Pembiayaan Kredit Investasi Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "727130",
         "FIELD2": "Pengeluaran Pembiayaan untuk Manajemen Aset Aset Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "727131",
         "FIELD2": "Pengeluaran Pembiayaan untuk Modal Awal Badan Layanan Umum Lembaga Manajemen Aset",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "727132",
         "FIELD2": "Pengeluaran Pembiayaan untuk Pengadaan Tanah Proyek Strategis Nasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "727211",
         "FIELD2": "Investasi Pemerintah Untuk Kemudian Dipinjamkan Kepada BUMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "727311",
         "FIELD2": "Pembayaran Penjaminan Pemerintah kepada Pihak Ketiga/ Kreditur",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "727312",
         "FIELD2": "Pembentukan Dana Cadangan Penjaminan Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "38",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "729111",
         "FIELD2": "Koreksi Penyesuaian Penurunan Saldo Rekening Khusus Karena Selisih Kurs",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "729112",
         "FIELD2": "Koreksi Penyesuaian Penurunan Saldo Rekening KUN dalam Valuta USD  karena Selisih Kurs",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "729211",
         "FIELD2": "Pengeluaran Pembiayaan Untuk Pemberian Pinjaman dalam Rangka Penanggulangan Lumpur",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Sidoarjo",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "81",
         "FIELD2": "PENERIMAAN NON ANGGARAN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811111",
         "FIELD2": "Penerimaan Setoran / Potongan PFK 10% Gaji PNS Pusat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811113",
         "FIELD2": "Penerimaan Setoran/Potongan Perhitungan Fihak Ketiga (PFK) 2% Gaji PNS Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811114",
         "FIELD2": "Penerimaan Setoran/Potongan Perhitungan Fihak Ketiga (PFK) 8% Gaji PNS Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811121",
         "FIELD2": "Penerimaan Setoran PFK Eks PNS PT. KAI - Iuran Pegawai PT. KAI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811122",
         "FIELD2": "Penerimaan Setoran PFK Eks PNS PT. KAI - PSL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811123",
         "FIELD2": "Penerimaan Setoran PFK Eks PNS PT. KAI - Kontribusi PT. KAI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811134",
         "FIELD2": "Penerimaan Setoran / Potongan PFK 8% Gaji TNI dan PNS Kemhan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811141",
         "FIELD2": "Penerimaan PFK 2 %  Iuran Jaminan Kesehatan Pegawai Pemerintah Non PNS  yang Berasal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "dari APBN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811171",
         "FIELD2": "Penerimaan Setoran PFK 2% Iuran Jaminan Kesehatan dari PT. Taspen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811172",
         "FIELD2": "Penerimaan Setoran PFK 2% Iuran Jaminan Kesehatan dari PT. Asabri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811211",
         "FIELD2": "Penerimaan Setoran / Potongan PFK 2% Pembayaran Gaji Terusan PNS Pusat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811212",
         "FIELD2": "Penerimaan Setoran / Potongan PFK 2% Pembayaran Gaji terusan PNS Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811213",
         "FIELD2": "Penerimaan Setoran / Potongan PFK 2% Pembayaran Gaji Terusan POLRI dan PNS Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811214",
         "FIELD2": "Penerimaan Setoran / Potongan PFK 2% Pembayaran Gaji Terusan TNI dan PNS DEPHAN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811311",
         "FIELD2": "Penerimaan Setoran / Potongan PFK Bulog PNS Pusat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811312",
         "FIELD2": "Penerimaan Setoran / Potongan PFK Bulog Polri & PNS POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811313",
         "FIELD2": "Penerimaan Setoran/ Potongan PFK Bulog TNI & PNS Dephan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811411",
         "FIELD2": "Penerimaan Setoran PFK 3 % Iuran Jaminan Kesehatan Pemerintah Propinsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811412",
         "FIELD2": "Penerimaan Setoran PFK 3 % Iuran Jaminan Kesehatan Pemerintah Kabupaten/Kota",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811511",
         "FIELD2": "Penerimaan Setoran/Potongan  PFK 2 % Iuran Asuransi Kesehatan Bidan/Dokter PTT",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811611",
         "FIELD2": "Penerimaan Setoran/Potongan  PFK 2 % Iuran Asuransi Kesehatan PensiunTNI/PNS Dephan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811612",
         "FIELD2": "Penerimaan Setoran/Potongan  PFK 2 % Iuran Asuransi Kesehatan Pensiun POLRI/PNS POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811711",
         "FIELD2": "Penerimaan Setoran  PFK Dana Tabungan Pesangon Tenaga Kerja Pemborong Minyak dan Gas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Bumi (PFK DTP M",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811811",
         "FIELD2": "Penerimaan Setoran Penutupan Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811911",
         "FIELD2": "Penerimaan Setoran Potongan PFK Tabungan Wajib Perumahan PNS Pusat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811912",
         "FIELD2": "Penerimaan Setoran Potongan PFK Tabungan Wajib Perumahan PNS Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "811921",
         "FIELD2": "Penerimaan Pengembalian Kelebihan Penyaluran PFK Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "812111",
         "FIELD2": "Penerimaan potongan WP dari SPM KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "812112",
         "FIELD2": "Penerimaan Setoran untuk penerbitan WP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813111",
         "FIELD2": "Penerimaan setoran sisa UP-PP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813112",
         "FIELD2": "Penerimaan Reimbursement / Pengganti PFK PP dan PPHLN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813113",
         "FIELD2": "Penerimaan Penggantian UP PP Berasal dari SPM GU Nihil (Pengesahan)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813114",
         "FIELD2": "Penggantian Dana Rek. KPPN ke Rek BUN atas Pembayaran kepada PPHLN (Karena adanya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "pembayaran ineligi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813115",
         "FIELD2": "Penggantian Dana dari REKSUS ke Rek BUN karena REKSUS kosong",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813116",
         "FIELD2": "Penggantian Dana dari REKSUS ke Rekening BUN karena Prefinancing REKSUS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813117",
         "FIELD2": "Penggantian Dana dari Pihak ketiga ke Rekening BUN atas pembayaran kepada PPHLN (Karena",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "adanya pemba",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813118",
         "FIELD2": "Penggantian Dana dari Rekening Dana Talangan REKSUS kosong",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813121",
         "FIELD2": "Penerimaan Dana Talangan dari Rekening SAL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813122",
         "FIELD2": "Penerimaan Dana Talangan dari dana moratorium",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813123",
         "FIELD2": "Penerimaan Dana Talangan dari Rekening Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813124",
         "FIELD2": "Penerimaan Pengembalian dana Talangan ke rekening lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813125",
         "FIELD2": "Penerimaan Talangan Dana Cadangan Subsidi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813126",
         "FIELD2": "Penerimaan Talangan Dana Cadangan DBH",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "39",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "813127",
         "FIELD2": "Penerimaan Talangan Dana Cadangan PMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814111",
         "FIELD2": "Penerimaan Kiriman Uang Antar KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814112",
         "FIELD2": "Penerimaan Kiriman Uang dari Kantor Pusat Ditjen PBN Rekening 500.000000 ke KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814113",
         "FIELD2": "Penerimaan Kiriman Uang dari KPPN ke Kantor Pusat Ditjen PBN Rekening 500.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814114",
         "FIELD2": "Penerimaan Kiriman Uang dari Kantor Pusat Ditjen PBN 500.000000 ke Rekening BUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "502",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814115",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening BUN 502.000000 ke Kantor Pusat Ditjen PBN Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "500",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814116",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Sub BUN Valas ke Rekening BUN 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814117",
         "FIELD2": "Penerimaan Kiriman Uang dari  Rekening 501 ke Bank Operasional I",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814118",
         "FIELD2": "Penerimaan Kiriman Uang dari  Rekening 501 ke Bank Operasional II",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814121",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening 501.000.000 KPPN Induk ke Bank Operasional I KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Non KCBI",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814122",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening 501.000.000 KPPN Induk ke Bank Operasional II KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Non KCBI",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814123",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening 501.000.000 KPPN Induk ke Sentral Giro/SGG KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Non KCBI",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814124",
         "FIELD2": "Penerimaan Kiriman Uang dari Bank Operasional I KPPN  Non KCBI  ke Rekening 501.000.000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KPPN Induk",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814125",
         "FIELD2": "Penerimaan Kiriman Uang dari Bank Operasional II KPPN  Non KCBI ke  Rekening 501.000.000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KPPN Induk",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814126",
         "FIELD2": "Penerimaan Kiriman Uang dari Sentral Giro/Sentral Giro Gabungan KPPN Non KBI ke Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "SUBRKUN KPPN KBI Induk",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814127",
         "FIELD2": "Penerimaan Kiriman Uang dari Bank Operasional III KPPN Non KCBI ke Rekening 501.000.000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KPPN Induk",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814128",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Gabungan KPPN Non KBI ke Rekening SUBRKUN KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KBI Induk",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814131",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening BUN  ke RPK-BUN-P",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814132",
         "FIELD2": "Penerimaan Kiriman Uang dari RPK-BUN-P ke BO I di KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814133",
         "FIELD2": "Penerimaan Kiriman Uang dari RPK-BUN-P ke Rekening BUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814134",
         "FIELD2": "Penerimaan Kiriman Uang dari BO I di KPPN ke RPK-BUN-P",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814135",
         "FIELD2": "Penerimaan Kiriman Uang dari rekening penerimaan persepsi ke rekening penerimaan sub RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814136",
         "FIELD2": "Penerimaan kiriman uang dari rekening sub RKUN Dit PKN ke rekening KUN dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814137",
         "FIELD2": "Penerimaan kiriman uang dari rekening penerimaan persepsi dalam mata uang asing ke",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "rekening KUN dalam Valuta USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814141",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Retur pada Bank Operasional (rekening rr) ke Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Retur pada Kantor Pusat Bank Operasional (rekening RR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814142",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Retur pada Kantor Pusat Bank Operasional (rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "RR) ke Rekening Retur pada Bank Operasional (rekening rr)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814143",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Retur pada Bank Operasional (rekening rr) ke Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Kas Negara pada Bank/Pos Persepsi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814144",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Retur pada Kantor Pusat Bank Operasional (rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "RR) ke Rekening Penampungan Retur pada Kantor Pusat Bank Indonesia (rekening RPR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814145",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Penampungan Retur pada Kantor Pusat Bank Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "(rekening RPR) ke Rekening Retur pada Kantor Pusat Bank Operasional (rekening RR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814146",
         "FIELD2": "Penerimaan Pemindahbukuan dari RPK BUN KPPN ke Rekening rr KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814151",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening KUN dalam Rupiah ke Rekening Pengeluaran BI dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Rupiah ke Rekening Pengeluaran BI dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814152",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Pengeluaran BI dalam Rupiah ke Rekening KUN dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Rupiah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814153",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening KUN dalam Valuta USD ke Rekening Pengeluaran BI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "dalam USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "40",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814154",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Pengeluaran BI dalam Valuta USD ke Rekening KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "dalam Vakluta USD",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814155",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening KUN dalam Valuta Yen ke Rekening Pengeluaran BI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "dalam Yen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814156",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Pengeluaran BI dalam Valuta Yen ke Rekening KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "dalam Valuta Yen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814211",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Khusus ke KPPN (berdasarkan SPM-LS /SPM-GU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Isi/SPM Pengganti)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814212",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Khusus ke Rekening Kantor Pusat Ditjen PBN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "500.000.000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814213",
         "FIELD2": "Penerimaan Kiriman Uang dari Rekening Khusus ke Rekening BUN 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814214",
         "FIELD2": "Pembetulan Pembukuan Pengeluaran Penggantian dari Rekening Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814215",
         "FIELD2": "Penerimaan dari KPPN ke Rekening Kantor Pusat Ditjen PBN 500.000.00 berdasarkan SPM",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pengganti",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814216",
         "FIELD2": "Penerimaan Kiriman Uang antar Rekening Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814221",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening Kas Umum Negara ke Rekening Khusus karena",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Koreksi Pembebanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814223",
         "FIELD2": "Koreksi Penerimaan Pemindahbukuan pada Rekening Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814231",
         "FIELD2": "Penerimaan pemindahbukuan dari rekening antara Reksus ke Rekening Kas Umum Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814241",
         "FIELD2": "Penerimaan Pemindahbukuan dari Reksus ke Rekening KUN dalam rangka penggantian dana",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "talangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814311",
         "FIELD2": "Penerimaan Pemindahbukuan Intern KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814312",
         "FIELD2": "Pemindahbukuan dari Bank Tunggal ke Bank Operasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814313",
         "FIELD2": "Pemindahbukuan dari Bank Operasional  ke Bank Tunggal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814314",
         "FIELD2": "Pemindahbukuan dari Bank Operasional (BO) I ke BO II",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814315",
         "FIELD2": "Pemindahbukuan dari Bank Operasional (BO) II  ke BO I",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814316",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening Gabungan ke Rekening SUBRKUN KPPN KBI Induk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "dan/atau SUBRKUN KPPN KBI Non Induk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814317",
         "FIELD2": "Pemindahbukuan dari Bank Tunggal/Operasional I ke Sentral Giro/Sentral Giro Gabungan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814318",
         "FIELD2": "Penerimaan Pemindahbukuan dari Sentral Giro/Sentral Giro Gabungan ke Rekening SUBRKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KPPN KBI Induk dan/atau SUBRKUN KPPN KBI Non Induk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814321",
         "FIELD2": "Pemindahbukuan dari Bank Operasional III ke Bank Tunggal/Bank Operasional I",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814322",
         "FIELD2": "Penerimaan Pemindahbukuan dari Bank Persepsi PBB ke BO III",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814323",
         "FIELD2": "Penerimaan Pemindahbukuan dari Bank Persepsi BPHTB ke BO III",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814331",
         "FIELD2": "Penerimaan Pemindahbukuan dari Bank Tunggal ke Bank Operasional I",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814332",
         "FIELD2": "Penerimaan Pemindahbukuan dari Bank Operasional I ke Bank Tunggal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814333",
         "FIELD2": "Penerimaan Pemindahbukuan dari Bank Tunggal ke Bank Operasional II",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814334",
         "FIELD2": "Penerimaan Pemindahbukuan dari Bank Operasional II ke Bank Tunggal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814341",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 502.000000 ke Rekening 600.502411",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814342",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 600.502411 ke Rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814343",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening KUN Rupiah 502.000000 ke Rekening KUN Valuta",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Yen 600.502111",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814344",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening KUN Valuta Yen 600.502111 ke Rekening KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Rupiah 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814345",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening KUN Valuta USD 600.502411 ke Rekening KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Valuta Yen 600.502111",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814346",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening KUN Valuta Yen 600.502111 ke Rekening KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Valuta USD 600.502411",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814351",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 502.000000 ke Rekening RPKBUN P1",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814352",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 502.000000 ke Rekening RPKBUN P2",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814353",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 502.000000 ke Rekening RPKBUN P3",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814354",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening RPKBUN P1 ke Rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "41",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814355",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening RPKBUN P2 ke Rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814356",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening RPKBUN P3 ke Rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814361",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 500.000001 ke Rekening 561.000001",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814362",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 500.000001 ke Rekening 561.000002",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814363",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 500.000001 ke Rekening 561.000003",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814364",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 500.000001 ke Rekening 561.000005",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814365",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 561.000001 ke Rekening 500.000001",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814366",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 561.000002 ke Rekening 500.000001",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814367",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 561.000003 ke Rekening 500.000001",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814368",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 561.000005 ke Rekening 500.000001",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814371",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 502.000000 ke Rekening 500.000001",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814372",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 500.000001 ke Rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814373",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening khusus ke rekening antara reksus dalam rangka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "penggantian SP2D",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814374",
         "FIELD2": "Penerimaan Pemindahbukuan dari rekening SUBBUN Talangan ke rekening antara reksus karena",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "reksus kosong",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814375",
         "FIELD2": "Penerimaan Pemindahbukuan dari rekening khusus ke rekening SUBBUN talangan dalam rangka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "reimbursement",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814376",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening SUBBUN talangan ke rekening SUBRKUN KPPN No",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "501 karena Reksus Kosong",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814381",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening Penerimaan Kuasa BUN Pusat ke Rekening KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814382",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening KUN dalam Rupiah ke Rekening SAL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814383",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening SAL ke Rekening KUN dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814385",
         "FIELD2": "Penerimaan Pemindahbukuan dari RDI USD ke RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814386",
         "FIELD2": "Penerimaan Pemindahbukuan dari RDI JPY ke RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814387",
         "FIELD2": "Penerimaan Pemindahbukuan dari RDI Valas Lainnya ke RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814388",
         "FIELD2": "Penerimaan Pemindahbukuan dari RPD ke RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814391",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening Cadangan ke Rekening Kas Umum Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814392",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening Kas BLU ke Rekening Penerimaan (Persepsi) KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814411",
         "FIELD2": "Penerimaan Pemindahbukuan Penutupan rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814511",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 502.000000 ke Rekening Pemerintah di Bank Umum",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Dalam Rangka Penempatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814512",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening Pemerintah di Bank Umum Dalam Rangka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Penempatan  ke rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814513",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening Pemerintah di Bank Umum (Sumber Dana Dari",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Rekening Kas SAL) Dalam Rangka Penempatan Ke Rekening BUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814521",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 502.000000 ke Rekening 519.0000122 ( Kas di",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Rekening penempatan dalam rupiah)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814522",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 519.000122 ( Kas di Rekening penempatan dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Rupiah) ke Rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814531",
         "FIELD2": "Penerimaan pemindahbukuan dari Rekening 600.502411 ke Rekening Kas Penempatan dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "USD (608.001411)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814532",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening Kas Penempatan dalam valuta USD (608.001411)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "ke Rekening 600.502.411",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814541",
         "FIELD2": "Penerimaan pemindahbukuan dari Rekening Pemerintah Lainnya di Bank Indonesia ke Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pemerintah di Bank Umum dalam Rangka Penempatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814542",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening Pemerintah di Bank Umum dalam Rangka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "penempatan ke rekening Pemerintah Lainnya di Bank Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814551",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening No. 600.502111 Rekening Kas Umum Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Dalam Valuta Yen ke Rekening No. 608.000111 Rekening Penempatan Dalam Valuta Yen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814552",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening No. 608.000111 Rekening Penempatan Dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Valuta Yen ke Rekening No. 600.502111 Rekening Kas Umum Negara Dalam Valuta Yen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "42",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814561",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 609.000991.980 ke Rekening 519.000124.980",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814562",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening 609.022411.980 ke Rekening 519.000124.980",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "814727",
         "FIELD2": "Penerimaan Pemindahbukuan dari Rekening KUN dalam Valuta Asing Lainnya ke Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Kelolaan TDR dalam Valuta Asing Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815111",
         "FIELD2": "Penerimaan Pengembalian Uang Persediaan Dana Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815112",
         "FIELD2": "Penerimaan Pengembalian Uang Persediaan Dana Pinjaman/Hibah Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815113",
         "FIELD2": "Penerimaan Pengembalian Uang Persediaan Pengguna PNBP (Swadana)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815114",
         "FIELD2": "Penerimaan Pengembalian Uang Persediaan Tahun Anggaran yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815115",
         "FIELD2": "Penerimaan Pengembalian Uang Persediaan Pengembalian (Restitusi) Pajak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815121",
         "FIELD2": "Penerimaan Surplus pada Rekening Kas BLU ke Rekening Penerimaan (Persepsi) KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815131",
         "FIELD2": "Penerimaan penyetoran dana hibah langsung yang telah disahkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815312",
         "FIELD2": "Penerimaan Uang Muka Belanja Barang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815313",
         "FIELD2": "Penerimaan Uang Muka Belanja Modal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815314",
         "FIELD2": "Penerimaan Uang Muka Belanja Pembayaran Bunga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815315",
         "FIELD2": "Penerimaan Uang Muka Belanja Subsidi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815316",
         "FIELD2": "Penerimaan Uang Muka Belanja Hibah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815317",
         "FIELD2": "Penerimaan Uang Muka Bantuan Sosial",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815318",
         "FIELD2": "Penerimaan Uang Muka Belanja Lain-Lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815321",
         "FIELD2": "Penerimaan Uang Muka Dana Perimbangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815322",
         "FIELD2": "Penerimaan Uang Muka Dana Otonomi Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815512",
         "FIELD2": "Penerimaan Pengembalian Tambahan Uang Persediaan (TUP) Dana Pinjaman/Hibah Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815614",
         "FIELD2": "Penerimaan Escrow Dana Penyertaan Modal Negara (PMN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815621",
         "FIELD2": "Penerimaan Pengembalian Escrow Pajak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "815622",
         "FIELD2": "Penerimaan Pengembalian Escrow PNBP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "816111",
         "FIELD2": "Koreksi Pengeluaran Pemindahbukuan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817111",
         "FIELD2": "Penerimaan Non Anggaran Pihak Ketiga karena kesalahan Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817112",
         "FIELD2": "Penerimaan Non Anggaran Pihak Ketiga karena retur SP2D Reksus pada KBI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817122",
         "FIELD2": "Penerimaan Non Anggaran Pihak Ketiga Pinjaman Program yang ditangguhkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817123",
         "FIELD2": "Penerimaan Non Anggaran Pihak Ketiga Pinjaman Proyek yang ditangguhkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817313",
         "FIELD2": "Penerimaan Pihak Ketiga Migas-Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817318",
         "FIELD2": "Penerimaan Pihak Ketiga Migas-Fee Penjualan Migas Bagian Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817321",
         "FIELD2": "Penerimaan Pihak Ketiga Migas Transito Pendapatan PPh Minyak Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817322",
         "FIELD2": "Penerimaan Pihak Ketiga Migas Transito Pendapatan PPh Gas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817323",
         "FIELD2": "Penerimaan Pihak Ketiga Migas Transito Pendapatan PPh Migas Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817324",
         "FIELD2": "Penerimaan Pihak Ketiga Migas Transito Pendapatan Minyak Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817325",
         "FIELD2": "Penerimaan Pihak Ketiga Migas Transito Pendapatan Gas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817326",
         "FIELD2": "Penerimaan Pihak Ketiga Migas Transito Pendapatan PBB Minyak Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817327",
         "FIELD2": "Penerimaan Pihak Ketiga Migas Transito Pendapatan PPN Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817328",
         "FIELD2": "Penerimaan Pihak Ketiga Migas Transito Pendapatan PPh Pasal 23",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817329",
         "FIELD2": "Penerimaan Pihak Ketiga Migas Transito - Pendapatan Migas Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817421",
         "FIELD2": "Penerimaan Pihak Ketiga Panas Bumi Transito Pendapatan PBB Pertambangan Panas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817422",
         "FIELD2": "Penerimaan Pihak Ketiga Panas Bumi Transito Pendapatan Setoran Bagian Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pertambangan Panas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817429",
         "FIELD2": "Penerimaan Pihak Ketiga Transito Pendapatan Setoran Bagian Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pertambangan/Perikanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817615",
         "FIELD2": "Penerimaan Non Anggaran dalam rangka Transaksi SBN dari Rekening Transaksi SBN dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Valuta Asing Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817619",
         "FIELD2": "Penerimaan Non Anggaran dalam rangka Transaksi Penempatan di Bank Umum dari Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Kelolaan TDR dalam Valuta Asing Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817624",
         "FIELD2": "Penerimaan Non Anggaran dalam rangka Transaksi SBN dari Rekening Kelolaan TDRdalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Valuta Euro",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817629",
         "FIELD2": "Penerimaan Non Anggaran dalam rangka Transaksi SBN dari Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Valuta Asing Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "43",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817639",
         "FIELD2": "Penerimaan Non Anggaran dalam rangka Transaksi Reverse Repo dari Rekening Kelolaan TDR",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "dalam Valuta Asing Lainnya",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817641",
         "FIELD2": "Penerimaan Non Anggaran dalam rangka Transaksi Repo dari Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Rupiah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817642",
         "FIELD2": "Penerimaan Non Anggaran dalam rangka Transaksi Repo dari Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Valuta USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817643",
         "FIELD2": "Penerimaan Non Anggaran dalam rangka Transaksi Repo dari Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Valuta Yen",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817644",
         "FIELD2": "Penerimaan Non Anggaran dalam rangka Transaksi Repo dari Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Valuta Euro",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817649",
         "FIELD2": "Penerimaan Non Anggaran dalam rangka Transaksi Repo dari Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Valuta Asing Lainnya",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817651",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR Rupiah terhadap Valuta USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817652",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR Rupiah terhadap Valuta Yen",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817653",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR Rupiah terhadap Valuta Euro",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817659",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR Rupiah terhadap Valuta Asing Lainnya",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817661",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta USD terhadap Rupiah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817662",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta USD terhadap Valuta Yen",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817663",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta USD terhadap Valuta Euro",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817669",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta USD terhadap Valuta Asing Lainnya",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817671",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Yen terhadap Rupiah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817672",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Yen terhadap Valuta USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817673",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Yen terhadap Valuta Euro",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817679",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Yen terhadap Valuta Asing Lainnya",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817681",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Euro terhadap Rupiah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817682",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Euro terhadap Valuta USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817683",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Euro terhadap Valuta Yen",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817689",
         "FIELD2": "Penerimaan Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Euro terhadap Valuta Asing Lainnya",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "817911",
         "FIELD2": "Penerimaan Non Anggaran Pihak Ketiga karena kesalahan Sistem Perbankan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "82",
         "FIELD2": "PENGELUARAN NON ANGGARAN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821111",
         "FIELD2": "Pengembalian Penerimaan Dana Pensiun PNS (4,75%)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821112",
         "FIELD2": "Pengembalian Penerimaan Tunjangan Hari Tua PNS (3,25%)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821113",
         "FIELD2": "Pengembalian Penerimaan Asuransi Kesehatan PNS (2%)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821114",
         "FIELD2": "Pengembalian Penerimaan Dana Pensiun Polri & PNS Polri (4,75%)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821115",
         "FIELD2": "Pengembalian Penerimaan Tunjangan Hari Tua Polri & PNS Polri (3,25%)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821116",
         "FIELD2": "Pengembalian Penerimaan Dana Pemeliharaan dan Kesehatan Polri & PNS Polri (2%)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "44",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821117",
         "FIELD2": "Pengembalian Penerimaan Dana Pensiun Personel TNI dan PNS Dephan (4,75%)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821118",
         "FIELD2": "Pengembalian Penerimaan Tunjangan Hari Tua TNI dan PNS Dephan (3,25%)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821119",
         "FIELD2": "Pengembalian Penerimaan Dana Pemeliharaan dan Kesehatan TNI & PNS Dephan (2%)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821121",
         "FIELD2": "Pengembalian Penerimaan Setoran PFK Eks PNS PT. KAI - Iuran Pegawai PT. KAI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821122",
         "FIELD2": "Pengembalian Penerimaan Setoran PFK Eks PNS PT. KAI - PSL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821123",
         "FIELD2": "Pengembalian Penerimaan Setoran PFK Eks PNS PT. KAI - Kontribusi PT. KAI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821131",
         "FIELD2": "Pengeluaran Perhitungan Fihak Ketiga 2% Gaji untuk Penyaluran kepada BPJS Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821132",
         "FIELD2": "Pengeluaran Perhitungan Fihak Ketiga 3.25% Gaji untuk Tabungan Hari Tua PT. Taspen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821133",
         "FIELD2": "Pengeluaran Perhitungan Fihak Ketiga 4.75% Gaji untuk Iuran Dana Pensiun  PT. Taspen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821134",
         "FIELD2": "Pengeluaran Perhitungan Fihak Ketiga 3.25% Gaji untuk  Tabungan  Hari Tua PT. Asabri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821135",
         "FIELD2": "Pengeluaran Perhitungan Fihak Ketiga 4.75% Gaji untuk Iuran Dana Pensiun  PT.  Asabri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821211",
         "FIELD2": "Pengembalian Penerimaan PFK 2% Iuran Jaminan Kesehatan Pensiunan PNS",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821212",
         "FIELD2": "Pengembalian Penerimaan Asuransi Kesehatan Daerah (2%)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821213",
         "FIELD2": "Pengembalian Penerimaan PFK 2% Iuran Jaminan Kesehatan Pensiunan TNI/PNS Kemhan dan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Polri/PNS Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821214",
         "FIELD2": "Pengembalian Penerimaan Asuransi Kesehatan TNI & PNS Dephan (2%)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821311",
         "FIELD2": "Pengembalian Penerimaan PFK Beras Bulog PNS Pusat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821312",
         "FIELD2": "Pengembalian Penerimaan PFK Beras Bulog Polri & PNS Polri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821313",
         "FIELD2": "Pengembalian Penerimaan PFK Beras Bulog TNI & PNS Dephan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821411",
         "FIELD2": "Pengembalian Penerimaan PFK 3% Iuran Jaminan Kesehatan dari Pemberi Kerja untuk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Penyaluran kepada BPJS Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821412",
         "FIELD2": "Pengembalian Penerimaan Setoran PFK 2 % Iuran Asuransi Kesehatan Kabupaten/Kota",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821511",
         "FIELD2": "Pengembalian Penerimaan Setoran/Potongan  PFK 2 % Iuran Asuransi Kesehatan Bidan/Dokter",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "PTT",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821611",
         "FIELD2": "Pengembalian Penerimaan Setoran/Potongan  PFK 2 % Iuran Asuransi Kesehatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "PensiunTNI/PNS Dephan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821612",
         "FIELD2": "Pengembalian Penerimaan Setoran/Potongan  PFK 2 % Iuran Asuransi Kesehatan Pensiun",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "POLRI/PNS POLRI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821711",
         "FIELD2": "Pengembalian Penerimaan Setoran/Potongan  PFK Dana Tabungan Pesangon Tenaga Kerja",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pemborong Minyak d",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821811",
         "FIELD2": "Pengembalian Penerimaan Setoran Penutupan Rekening Pihak Ketiga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821911",
         "FIELD2": "Pengembalian Penerimaan PFK TabunganWajib  Perumahan PNS Pusat",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821912",
         "FIELD2": "Pengembalian Penerimaan PFK Tabungan Perumahan PNS Daerah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "821921",
         "FIELD2": "Pengembalian Penerimaan Lain-Lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "822111",
         "FIELD2": "Pelunasan Wesel Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823111",
         "FIELD2": "Pembayaran UP-PP (DU/TU)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823112",
         "FIELD2": "Pembayaran PFK PP (Prefinancing)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823113",
         "FIELD2": "Pembayaran SPM-GU Nihil (Pengesahan ke Rekening BUN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823114",
         "FIELD2": "Pembayaran kepada PPHLN karena pengeluaran in-eligible",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823115",
         "FIELD2": "Pembayaran dari Rekening BUN karena Reksus kosong",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823116",
         "FIELD2": "Pembayaran dari Rekening BUN karena Prefinancing UP-Reksus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823117",
         "FIELD2": "Pengisian Rekening Dana SAL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823118",
         "FIELD2": "Pembayaran ke Rekening Dana Talangan Reksus kosong",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823121",
         "FIELD2": "Pengembalian Dana Talangan ke Rekening SAL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823122",
         "FIELD2": "Pengembalian Dana Talangan ke dana moratorium",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823123",
         "FIELD2": "Pengeluaran dana talangan dari rekening lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823124",
         "FIELD2": "Pengembalian dana talangan ke rekening lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823125",
         "FIELD2": "Pengeluaran Talangan Dana Cadangan Subsidi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823126",
         "FIELD2": "Pengeluaran Talangan Dana Cadangan DBH",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "823127",
         "FIELD2": "Pengeluaran Talangan Dana Cadangan PMN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824111",
         "FIELD2": "Pengeluaran Kiriman Uang antar KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824112",
         "FIELD2": "Pengeluaran Kiriman Uang dari KPPN ke Kantor Pusat Ditjen PBN Rekening 500.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "45",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824113",
         "FIELD2": "Pengeluaran Kiriman Uang dari Kantor Pusat Ditjen PBN Rekening 500.000000 ke KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824114",
         "FIELD2": "Pengeluaran Kiriman Uang dari Kantor Pusat Ditjen PBN Rekening 500.000000 ke Rekening BUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "502",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824115",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening BUN 502.000000 ke Kantor Pusat Ditjen PBN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "500",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824116",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening BUN 502.000000 ke Rekening Sub BUN Valas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824117",
         "FIELD2": "Pengeluaran Kiriman Uang dari Bank Operasional I ke Rekening 501",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824118",
         "FIELD2": "Pengeluaran Kiriman Uang dari Bank Operasional II  ke Rekening 501",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824121",
         "FIELD2": "Pengeluaran Kiriman Uang dari Bank Operasional I KPPN Non KCBI ke Rekening 501.000.000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KPPN Induk",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824122",
         "FIELD2": "Pengeluaran Kiriman Uang dari Bank Operasional II KPPN Non KCBI ke Rekening 501.000.000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KPPN Induk",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824123",
         "FIELD2": "Pengeluaran Kiriman Uang dari Sentral/Giro  Gabungan KPPN Non KBI ke Rekening SUBRKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KPPN KBI Induk",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824124",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening 501.000.000 KPPN Induk ke Bank Operasional I KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Non KCBI",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824125",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening 501.000.000 KPPN Induk ke Bank Operasional II KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Non KCBI",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824126",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening 501.000.000 KPPN Induk ke Sentral Giro/SGG KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Non KCBI",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824127",
         "FIELD2": "Pengeluaran Kiriman Uang dari Bank Operasional III KPPN Non KCBI ke Rekening 501.000.000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KPPN Induk",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824128",
         "FIELD2": "Pengeluaran Kiriman uang dari Rekening Gabungan KPPN Non KBI ke Rekening SUBRKUN KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KBI Induk",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824131",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening BUN ke RPK-BUN-P",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824132",
         "FIELD2": "Pengeluaran Kiriman Uang dari RPK-BUN-P ke BO I KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824133",
         "FIELD2": "Pengeluaran Kiriman Uang dari RPK-BUN-P ke Rekening BUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824134",
         "FIELD2": "Pengeluaran Kiriman Uang dari BO I KPPN ke RPK-BUN-P",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824135",
         "FIELD2": "Pengeluaran kiriman uang dari rekening penerimaan persepsi ke rekening penerimaan sub RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824136",
         "FIELD2": "Pengeluaran kiriman uang dari rekening penerimaan sub RKUN Dit PKN ke rekening KUN dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "rupiah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824137",
         "FIELD2": "Pengeluaran kiriman uang dari rekening penerimaan persepsi  dalam mata uang asing ke",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "rekening KUN valuta USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824141",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening Retur pada Bank Operasional (rekening rr) ke",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Rekening Retur pada Kantor Pusat Bank Operasional (Rekening RR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824142",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening Retur pada Kantor Pusat Bank Operasional (rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "RR) ke Rekening Retur pada Bank Operasional (rekening rr)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824143",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening Retur pada Bank Operasional (rekening rr) ke Rekenin",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Kas Negara pada Bank/Pos Persepsi",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824146",
         "FIELD2": "Pengeluaran pemindahbukuan dari RPK BUN KPPN ke Rekening rr KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824151",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening KUN dalam Rupiah ke Rekening Pengeluaran BI dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Rupiah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824152",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening Pengeluaran BI dalam Rupiah ke Rekening KUN dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Rupiah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824153",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening KUN dalam valuta USD ke Rekening Pengeluaran BI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "dalam USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824154",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening Pengeluaran BI dalam Valuta USD ke Rekening KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "dalam Valuta USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824155",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening KUN dalam Valuta Yen ke Rekening Pengeluaran BI",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "dalam Yen",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824156",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening Pengeluaran BI dalam Valuta Yen ke Rekening KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "dalam Valuta Yen",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "46",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824211",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening Khusus ke KPPN (berdasarkan SPM-LS /SPM-GU",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Isi/SPM Pengganti)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824212",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening Khusus ke Rekening Kantor Pusat Ditjen PBN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "500",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824213",
         "FIELD2": "Pengeluaran Kiriman Uang dari Rekening Khusus ke Rekening BUN 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824214",
         "FIELD2": "Pembetulan Pembukuan Penerimaan Penggantian dari Rekening Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824215",
         "FIELD2": "Pengeluaran dari KPPN ke Rekening Kantor Pusat Ditjen PBN 500.000.000 berdasarkan SPM",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pengganti",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824216",
         "FIELD2": "Pengeluaran Kiriman Uang antar Rekening Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824221",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Kas Umum Negara ke Rekening karena Koreksi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pembebanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824223",
         "FIELD2": "Koreksi Pengeluaran Pemindahbukuan pada Rekening Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824231",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Antara Reksus ke Rekening Kas Umum Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824241",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Reksus ke Rekening KUN dalam rangka penggantian dana",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "talangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824311",
         "FIELD2": "Pengeluaran Pemindahbukuan Intern KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824312",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Bank Tunggal ke Bank Operasional",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824313",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Bank Operasional ke Bank Tunggal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824314",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Bank Operasional (BO) I ke BO II",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824315",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Bank Operasional (BO) II ke BO I",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824316",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Gabungan ke Rekening SUBRKUN KPPN KBI Induk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "dan/atau SUBRKUN KPPN KBI Non Induk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824317",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Bank Tunggal/Operasional I ke Sentral Giro/Sentral Giro",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Gabungan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824318",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Sentral Giro/Sentral Giro Gabungan ke Rekening SUBRKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KPPN KBI Induk dan/atau SUBRKUN KPPN KBI Non Induk",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824321",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Bank Operasional III ke Bank Tunggal/Bank Operasional I",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824322",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Bank Persepsi PBB ke BO III",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824323",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Bank Persepsi BPHTB ke BO III",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824331",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Bank Tunggal ke Bank Operasional I",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824332",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Bank Operasional I ke Bank Tunggal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824333",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Bank Tunggal ke Bank Operasional II",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824334",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Bank Operasional II ke Bank Tunggal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824341",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 502.000000 ke Rekening 600.502411",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824342",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 600.502411 ke Rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824343",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening KUN Rupiah 502.000000 ke Rekening KUN Valuta",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Yen 600.502111",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824344",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening KUN Valuta Yen 600.502111 ke Rekening KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Rupiah 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824345",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening KUN Valuta USD 600.502411 ke Rekening KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Valuta Yen 600.502111",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824346",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening KUN Valuta Yen 600.502111 ke Rekening KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Valuta USD 600.502411",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824351",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 502.000000 ke Rekening RPKBUN P1",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824352",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 502.000000 ke Rekening RPKBUN P2",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824353",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 502.000000 ke Rekening RPKBUN P3",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824354",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening RPKBUN P1 ke Rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824355",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening RPKBUN P2 ke Rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824356",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening RPKBUN P3 ke Rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824361",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 500.000001 ke Rekening 561.000001",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824362",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 500.000001 ke Rekening 561.000002",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824363",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 500.000001 ke Rekening 561.000003",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "47",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824364",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 500.000001 ke Rekening 561.000005",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824365",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 561.000001 ke Rekening 500.000001",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824366",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 561.000002 ke Rekening 500.000001",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824367",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 561.000003 ke Rekening 500.000001",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824368",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 561.000005 ke Rekening 500.000001",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824371",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 502.000000 ke Rekening 500.000001",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824372",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 500.000001 ke Rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824373",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Khusus ke Rekening Antara Reksus dalam rangka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "penggantian SP2D Reksus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824374",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening SUBBUN Talangan ke Rekening Antara Reksus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "karena Reksus Kosong",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824375",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Khusus ke Rekening SUBBUN Talangan dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "rangjka reimbursement",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824376",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening SUBBUN ke Rekening SUBRKUN KPPN No 501",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "karena Reksus Kosong",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824381",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Penerimaan Kuasa BUN Pusat ke Rekening KUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824382",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening KUN dalam Rupiah ke Rekening SAL",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824383",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening SAL ke Rekening KUN dalam Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824384",
         "FIELD2": "Pengeluaran Pemindahbukuan dari RDI Rupiah ke RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824385",
         "FIELD2": "Pengeluaran Pemindahbukuan dari RDI USD ke RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824386",
         "FIELD2": "Pengeluaran Pemindahbukuan dari RDI JPY ke RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824387",
         "FIELD2": "Pengeluaran Pemindahbukuan dari RDI Valas Lainnya ke RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824388",
         "FIELD2": "Pengeluaran Pemindahbukuan dari RPD ke RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824391",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Cadangan ke Rekening Kas Umum Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824392",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Kas BLU ke Rekening Penerimaan (Persepsi) KPPN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824411",
         "FIELD2": "Pengeluaran Pemindahbukuan Penutupan Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824511",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 502.000000 ke Rekening Pemerintah di Bank",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Umum Dalam Rangka Penempatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824512",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Pemerintah di Bank Umum Dalam Rangka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Penempatan  ke rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824513",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Pemerintah di Bank Umum (Sumber Dana Dari",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Rekening Kas SAL) Dalam Rangka Penempatan Ke Rekening BUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824521",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 502.000000 ke Rekening Kas Penempatan dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Rupiah (519.000122)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824522",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Kas Penempatan dalam Rupiah (519.000122) ke",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Rekening 502.000000",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824531",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 600.502411 ke Rekening Kas Penempatan dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "valuta USD (608.001411)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824532",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Kas Penempatan dalam Valuta USD (608.001411)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "ke Rekening 600.502411",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824541",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Pemerintah Lainnya di Bank Indonesia ke Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pemerintah di Bank Umum dalam rangka Penempatan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824542",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening Pemerintah di Bank Umum dalam rangka",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "penempatan ke Rekening Pemerintah Lainnya di Bank Indonesia",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824551",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening No. 600.502111 Rekening Kas Umum Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Dalam Valuta Yen ke Rekening No. 608.000111 Rekening Penempatan Dalam Valuta Yen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824552",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening No. 608.000111 Rekening Penempatan Dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Valuta Yen ke Rekening No. 600.502111 Rekening Kas Umum Negara Dalam Valuta Yen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824561",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 609.000991.980 ke Rekening 519.000124.980",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824562",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening 609.022411.980 ke Rekening 519.000124.980",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824622",
         "FIELD2": "Pengeluaran Pemindahbukuan dalam Rangka Pengelolaan Kelebihan/ Kekurangan Kas",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pemerintah dari  Rek. SBN ke RKUN",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "48",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "824727",
         "FIELD2": "Pengeluaran Pemindahbukuan dari Rekening KUN dalam Valuta Asing Lainnya ke Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Kelolaan TDR dalam Valuta Asing Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825111",
         "FIELD2": "Pengeluaran Uang Persediaan Dana Rupiah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825112",
         "FIELD2": "Pengeluaran  Uang Persediaan Dana Pinjaman/Hibah Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825113",
         "FIELD2": "Pengeluaran  Uang Persediaan Pengguna PNBP (Swadana)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825114",
         "FIELD2": "Pengeluaran Pengembalian Kelebihan Setoran Sisa UP/TUP Tahun Anggaran Yang Lalu",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825115",
         "FIELD2": "Pengeluaran Uang Persediaan Pengembalian (Restitusi) Pajak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825131",
         "FIELD2": "Pengeluaran penyetoran dana hibah langsung yang telah disahkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825312",
         "FIELD2": "Pengeluaran Uang Muka Belanja Barang",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825313",
         "FIELD2": "Pengeluaran Uang Muka Belanja Modal",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825314",
         "FIELD2": "Pengeluaran Uang Muka Belanja Pembayaran Bunga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825315",
         "FIELD2": "Pengeluaran Uang Muka Belanja Subsidi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825316",
         "FIELD2": "Pengeluaran Uang Muka Belanja Hibah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825317",
         "FIELD2": "Pengeluaran Uang Muka Bantuan Sosial",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825318",
         "FIELD2": "Pengeluaran Uang Muka Belanja Lain-Lain",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825321",
         "FIELD2": "Pengeluaran Uang Muka Dana Perimbangan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825322",
         "FIELD2": "Pengeluaran Uang Muka Dana Otonomi Khusus",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825512",
         "FIELD2": "Pengeluaran Tambahan Uang Persediaan (TUP) Dana Pinjaman/Hibah Luar Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825614",
         "FIELD2": "Pengeluaran Escrow Dana Penyertaan Modal Negara (PMN)",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825621",
         "FIELD2": "Pengeluaran Pengembalian Escrow Pajak",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "825622",
         "FIELD2": "Pengeluaran Pengembalian Escrow PNBP",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "826111",
         "FIELD2": "Koreksi Penerimaan Pemindahbukuan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827111",
         "FIELD2": "Pengeluaran Non Anggaran Pihak Ketiga karena kesalahan Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827112",
         "FIELD2": "Pengeluaran Non Anggaran Pihak Ketiga karena retur SP2D Reksus pada KBI dari rekening rr",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "KBI ke Rekening Pihak Ketiga",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827113",
         "FIELD2": "Pengeluaran Non Anggaran kepada Pihak Ketiga Karena Kesalahan Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827122",
         "FIELD2": "Pengeluaran Non Anggaran Pihak Ketiga Pinjaman Program yang ditangguhkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827123",
         "FIELD2": "Pengeluaran Non Anggaran Pihak Ketiga Pinjaman Proyek yang ditangguhkan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827313",
         "FIELD2": "Pengeluaran Pihak Ketiga Migas-Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827318",
         "FIELD2": "Pengeluaran Pihak Ketiga Migas-Fee Penjualan Migas Bagian Negara",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827321",
         "FIELD2": "Pengeluaran Pihak Ketiga Migas Transito Pendapatan PPh Minyak Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827322",
         "FIELD2": "Pengeluaran Pihak Ketiga Migas Transito Pendapatan PPh Gas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827323",
         "FIELD2": "Pengeluaran Pihak Ketiga Migas Transito Pendapatan PPh Migas Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827324",
         "FIELD2": "Pengeluaran Pihak Ketiga Migas Transito Pendapatan Minyak Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827325",
         "FIELD2": "Pengeluaran Pihak Ketiga Migas Transito Pendapatan Gas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827326",
         "FIELD2": "Pengeluaran Pihak Ketiga Migas Transito Pendapatan PBB Minyak Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827327",
         "FIELD2": "Pengeluaran Pihak Ketiga Migas Transito Pendapatan PPN Dalam Negeri",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827328",
         "FIELD2": "Pengeluaran Pihak Ketiga Migas Transito Pendapatan PPh Pasal 23",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827421",
         "FIELD2": "Pengeluaran Pihak Ketiga Panas Bumi Transito Pendapatan PBB Pertambangan Panas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827422",
         "FIELD2": "Pengeluaran Pihak Ketiga Panas Bumi Transito Pendapatan Setoran Bagian Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pertambangan Panas Bumi",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827429",
         "FIELD2": "Pengeluaran Pihak Ketiga Transito Pendapatan Setoran Bagian Pemerintah",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Pertambangan/Perikanan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827615",
         "FIELD2": "Pengeluaran Non Anggaran dalam rangka Transaksi SBN dari Rekening Transaksi SBN dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Valuta Asing Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827619",
         "FIELD2": "Pengeluaran Non Anggaran dalam rangka Transaksi Penempatan di Bank Umum dari Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Kelolaan TDR dalam Valuta Asing Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827623",
         "FIELD2": "Pengeluaran Non Anggaran dalam rangka Transaksi SBN dari  Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Rupiah Valuta Yen",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827625",
         "FIELD2": "Pengeluaran Non Anggaran dalam rangka Transaksi SBNTransaksi Reverse Repo dari Rekening",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Transaksi SBN dalam Valuta Asing Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827629",
         "FIELD2": "Pengeluaran Non Anggaran dalam rangka Transaksi SBN dari Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Valuta Asing Lainnya",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "Hal :",
         "FIELD3": "49",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "KODE AKUN (BAGAN AKUN STANDAR)",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827633",
         "FIELD2": "Pengeluaran Non Anggaran dalam rangka Transaksi Reverse Repo dari Rekening Kelolaan TDR",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "dalam Rupiah Valuta Yen",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827639",
         "FIELD2": "Pengeluaran Non Anggaran dalam rangka Transaksi Reverse Repo dari Rekening Kelolaan TDR",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "dalam Valuta Asing Lainnya",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827641",
         "FIELD2": "Pengeluaran Non Anggaran dalam rangka Transaksi Repo dari Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Rupiah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827642",
         "FIELD2": "Pengeluaran Non Anggaran dalam rangka Transaksi Repo dari Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Valuta USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827643",
         "FIELD2": "Pengeluaran Non Anggaran dalam rangka Transaksi Repo dari Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Rupiah Valuta Yen",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827644",
         "FIELD2": "Pengeluaran Non Anggaran dalam rangka Transaksi Repo dari Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Valuta Euro",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827649",
         "FIELD2": "Pengeluaran Non Anggaran dalam rangka Transaksi Repo dari Rekening Kelolaan TDR dalam",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Valuta Asing Lainnya",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827651",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR Rupiah terhadap Valuta USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827652",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR Rupiah terhadap Valuta Yen",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827653",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR Rupiah terhadap Valuta Euro",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827659",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR Rupiah terhadap Valuta Asing Lainnya",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827661",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta USD terhadap Rupiah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827662",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta USD terhadap Valuta Yen",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827663",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta USD terhadap Valuta Euro",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827669",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta USD terhadap Valuta Asing Lainnya",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827671",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Yen terhadap Rupiah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827672",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Yen terhadap Valuta USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827673",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Yen terhadap Valuta Euro",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827679",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Yen terhadap Valuta Asing Lainnya",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827681",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Euro terhadap Rupiah",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827682",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Euro terhadap Valuta USD",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827683",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Euro terhadap Valuta Yen",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827689",
         "FIELD2": "Pengeluaran Non Anggaran dalam Rangka Transaksi Foreign Exchange dari Rekening Kelolaan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "TDR dalam Valuta Euro terhadap Valuta Asing Lainnya",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "827911",
         "FIELD2": "Pengeluaran Non Anggaran Pihak Ketiga karena kesalahan Sistem Perbankan",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "831111",
         "FIELD2": "Output Kinerja",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "",
         "FIELD2": "",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       },
       {
         "FIELD1": "Hal :",
         "FIELD2": "50",
         "FIELD3": "",
         "FIELD4": "",
         "FIELD5": null
       }
      ]');

    $this->load->model(array('Akuns', 'KlasifikasiAkuns'));
    $ac = '';
    foreach ($lines as $line) {
      switch (strlen ($line->FIELD1)) {
        case 2:
          $ac = $this->KlasifikasiAkuns->save(array(
            'kode' => $line->FIELD1,
            'nama' => $line->FIELD2
          ));
          break;
        case 6:
          $this->Akuns->save(array(
            'klasifikasi_akun' => $ac,
            'kode' => $line->FIELD1,
            'nama' => $line->FIELD2
          ));
          break;
        default:break;
      }
    }

  }

  function down () {
    $this->db->query("DROP TABLE `akun`");
    $this->db->query("DROP TABLE `klasifikasi_akun`");
  }

}