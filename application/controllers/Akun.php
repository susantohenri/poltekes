<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends MY_Controller {

  function cetak ($uuid) {
    $xlsx = 'report/SPTJ.xlsx';
    $this->load->library('PHPExcel');
    try {
        $objPHPExcel = PHPExcel_IOFactory::load($xlsx);
    } catch(Exception $e) {
        die('Error loading file :' . $e->getMessage());
    }

    $data = $this->Akuns->getSPTJ($uuid);
    foreach ($data as $rplcmt) $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($rplcmt['col'], $rplcmt['row'], $rplcmt['value']);

    $objPHPExcel->setActiveSheetIndex(0);
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    header('Content-Disposition: attachment;filename="SPTJ.xlsx"');
    $objWriter->save("php://output");
  }

}