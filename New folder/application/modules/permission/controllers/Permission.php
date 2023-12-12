<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permission extends MY_Controller
  {

  public function __construct()
  {
    // code...
    parent::__construct();

  }
  public function deny($value='')
  {
    // code...
//    echo "Your not allowed in this page. <a href='".site_url()."'>Go to home page.</a>";
    $data = new stdClass();
    $data->content = 'permission/deny';
    $this->template->dashboard($data);
    //$this->load->view('deny');
  }

}