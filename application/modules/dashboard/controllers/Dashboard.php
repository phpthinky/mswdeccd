<?php /**
 * 
 */

class Dashboard extends MY_Controller
{
	private $worker_id = 0;
	function __construct()
	{
		// code...
		parent::__construct();
		if(!$this->aauth->is_loggedin()){
			redirect('login');
		}
		$this->worker_id = $this->session->userdata('workersId');
		$this->load->model('dashboard/dashboard_model');

	}
	public function index($site='')
	{

		//

			$a = 0;
			$b = 0;
			$c = 0;
			$d = 0;
			$e = 0;
			$scores = 0;
			

		if($standard_score = $this->dashboard_model->current_assessment()){

			foreach ($standard_score as $key => $value) {
				// code...
				$scores = $scores + $value->score;
				//echo "$value->score";
				if ($value->scaled_score <= 67) {
					// code...
					$a++;
				}
				
				if ($value->scaled_score >= 70 && $value->scaled_score <= 79) {
					// code...
					$b++;
				}

				if ($value->scaled_score >= 80 && $value->scaled_score <= 119) {
					// code...
					$c++;
				}
				if ($value->scaled_score >= 120 && $value->scaled_score <= 129) {
					// code...
					$d++;
				}
				if ($value->scaled_score > 130) {
					// code...
					$e++;
				}
			}




		}

		$data = new stdClass();


			$colors = array(
				"orange",
				"red",
				"pink",
				"yellow",
				"green",
				"blue",
				"brown",
				);

			$arr_1 = array(
				"67 and below"=>$a,
				"70-79"=>$b,
				"80-119"=>$c,
				"120-129"=>$d,
				"130 aboved"=>$e
				);

			$data_xy = array();
			$data_xy['x'] = array_keys($arr_1);

			$data_xy['y'][] = array(							
					'label'=>'Standard Score',
					'backgroundColor'=>$colors,
					'data'=>array_values($arr_1),
					'fill'=>false,
					'borderColor'=>'red'					
				);

		   $data->wfa = null;
		   $data->hfa = null;
		   $data->wfh = null;
		   $data->wfa_sector = null;
		   $data->hfa_sector = null;
		   $data->wfh_sector = null;


		if ($this->aauth->is_admin()) {
			// code...
		   $data->totalPupils = $this->dashboard_model->getTotalStudents(0,0);
		   //$data->totalNormal =$this->dashboard_model->getTotalNormal();
		   //$data->totalMalnourish =$this->dashboard_model->getTotalMalnourish();
		   //$data->totalObese =$this->dashboard_model->getTotalObese();
		   $normal = 0;
		   $malnourish = 0;
		   $obese = 0;

    		if($nut_status = $this->dashboard_model->list_all_child_current_weighing()){
    			//echo "<pre/>";
    		
    		//	var_dump($nut_status);
    				//echo "<ul>";
              foreach ($nut_status as $key => $value) {
                // code...

                $arr_1 = array($value->wfa,$value->hfa,$value->wfh);
                if ($value->wfa =='UW' || $value->wfa =='SUW' || $value->wfh == 'SAM' || $value->wfh =='MAM'  || $value->wfh == 'SW' || $value->wfh =='W') {
                  // code...
                	++$malnourish;
                }elseif (in_array('OB',$arr_1) || in_array('OV',$arr_1) || in_array('OW',$arr_1)) {
                  // code...
                  if ($value->hfa == 'T' || $value->hfa == 'ST') {
                  	// code...
                	++$malnourish;

                  }else{
                	++$obese;

                  }
                }elseif ($value->wfa =='N' && $value->wfh == 'N') {
                  // code...
                	
                	++$normal;
                }
                //echo "<li>".json_encode($arr_1)."</li>";
                
              }
              //echo "</ul>";
              //exit();
    		}

		   $data->totalNormal = $normal;
		   $data->totalMalnourish =$malnourish;
		   $data->totalObese =$obese;
		   //var_dump($data);
		   //exit();
		}else{

			$center_id = $this->workers_model->get_center($this->worker_id);
		   $data->totalPupils = $this->dashboard_model->getTotalStudents($center_id,$this->worker_id);


		   $normal = 0;
		   $malnourish = 0;
		   $obese = 0;
    		if($nut_status = $this->dashboard_model->list_all_child_current_weighing($this->worker_id)){

    		


              foreach ($nut_status as $key => $value) {
                // code...
                

                $arr_1 = array($value->wfa,$value->hfa,$value->wfh);
                if ($value->wfa =='UW' || $value->wfa =='SUW' || $value->wfh == 'SAM' || $value->wfh =='MAM'  || $value->wfh == 'SW' || $value->wfh =='W') {
                  // code...
                	++$malnourish;
                }elseif (in_array('OB',$arr_1) || in_array('OV',$arr_1) || in_array('OW',$arr_1)) {
                  // code...
                  if ($value->hfa == 'T' || $value->hfa == 'ST') {
                  	// code...
                	++$malnourish;

                  }else{
                	++$obese;

                  }
                }elseif ($value->wfa =='N' && $value->wfh == 'N') {
                  // code...
                	
                	++$normal;
                }

                
                
              }

    		}

		   $data->totalNormal = $normal;
		   $data->totalMalnourish =$malnourish;
		   $data->totalObese =$obese;



	
		}
		 $data->xy  = $data_xy;

		  $data->totalWorker = $this->workers_model->getCountAll();
		  $data->totalCenter = $this->centers_model->getCountAll();
		  $average =0;
		  $standard_score = 0;
		 $t = $a+$b+$c+$d+$e;
		 if ($t > 0) {	 

		 $average = $scores/$t;
		 $standard_score = get_standard_score($average);
		 }

		 $data->scaled_score = intval($average);
		 $data->standard_score = $standard_score;

		$data->content = 'dashboard/index';
		$this->template->dashboard($data);
	}
	public function reader($value='')
	{
		// code..
		$this->load->helper('bmi');
		$data = whz_old(1,65,7.7);
		echo$data;
		exit;


	}
	public function list_student_score($score='')
	{
		// code...
		$this->load->model('students/students_model');
		$data = new stdClass();
		$data->result =  null;
		if($result = $this->dashboard_model->current_assessment()){

			$a = array();
			$b = array();
			$c = array();
			$d = array();
			$e = array();
			foreach ($result as $key => $value) {
					// code...
						$info = $this->students_model->info($value->student_id);
						$value->student_name = $info->fName.' '.$info->mName.' '.$info->lName.' '.$info->ext;

			
			if ($value->score <= 67) {
					// code...
					$a[] = $value;
				}
				
				if ($value->score >= 70 && $value->score <= 79) {
					// code...
					$v[] = $value;
					
				}

				if ($value->score >= 80 && $value->score <= 119) {
					// code...
					$c[] = $value;

				}
				if ($value->score >= 120 && $value->score <= 129) {
					// code...
					$d[] = $value;
					
				}
				if ($value->score > 130) {
					// code...
					$e[] = $value;
					
				}


				}	

				switch ($score) {
					case 'a':
					$data->result = $a;
						// code...
						break;
					case 'b':
					$data->result = $b;
						// code...
						break;
					case 'c':
					$data->result = $c;
						// code...
						break;
					case 'd':
					$data->result = $d;
						// code...
						break;
					case 'e':
						// code...
					$data->result = $e;

						break;
					
					default:
						// code...
					$data->result = false;
						break;
				}
		}
		$data->content = 'dashboard/score';
		$this->template->dashboard($data);
	}

