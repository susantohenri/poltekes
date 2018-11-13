<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	function dashboard () {
    $vars = array();
    $vars['page_name'] = 'dashboard';
    $this->loadview('index', $vars);
	}

}