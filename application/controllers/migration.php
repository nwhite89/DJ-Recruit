<?php if ( ! defined('BASEPATH')) exit("No direct script access allowed");

class Migration extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('migration');
    $this->migration->current();
  }

  public function index()
  {
    if(!$this->migration->latest()) 
    {
      show_error($this->migration->error_string());
    }
  }
}
