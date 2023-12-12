<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
/**
 * 
 */
class Export extends MY_Controller
{
	

  public function __construct()
  {
    // code...
    parent::__construct();
    if (!$this->aauth->is_loggedin()) {
      // code...
      redirect('login');

    }

    $this->load->model('centers/centers_model');
    $this->load->model('workers/workers_model');
    $this->load->model('students/students_model');  
    $this->load->model('eccd/eccd_model');
    $this->load->model('settings/settings_model');
    $this->load->model('assessment/assessment_model','massessment');

  }

   public function workers($year_id=0,$worker_id=0)
  {

    if (!$this->input->post()) {
      // code...
      exit();
    }
    $this->load->model('students/students_model');
    $worker_id = $this->input->post('worker_id');
    $year_id = $this->input->post('year_id');

  $center_id = $this->workers_model->get_center($worker_id);
  $center_name  = $this->centers_model->getName($center_id);
  $worker_name  = $this->workers_model->getName($worker_id);



  $schoolyears = "No selected.";
  if ($year_id > 0) {
  $schoolyears = $this->settings_model->getSchoolYear($year_id);
  }  

        $file = new Spreadsheet();
        

        $active_sheet = $file->getActiveSheet();

        $active_sheet->mergeCells("A1:G1");
        $active_sheet->mergeCells("A2:C2");
        $active_sheet->mergeCells("A3:C3");
        $active_sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
        $active_sheet->setCellValue('A1', 'List of pupils');
        $active_sheet->setCellValue('A2', 'Name of CDC/SNP: '.$center_name);
        $active_sheet->setCellValue('A3', 'Name of CDC/SNP Worker: '.$worker_name);
        $active_sheet->setCellValue('A4', 'School Year: '.$schoolyears);

        $active_sheet->setCellValue('A5', '#');
        $active_sheet->setCellValue('B5', 'Name');
        $active_sheet->setCellValue('C5', 'Gender');
        $active_sheet->setCellValue('D5', 'Age');
        $active_sheet->setCellValue('E5', 'Birthday');
        $active_sheet->setCellValue('F5', 'Address');
        $active_sheet->setCellValue('G5', 'Student Type');

        $active_sheet->getColumnDimension('B')->setWidth(30);
        $count = 6;
        $i=1;
      
        $result = $this->students_model->listmystudents($year_id,$worker_id);

        if (!empty($result)) {
            
          foreach($result as $row)
          {
            $active_sheet->setCellValue('A' . $count, $i);
            $active_sheet->setCellValue('B' . $count, $row->studentName);
            $active_sheet->setCellValue('C' . $count, gender($row->gender));
            $active_sheet->setCellValue('D' . $count, $row->age);
            $active_sheet->setCellValue('E' . $count, $row->birthDate);
            $active_sheet->setCellValue('F' . $count, $row->address);
            $active_sheet->setCellValue('G' . $count, studtype($row->StudentType));

            $count++;
            $i++;
          }
        }


        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xlsx');

        $file_name = 'worker-students-'.time() . '.' . strtolower('xlsx');

        $writer->save($file_name);

        header('Content-Type: application/x-www-form-urlencoded');

        header('Content-Transfer-Encoding: Binary');

        header("Content-disposition: attachment; filename=\"".$file_name."\"");

        readfile($file_name);

        unlink($file_name);

        exit;

  }
  public function worker_student($year_id=0,$worker_id=0)
  {

    if (!$this->input->post()) {
      // code...
      exit();
    }
    $this->load->model('students/students_model');
    $worker_id = $this->input->post('worker_id');
    $year_id = $this->input->post('year_id');

  $center_id = $this->workers_model->get_center($worker_id);
  $center_name  = $this->centers_model->getName($center_id);
  $worker_name  = $this->workers_model->getName($worker_id);



  $schoolyears = "No selected.";
  if ($year_id > 0) {
  $schoolyears = $this->settings_model->getSchoolYear($year_id);
  }  

        $file = new Spreadsheet();
        

        $active_sheet = $file->getActiveSheet();

        $active_sheet->mergeCells("A1:G1");
        $active_sheet->mergeCells("A2:C2");
        $active_sheet->mergeCells("A3:C3");
        $active_sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
        $active_sheet->setCellValue('A1', 'List of pupils');
        $active_sheet->setCellValue('A2', 'Name of CDC/SNP: '.$center_name);
        $active_sheet->setCellValue('A3', 'Name of CDC/SNP Worker: '.$worker_name);
        $active_sheet->setCellValue('A4', 'School Year: '.$schoolyears);

        $active_sheet->setCellValue('A5', '#');
        $active_sheet->setCellValue('B5', 'Name');
        $active_sheet->setCellValue('C5', 'Gender');
        $active_sheet->setCellValue('D5', 'Age');
        $active_sheet->setCellValue('E5', 'Birthday');
        $active_sheet->setCellValue('F5', 'Address');
        $active_sheet->setCellValue('G5', 'Student Type');

        $active_sheet->getColumnDimension('B')->setWidth(30);
        $count = 6;
        $i=1;
      
        $result = $this->students_model->listmystudents($year_id,$worker_id);

        if (!empty($result)) {
            
          foreach($result as $row)
          {
            $active_sheet->setCellValue('A' . $count, $i);
            $active_sheet->setCellValue('B' . $count, $row->studentName);
            $active_sheet->setCellValue('C' . $count, gender($row->gender));
            $active_sheet->setCellValue('D' . $count, $row->age);
            $active_sheet->setCellValue('E' . $count, $row->birthDate);
            $active_sheet->setCellValue('F' . $count, $row->address);
            $active_sheet->setCellValue('G' . $count, studtype($row->StudentType));

            $count++;
            $i++;
          }
        }


        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xlsx');

        $file_name = 'worker-students-'.time() . '.' . strtolower('xlsx');

        $writer->save($file_name);

        header('Content-Type: application/x-www-form-urlencoded');

        header('Content-Transfer-Encoding: Binary');

        header("Content-disposition: attachment; filename=\"".$file_name."\"");

        readfile($file_name);

        unlink($file_name);

        exit;

  }


