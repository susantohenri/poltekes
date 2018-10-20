<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OutputPrograms extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'output_program';
  }

}