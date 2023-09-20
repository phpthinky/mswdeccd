<?php   /**
 * 
 */
class Students extends MY_Controller
{
  private $workersId;
  function __construct()
  {
    // code...
    parent::__construct();
    if(!$this->aauth->is_loggedin()){
      redirect('login?url='.current_url());
    }
    $this->workersId = $this->session->userdata('workersId');
    $this->load->model('students/students_model');
    $this->load->model('settings/settings_model');
  }
  public function index($value='')
  {
    // code...

    $data = new stdClass();
      if(!empty($_GET['worker'])){
        $workersId = $_GET['worker'];
      }
      $this->workersId = $workersId;
      $YearId = $_GET['year'];
      $data->YearId = $YearId;

      $centerId = $this->workers_model->getMyCenterId($this->workersId);
      $data->liststudents = $this->students_model->listAllnotenroll($YearId,$this->workersId);
      $data->centerId = $centerId;
      $data->workersId = $this->workersId;
    
      $data->classess = $this->workers_model  ->getStartEndClassess($YearId); 

    $data->content = 'students/index';
    $this->template->dashboard($data);

  }
  public function add()
  {
    // code...
    if ($this->aauth->is_admin()) {
      // code...
      echo json_encode(array('status'=>false,'msg'=>'Invalid permission.'));
    }
    if ($this->input->post()) {
      // code...


    $this->form_validation->set_rules('firstName','First Name','required');
    $this->form_validation->set_rules('lastName','Last Name','required');
    $this->form_validation->set_rules('birthDate','Birthday','required');
    $this->form_validation->set_rules('sector','Sector','required');
    $this->form_validation->set_rules('address','Residential Address','required');
    $this->form_validation->set_rules('gender','Gender','required');
    
    if ($this->form_validation->run() === false) {
      // code...
      echo json_encode(array('status'=>false,'msg'=>htmlentities(validation_errors())));
      exit();
    }else{

    $data = new stdClass();
    $data->fName = $this->input->post('firstName');
    $data->mName = $this->input->post('middleName');
    $data->lName = $this->input->post('lastName');
    $data->ext = $this->input->post('ext');
    $data->birthDate = $this->input->post('birthDate');
    $data->gender = $this->input->post('gender');
    $data->sector = $this->input->post('sector');
    $data->address = $this->input->post('address');
    
    $data->centerId = $this->input->post('centerId');
    $data->workersId = $this->input->post('workersId');


      if($this->pupils_model->if_nameexist($data)){
      echo json_encode(recordexist());
       }else{

        $StudentId = $this->students_model->save($data);

        if($StudentId > 0){
          $data2 = new stdClass();
          $data2->YearId =  $this->input->post('YearId');
          $data2->StudentId = $StudentId;
          $data2->StudentType = $this->input->post('StudentType');
          $data2->workersId = $this->input->post('workersId');
          $data2->Status = 1;
          $this->workers_model->addtomystudent($data2);
              echo json_encode(savesuccess());
              exit();
        }else{
              echo json_encode(unknownerror());
              exit();
        }

      }

   }

      exit();
    }
    echo json_encode(noinput());
  }
    public function profile($id) {
   

    $data = new stdClass();

      $centerId = $this->workers_model->getMyCenterId($this->workersId);
      $result = $this->weighing_model->listschedules($centerId);
      if (!empty($result)) {
        //$data->listschedules =
        $arr = array();
        foreach ($result as $key => $value) {
          // code...
          if (!$this->weighing_model->check($id,$value->weighingSchedule)) {
            // code...

            $arr[] = (object)array(
              'id'=>$value->scheduleId,
              'date'=>tomdy($value->weighingSchedule)
            );

          }
         } 
         $data->listschedules = $arr;

      }

  
    $data->id = $id;
    if($result = $this->pupils_model->get($id)){
      foreach ($result as $key => $value) {
        // code...
        $data->$key = $value;
      }
      $data->age = getAge($data->birthDate);
         $data->height = $this->weighing_model->getHeight($id);
         $data->weight = $this->weighing_model->getWeight($id);
    }
    $data->weighing = $this->weighing_model->get($id);

    //$data->has_charts = true;

    $data->content = 'students/student-profile';
    $this->template->dashboard($data);


  }
  public function addstudentweighing($value='')
  {
    // code...
    if ($this->input->post()) {
      // code...


      $postdata = $this->input->post();

        $centerId = $this->workers_model->getMyCenterId($this->workersId);
        $scheduleId = $this->settings_model->getweighingid($postdata['dateOfWeighing'],$centerId);

      if(!$this->weighing_model->check($postdata['pupilsId'],$scheduleId)){
        
        $data =  new stdClass();
        $data->pupilsId = $postdata['pupilsId'];
        $data->weight = $postdata['weight'];
        $data->height = $postdata['height'];
        $data->scheduleId = $scheduleId;
        /*
        $data->wfa = $postdata['wfa'];
        $data->hfa = $postdata['hfa'];
        $data->wfh = $postdata['wfh'];
          */
        //$data->scheduleId = $postdata['scheduleId'];
        $result = $this->weighing_model->add($data);
        echo json_encode(showresponse($result));
      }else{
        echo json_encode(showresponse(3));
      }

    }else{
      echo json_encode(noinput());
    }
  }