	public function current_weighing_wfa($value='')
	{
		// code...
		if ($this->aauth->is_admin()) {
			// code...
		$current_weighing = $this->dashboard_model->get_current_weighing();

		}else{
		$current_weighing = $this->dashboard_model->get_current_weighing($this->worker_id);

		}

			$colors = array(
				"orange",
				"red",
				"pink",
				"yellow",
				"green",
				"blue",
				"brown",
				);

			$arr_1 = array(
				"SUW"=>$current_weighing['wfa'][0],
				"UW"=>$current_weighing['wfa'][1],
				"N"=>$current_weighing['wfa'][2],
				"OW"=>$current_weighing['wfa'][3],
				"OB"=>$current_weighing['wfa'][4]
				);

			$data_xy = array();
			$data_xy['x'] = array_keys($arr_1);

			$data_xy['y'][] = array(							
					'label'=>'Standard Score',
					'backgroundColor'=>$colors,
					'data'=>array_values($arr_1),
					'fill'=>false,
					'borderColor'=>'red'					
				);

			echo json_encode($data_xy);



	}

	public function current_weighing_hfa($value='')
	{
		// code...

		if ($this->aauth->is_admin()) {
			// code...
		$current_weighing = $this->dashboard_model->get_current_weighing();

		}else{
		$current_weighing = $this->dashboard_model->get_current_weighing($this->worker_id);

		}

			$colors = array(
				"orange",
				"red",
				"pink",
				"yellow",
				"green",
				"blue",
				"brown",
				);

			$arr_1 = array(
				"SS"=>$current_weighing['hfa'][0],
				"S"=>$current_weighing['hfa'][1],
				"N"=>$current_weighing['hfa'][2],
				"T"=>$current_weighing['hfa'][3],
				"ST"=>$current_weighing['hfa'][4]
				);

			$data_xy = array();
			$data_xy['x'] = array_keys($arr_1);

			$data_xy['y'][] = array(							
					'label'=>'Standard Score',
					'backgroundColor'=>$colors,
					'data'=>array_values($arr_1),
					'fill'=>false,
					'borderColor'=>'red'					
				);

			echo json_encode($data_xy);



	}

