<?php 

/**
  * 
  */
 class Workers extends MY_Controller
 {
  private $workersId;
  function __construct()
  {
    // code...
    parent::__construct();
   
    if (!$this->aauth->is_loggedin()) {
      // code...
      redirect('login?url='.current_url());
    }
    $this->workersId = $this->session->userdata('workersId');
    /*
    if (!$this->aauth->is_admin()) {
      // code...
      redirect('permission/deny');
    }
    */
    $this->load->model('centers/centers_model');
    $this->load->model('settings/settings_model');
    $this->load->model('workers_model');
  }
  public function index()
  {

    $data = new stdClass();

    $data->centers = $this->centers_model->getCenters();
    $data->workers = $this->workers_model->getWorkers();
    $data->content = 'workers/index';

    $this->template->dashboard($data);

  }
  public function add($value='')
  {
    // code...
      $data2 = new stdClass();


      $data2->fName = $this->input->post('firstName');
      $data2->mName = $this->input->post('middleName');
      $data2->lName = $this->input->post('lastName');
      $data2->ext = $this->input->post('ext');
      $data2->address = $this->input->post('address');
      $data2->centerId = $this->input->post('centerId');
      $data2->userId = $this->aauth->create_user($this->input->post('email'),'123456');
      
        if($result = $this->workers_model->save($data2)){
          echo json_encode(savesuccess());
        }else{
          echo json_encode(showresponse(2));

        }
          
        


  }
  public function add2()
  {
    // code...
    if ($this->input->post()) {
      // code...
      $data = new stdClass();


      $data->fName = $this->input->post('firstName');
      $data->mName = $this->input->post('middleName');
      $data->lName = $this->input->post('lastName');
      $data->ext = $this->input->post('ext');
      $data->address = $this->input->post('address');
      $data->centerId = $this->input->post('centerId');
      $data->email = $this->input->post('email');

    $this->form_validation->set_rules('firstName','First Name','required');
    $this->form_validation->set_rules('email','Email','required');
    $this->form_validation->set_rules('lastName','Last Name','required');
    $this->form_validation->set_rules('address','Address','required');

    $this->form_validation->set_rules('centerId','Center','required');

      // code...

    if ($this->form_validation->run() === false) {
    $data = new stdClass();
    $data->content = 'workers/index';
    $data->action = 'add';

    $this->template->dashboard($data);

    }else{
      $result = $this->workers_model->save($data);
      if ($result['status'] == true) {
        // code...
       // echo $result['msg'];
          $data->msg = $result['msg'];
          $data->content = 'workers/index';
          $this->template->dashboard($data);


      }else{
          $data->hasErrors = '<div class="alert alert-danger">'.$result['msg'].'</div>';
            $data->action = 'add';
            $data->content = 'workers/index';

            $this->template->dashboard($data);

      }

    }
    }else{
      redirect('centers');
    }
  }

  public function removeuser($value='')
  {
    // code...
    //$this->aauth->delete_user(5);
    //$this->aauth->delete_user(6);
  }
  public function profile($workersId=false)
  {
    // code...
    if (!$workersId) {
      // code...
      redirect(dashboard);
    }
    $data = new stdClass();

    $data->info = $this->workers_model->getWorker($workersId);
    if (!empty($data->info)) {
      // code...
      $data->info->profile = profile($data->info);
    }

    $data->schoolyears = $this->settings_model->listschoolyears();
    $data->myschoolyear = $this->workers_model->listmyschoolyear($workersId);
    //$data->YearId = $_GET['year'];

    $data->sidebarcollapse = true;
    $data->active=null;
    $data->content = 'workers/profile';

    $this->template->dashboard($data);

  }

    public function addtomyschoolyear($data='')
    {
      // code...
      if ($this->input->post()) {
        // code...
        $data = new stdClass();
        //$data->workersId = $this->workersId;
        $data->workersId = $this->input->post('workersId');
        $data->YearId = $this->input->post('schoolyears');
        $result = $this->workers_model->addtomyschoolyear($data);
        echo json_encode($result);
        exit();
      }
      echo json_encode(array('status'=>false,'data'=>'No input data.'));

    }
 } ?>

