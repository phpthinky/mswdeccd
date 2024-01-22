<?php 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * 
 */
class Export_eccd extends MY_Controller
{
	
	function __construct()
	{
		// code...
		parent::__construct();

    $this->load->model('centers/centers_model');
    $this->load->model('workers/workers_model');
    $this->load->model('students/students_model');
    $this->load->model('eccd/eccd_model');
    $this->load->model('settings/settings_model');
	}

  public function get_bygender($result=array())
  {
    
    if (empty($result)) {
      // code...
      return false;
    }
    $boys = 0;
    $girls = 0; 
    $wfa_suw =0;
    $wfa_uw =0;
    $wfa_n =0;
    $wfa_ow =0;

    $hfa_ss=0;
    $hfa_s =0;
    $hfa_n =0;
    $hfa_t =0;

    $wfh_sw =0;
    $wfh_w =0;
    $wfh_n =0;
    $wfh_ow =0;
    $wfh_ob =0;
    
    $g_wfa_suw =0;
    $g_wfa_uw =0;
    $g_wfa_n =0;
    $g_wfa_ow =0;

    $g_hfa_ss=0;
    $g_hfa_s =0;
    $g_hfa_n =0;
    $g_hfa_t =0;

    $g_wfh_sw =0;
    $g_wfh_w =0;
    $g_wfh_n =0;
    $g_wfh_ow =0;
    $g_wfh_ob =0;


    foreach ($result as $key => $row) {
      // code...
      if($row->gender == 1){
        ++$boys;
        if ($row->wfa =='SUW') {
          // code...
          ++$wfa_suw;
        }

        if ($row->wfa =='UW') {
          // code...
          ++$wfa_uw;
        }
        if ($row->wfa =='N') {
          // code...
          ++$wfa_n;
        }
        if ($row->wfa =='OW') {
          // code...
          ++$wfa_ow;
        }
        //hfa
        if ($row->hfa =='SS') {
          // code...
          ++$hfa_ss;
        }

        if ($row->hfa =='S') {
          // code...
          ++$hfa_ss;
        }
        if ($row->hfa =='N') {
          // code...
          ++$hfa_n;
        }
        if ($row->hfa =='T') {
          // code...
          ++$hfa_t;
        }
        //wfh

        if ($row->wfh =='SW') {
          // code...
          ++$wfh_sw;
        }

        if ($row->wfh =='W') {
          // code...
          ++$wfh_w;
        }
        if ($row->wfh =='N') {
          // code...
          ++$wfh_n;
        }
        if ($row->wfh =='OW') {
          // code...
          ++$wfh_ow;
        }

        if ($row->wfh =='OB') {
          // code...
          ++$wfh_ob;
        }


      }
      //girl 
      else{
        ++$girls;
       if ($row->wfa =='SUW') {
          // code...
          ++$g_wfa_suw;
        }

        if ($row->wfa =='UW') {
          // code...
          ++$g_wfa_uw;
        }
        if ($row->wfa =='N') {
          // code...
          ++$g_wfa_n;
        }
        if ($row->wfa =='OW') {
          // code...
          ++$g_wfa_ow;
        }
        //g_hfa
        if ($row->hfa =='SS') {
          // code...
          ++$g_hfa_ss;
        }

        if ($row->hfa =='S') {
          // code...
          ++$g_hfa_ss;
        }
        if ($row->hfa =='N') {
          // code...
          ++$g_hfa_n;
        }
        if ($row->hfa =='T') {
          // code...
          ++$g_hfa_t;
        }
        //g_wfh

        if ($row->wfh =='SW') {
          // code...
          ++$g_wfh_sw;
        }

        if ($row->wfh =='W') {
          // code...
          ++$g_wfh_w;
        }
        if ($row->wfh =='N') {
          // code...
          ++$g_wfh_n;
        }
        if ($row->wfh =='OW') {
          // code...
          ++$g_wfh_ow;
        }

        if ($row->wfh =='OB') {
          // code...
          ++$g_wfh_ob;
        }

      }

    }
$data = array(
  'boys'=>array(
    'total'=>$boys,
    'wfa'=>array($wfa_suw,$wfa_uw,$wfa_n,$wfa_ow),
    'hfa'=>array($hfa_ss,$hfa_s,$hfa_n,$hfa_t),
    'wfh'=>array($wfh_sw,$wfh_w,$wfh_n,$wfh_ow,$wfh_ob),
    ),

  'girls'=>array(
    'total'=>$girls,
    'wfa'=>array($g_wfa_suw,$g_wfa_uw,$g_wfa_n,$g_wfa_ow),
    'hfa'=>array($g_hfa_ss,$g_hfa_s,$g_hfa_n,$g_hfa_t),
    'wfh'=>array($g_wfh_sw,$g_wfh_w,$g_wfh_n,$g_wfh_ow,$g_wfh_ob),
    ),
);
return $data;
  }

