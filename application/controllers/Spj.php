<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spj extends MY_Controller {

  public function index () {
    $model = $this->model;
    if ($post = $this->$model->lastSubmit($this->input->post())) {
      if (isset ($post['delete'])) $this->$model->delete($post['delete']);
      else if (isset ($post['verification'])) $this->$model->verify($post['verification']);
      else if (isset ($post['unverification'])) $this->$model->unverify($post['unverification'], $post['unverify_reason']);
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
              redirect($this->controller);
          }
      }
    }
    $vars = array();
    $vars['page_name'] = 'table';
    // $vars['records'] = $this->$model->find();
    $vars['thead'] = $this->$model->thead;
    $this->loadview('index', $vars);
  }

  function create ($detail = null) {
    $model= $this->model;
    $vars = array();
    $vars['page_name'] = 'form';
    $vars['form']     = $this->$model->getForm();
    if (!is_null($detail)) {
      $this->load->model('Details');
      $record = $this->Details->findOne($detail);
      $vars['form'][0]['options'][] = array(
        'value' => $detail,
        'text' => $record['uraian']
      );
      $vars['form'][0]['value'] = $detail;
    }
    $vars['subform'] = $this->$model->getFormChild();
    $vars['uuid'] = '';
    $this->loadview('index', $vars);
  }

  function read ($id) {
    $data = array();
    $data['page_name'] = 'form';
    $model = $this->model;
    $data['form'] = $this->$model->getForm($id);
    $data['subform'] = $this->$model->getFormChild($id);
    $data['uuid'] = $id;

    $spj = $this->Spjs->findOne($id);
    $status = $this->Spjs->getStatus($spj);
    $isMine = $this->Spjs->isMine($id);
    $isCreator = $this->session->userdata('jabatan') === $this->Spjs->getJabatanCreator($id);

    $this->load->model('Permissions');
    $data['permission'] = $this->Permissions->getPermissions();
    if ('verified' !== $spj['global_status']) unset($data['permission'][array_search('create_SpjPayment', $data['permission'])]);

    switch ($status) {
      case 'unverifiable':
      case 'verified':
        unset($data['permission'][array_search('update_Spj', $data['permission'])]);
        unset($data['permission'][array_search('delete_Spj', $data['permission'])]);
        break;
      case 'verifiable':
        if (!$isMine) {
          unset($data['permission'][array_search('update_Spj', $data['permission'])]);
          unset($data['permission'][array_search('delete_Spj', $data['permission'])]);
        }
        if (!$isCreator) $data['permission'][] = 'unverify_Spj';// creator ndak boleh unverify
        $data['permission'][] = 'verify_Spj';
        break;
      default: $data['permission'] = array();
    }

    $this->loadview('index', $data);
  }

  function verify ($uuid) {
    $vars = array();
    $vars['page_name'] = 'confirm-verification';
    $vars['uuid'] = $uuid;
    $this->loadview('index', $vars);
  }

  function unverify ($uuid) {
    $vars = array();
    $vars['page_name'] = 'confirm-unverification';
    $vars['uuid'] = $uuid;
    $this->loadview('index', $vars);
  }

  function getReason ($uuid) {
    $record = $this->Spjs->findOne($uuid);
    echo $record['unverify_reason'];
  }

  function kwitansi ($uuid) {
    $xlsx = 'report/KWITANSI.xlsx';
    $this->load->library('PHPExcel');
    try {
        $objPHPExcel = PHPExcel_IOFactory::load($xlsx);
    } catch(Exception $e) {
        die('Error loading file :' . $e->getMessage());
    }

    $data = $this->Spjs->getKwitansi($uuid);
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