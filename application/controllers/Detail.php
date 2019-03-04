<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends MY_Controller {

	function getSisaPagu ($detail, $spj = false) {
		echo $this->{$this->model}->getSisaPagu($detail, $spj);
	}

}