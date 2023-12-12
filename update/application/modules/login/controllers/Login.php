<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
  {

  public function __construct()
  {
    // code...
    parent::__construct();
    $this->load->library("Aauth");

    }

  public function index() {
   $data = new stdClass();

    if ($this->input->post()) {
      // code...
      if($this->aauth->login($this->input->post('userName'),$this->input->post('passWord'))){
        $userId = $this->session->userdata('id');
        $workersId = $this->workers_model->getWorkerId($userId);
        $this->session->set_userdata('workersId',$workersId);
        if (!empty($_GET['url'])) {
          // code...
          redirect($url);
        }
        redirect('dashboard');
      }
      $data->errors = $this->aauth->get_errors_array();
    }
   $this->load->view('index',$data);

  }
    function signout($value='')
  {
    // code...
    $this->aauth->logout();
    redirect(site_url());
  }


}