  public function worker_student_nutrition($year_id=0,$worker_id=0)
  {

    if (!$this->input->post()) {
      // code...
      exit();
    }

    $worker_id = $this->input->post('worker_id');
    $year_id = $this->input->post('year_id');
    $weighing = $this->input->post('weighing');

  $center_id = $this->workers_model->get_center($worker_id);
  $center_name  = $this->centers_model->getName($center_id);
  $worker_name  = $this->workers_model->getName($worker_id);



  $schoolyears = "No selected.";
  if ($year_id > 0) {
  $schoolyears = $this->settings_model->getSchoolYear($year_id);
  }

    $result = $this->eccd_model->listachild($weighing,$year_id,$center_id,$worker_id);

    $type = "";
    switch ($weighing) {
      case 1:
        // code...
    $type = "Upon Entry";
        break;
      case 2:
        // code...
    $type = "20 Days After";
        break;
      case 3:
        // code...
    $type = "40 Days After";
        break;
      case 4:
        // code...
    $type = "Terminal";
        break;
      
      default:
        // code...
    $type = "Upon Entry";

        break;
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
  if (!empty($result)) {
      
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
  }

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xlsx');

  $file_name = time() . '.' . strtolower('xlsx');

  $writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($file_name);

  unlink($file_name);

  exit;

  }

  public function assessment($worker_id=0,$year_id=0,$type=0)
  {
    // code...

    if ($worker_id > 0 && $year_id > 0 && $type > 0) {
      $result = $this->massessment->get_sum_scaled_score($worker_id,$year_id,$type);

  $center_id = $this->workers_model->get_center($worker_id);
  $center_name  = $this->centers_model->getName($center_id);
  $worker_name  = $this->workers_model->getName($worker_id);
  $schoolyears = $this->settings_model->getSchoolYear($year_id);
  switch ($type) {
    case 1:
      // code...
      $n_type = 'First assessment';
      break;
    case 2:
      // code...
      $n_type = 'Second assessment';

      break;
    case 3:
      // code...
      $n_type = 'Last assessment';
      break;
    
    default:
      // code...
      $n_type = 'None';
      break;
  }
          $file = new Spreadsheet();
        

        $active_sheet = $file->getActiveSheet();

        $active_sheet->mergeCells("A1:H1");
        $active_sheet->mergeCells("A2:C2");
        $active_sheet->mergeCells("A3:C3");
        $active_sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
        $active_sheet->setCellValue('A1', 'Pupils Assessment Status -'.$n_type);
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

        $file_name ='assessment-standard-score-'. time() . '.' . strtolower('xlsx');

        $writer->save($file_name);

        header('Content-Type: application/x-www-form-urlencoded');

        header('Content-Transfer-Encoding: Binary');

        header("Content-disposition: attachment; filename=\"".$file_name."\"");

        readfile($file_name);

        unlink($file_name);

        exit;

    }
    // code...
  }

}