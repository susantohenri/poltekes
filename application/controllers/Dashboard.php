<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function index () {
    $vars = array();
    $vars['page_name'] = 'dashboard';
    $vars['penyerapanAnggaran'] = $this->{$this->model}->penyerapanAnggaran();
    $vars['gauge'] = $this->{$this->model}->gauge();
    $vars['komposisiRealisasi'] = $this->{$this->model}->komposisiRealisasi();
    $vars['komposisiAlokasi'] = $this->{$this->model}->komposisiAlokasi();
    $this->loadview('index', $vars);
	}

}