  public function get_byage($result=array(),$min=0,$max=0)
  {
    if (empty($result)) {
      // code...
      return false;
    }

    ///child ages
    $total = 0;
    $a_suw = 0;
    $a_uw = 0;
    $a_n = 0;
    $a_ow = 0;

    $a_h_ss = 0;
    $a_h_s = 0;
    $a_h_n = 0;
    $a_h_t = 0;

    $a_wh_sw = 0;
    $a_wh_w = 0;
    $a_wh_n = 0;
    $a_wh_ow = 0;
    $a_wh_ob = 0;

   foreach ($result as $key => $row) {
      $info = $this->students_model->info($row->student_id);
      $age = getAge($row->date_weighing,$info->birthDate);
      $ageinmonths = intval(($age->y * 12) + $age->m);
      if ($ageinmonths >= $min && $ageinmonths <= $max) {
        // code...
        ++$total;
     if ($row->wfa =='SUW') {
          ++$a_suw;
        }
        if ($row->wfa =='UW') {
          ++$a_uw;
        }
        if ($row->wfa =='N') {
          ++$a_n;
        }
        if ($row->wfa =='OW') {
          ++$a_ow;
        }

        //hfa
        if ($row->hfa =='SS') {
          ++$a_h_ss;
        }
        if ($row->hfa =='S') {
          ++$a_h_ss;
        }
        if ($row->hfa =='N') {
          ++$a_h_n;
        }
        if ($row->hfa =='T') {
          ++$a_h_t;
        }

        //wfh
        if ($row->wfh =='SW') {
          ++$a_wh_sw;
        }
        if ($row->wfh =='W') {
          ++$a_wh_w;
        }
        if ($row->wfh =='N') {
          ++$a_wh_n;
        }
        if ($row->wfh =='OW') {
          ++$a_wh_ow;
        }
        if ($row->wfh =='OB') {
          ++$a_wh_ob;
        }
           
      }
  }

  $data = array(
    'total_child'=>$total,
    'wfa'=>array($a_suw,$a_uw,$a_n,$a_ow),
    'hfa'=>array($a_h_ss,$a_h_s,$a_h_n,$a_h_t),
    'wfh'=>array($a_wh_sw,$a_wh_w,$a_wh_n,$a_wh_ow,$a_wh_ob),
  );
  return $data;
 
  }
  public function get_bysector($result =array(),$sector='')
  {
    // code...
    if (empty($result)) {
      // code...
      return false;
    }
    $total = 0;

    $a_suw = 0;
    $a_uw = 0;
    $a_n = 0;
    $a_ow = 0;

    $a_h_ss = 0;
    $a_h_s = 0;
    $a_h_n = 0;
    $a_h_t = 0;

    $a_wh_sw = 0;
    $a_wh_w = 0;
    $a_wh_n = 0;
    $a_wh_ow = 0;
    $a_wh_ob = 0;

   foreach ($result as $key => $row) {
      // code...

      $info = $this->students_model->info($row->student_id);
      $result[$key]->sector = $info->sector;
      if ($info->sector ==  $sector) {
        // code...
        ++$total;

     if ($row->wfa =='SUW') {
          ++$a_suw;
        }
        if ($row->wfa =='UW') {
          ++$a_uw;
        }
        if ($row->wfa =='N') {
          ++$a_n;
        }
        if ($row->wfa =='OW') {
          ++$a_ow;
        }

        //hfa
        if ($row->hfa =='SS') {
          ++$a_h_ss;
        }
        if ($row->hfa =='S') {
          ++$a_h_ss;
        }
        if ($row->hfa =='N') {
          ++$a_h_n;
        }
        if ($row->hfa =='T') {
          ++$a_h_t;
        }

        //wfh
        if ($row->wfh =='SW') {
          ++$a_wh_sw;
        }
        if ($row->wfh =='W') {
          ++$a_wh_w;
        }
        if ($row->wfh =='N') {
          ++$a_wh_n;
        }
        if ($row->wfh =='OW') {
          ++$a_wh_ow;
        }
        if ($row->wfh =='OB') {
          ++$a_wh_ob;
        }

      }
  }
  $data = array(
    'total_child'=>$total,
    'wfa'=>array($a_suw,$a_uw,$a_n,$a_ow),
    'hfa'=>array($a_h_ss,$a_h_s,$a_h_n,$a_h_t),
    'wfh'=>array($a_wh_sw,$a_wh_w,$a_wh_n,$a_wh_ow,$a_wh_ob),
  );
  return $data;

  }
  public function export($center=0,$worker=0,$weighing=0,$year_id=0)
  {
    $result = $this->eccd_model->listachild($weighing,$year_id,$center,$worker);
    $by_gender = $this->get_bygender($result);
    $by_age_24_35 = $this->get_byage($result,24,35); 
    $by_age_36_47 = $this->get_byage($result,36,47); 
    $by_age_48_59 = $this->get_byage($result,48,59); 
    $by_age_60_71 = $this->get_byage($result,60,71);
    $by_sector_ip = $this->get_bysector($result,1);
    $by_sector_4p = $this->get_bysector($result,2);
    $by_sector_solo = $this->get_bysector($result,3);
    $by_sector_wd = $this->get_bysector($result,4);


    $type = "";
    switch ($weighing) {
      case 1:
        
    $type = "Upon Entry";
        break;
      case 2:
    $type = "20 Days After";
        break;
      case 3:
    $type = "40 Days After";
        break;
      case 4:
    $type = "Terminal";
        break;
      
      default:
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
  

  $active_sheet->mergeCells("A3:P3");
  $active_sheet->mergeCells("A4:P4");
  $active_sheet->mergeCells("A5:P5");


  $active_sheet->getStyle('A3')->getAlignment()->setHorizontal('center');
  $active_sheet->getStyle('A4')->getAlignment()->setHorizontal('center');
  $active_sheet->getStyle('A5')->getAlignment()->setHorizontal('center');
  $active_sheet->setCellValue('A1', 'Department of Social Worker and Development');
  $active_sheet->setCellValue('A2', 'Field Office MIMAROPA');
  $active_sheet->setCellValue('A3', 'SUPPLEMENTARY FEEDING PROGRAM');
  $active_sheet->setCellValue('A4', 'WEIGHT MONITORING REPORT');
  $active_sheet->setCellValue('A5', 'School Year: '.$schoolyears);

  $active_sheet->setCellValue('A6', 'Province');
  $active_sheet->setCellValue('B6', 'Occidental Mindoro');
  $active_sheet->setCellValue('H6', 'City/Municipality');
  $active_sheet->setCellValue('J6', 'SABLAYAN');
  $active_sheet->setCellValue('M6', 'Barangay');
  $active_sheet->setCellValue('O6', '');



  $active_sheet->setCellValue('A7', 'Name of CDC/SNP');
  $active_sheet->setCellValue('B7', $center_name);
  $active_sheet->setCellValue('H7', 'Name of CDW');
  $active_sheet->setCellValue('J7', $worker_name);
  $active_sheet->setCellValue('M7', $type);

//filteredsudents

  $active_sheet->mergeCells("A8:B9");
  $active_sheet->mergeCells("D8:G8");
  $active_sheet->mergeCells("H8:K8");
  $active_sheet->mergeCells("L8:Q8");
  $active_sheet->mergeCells("C8:C9");

  $active_sheet->setCellValue('A8', 'Total no. of students');
  $active_sheet->setCellValue('C8', $by_gender['boys']['total'] + $by_gender['girls']['total']);

  $active_sheet->setCellValue('D8', 'WEIGHT FOR AGE');
  $active_sheet->setCellValue('D9', 'SUW');
  $active_sheet->setCellValue('E9', 'UW');
  $active_sheet->setCellValue('F9', 'N');
  $active_sheet->setCellValue('G9', 'OW');

  $active_sheet->setCellValue('H8', 'HEIGHT FOR AGE');

  $active_sheet->setCellValue('H9', 'SS');
  $active_sheet->setCellValue('I9', 'S');
  $active_sheet->setCellValue('J9', 'N');
  $active_sheet->setCellValue('K9', 'T');

  $active_sheet->setCellValue('L8', 'WEIGHT FOR HEIGHT');
  $active_sheet->setCellValue('L9', 'SW');
  $active_sheet->setCellValue('M9', 'W');
  $active_sheet->setCellValue('N9', 'N');
  $active_sheet->setCellValue('O9', 'OW');
  $active_sheet->setCellValue('P9', 'OB');
  
  $active_sheet->mergeCells("A10:A11");
  $active_sheet->setCellValue('A10', 'Base on Sex');
  $active_sheet->setCellValue('B10', 'BOYS');
  $active_sheet->setCellValue('B11', 'GIRLS');
  $active_sheet->setCellValue('C10', $by_gender['boys']['total']);
  $active_sheet->setCellValue('C11', $by_gender['girls']['total']);
foreach ($by_gender as $g => $gender) {
      // code...
    if ($g == 'boys') {
      // code...      
  $active_sheet->setCellValue('D10', $gender['wfa'][0]);
  $active_sheet->setCellValue('E10', $gender['wfa'][1]);
  $active_sheet->setCellValue('F10', $gender['wfa'][2]);
  $active_sheet->setCellValue('G10', $gender['wfa'][3]);

  $active_sheet->setCellValue('H10', $gender['hfa'][0]);
  $active_sheet->setCellValue('I10', $gender['hfa'][1]);
  $active_sheet->setCellValue('J10', $gender['hfa'][2]);
  $active_sheet->setCellValue('K10', $gender['hfa'][3]);

  $active_sheet->setCellValue('L10', $gender['wfh'][0]);
  $active_sheet->setCellValue('M10', $gender['wfh'][1]);
  $active_sheet->setCellValue('N10', $gender['wfh'][2]);
  $active_sheet->setCellValue('O10', $gender['wfh'][3]);
  $active_sheet->setCellValue('P10', $gender['wfh'][4]);
    }

    if ($g == 'girls') {
      // code...
  $active_sheet->setCellValue('D11', $gender['wfa'][0]);
  $active_sheet->setCellValue('E11', $gender['wfa'][1]);
  $active_sheet->setCellValue('F11', $gender['wfa'][2]);
  $active_sheet->setCellValue('G11', $gender['wfa'][3]);

  $active_sheet->setCellValue('H11', $gender['hfa'][0]);
  $active_sheet->setCellValue('I11', $gender['hfa'][1]);
  $active_sheet->setCellValue('J11', $gender['hfa'][2]);
  $active_sheet->setCellValue('K11', $gender['hfa'][3]);

  $active_sheet->setCellValue('L11', $gender['wfh'][0]);
  $active_sheet->setCellValue('M11', $gender['wfh'][1]);
  $active_sheet->setCellValue('N11', $gender['wfh'][2]);
  $active_sheet->setCellValue('O11', $gender['wfh'][3]);
  $active_sheet->setCellValue('P11', $gender['wfh'][4]);
    }
  }

//base on age
  $active_sheet->mergeCells("A12:A15");  
  $active_sheet->setCellValue('A12', 'Based on Age');
  $active_sheet->setCellValue('B12', '24-35');


foreach ($by_age_24_35 as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C12', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D12', $b[0]);
  $active_sheet->setCellValue('E12', $b[1]);
  $active_sheet->setCellValue('F12', $b[2]);
  $active_sheet->setCellValue('G12', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H12', $b[0]);
  $active_sheet->setCellValue('I12', $b[1]);
  $active_sheet->setCellValue('J12', $b[2]);
  $active_sheet->setCellValue('K12', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L12', $b[0]);
  $active_sheet->setCellValue('M12', $b[1]);
  $active_sheet->setCellValue('N12', $b[2]);
  $active_sheet->setCellValue('O12', $b[3]);
  $active_sheet->setCellValue('P12', $b[4]);
}


}


  $active_sheet->setCellValue('B13', '36-47');

foreach ($by_age_36_47 as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C13', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D13', $b[0]);
  $active_sheet->setCellValue('E13', $b[1]);
  $active_sheet->setCellValue('F13', $b[2]);
  $active_sheet->setCellValue('G13', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H13', $b[0]);
  $active_sheet->setCellValue('I13', $b[1]);
  $active_sheet->setCellValue('J13', $b[2]);
  $active_sheet->setCellValue('K13', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L13', $b[0]);
  $active_sheet->setCellValue('M13', $b[1]);
  $active_sheet->setCellValue('N13', $b[2]);
  $active_sheet->setCellValue('O13', $b[3]);
  $active_sheet->setCellValue('P13', $b[4]);
}


}

  $active_sheet->setCellValue('B14', '48-59');

foreach ($by_age_48_59 as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C14', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D14', $b[0]);
  $active_sheet->setCellValue('E14', $b[1]);
  $active_sheet->setCellValue('F14', $b[2]);
  $active_sheet->setCellValue('G14', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H14', $b[0]);
  $active_sheet->setCellValue('I14', $b[1]);
  $active_sheet->setCellValue('J14', $b[2]);
  $active_sheet->setCellValue('K14', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L14', $b[0]);
  $active_sheet->setCellValue('M14', $b[1]);
  $active_sheet->setCellValue('N14', $b[2]);
  $active_sheet->setCellValue('O14', $b[3]);
  $active_sheet->setCellValue('P14', $b[4]);
}


}

  //60-71
    $active_sheet->setCellValue('B15', '60-71');

foreach ($by_age_60_71 as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C15', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D15', $b[0]);
  $active_sheet->setCellValue('E15', $b[1]);
  $active_sheet->setCellValue('F15', $b[2]);
  $active_sheet->setCellValue('G15', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H15', $b[0]);
  $active_sheet->setCellValue('I15', $b[1]);
  $active_sheet->setCellValue('J15', $b[2]);
  $active_sheet->setCellValue('K15', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L15', $b[0]);
  $active_sheet->setCellValue('M15', $b[1]);
  $active_sheet->setCellValue('N15', $b[2]);
  $active_sheet->setCellValue('O15', $b[3]);
  $active_sheet->setCellValue('P15', $b[4]);
}


}

//base on sector
  $active_sheet->mergeCells("A16:A17");
  $active_sheet->setCellValue('A16', 'Based on Sector');


//IPs
  $active_sheet->setCellValue('B16', 'IPs');

foreach ($by_sector_ip as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C16', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D16', $b[0]);
  $active_sheet->setCellValue('E16', $b[1]);
  $active_sheet->setCellValue('F16', $b[2]);
  $active_sheet->setCellValue('G16', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H16', $b[0]);
  $active_sheet->setCellValue('I16', $b[1]);
  $active_sheet->setCellValue('J16', $b[2]);
  $active_sheet->setCellValue('K16', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L16', $b[0]);
  $active_sheet->setCellValue('M16', $b[1]);
  $active_sheet->setCellValue('N16', $b[2]);
  $active_sheet->setCellValue('O16', $b[3]);
  $active_sheet->setCellValue('P16', $b[4]);
}


}

//4Ps
  $active_sheet->setCellValue('B17', '4Ps');

foreach ($by_sector_4p as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C17', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D17', $b[0]);
  $active_sheet->setCellValue('E17', $b[1]);
  $active_sheet->setCellValue('F17', $b[2]);
  $active_sheet->setCellValue('G17', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H17', $b[0]);
  $active_sheet->setCellValue('I17', $b[1]);
  $active_sheet->setCellValue('J17', $b[2]);
  $active_sheet->setCellValue('K17', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L17', $b[0]);
  $active_sheet->setCellValue('M17', $b[1]);
  $active_sheet->setCellValue('N17', $b[2]);
  $active_sheet->setCellValue('O17', $b[3]);
  $active_sheet->setCellValue('P17', $b[4]);
}


}

//PWD
  $active_sheet->setCellValue('B18', 'WDisability');
  foreach ($by_sector_wd as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C18', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D18', $b[0]);
  $active_sheet->setCellValue('E18', $b[1]);
  $active_sheet->setCellValue('F18', $b[2]);
  $active_sheet->setCellValue('G18', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H18', $b[0]);
  $active_sheet->setCellValue('I18', $b[1]);
  $active_sheet->setCellValue('J18', $b[2]);
  $active_sheet->setCellValue('K18', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L18', $b[0]);
  $active_sheet->setCellValue('M18', $b[1]);
  $active_sheet->setCellValue('N18', $b[2]);
  $active_sheet->setCellValue('O18', $b[3]);
  $active_sheet->setCellValue('P18', $b[4]);
}


}


//solo parent
$active_sheet->setCellValue('B19', 'Solo Parent');
foreach ($by_sector_solo as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C19', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D19', $b[0]);
  $active_sheet->setCellValue('E19', $b[1]);
  $active_sheet->setCellValue('F19', $b[2]);
  $active_sheet->setCellValue('G19', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H19', $b[0]);
  $active_sheet->setCellValue('I19', $b[1]);
  $active_sheet->setCellValue('J19', $b[2]);
  $active_sheet->setCellValue('K19', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L19', $b[0]);
  $active_sheet->setCellValue('M19', $b[1]);
  $active_sheet->setCellValue('N19', $b[2]);
  $active_sheet->setCellValue('O19', $b[3]);
  $active_sheet->setCellValue('P19', $b[4]);
}


}
// by student
  $active_sheet->setCellValue('A20', '#');
  $active_sheet->setCellValue('B20', 'First Name');
  $active_sheet->setCellValue('C20', 'MI');
  $active_sheet->setCellValue('D20', 'Last Name');
  $active_sheet->setCellValue('E20', 'Sex');

  $active_sheet->setCellValue('F20', 'Birthday');
  $active_sheet->setCellValue('G20', 'Age in months');
  $active_sheet->setCellValue('H20', 'Sector');
  $active_sheet->setCellValue('I20', 'Deworming');
  $active_sheet->setCellValue('J20', 'Vit. A Supp.');

  $active_sheet->setCellValue('K20', 'Date of Weighing');
  $active_sheet->setCellValue('L20', 'Height');
  $active_sheet->setCellValue('M20', 'Weight');
  $active_sheet->setCellValue('N20', 'WFA');
  $active_sheet->setCellValue('O20', 'HFA');
  $active_sheet->setCellValue('P20', 'WFH');

  $active_sheet->getColumnDimension('A')->setWidth(20);
  $active_sheet->getColumnDimension('B')->setWidth(20);
  $active_sheet->getColumnDimension('C')->setWidth(5);
  $active_sheet->getColumnDimension('D')->setWidth(20);

  $active_sheet->getColumnDimension('F')->setWidth(15);
  $active_sheet->getColumnDimension('G')->setWidth(15);
  $active_sheet->getColumnDimension('I')->setWidth(15);
  $active_sheet->getColumnDimension('J')->setWidth(15);
  $active_sheet->getColumnDimension('K')->setWidth(15);
  $count = 21;
  $i=1;

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

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xlsx');

  $file_name = 'eccd-nutrition-'.time() . '.' . strtolower('xlsx');

  //$writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  //readfile($file_name);

  //unlink($file_name);
  ob_end_clean();
  $writer->save('php://output');
  exit();
  }

  public function export_worker($year_id=0,$worker_id=0)
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



   // $result = $this->eccd_model->listachild($weighing,$year_id,$center,$worker);
    $result = $this->eccd_model->listachild($weighing,$year_id,$center_id,$worker_id);
    
    $by_gender = $this->get_bygender($result);
    $by_age_24_35 = $this->get_byage($result,24,35); 
    $by_age_36_47 = $this->get_byage($result,36,47); 
    $by_age_48_59 = $this->get_byage($result,48,59); 
    $by_age_60_71 = $this->get_byage($result,60,71);
    $by_sector_ip = $this->get_bysector($result,1);
    $by_sector_4p = $this->get_bysector($result,2);
    $by_sector_solo = $this->get_bysector($result,3);
    $by_sector_wd = $this->get_bysector($result,4);


    $type = "";
    switch ($weighing) {
      case 1:
        
    $type = "Upon Entry";
        break;
      case 2:
    $type = "20 Days After";
        break;
      case 3:
    $type = "40 Days After";
        break;
      case 4:
    $type = "Terminal";
        break;
      
      default:
    $type = "Upon Entry";

        break;
    }    

//  $center_name  = $this->centers_model->getName($center);
//  $worker_name  = $this->workers_model->getName($worker);
  $schoolyears = "No selected.";
  if ($year_id > 0) {
  $schoolyears = $this->settings_model->getSchoolYear($year_id);
  }
    $file = new Spreadsheet();
  

  $active_sheet = $file->getActiveSheet();
  

  $active_sheet->mergeCells("A3:P3");
  $active_sheet->mergeCells("A4:P4");
  $active_sheet->mergeCells("A5:P5");


  $active_sheet->getStyle('A3')->getAlignment()->setHorizontal('center');
  $active_sheet->getStyle('A4')->getAlignment()->setHorizontal('center');
  $active_sheet->getStyle('A5')->getAlignment()->setHorizontal('center');
  $active_sheet->setCellValue('A1', 'Department of Social Worker and Development');
  $active_sheet->setCellValue('A2', 'Field Office MIMAROPA');
  $active_sheet->setCellValue('A3', 'SUPPLEMENTARY FEEDING PROGRAM');
  $active_sheet->setCellValue('A4', 'WEIGHT MONITORING REPORT');
  $active_sheet->setCellValue('A5', 'School Year: '.$schoolyears);

  $active_sheet->setCellValue('A6', 'Province');
  $active_sheet->setCellValue('B6', 'Occidental Mindoro');
  $active_sheet->setCellValue('H6', 'City/Municipality');
  $active_sheet->setCellValue('J6', 'SABLAYAN');
  $active_sheet->setCellValue('M6', 'Barangay');
  $active_sheet->setCellValue('O6', '');



  $active_sheet->setCellValue('A7', 'Name of CDC/SNP');
  $active_sheet->setCellValue('B7', $center_name);
  $active_sheet->setCellValue('H7', 'Name of CDW');
  $active_sheet->setCellValue('J7', $worker_name);
  $active_sheet->setCellValue('M7', $type);

//filteredsudents

  $active_sheet->mergeCells("A8:B9");
  $active_sheet->mergeCells("D8:G8");
  $active_sheet->mergeCells("H8:K8");
  $active_sheet->mergeCells("L8:Q8");
  $active_sheet->mergeCells("C8:C9");

  $active_sheet->setCellValue('A8', 'Total no. of students');
  $active_sheet->setCellValue('C8', $by_gender['boys']['total'] + $by_gender['girls']['total']);

  $active_sheet->setCellValue('D8', 'WEIGHT FOR AGE');
  $active_sheet->setCellValue('D9', 'SUW');
  $active_sheet->setCellValue('E9', 'UW');
  $active_sheet->setCellValue('F9', 'N');
  $active_sheet->setCellValue('G9', 'OW');

  $active_sheet->setCellValue('H8', 'HEIGHT FOR AGE');

  $active_sheet->setCellValue('H9', 'SS');
  $active_sheet->setCellValue('I9', 'S');
  $active_sheet->setCellValue('J9', 'N');
  $active_sheet->setCellValue('K9', 'T');

  $active_sheet->setCellValue('L8', 'WEIGHT FOR HEIGHT');
  $active_sheet->setCellValue('L9', 'SW');
  $active_sheet->setCellValue('M9', 'W');
  $active_sheet->setCellValue('N9', 'N');
  $active_sheet->setCellValue('O9', 'OW');
  $active_sheet->setCellValue('P9', 'OB');
  
  $active_sheet->mergeCells("A10:A11");
  $active_sheet->setCellValue('A10', 'Base on Sex');
  $active_sheet->setCellValue('B10', 'BOYS');
  $active_sheet->setCellValue('B11', 'GIRLS');
  $active_sheet->setCellValue('C10', $by_gender['boys']['total']);
  $active_sheet->setCellValue('C11', $by_gender['girls']['total']);
foreach ($by_gender as $g => $gender) {
      // code...
    if ($g == 'boys') {
      // code...      
  $active_sheet->setCellValue('D10', $gender['wfa'][0]);
  $active_sheet->setCellValue('E10', $gender['wfa'][1]);
  $active_sheet->setCellValue('F10', $gender['wfa'][2]);
  $active_sheet->setCellValue('G10', $gender['wfa'][3]);

  $active_sheet->setCellValue('H10', $gender['hfa'][0]);
  $active_sheet->setCellValue('I10', $gender['hfa'][1]);
  $active_sheet->setCellValue('J10', $gender['hfa'][2]);
  $active_sheet->setCellValue('K10', $gender['hfa'][3]);

  $active_sheet->setCellValue('L10', $gender['wfh'][0]);
  $active_sheet->setCellValue('M10', $gender['wfh'][1]);
  $active_sheet->setCellValue('N10', $gender['wfh'][2]);
  $active_sheet->setCellValue('O10', $gender['wfh'][3]);
  $active_sheet->setCellValue('P10', $gender['wfh'][4]);
    }

    if ($g == 'girls') {
      // code...
  $active_sheet->setCellValue('D11', $gender['wfa'][0]);
  $active_sheet->setCellValue('E11', $gender['wfa'][1]);
  $active_sheet->setCellValue('F11', $gender['wfa'][2]);
  $active_sheet->setCellValue('G11', $gender['wfa'][3]);

  $active_sheet->setCellValue('H11', $gender['hfa'][0]);
  $active_sheet->setCellValue('I11', $gender['hfa'][1]);
  $active_sheet->setCellValue('J11', $gender['hfa'][2]);
  $active_sheet->setCellValue('K11', $gender['hfa'][3]);

  $active_sheet->setCellValue('L11', $gender['wfh'][0]);
  $active_sheet->setCellValue('M11', $gender['wfh'][1]);
  $active_sheet->setCellValue('N11', $gender['wfh'][2]);
  $active_sheet->setCellValue('O11', $gender['wfh'][3]);
  $active_sheet->setCellValue('P11', $gender['wfh'][4]);
    }
  }

//base on age
  $active_sheet->mergeCells("A12:A15");  
  $active_sheet->setCellValue('A12', 'Based on Age');
  $active_sheet->setCellValue('B12', '24-35');


foreach ($by_age_24_35 as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C12', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D12', $b[0]);
  $active_sheet->setCellValue('E12', $b[1]);
  $active_sheet->setCellValue('F12', $b[2]);
  $active_sheet->setCellValue('G12', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H12', $b[0]);
  $active_sheet->setCellValue('I12', $b[1]);
  $active_sheet->setCellValue('J12', $b[2]);
  $active_sheet->setCellValue('K12', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L12', $b[0]);
  $active_sheet->setCellValue('M12', $b[1]);
  $active_sheet->setCellValue('N12', $b[2]);
  $active_sheet->setCellValue('O12', $b[3]);
  $active_sheet->setCellValue('P12', $b[4]);
}


}


  $active_sheet->setCellValue('B13', '36-47');

foreach ($by_age_36_47 as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C13', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D13', $b[0]);
  $active_sheet->setCellValue('E13', $b[1]);
  $active_sheet->setCellValue('F13', $b[2]);
  $active_sheet->setCellValue('G13', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H13', $b[0]);
  $active_sheet->setCellValue('I13', $b[1]);
  $active_sheet->setCellValue('J13', $b[2]);
  $active_sheet->setCellValue('K13', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L13', $b[0]);
  $active_sheet->setCellValue('M13', $b[1]);
  $active_sheet->setCellValue('N13', $b[2]);
  $active_sheet->setCellValue('O13', $b[3]);
  $active_sheet->setCellValue('P13', $b[4]);
}


}

  $active_sheet->setCellValue('B14', '48-59');

foreach ($by_age_48_59 as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C14', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D14', $b[0]);
  $active_sheet->setCellValue('E14', $b[1]);
  $active_sheet->setCellValue('F14', $b[2]);
  $active_sheet->setCellValue('G14', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H14', $b[0]);
  $active_sheet->setCellValue('I14', $b[1]);
  $active_sheet->setCellValue('J14', $b[2]);
  $active_sheet->setCellValue('K14', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L14', $b[0]);
  $active_sheet->setCellValue('M14', $b[1]);
  $active_sheet->setCellValue('N14', $b[2]);
  $active_sheet->setCellValue('O14', $b[3]);
  $active_sheet->setCellValue('P14', $b[4]);
}


}

  //60-71
    $active_sheet->setCellValue('B15', '60-71');

foreach ($by_age_60_71 as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C15', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D15', $b[0]);
  $active_sheet->setCellValue('E15', $b[1]);
  $active_sheet->setCellValue('F15', $b[2]);
  $active_sheet->setCellValue('G15', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H15', $b[0]);
  $active_sheet->setCellValue('I15', $b[1]);
  $active_sheet->setCellValue('J15', $b[2]);
  $active_sheet->setCellValue('K15', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L15', $b[0]);
  $active_sheet->setCellValue('M15', $b[1]);
  $active_sheet->setCellValue('N15', $b[2]);
  $active_sheet->setCellValue('O15', $b[3]);
  $active_sheet->setCellValue('P15', $b[4]);
}


}

//base on sector
  $active_sheet->mergeCells("A16:A17");
  $active_sheet->setCellValue('A16', 'Based on Sector');


//IPs
  $active_sheet->setCellValue('B16', 'IPs');

foreach ($by_sector_ip as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C16', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D16', $b[0]);
  $active_sheet->setCellValue('E16', $b[1]);
  $active_sheet->setCellValue('F16', $b[2]);
  $active_sheet->setCellValue('G16', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H16', $b[0]);
  $active_sheet->setCellValue('I16', $b[1]);
  $active_sheet->setCellValue('J16', $b[2]);
  $active_sheet->setCellValue('K16', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L16', $b[0]);
  $active_sheet->setCellValue('M16', $b[1]);
  $active_sheet->setCellValue('N16', $b[2]);
  $active_sheet->setCellValue('O16', $b[3]);
  $active_sheet->setCellValue('P16', $b[4]);
}


}

//4Ps
  $active_sheet->setCellValue('B17', '4Ps');

foreach ($by_sector_4p as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C17', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D17', $b[0]);
  $active_sheet->setCellValue('E17', $b[1]);
  $active_sheet->setCellValue('F17', $b[2]);
  $active_sheet->setCellValue('G17', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H17', $b[0]);
  $active_sheet->setCellValue('I17', $b[1]);
  $active_sheet->setCellValue('J17', $b[2]);
  $active_sheet->setCellValue('K17', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L17', $b[0]);
  $active_sheet->setCellValue('M17', $b[1]);
  $active_sheet->setCellValue('N17', $b[2]);
  $active_sheet->setCellValue('O17', $b[3]);
  $active_sheet->setCellValue('P17', $b[4]);
}


}

//PWD
  $active_sheet->setCellValue('B18', 'WDisability');
  foreach ($by_sector_wd as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C18', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D18', $b[0]);
  $active_sheet->setCellValue('E18', $b[1]);
  $active_sheet->setCellValue('F18', $b[2]);
  $active_sheet->setCellValue('G18', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H18', $b[0]);
  $active_sheet->setCellValue('I18', $b[1]);
  $active_sheet->setCellValue('J18', $b[2]);
  $active_sheet->setCellValue('K18', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L18', $b[0]);
  $active_sheet->setCellValue('M18', $b[1]);
  $active_sheet->setCellValue('N18', $b[2]);
  $active_sheet->setCellValue('O18', $b[3]);
  $active_sheet->setCellValue('P18', $b[4]);
}


}


//solo parent
$active_sheet->setCellValue('B19', 'Solo Parent');
foreach ($by_sector_solo as $a => $b) {
  // code...
  if ($a == 'total_child') {
    // code...
  $active_sheet->setCellValue('C19', $b);

  }
  if ($a == 'wfa') {
    // code...
  $active_sheet->setCellValue('D19', $b[0]);
  $active_sheet->setCellValue('E19', $b[1]);
  $active_sheet->setCellValue('F19', $b[2]);
  $active_sheet->setCellValue('G19', $b[3]);
  }
if ($a == 'hfa') {
  // code...
  $active_sheet->setCellValue('H19', $b[0]);
  $active_sheet->setCellValue('I19', $b[1]);
  $active_sheet->setCellValue('J19', $b[2]);
  $active_sheet->setCellValue('K19', $b[3]);
}

if ($a == 'wfh') {
  // code...
  $active_sheet->setCellValue('L19', $b[0]);
  $active_sheet->setCellValue('M19', $b[1]);
  $active_sheet->setCellValue('N19', $b[2]);
  $active_sheet->setCellValue('O19', $b[3]);
  $active_sheet->setCellValue('P19', $b[4]);
}


}
// by student
  $active_sheet->setCellValue('A20', '#');
  $active_sheet->setCellValue('B20', 'First Name');
  $active_sheet->setCellValue('C20', 'MI');
  $active_sheet->setCellValue('D20', 'Last Name');
  $active_sheet->setCellValue('E20', 'Sex');

  $active_sheet->setCellValue('F20', 'Birthday');
  $active_sheet->setCellValue('G20', 'Age in months');
  $active_sheet->setCellValue('H20', 'Sector');
  $active_sheet->setCellValue('I20', 'Deworming');
  $active_sheet->setCellValue('J20', 'Vit. A Supp.');

  $active_sheet->setCellValue('K20', 'Date of Weighing');
  $active_sheet->setCellValue('L20', 'Height');
  $active_sheet->setCellValue('M20', 'Weight');
  $active_sheet->setCellValue('N20', 'WFA');
  $active_sheet->setCellValue('O20', 'HFA');
  $active_sheet->setCellValue('P20', 'WFH');

  $active_sheet->getColumnDimension('A')->setWidth(20);
  $active_sheet->getColumnDimension('B')->setWidth(20);
  $active_sheet->getColumnDimension('C')->setWidth(5);
  $active_sheet->getColumnDimension('D')->setWidth(20);

  $active_sheet->getColumnDimension('F')->setWidth(15);
  $active_sheet->getColumnDimension('G')->setWidth(15);
  $active_sheet->getColumnDimension('I')->setWidth(15);
  $active_sheet->getColumnDimension('J')->setWidth(15);
  $active_sheet->getColumnDimension('K')->setWidth(15);
  $count = 21;
  $i=1;

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

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xlsx');

  $file_name = 'eccd-nutrition-'.time() . '.' . strtolower('xlsx');

  //$writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  //readfile($file_name);

  //unlink($file_name);
  ob_end_clean();
  $writer->save('php://output');
  exit();
  }
}