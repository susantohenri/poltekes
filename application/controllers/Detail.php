<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends MY_Controller {

	function readList ($uuid) {
		redirect (site_url("Detail/read/{$uuid}"));
	}

}