<?php 

/**
  * 
  */
 class Centers extends MY_Controller
 {
 	
 	function __construct()
 	{
 		// code...
 		parent::__construct();
    $this->load->model('centers/centers_model');
    $this->load->model('students/students_model');
    $this->load->model('workers/workers_model');
 	}
 	public function index()
 	{
 		// code...
    if ($this->input->post()) {
      // code...
      $postdata =$this->input->post();
      $form=$postdata['form'];
      unset($postdata['form']);
      switch ($form) {
        case 'add':
          // code...
        $this->add();
          break;

          case 'edit':
          $this->edit();
          break;
        
        case 'remove':
          // code...
        echo json_encode($this->remove($postdata['id']));
          break;
        
        default:
          // code...
        echo json_encode(noinputdata());
          break;
      }
      exit();
    }


    $centers = $this->centers_model->getAll();
 		$data = new stdClass();
    $data->centers = $centers;
 		$data->content = 'centers/index2';

    $this->template->dashboard($data);

 	}
  public function add()
  {
    // code...
    if ($this->input->post()) {
      // code...
      $data = new stdClass();
    $centers = $this->centers_model->getAll();
    $data->centers = $centers;

      $data->centerName = $this->input->post('centerName');
      $data->centerAddress = $this->input->post('centerAddress');
      $data->barangay = $this->input->post('barangay');


    $this->form_validation->set_rules('centerName','Name of Center','required');
    $this->form_validation->set_rules('centerAddress','Address','required');

      // code...

    if ($this->form_validation->run() === false) {
        echo json_encode(array('status'=>false,'msg'=>"Please complete all required form."));
    }else{


      if($result = $this->centers_model->save($data)){
        echo json_encode(savesuccess());


      }else{
        echo json_encode(array('status'=>false,'msg'=>'No data was added.'));
      }

    }
    }else{
      redirect('centers');
    }
  }

  public function edit()
  {
    // code...
  
    // code...
    if ($this->input->post()) {
      // code...
      $data = new stdClass();
      $data->centerId = $this->input->post('centerId');
      $data->centerName = $this->input->post('centerName');
      $data->centerAddress = $this->input->post('address');
      $data->barangay = $this->input->post('barangay');


    $this->form_validation->set_rules('centerName','Name of Center','required');
    $this->form_validation->set_rules('address','Address','required');

      // code...

    if ($this->form_validation->run() === false) {
        echo json_encode(array('status'=>false,'msg'=>"Please complete all required form."));
    }else{


      $result = $this->centers_model->save($data);
      if ($result['status'] == true) {
          // code...
        
        echo json_encode(update());


      }else{
        echo json_encode($result);
      }

    }
    }

  }
  public function remove($id)
  {
    // code...
    $this->centers_model->remove($id);
  }
  public function listall()
  {
    // code...

       //$data->totalPupils = $this->pupils_model->getCountAll(0,0);
       //$data->totalWorker = $this->workers_model->getCountAll();
    if($centers = $this->centers_model->getAll_v()){
        $data = array();
      foreach ($centers as $key => $value) {
        // code...

       // $students = $this->students_model->countAll($value->centerId);
        // $workers= $this->workers_model->getCountAll($value->centerId);
        $data[] = array(
          $value->center_id,
          $value->center_name,
          $value->barangay,
          $value->center_address,
          $value->worker_name,
          $value->total_students,
          '<button class="btn btn-default bt-sm btn-edit-centers" data-id="'.$value->center_id.'" type="button"><i class="fas fa-edit"></i></button> <button class="btn btn-default bt-sm btn-trash" data-id="'.$value->center_id.'" type="button"><i class="fas fa-trash"></i></button>'
        ); 
      }
      echo json_encode(array('data'=>$data));

    }else{

    echo json_encode(array('data'=>array()));
    }

  }

 } ?>

