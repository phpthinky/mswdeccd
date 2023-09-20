<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pupils extends MY_Controller
{
  public function __construct()
  {
    // code...
    parent::__construct();
    if (!$this->aauth->is_loggedin()) {
      // code...
      redirect('login');

    }
    if (!$this->aauth->is_admin()) {
      // code...
      redirect('permission/deny');
    }

    $this->load->model('centers/centers_model');
    $this->load->model('workers/workers_model');
  }
  public function index($value='')
  {
    // code...
    $data = new stdClass();
    $data->content = 'pupils/index';

    $data->centers = $this->centers_model->getCenters();
    $data->workers = $this->workers_model->getWorkers();


    if ($result = $this->pupils_model->getAll()) {
      // code...
      $data->listAll = $result;
    }
    $this->template->dashboard($data);
    
  }

  public function addweighing()
  {
    // code...
    $data = new stdClass();
    $data->pupilsId = $this->input->post('pupilsId');
    $data->dateOfWeighing = $this->input->post('dateOfWeighing');
    $data->weight = $this->input->post('weight');
    $data->height = $this->input->post('height');
    $data->wfa = $this->input->post('wfa');
    $data->hfa = $this->input->post('hfa');
    $data->wfh = $this->input->post('wfh');

    $result = $this->weighing_model->add($data);

    echo $result;
    echo "<a href='".site_url('dashboard-pupils-profile/').$data->pupilsId."'>Back</a>";
  }
  public function getList($centerId=0,$workersId=0,$q=null)
  {
    // code...
   if($result = $this->pupils_model->getAll($centerId,$workersId)){
    $data = array();
    foreach ($result as $key => $value) {
      // code...
      $age = getAge($value->birthDate);
      $data[] = array($value->pupilsId,
        $value->fName,
        $age->y.' year '.$age->m.' month',
        gender($value->gender),
        $value->barangay,
        '<a href="'.site_url('students/profile/').$value->pupilsId.'" class="btn btn-default btn-xs" title="View pupil info."><i class="fas fa-list"></i></a>');
      }

        echo json_encode(array("data"=>$data));

  }else{

      echo json_encode(array('data'=>[]));
   }
  }

   public function getworkers()
  {
    // code...
    if (  $this->input->post()) {

    $centerId = $this->input->post('center');

    $results = $this->workers_model->getCenterWorkers ($centerId );
        if ($results) {
          // code...
          $data = array();
          foreach ($results as $key => $value) {
            // code...
            $data[] = array('text'=>$value->workerName  ,'value'=>$value->workersId );
          }
          echo json_encode  (array('status'=>true,'data'=>$data));
        }else{
          echo json_encode (array('status'=>false,'msg'=>'No workers data. centers '.$centerId));

        }
    }else{
      echo json_encode (array('status'=>false,'msg'=>'No input  data.'));
    }
  }

}
