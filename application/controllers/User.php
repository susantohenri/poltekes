<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	function dashboard () {
    $vars = array();
    $vars['page_name'] = 'dashboard';

    $this->load->model(array('Programs', 'AkunPrograms'));
    $vars['gauge'] = $this->Programs->gauge();
    $vars['komposisiRealisasi'] = $this->AkunPrograms->komposisiRealisasi();
    $vars['komposisiAlokasi'] = $this->AkunPrograms->komposisiAlokasi();

    $this->loadview('index', $vars);
	}

}