	public function current_weighing_wfh($value='')
	{
		// code...


		if ($this->aauth->is_admin()) {
			// code...
		$current_weighing = $this->dashboard_model->get_current_weighing();

		}else{
		$current_weighing = $this->dashboard_model->get_current_weighing($this->worker_id);

		}
			$colors = array(
				"orange",
				"red",
				"pink",
				"yellow",
				"green",
				"blue",
				"brown",
				);

			$arr_1 = array(
				"SUW"=>$current_weighing['wfh'][0],
				"UW"=>$current_weighing['wfh'][1],
				"N"=>$current_weighing['wfh'][2],
				"OW"=>$current_weighing['wfh'][3],
				"OB"=>$current_weighing['wfh'][4]
				);

			$data_xy = array();
			$data_xy['x'] = array_keys($arr_1);

			$data_xy['y'][] = array(							
					'label'=>'Standard Score',
					'backgroundColor'=>$colors,
					'data'=>array_values($arr_1),
					'fill'=>false,
					'borderColor'=>'red'					
				);

			echo json_encode($data_xy);



	}


	public function current_sector_weighing($type='wfa',$sector='')
	{
		// code...

		if ($this->aauth->is_admin()) {
			// code...
		$current_weighing = $this->dashboard_model->get_current_weighing_bysector($sector);


		}else{
		$current_weighing = $this->dashboard_model->get_current_weighing_bysector($sector,$this->worker_id);


		}

			$colors = array(
				"orange",
				"red",
				"pink",
				"yellow",
				"green",
				"blue",
				"brown",
				);

			$arr_1 = array(
				"SUW"=>$current_weighing[$type][0],
				"UW"=>$current_weighing[$type][1],
				"N"=>$current_weighing[$type][2],
				"OW"=>$current_weighing[$type][3],
				"OB"=>$current_weighing[$type][4]
				);

			$data_xy = array();
			$data_xy['x'] = array_keys($arr_1);

			$data_xy['y'][] = array(							
					'label'=>'Standard Score',
					'backgroundColor'=>$colors,
					'data'=>array_values($arr_1),
					'fill'=>false,
					'borderColor'=>'red'					
				);

			echo json_encode($data_xy);



	}

	public function current_weighing_sector($sector='')
	{
		// code...
		if($result = $this->dashboard_model->get_current_weighing_bysector($sector)){

			$value = $result;
//	if($result = $this->weighing_model->get($student_id)){
		$data = array();// array('status'=>true,'data'=>'');
		$a = array('wfa'=>'','hfa'=>'','wfh'=>'');


			$data_arr = array(
				0=>array('data'=>array(0,0,0),'label'=>"weight for age"),
				1=>array('data'=>array(0,0,0),'label'=>"height for age"),
				2=>array('data'=>array(0,0,0),'label'=>"weight for height")
			);
			$i=0;
			$u_date = '';

		//foreach ($result as $key => $value) {
			// code...


//			if ($sector == 1) {
				// code...
					//$u_date = $value->date_weighing;
					$data_arr[0]['data'] = $value->wfa;
					$data_arr[0]['label'] = 'Weight for age';
					$data_arr[0]['backgroundColor'] = get_colors(0);

					$data_arr[1]['data'] = $value->hfa;
					$data_arr[1]['label'] = "Height for age";
					$data_arr[1]['backgroundColor'] = get_colors(1);

					$data_arr[2]['data'] = $value->wfh;
					$data_arr[2]['label'] = "Weight for height";
					$data_arr[2]['backgroundColor'] = get_colors(2);
//			}

//			$i++;
//		//}
		//$data['data'] = $a;
		echo json_encode(array('status'=>true,'data'=>$data_arr));
	}

	}
} ?>