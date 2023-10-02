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
    if ($this->input->post()) {
      // code...
      $form = $this->input->post('form');
      switch ($form) {
        case 'remove':
          // code...
        if($result = $this->workers_model->remove($this->input->post('id'))){
          echo json_encode(array('status'=>true,'msg'=>'Successfully remove.'));
        }else{
          echo json_encode(array('status'=>true,'msg'=>'Nothing to remove.'));

        }
        
          break;
        
        default:
          // code...
        echo json_encode(noinput());
          break;
      }
      exit();
    }
    $data = new stdClass();

    $data->centers = $this->centers_model->getCenters();
    $data->workers = $this->workers_model->list_active_Workers();
    $data->all_workers = $this->workers_model->list_all_Workers();
    $data->schoolyears = $this->settings_model->listschoolyears();
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
          echo savesuccess(1);
        }else{
          echo saveError(1);

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

    public function list_workers($value='')
    {
      // code...
      if($result = $this->workers_model->list_inactive_Workers()){
          $data = array();
        foreach ($result as $key => $value) {
          // code...
          $data[] = array(
            'text'=>$value->worker_name,
            'value'=>$value->worker_id

          );
        }
          echo json_encode(array('status'=>true,'data'=>$data));

       
      }else{
          echo json_encode(array('status'=>false,'data'=>array('text'=>'No data','value'=>0)));
        }

    }
    public function listall($type=0,$center=0)
    {
      if (isset($_GET['type'])) {
        // code...
        $type = $_GET['type'];
      }
      if ($type == 1) {
        // code...

            if ($all_workers = $this->workers_model->list_active_Workers()) {
              // code...
              foreach ($all_workers as $key => $value) {
                // code...
               $data[] = array(
                  $value->worker_id,
                  $value->worker_name,
                  $value->worker_address,
                  $value->center_name,
                  $value->job_status,
                  tomdy($value->class_start),
                  tomdy($value->class_end),
                  $value->class_status,
                  $value->total_students,
                  '<button class="btn btn-default bt-sm btn-trash" data-id="'.$value->worker_id.'" type="button"><i class="fas fa-trash"></i></button>'
                ); 

              }
              echo json_encode(array('data'=>$data));
            }else{
              echo json_encode(array('data'=>array()));

            }

      }else{


    if ($all_workers = $this->workers_model->list_all_Workers()) {
      // code...
      foreach ($all_workers as $key => $value) {
        // code...
       $data[] = array(
          $value->worker_id,
          $value->worker_name,
          $value->worker_address,
          $value->center_name,
          $value->job_status,
          '',
          '',
          '',
          '',
          '<button class="btn btn-default bt-sm btn-trash" data-id="'.$value->worker_id.'" type="button"><i class="fas fa-trash"></i></button>'
        ); 

      }
      echo json_encode(array('data'=>$data));
    }else{
      echo json_encode(array('data'=>array()));

    }

      }

    }
 } ?>

