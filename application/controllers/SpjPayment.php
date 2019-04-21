<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SpjPayment extends MY_Controller {

  function read ($id) {
    $data = array();
    $data['page_name'] = 'form';
    $model = $this->model;
    $data['form'] = $this->$model->getForm($id);
    $data['subform'] = $this->$model->getFormChild($id);
    $data['uuid'] = $id;

    $record = $this->{$this->model}->findOne($id);
    $this->loadview('index', $data);
  }

  public function index () {
    $model = $this->model;
    if ($post = $this->$model->lastSubmit($this->input->post())) {
      if (isset ($post['delete'])) $this->$model->delete($post['delete']);
      else {
          $db_debug = $this->db->db_debug;
          $this->db->db_debug = FALSE;

          if (strpos($_SERVER['HTTP_REFERER'], '/readList/') > -1) {
            $this->load->model('Details');
            $result = $this->Details->updateByList($post);
          } else $result = $this->$model->save($post);

          $error = $this->db->error();
          $this->db->db_debug = $db_debug;
          if (isset ($result['error'])) $error = $result['error'];
          if(count($error)){
              $this->session->set_flashdata('model_error', $error['message']);
              redirect(site_url('Spj'));
          }
      }
      redirect(site_url('Spj'));
    } else redirect(site_url('Spj'));
  }

  function create ($spj = null) {
    $model= $this->model;
    $vars = array();
    $vars['page_name']= 'form';
    $vars['form']     = $this->$model->getForm();
    if (!is_null($spj)) {
      $this->load->model('Spjs');
      $record = $this->Spjs->findOne($spj);
      $vars['form'][0]['options'][] = array(
        'value' => $spj,
        'text' => $record['uraian']
      );
      $vars['form'][0]['value'] = $spj;
    }
    $vars['subform'] = $this->$model->getFormChild();
    $vars['uuid'] = '';
    $this->loadview('index', $vars);
  }

  function cetak ($uuid) {
    $xlsx = 'report/KWITANSI.xlsx';
    $this->load->library('PHPExcel');
    try {
        $objPHPExcel = PHPExcel_IOFactory::load($xlsx);
    } catch(Exception $e) {
        die('Error loading file :' . $e->getMessage());
    }

    $data = $this->SpjPayments->getKwitansi($uuid);
    $lampirans = array_filter($data, function ($label) {
      return strpos($label, 'Lampiran ') > -1;
    }, ARRAY_FILTER_USE_KEY);

    reset($lampirans);
    $key = key($lampirans);
    $starting_lamp = $lampirans[$key]['row'];

    $objPHPExcel->getActiveSheet()->insertNewRowBefore($starting_lamp + 1, count($lampirans));

    $cell_total_lampiran = $data['Total Lampiran'];
    $objPHPExcel->getActiveSheet()->getStyle("I{$cell_total_lampiran['row']}")->applyFromArray(array(
      'borders' => array(
        'top' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN
        )
      )
    ));

    foreach ($data as $rplcmt) $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($rplcmt['col'], $rplcmt['row'], $rplcmt['value']);

    $objPHPExcel->setActiveSheetIndex(0);
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    header('Content-Disposition: attachment;filename="Kwitansi.xlsx"');
    $objWriter->save("php://output");
  }

}