<?php 
defined('BASEPATH') or exit('No direct script access allowed');
  /**
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
  public function add_from_list()
  {
    // code...
      if ($this->input->post()) {
        // code...
          $data3 = new stdClass();
          $data3->workersId = $this->input->post('workersId');
          $data3->YearId = $this->input->post('class_schedule');
          $this->workers_model->addtomyschoolyear($data3);

            $data2 = new stdClass();
            $data2->YearId =  $this->input->post('class_schedule');
            $data2->StudentId = $this->input->post('pupilsId');
            $data2->StudentType = $this->input->post('StudentType');
            $data2->workersId = $this->input->post('workersId');
            $data2->Status = 1;


            if($this->workers_model->addtomystudent($data2)){
                echo json_encode(savesuccess());

            }else{
                echo json_encode(array('status'=>false,'msg'=>'Student was not added into my list. Database error occcured.'));

            } 
          
        }
              exit();

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
    
      if ($this->input->post('pupilsId') > 0) {
        // code...
        $this->add_from_list();
        exit();
      }
    $this->form_validation->set_rules('fName','First Name','required');
    $this->form_validation->set_rules('lName','Last Name','required');
    $this->form_validation->set_rules('birthDate','Birthday','required');
    $this->form_validation->set_rules('address','Residential Address','required');
    $this->form_validation->set_rules('gender','Gender','required');
    
    if ($this->form_validation->run() === false) {
      // code...
      echo json_encode(array('status'=>false,'msg'=>htmlentities(validation_errors())));
      exit();
    }else{

    $data = new stdClass();
    $data->fName = $this->input->post('fName');
    $data->mName = $this->input->post('mName');
    $data->lName = $this->input->post('lName');
    $data->ext = $this->input->post('ext');
    $data->birthDate = $this->input->post('birthDate');
    $data->gender = $this->input->post('gender');
    $data->address = $this->input->post('address');
    $data->sector = $this->input->post('sector');
    $data->barangay = $this->input->post('barangay');
    $data->municipality = $this->input->post('municipality');
    $data->province = $this->input->post('province');
    $age = getAge($data->birthDate);
    $months = ($age->y * 12) + $age->m;
    $data->age = $months;
    $data->keywords = metaphone($data->fName).' '.metaphone($data->lName);
    $data->keywords_2 = metaphone($data->fName.' '.$data->lName);

//    $data->centerId = $this->input->post('centerId');
  //  $data->workersId = $this->input->post('workersId');


      if($this->pupils_model->if_nameexist($data)){
      echo json_encode(recordexist());
       }else{

        if($StudentId = $this->students_model->save($data)){

//          exit();
          $data3 = new stdClass();
          $data3->workersId = $this->input->post('workersId');
          $data3->YearId = $this->input->post('class_schedule');
          
          $this->workers_model->addtomyschoolyear($data3);
              // code...
            $data2 = new stdClass();
            $data2->YearId =  $this->input->post('class_schedule');
            $data2->StudentId = $StudentId;
            $data2->StudentType = $this->input->post('StudentType');
            $data2->workersId = $this->input->post('workersId');
            $data2->Status = 1;
            if($this->workers_model->addtomystudent($data2)){
                echo json_encode(savesuccess());

            }else{
                echo json_encode(array('status'=>false,'msg'=>'Student was not added into my list. Database error occcured.'));

            } 
          
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
  public function update($value='')
  {
    // code...
    if ($this->input->post()) {
      // code...

    $data = new stdClass();
    $data->fName = $this->input->post('fName');
    $data->mName = $this->input->post('mName');
    $data->lName = $this->input->post('lName');
    $data->ext = $this->input->post('ext');
    $data->birthDate = $this->input->post('birthDate');
    $data->gender = $this->input->post('gender');
    $data->address = $this->input->post('address');
    $data->sector = $this->input->post('sector');
    $data->barangay = $this->input->post('barangay');
    $data->municipality = $this->input->post('municipality');
    $data->province = $this->input->post('province');
    $age = getAge($data->birthDate);
    $months = ($age->y * 12) + $age->m;
    $data->age = $months;
    $data->keywords = metaphone($data->fName.' '.$data->lName);
    $data->pupilsId = $this->input->post('pupilsId');

   // echo json_encode(array('status'=>false,'msg'=>$data));

    //  exit();
    if($result = $this->students_model->save($data)){
    echo json_encode(array('status'=>true,'msg'=>'Successfully updated.'));

    }else{
    echo json_encode(array('status'=>false,'msg'=>'No changes.'));

    }

    }
  }
  public function find()
  {
    // code...
  //          echo json_encode(array('status'=>false,'msg'=>metaphone($this->input->post('keys'))));
//exit();

            if($result = $this->students_model->find($this->input->post('keys'))){

              $data = '<div class="row"><div class="col-md-4"><label class="bold">Name</label></div><div class="col-md-2"><label class="bold">Age (months)</label></div></div>';
              foreach ($result as $key => $value) {
                // code...
                $data .= '<div class="row"><div class="col-md-6">'.$value->student_name.'</div><div class="col-md-3">'.$value->age.'</div><div class="col-md-3"><button type="button" data-id="'.$value->id.'" class="btn btn-default btn-xs btn-select">Select this</button></div></div>';
              }
              echo json_encode(array('status'=>true,'data'=>$data));

            }else{
            echo json_encode(array('status'=>false,'msg'=>'No data.'));

            }

  }
  public function info()
  {
    // code...
    if ($this->input->post()) {
      // code...

      if ($value = $this->students_model->info($this->input->post('student_id'))) {
        // code...
       // $class_info = $this->workers_model->get_student_info($this->input->post('student_id'),$this->workersId);
        //$value->class_schedule = $class_info->YearId;
        echo json_encode(array('status'=>true,'data'=>$value));
                /*$data = '<div class="row">
                <div class="col-md-4">Name: '.$value->student_name.'</div>
                <div class="col-md-4">Address:'.$value->address.'</div>
                </div>';
                  echo $data;
                  */
      }
    }else{
      echo json_encode(noinput());

    }

  }
    public function profile($id) {
    if ($this->input->post()) {
      // code...
      $action = $this->input->post('form');
      switch ($action) {
        case 'remove_nut':
          // code...
            $result = $this->weighing_model->remove($this->input->post('id'));
          echo json_encode($result);
          break;
        
        default:
          // code...
          break;
      }
      exit();
    }

    $data = new stdClass();

    $centerId = $this->workers_model->getMyCenterId($this->workersId);
    $this->load->model('assessment/assessment_model','massessment');
    $data->assessment_data = $this->massessment->get_raw_score($id);
      

    $data->listschedules = null;
  
    $data->id = $id;
    if($result = $this->pupils_model->get($id)){
      foreach ($result as $key => $value) {
        // code...
        $data->$key = $value;
      }
      $data->age = getAge($data->birthDate);
    }
    $data->weighing = $this->weighing_model->get($id);
    $data->liststudents = $this->students_model->listallmystudent($this->workersId);
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

      //  $scheduleId = $this->settings_model->getweighingid($postdata['dateOfWeighing'],$centerId);

      if(!$this->weighing_model->check($postdata['pupilsId'],$postdata['dateOfWeighing'])){
        
        $data =  new stdClass();
        $data->student_id = $postdata['pupilsId'];
        $data->weight = $postdata['weight'];
        $data->height = $postdata['height'];
        $data->date_weighing = $postdata['dateOfWeighing'];

        $students = $this->students_model->info($postdata['pupilsId']);
        $birthday = $students->birthDate;
        $age = getAge($birthday,$postdata['dateOfWeighing']);
        $gender = $students->gender;
        $years = $age->y;
        $months = $age->m;
        $ageinmonth = ($age->y * 12)+$age->m;


/*        if ($ageinmonth < 24) {
          // code...
          $result = array('status'=>false,'msg'=>'Unsupported age of child.');  
          
        }else{
        
*/
        $this->load->helper('bmi_helper');

        $ideal_weight = ideal_weight($years,$months);
        $data->wfa_percentage = ($postdata['weight']/$ideal_weight) * 100;
        $data->wfa = get_wfa($data->wfa_percentage);

        $ideal_height = ideal_height($years,$students->gender);
        $data->hfa_percentage =($postdata['height']/$ideal_height) * 100;
        $data->hfa = get_hfa($data->hfa_percentage);


          // code...

          $weight_on_child_height = weight_on_child_height($ageinmonth,$data->height); //ideal weight base on child height;
          $data->wfh_percentage = ($postdata['weight']/$weight_on_child_height) * 100;
          $data->wfh = get_whz($ageinmonth,$gender,$data->height,$data->weight); 
         
          $result = $this->weighing_model->add($data);

  //      }

          
        //$data->scheduleId = $postdata['scheduleId'];
        echo json_encode($result);
      }else{
        echo json_encode(showresponse(3));
      }

    }else{
      echo json_encode(noinput());
    }
  }

  public function feeding($showlist=false,$id=0)
  {
    // code...

    if ($showlist) {
      // code...
      if($result = $this->students_model->getfeeding($id)){
      $data = array();
      $i=1;
              foreach ($result as $key => $value) {
                        // code...

                  $data[] = array($i,tomdy($value->date_feeding),$value->foods,$value->drinks);
              $i++;
              }        
      echo json_encode(array('data'=>$data));

      }else{
      echo json_encode(array('data'=>false));

      }

      exit();
    }
    if ($this->input->post()) {
      // code...


      $postdata = $this->input->post();
      $feeding_date = $postdata['date_feeding'];

      if(!$this->students_model->checkfeeding(array('student_id'=>$postdata['student_id'],'date_feeding'=>$feeding_date))){
        
        $data =  new stdClass();
        $data->student_id = $postdata['student_id'];
        $data->foods = $postdata['foods'];
        $data->drinks = $postdata['drinks'];
        $data->date_feeding = $feeding_date;

        $result = $this->students_model->addfeeding($data);
        echo json_encode(showresponse($result));
        
      }else{
        echo json_encode(showresponse(3));
      }

    }else{
      echo json_encode(noinput());
    }
  }

  public function immunizations($showlist=false,$id=0)
  {
    // code...


    if ($showlist) {
      // code...
      if($result = $this->students_model->getimmunizations($id)){
      $data = array();
      $i=1;
              foreach ($result as $key => $value) {
                        // code...

                  $data[] = array($i,tomdy($value->date_immunization),$value->type_immunization,$value->description);
              $i++;
              }        
      echo json_encode(array('data'=>$data));

      }else{
      echo json_encode(array('data'=>false));

      }

      exit();
    }
    
    if ($this->input->post()) {
      // code...


      $postdata = $this->input->post();
      $date = $postdata['date_immunization'];

      if(!$this->students_model->checkimmunizations(array('student_id'=>$postdata['student_id'],'date_immunization'=>$date,'type_immunization'=>$postdata['type_immunization']))){
        
        $data =  new stdClass();
        $data->student_id = $postdata['student_id'];
        $data->type_immunization = $postdata['type_immunization'];
        $data->description = $postdata['description'];
        $data->date_immunization = $date;
        $result = $this->students_model->addimmunizations($data);
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

  public function reset($value='')
  {
    // code...
    //$this->students_model->resetall();
  }

}

 ?>