<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iassess extends MY_Controller
{
    function __construct  ()
  {
    // code...
    parent::__construct ();

    $this->load->library("Aauth");

    if (!$this->aauth->is_loggedin()) {
      // code...
      redirect('login?url='.current_url());
    }
    $this->user_id= $this->session->userdata('id');
    if(!$this->aauth->is_member('iassess',$this->user_id) || !$this->aauth->is_admin($this->user_id) ) {
      redirect('permission/deny');
    }
    

  }

  public function index() {

   $data = new stdClass();
   $data->content = 'iassess/index';
   $data->title = 'Iassess';
   $data->subtitle = 'Dashboard';
   $data->totalPupils = $this->pupils_model->getCountAll(0,0);
   $data->totalWorker = $this->workers_model->getCountAll();
   $data->totalCenter = $this->centers_model->getCountAll();

   $this->template->iassess($data);



  }
  public function center($value='')
  {
    // code...

    $data = [
      'title' => 'ECCD | iASSESS',
    ];
    $this->load->view('_layout2/admin/header',$data);
    $this->load->view('_layout2/admin/topbar');
    $this->load->view('_layout2/admin/sidebar');
    $this->load->view('center', $data);
    $this->load->view('_layout2/admin/footer');
    $this->load->view('_layout2/admin/_js');
  }
  public function students($value='')
  {

    $data = [
      'title' => 'ECCD | iASSESS',
    ];
    $this->load->view('_layout2/admin/header',$data);
    $this->load->view('_layout2/admin/topbar');
    $this->load->view('_layout2/admin/sidebar');
    $this->load->view('students', $data);
    $this->load->view('_layout2/admin/footer');
    $this->load->view('_layout2/admin/_js');
  }
  public function workers($value='')
  {
    // code...

    $data = [
      'title' => 'ECCD | iASSESS',
    ];
    $this->load->view('_layout2/admin/header',$data);
    $this->load->view('_layout2/admin/topbar');
    $this->load->view('_layout2/admin/sidebar');
    $this->load->view('workers', $data);
    $this->load->view('_layout2/admin/footer');
    $this->load->view('_layout2/admin/_js');
  }

  public function logout() {
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('role');
    $this->session->unset_userdata('id');
    $this->session->sess_destroy();
    redirect('home');
  }

}