  public function addstudentfeeding($value='')
  {
    // code...
    if ($this->input->post()) {
      // code...


      $postdata = $this->input->post();
      $feeding_date = $postdata['feeding_date'];

      if(!$this->settings_model->checkfeeding(array('pupils_id'=>$postdata['pupilsId'],'feeding_date'=>$feeding_date))){
        
        $data =  new stdClass();
        $data->pupils_id = $postdata['pupilsId'];
        $data->foods = $postdata['foods'];
        $data->drinks = $postdata['drinks'];
        $data->feeding_date = $feeding_date;

        $result = $this->settings_model->addstudentfeeding($data);
        echo json_encode(showresponse($result));
      }else{
        echo json_encode(showresponse(3));
      }

    }else{
      echo json_encode(noinput());
    }
  }
public function edit($id='')
{
  // code...
  $data = new stdClass();
    $data->content = 'students/edit';
    $this->template->dashboard($data);
}
public function listmystudents($yearId='',$worker='')
{
  // code...

      if(!empty($worker)){
      $this->workersId = $worker;
      }
    if($result = $this->students_model->listmystudents($yearId,$this->workersId)){

      $data = array();
      foreach ($result as $key => $value) {
        // code...
        $age = getAge($value->birthDate);
        $age = $age->y.' year -'.$age->m.' month';
        $data[] = array(
          $value->id,
          $value->studentName,
          $age,
          gender($value->gender),
          $value->address,
          studtype($value->StudentType),
          '<a href="'.site_url('students/profile/'.$value->id).'" class="btn btn-sm btn-info" title="Edit user information"><i class="fas fa-user"></i></a> <a title="Remove this student" href="'.site_url('students/remove/'.$value->id).'" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>'
        );
      }
      echo json_encode(array('data'=>$data));

    }else{
      echo json_encode(array('data'=>array()));
    }

}
public function listbyclassess($yearId='',$worker='')
  {
    // code...

      if(!empty($worker)){
      $this->workersId = $worker;
      }
    if($result = $this->students_model->listbyclassess($yearId,$this->workersId)){

      $data = array();
      foreach ($result as $key => $value) {
        // code...
        $weight = $this->weighing_model->getWeight($value->id);
        $height = $this->weighing_model->getHeight($value->id);
        $data[] = array(
          $value->id,
          $value->studentName,
          $weight,
          $height,
          0,
          0,
          0,
          '<a href="'.site_url('students/profile/'.$value->id).'" class="btn btn-sm btn-info" title="Edit user information"><i class="fas fa-user"></i></a> <a title="Remove this student" href="'.site_url('students/remove/'.$value->id).'" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>'
        );
      }
      echo json_encode(array('data'=>$data));

    }else{
      echo json_encode(array('data'=>array()));
    }

  }
  public function addstudenttomylist($value='')
  {
    // code...
    $postdata = $this->input->post();
    $postdata['workersId'] = $this->workersId;
    if (!empty($postdata['StudentId'])) {
      // code...
    $result = $this->workers_model->addtomystudent($postdata);

    }else{
      echo json_encode(array('status'=>false,'msg'=>'No student selected.'));
    }
    //echo json_encode($postdata);
  }


    function listbyclassessassessment($yearId='',$worker="")
  {
    // code...

      if(!empty($worker)){
      $this->workersId = $worker;
      }

    if($result = $this->students_model->listbyclassess($yearId,$this->workersId)){

      $data = array();
      foreach ($result as $key => $value) {
        // code...
        $data[] = array(
          $value->id,
          $value->studentName,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          '<a href="'.site_url('students/profile/'.$value->id).'" class="btn btn-sm btn-info" title="Edit user information"><i class="fas fa-user"></i></a> <a title="Remove this student" href="'.site_url('students/remove/'.$value->id).'" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>'
        );
        
      }
      echo json_encode(array('data'=>$data));

    }else{
      echo json_encode(array('data'=>array()));
    }

  }



}

 ?>