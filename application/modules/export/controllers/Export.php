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
     public function centers($type='',$barangay='')
  {
    $this->load->model('centers/centers_model');


        $file = new Spreadsheet();
        

        $active_sheet = $file->getActiveSheet();

        $active_sheet->mergeCells("A1:E1");
        $active_sheet->mergeCells("A2:E2");
        $active_sheet->mergeCells("A3:C3");
        $active_sheet->mergeCells("A4:C4");
        $active_sheet->getStyle('A1:A2')->getAlignment()->setHorizontal('center');
        $active_sheet->setCellValue('A1', 'MSWD ECCD NUTRITION STATUS');
        $active_sheet->setCellValue('A2', 'List of centers');
        $active_sheet->setCellValue('A3', 'List by: '.$type);
        $active_sheet->setCellValue('A4', 'Name of Barangay: '.urldecode($barangay));

        $active_sheet->setCellValue('A5', '#');
        $active_sheet->setCellValue('B5', 'Center Name');
        $active_sheet->setCellValue('C5', 'Complete Address');
        $active_sheet->setCellValue('D5', 'Worker Name');
        $active_sheet->setCellValue('E5', 'Total pupils');

        $active_sheet->getColumnDimension('D')->setWidth(30);
        $active_sheet->getColumnDimension('B')->setWidth(30);
        $active_sheet->getColumnDimension('C')->setWidth(30);
        $active_sheet->getColumnDimension('E')->setWidth(12);
        $count = 6;
        $i=1;
      
        $result = $this->centers_model->listbyBarangay(urldecode($barangay),$type);
        //var_dump($result);
        //exit;
        if (!empty($result)) {
            
          foreach($result as $row)
          {
    /*
    $active_sheet
    ->getStyle('A'.$count.':E'.$count)
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THICK)
    ->setColor(new Color('FFFF0000'));

    */


            $active_sheet->setCellValue('A' . $count, $i);
            $active_sheet->setCellValue('B' . $count, $row->center_name);
            $active_sheet->setCellValue('C' . $count, $row->center_address);
            $active_sheet->setCellValue('D' . $count, $row->worker_name);
            $active_sheet->setCellValue('E' . $count, $row->total_students);;

            $count++;
            $i++;
          }
        }


        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xlsx');

        $file_name = 'centers-'.time() . '.' . strtolower('xlsx');

       // $writer->save($file_name);

        header('Content-Type: application/x-www-form-urlencoded');

        header('Content-Transfer-Encoding: Binary');

        header("Content-disposition: attachment; filename=\"".$file_name."\"");
        $writer->save('php://output');
        //readfile($file_name);

      //  unlink($file_name);

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
  $active_sheet->setCellValue('B5', 'First Name');
  $active_sheet->setCellValue('C5', 'MI');
  $active_sheet->setCellValue('D5', 'Last Name');
  $active_sheet->setCellValue('E5', 'Sex');

  $active_sheet->setCellValue('F5', 'Birthday');
  $active_sheet->setCellValue('G5', 'Age in months');
  $active_sheet->setCellValue('H5', 'Sector');
  $active_sheet->setCellValue('I5', 'Deworming');
  $active_sheet->setCellValue('J5', 'Vit. A Supp.');

  $active_sheet->setCellValue('K5', 'Date of Weighing');
  $active_sheet->setCellValue('L5', 'Height');
  $active_sheet->setCellValue('M5', 'Weight');
  $active_sheet->setCellValue('N5', 'WFA');
  $active_sheet->setCellValue('O5', 'HFA');
  $active_sheet->setCellValue('P5', 'WFH');


  $active_sheet->getColumnDimension('B')->setWidth(20);
  $active_sheet->getColumnDimension('C')->setWidth(5);
  $active_sheet->getColumnDimension('D')->setWidth(20);


  $active_sheet->getColumnDimension('F')->setWidth(15);
  $active_sheet->getColumnDimension('G')->setWidth(15);
  $active_sheet->getColumnDimension('I')->setWidth(15);
  $active_sheet->getColumnDimension('J')->setWidth(15);
  $active_sheet->getColumnDimension('K')->setWidth(15);
  
  $count = 6;
  $i=1;
  if (!empty($result)) {
      
    foreach($result as $row)
    {


      $info = $this->students_model->info($row->student_id);
      $deworming = '';
      $vitamin_a = '';
      if($immunizations =$this->students_model->getimmunizations($row->student_id)){
          foreach ($immunizations as $k => $v) {
            // code...
            if ($v->type_immunization == 'deworming') {
              // code...
              $deworming =toymd($v->date_immunization);
            }

            if ($v->type_immunization == 'vitamin_a') {
              // code...
              $vitamin_a = toymd($v->date_immunization);
            }

          }
      }

        $ageinmonths = $info->age;

        $getage = getAge($info->birthDate);
          $ageinmonths  = ($getage->y * 12) + $getage->m;

      if ( isset($row->date_weighing )) {
        // code...
          $getage= getAge ($info->birthDate,$row->date_weighing);
          $ageinmonths  = ($getage->y * 12) + $getage->m;

      }

      $active_sheet->setCellValue('A' . $count, $i);
      $active_sheet->setCellValue('B' . $count, $info->fName);
      $active_sheet->setCellValue('C' . $count, $info->mName);
      $active_sheet->setCellValue('D' . $count, $info->lName);
      $active_sheet->setCellValue('E' . $count, gender($row->gender));
    
      $active_sheet->setCellValue('F' . $count,  toymd($info->birthDate));
      $active_sheet->setCellValue('G' . $count, $ageinmonths);
      $active_sheet->setCellValue('H' . $count, sector($info->sector));
      $active_sheet->setCellValue('I' . $count, $deworming);
      $active_sheet->setCellValue('J' . $count, $vitamin_a);

      $active_sheet->setCellValue('K' . $count, !empty($row->date_weighing) ? toymd($row->date_weighing) :'');
      $active_sheet->setCellValue('L' . $count, $row->height);
      $active_sheet->setCellValue('M' . $count, $row->weight);
      $active_sheet->setCellValue('N' . $count, $row->wfa);
      $active_sheet->setCellValue('O' . $count, $row->hfa);
      $active_sheet->setCellValue('P' . $count, $row->wfh);

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
        $active_sheet->setCellValue('E5', 'Interpretation');
        $active_sheet->setCellValue('F5', 'Standard Score');
        $active_sheet->setCellValue('G5', 'Interpretation');

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
            $active_sheet->setCellValue('E' . $count, get_scaled_interpretation($row->sum_scaled_score));
            $active_sheet->setCellValue('F' . $count, get_standard_score($row->sum_scaled_score));
            $active_sheet->setCellValue('G' . $count, get_standard_interpretation(get_standard_score($row->sum_scaled_score)));
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