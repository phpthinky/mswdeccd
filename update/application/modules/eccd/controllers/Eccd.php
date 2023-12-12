<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;

//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Eccd extends MY_Controller
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
    $this->load->model('settings/settings_model');
  
    $this->load->model('eccd/eccd_model');

  }
  public function index($value='')
  {
    // code...

    $data = new stdClass();
    $data->content = 'eccd/index';

    $data->centers = $this->centers_model->getCenters();
    $data->workers = $this->workers_model->getWorkers();
    $data->schoolyears = $this->settings_model->listschoolyears();


    $this->template->dashboard($data);
    
  }
  public function listchild()
  {
    // code...
    ////echo json_encode($this->input->post());
    //exit();
    $centerId = $this->input->post('centerId');
    $workersId = $this->input->post('workersId');
    $weighing = $this->input->post('weighing');
    $year_id = $this->input->post('year_id');

    $result = $this->eccd_model->listachild($weighing,$year_id,$centerId,$workersId);

    /*
    switch ($weighing) {
      case 1:
        // code...
          $result = $this->eccd_model->upon_entry($centerId,$workersId);
        break;
      case 2:
        // code...
          $result = $this->eccd_model->interval20($centerId,$workersId);
        break;
      case 3:
        // code...
          $result = $this->eccd_model->interval40($centerId,$workersId);
        break;
      case 4:
        // code...
          $result = $this->eccd_model->terminal($centerId,$workersId);
        break;
      
      default:
        // code...
        $result = $this->eccd_model->upon_entry($centerId,$workersId);

        break;
    }
    */

    /*
    echo "<pre/>";
    var_dump($result);
    exit();
*/

   if($result){
    $data = array();
    $i=1;
    foreach ($result as $key => $value) {
      // code...
      $data[] = array(
        $i,
        /*$value->student_id, */
        $value->student_name,
        gender($value->gender),
        $value->height,
        $value->weight,
        $value->wfa,
        $value->hfa,
        $value->wfh,
        '<a href="'.site_url('students/profile/').$value->student_id.'" class="btn btn-default btn-xs" title="View pupil info."><i class="fas fa-list"></i></a>');
      $i++;
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
            $data[] = array('text'=>'No worker selected'  ,'value'=>0 );

          foreach ($results as $key => $value) {
            // code...
            $data[] = array('text'=>$value->workerName  ,'value'=>$value->workersId );
          }
          echo json_encode  (array('status'=>true,'data'=>$data));
        }else{
          echo json_encode (array('status'=>false,'msg'=>'No workers data. '));

        }
    }else{
      echo json_encode (array('status'=>false,'msg'=>'No input  data.'));
    }
  }

  public function getinterval($days=20)
  {
    // code...
    if($days == 20){
      $data = $this->eccd_model->interval20();
    echo json_encode($data);
    }else{
     echo "No data"; 
    }
  }
  public function export($center=0,$worker=0,$weighing=0,$year_id=0)
  {

    /*
    $centerId = 0; $this->input->post('centerId');
    $workersId = 0;$this->input->post('workersId');
    $weighing = 0;$this->input->post('weighing');

    */
    $result = $this->eccd_model->listachild($weighing,$year_id,$center,$worker);

    $type = "";
    switch ($weighing) {
      case 1:
        // code...
         // $result = $this->eccd_model->upon_entry($center,$worker);
        
    $type = "Upon Entry";
        break;
      case 2:
        // code...
       //   $result = $this->eccd_model->interval20($center,$worker);
    $type = "20 Days After";
        break;
      case 3:
        // code...
       //   $result = $this->eccd_model->interval40($center,$worker);
    $type = "40 Days After";
        break;
      case 4:
        // code...
      //    $result = $this->eccd_model->terminal($center,$worker);
    $type = "Terminal";
        break;
      
      default:
        // code...
     //   $result = $this->eccd_model->upon_entry($center,$worker);
    $type = "Upon Entry";

        break;
    }    
  $center_name  = $this->centers_model->getName($center);
  $worker_name  = $this->workers_model->getName($worker);
  $schoolyears = "No selected.";
  if ($year_id > 0) {
  $schoolyears = $this->settings_model->getSchoolYear($year_id);
  }
    $file = new Spreadsheet();
  

  $active_sheet = $file->getActiveSheet();

  $active_sheet->mergeCells("A1:H1");
  $active_sheet->mergeCells("A2:C2");
  $active_sheet->mergeCells("A3:C3");
  $active_sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
  $active_sheet->setCellValue('A1', 'Pupils Nutrition Status '.$type);
  $active_sheet->setCellValue('A2', 'Name of CDC/SNP: '.$center_name);
  $active_sheet->setCellValue('A3', 'Name of CDC/SNP Worker: '.$worker_name);
  $active_sheet->setCellValue('A4', 'School Year: '.$schoolyears);

  $active_sheet->setCellValue('A5', '#');
  $active_sheet->setCellValue('B5', 'Name');
  $active_sheet->setCellValue('C5', 'Gender');
  $active_sheet->setCellValue('D5', 'Height');
  $active_sheet->setCellValue('E5', 'Weight');
  $active_sheet->setCellValue('F5', 'WFA');
  $active_sheet->setCellValue('G5', 'HFA');
  $active_sheet->setCellValue('H5', 'WFH');

  $active_sheet->getColumnDimension('B')->setWidth(30);
  $count = 6;
  $i=1;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $i);
    $active_sheet->setCellValue('B' . $count, $row->student_name);
    $active_sheet->setCellValue('C' . $count, gender($row->gender));
    $active_sheet->setCellValue('D' . $count, $row->height);
    $active_sheet->setCellValue('E' . $count, $row->weight);
    $active_sheet->setCellValue('F' . $count, $row->wfa);
    $active_sheet->setCellValue('G' . $count, $row->hfa);
    $active_sheet->setCellValue('H' . $count, $row->wfh);

    $count++;
    $i++;
  }

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xlsx');

  $file_name = 'eccd-nutrition-'.time() . '.' . strtolower('xlsx');

  $writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($file_name);

  unlink($file_name);

  exit;
  }
  public function list_assessments($center_id=0,$worker_id=0,$year_id=0,$type=0)
  {
    // code...
     // echo json_encode(array('data'=>array($center_id,$worker_id,$year_id,$type)));

   // exit;
    if ($center_id > 0 && $worker_id > 0 && $year_id > 0 && $type > 0) {
      // code...
    $result = $this->eccd_model->list_child_assessment($center_id,$worker_id,$year_id,$type);
    if (!empty($result)) {
      // code...
     // echo "<pre/>";
      $data = array();
      foreach ($result as $key => $value) {
        // code...
        $data[] = array(
          '<a href="'.site_url("students/profile/").$value->student_id.'">'.$value->student_name.'</a>',
          tomdy($value->date_assessment),
          $value->sum_scaled_score,
          get_standard_score($value->sum_scaled_score)
        );
      }
      echo json_encode(array('data'=>$data));
      exit;
    }
    }
      echo json_encode(array('data'=>array()));
    
  }


  public function export_ass($center_id=0,$worker_id=0,$year_id=0,$type=0)
  {

    $result = $this->eccd_model->list_child_assessment($center_id,$worker_id,$year_id,$type);

    $type = "";
    switch ($type) {
      case 1:
    $type = "First assessment";
        break;
      case 2:
    $type = "Second assessment";
        break;
      case 3:
    $type = "Third assessment";
        break;
      
      default:
    $type = "No selected.";

        break;
    }    
  $center_name  = $this->centers_model->getName($center_id);
  $worker_name  = $this->workers_model->getName($worker_id);
  $schoolyears = "No selected.";
  if ($year_id > 0) {
  $schoolyears = $this->settings_model->getSchoolYear($year_id);
  }
    $file = new Spreadsheet();
  

  $active_sheet = $file->getActiveSheet();

  $active_sheet->mergeCells("A1:H1");
  $active_sheet->mergeCells("A2:C2");
  $active_sheet->mergeCells("A3:C3");
  $active_sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
  $active_sheet->setCellValue('A1', 'Pupils Asessment Data '.$type);
  $active_sheet->setCellValue('A2', 'Name of CDC/SNP: '.$center_name);
  $active_sheet->setCellValue('A3', 'Name of CDC/SNP Worker: '.$worker_name);
  $active_sheet->setCellValue('A4', 'School Year: '.$schoolyears);

        $active_sheet->setCellValue('A5', '#');
        $active_sheet->setCellValue('B5', 'Name');
        $active_sheet->setCellValue('C5', 'Date');
        $active_sheet->setCellValue('D5', 'Sum Scaled Score');
        $active_sheet->setCellValue('E5', 'Standard Score');

        $active_sheet->getColumnDimension('B')->setWidth(30);
        $count = 6;
        $i=1;
        if (!empty($result)) {
            $this->load->model('students/students_model');
          foreach($result as $row)
          {
            $active_sheet->setCellValue('A' . $count, $i);
            $active_sheet->setCellValue('B' . $count,  $this->students_model->get_name($row->student_id));
            $active_sheet->setCellValue('C' . $count, tomdy($row->date_assessment));
            $active_sheet->setCellValue('D' . $count, $row->sum_scaled_score);
            $active_sheet->setCellValue('E' . $count, get_standard_score($row->sum_scaled_score));
            $count++;
            $i++;
          }
        }

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xlsx');

  $file_name = 'eccd-assessment-'.time() . '.' . strtolower('xlsx');

  $writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($file_name);

  unlink($file_name);

  exit;
  }

}