<?php 
defined('BASEPATH') or exit('No access allowed!');

/**
 * 
 */
class Charts extends MY_Controller
{
	
	function __construct()
	{
		// code...
		parent::__construct();

		$this->load->model('Charts_model','mcharts');
		$this->load->model('students/students_model','mstudents');
	}
	public function scaled_score($student_id,$type,$style=false)
	{
		// code...
		$result = $this->mcharts->scaled_score($student_id);
		$ydata_1 = array();
		$ydata_2 = array();
		$ydata_3 = array();
		if (!empty($result)) {
			// code...
			foreach ($result as $key => $value) {
				// code...
				$ydata_1[$value->domain] = $value->scaled_score_1;
				$ydata_2[$value->domain] = $value->scaled_score_2;
				$ydata_3[$value->domain] = $value->scaled_score_3;
				/*
				if ($type== 1) {
					// code...
				$data[$value->domain] = $value->scaled_score_1;

				}
				if($type == 2){
				$data[$value->domain] = $value->scaled_score_2;

				}

				if($type == 3){
				$data[$value->domain] = $value->scaled_score_3;

				}
				*/
				


			}
			$arr_1 = array(
				"GROSS MOTOR"=>isset($ydata_1['gross_motor']) ? $ydata_1['gross_motor'] : 0,
				"FINE MOTOR"=>isset($ydata_1['fine_motor']) ? $ydata_1['fine_motor'] : 0,
				"SELF HELP"=>isset($ydata_1['self_help']) ? $ydata_1['self_help'] : 0,
				"EXPRESSIVE LANGUAGE"=>isset($ydata_1['expressive_lang']) ? $ydata_1['expressive_lang'] : 0,
				"RECEIPTIVE LANGUAGE"=>isset($ydata_1['receiptive_lang']) ? $ydata_1['receiptive_lang'] : 0,
				"COGNITIVE"=>isset($ydata_1['cognitive']) ? $ydata_1['cognitive'] : 0,
				"SOCIAL EMOTIONAL"=>isset($ydata_1['social_emotion']) ? $ydata_1['social_emotion'] : 0
				);

			$arr_2 = array(
				"GROSS MOTOR"=>isset($ydata_2['gross_motor']) ? $ydata_2['gross_motor'] : 0,
				"FINE MOTOR"=>isset($ydata_2['fine_motor']) ? $ydata_2['fine_motor'] : 0,
				"SELF HELP"=>isset($ydata_2['self_help']) ? $ydata_2['self_help'] : 0,
				"EXPRESSIVE LANGUAGE"=>isset($ydata_2['expressive_lang']) ? $ydata_2['expressive_lang'] : 0,
				"RECEIPTIVE LANGUAGE"=>isset($ydata_2['receiptive_lang']) ? $ydata_2['receiptive_lang'] : 0,
				"COGNITIVE"=>isset($ydata_2['cognitive']) ? $ydata_2['cognitive'] : 0,
				"SOCIAL EMOTIONAL"=>isset($ydata_2['social_emotion']) ? $ydata_2['social_emotion'] : 0
				);

			$arr_3 = array(
				"GROSS MOTOR"=>isset($ydata_3['gross_motor']) ? $ydata_3['gross_motor'] : 0,
				"FINE MOTOR"=>isset($ydata_3['fine_motor']) ? $ydata_3['fine_motor'] : 0,
				"SELF HELP"=>isset($ydata_3['self_help']) ? $ydata_3['self_help'] : 0,
				"EXPRESSIVE LANGUAGE"=>isset($ydata_3['expressive_lang']) ? $ydata_3['expressive_lang'] : 0,
				"RECEIPTIVE LANGUAGE"=>isset($ydata_3['receiptive_lang']) ? $ydata_3['receiptive_lang'] : 0,
				"COGNITIVE"=>isset($ydata_3['cognitive']) ? $ydata_3['cognitive'] : 0,
				"SOCIAL EMOTIONAL"=>isset($ydata_3['social_emotion']) ? $ydata_3['social_emotion'] : 0
				);

			$types = $this->input->post('type');
			$colors = array(
				"orange",
				"red",
				"pink",
				"yellow",
				"green",
				"blue",
				"brown",
				);
			$data_xy = array();
			$data_xy['x'] = array_keys($arr_1);

			if (!empty($types)) {
				// code...
				foreach ($types as $key => $value) {
					// code...
					/*
					if ($value == 1) $data_xy['y'][] = array_values($arr_1);
					if ($value == 2) $data_xy['y'][] = array_values($arr_2);
					if ($value == 3) $data_xy['y'][] = array_values($arr_3);
					*/
					if ($value == 1) {
						// code...
						$data_xy['y'][] = array(
							
							'label'=>'First Assessment',
							'backgroundColor'=>$colors,
							'data'=>array_values($arr_1),
							'fill'=>false,
							'borderColor'=>$colors[0]						
						);
					}

					if ($value == 2) {
						// code...
						$data_xy['y'][] = array(
							
							'label'=>'Second Assessment',
							'backgroundColor'=>$colors,
							'data'=>array_values($arr_2),
							'fill'=>false,
							'borderColor'=>$colors[1]					
						);
					}

					if ($value == 3) {
						// code...
						$data_xy['y'][] = array(
							
							'label'=>'Second Assessment',
							'backgroundColor'=>$colors,
							'data'=>array_values($arr_3),
							'fill'=>false,
							'borderColor'=>$colors[2]					
						);
					}
				}
				//echo json_encode($data_xy);
			}
			//exit;
			//$data_xy = array('x'=>array_keys($arr_1),'y'=>array(array_values($arr_1),array_values($arr_2),array_values($arr_3)));
			echo json_encode(array('status'=>true,'data'=>$data_xy));
		}
	}


	public function standard_score($student_id=0)
	{
		// code...
		$standard_score = intval($student_id);
			$data_xy = array();
			$data_xy['x'] = array('3 years & 1 moth','4 years','5 years');

		if($result = $this->mcharts->standard_score($student_id)){

			$student = $this->mstudents->info($student_id);

			$data_arr = array(
				0=>array('data'=>array(0,0,0),'label'=>""),
				1=>array('data'=>array(0,0,0),'label'=>""),
				2=>array('data'=>array(0,0,0),'label'=>"")
			);


			$i=0;
			$label = array();
			$colors = array(
				"orange",
				"red",
				"pink",
				"yellow",
				"green",
				"blue",
				"brown",
				);
			foreach ($result as $key => $value) {
			$age = getAge($student->birthDate,$value->date_assessment);
			$year = $age->y;
			$month = $age->m;
			$years = $year + ($month/12);
				///echo "$year & $month month";
			if ($years > 3.08 && $years < 4) {
				// code...
				if ($i == 0) {
					// code...
					$data_arr[0]['data'][0] = get_standard_score($value->sum_scaled_score);
					$data_arr[0]['label'] = $value->date_assessment;
					$data_arr[0]['backgroundColor'] = get_colors($i);

				}

				if ($i == 1) {
					// code...
					$data_arr[1]['data'][0] = get_standard_score($value->sum_scaled_score);
					$data_arr[1]['label'] = $value->date_assessment;
					$data_arr[1]['backgroundColor'] = get_colors($i);

				}

				if ($i == 2) {
					// code...
					$data_arr[2]['data'][0] = get_standard_score($value->sum_scaled_score);
					$data_arr[2]['label'] = $value->date_assessment;
					$data_arr[2]['backgroundColor'] = get_colors($i);

				}
			}

			if ($years >= 4 && $years < 5) {
				// code...

				//$data_xy['y']['4'][] = array('label'=>$value->date_assessment,'data'=>get_standard_score($value->sum_scaled_score));

				if ($i == 0) {
					// code...
					$data_arr[0]['data'][1] = get_standard_score($value->sum_scaled_score);
					$data_arr[0]['label'] = $value->date_assessment;
					$data_arr[0]['backgroundColor'] = get_colors($i);

				}

				if ($i == 1) {
					// code...
					$data_arr[1]['data'][1] = get_standard_score($value->sum_scaled_score);
					$data_arr[1]['label'] = $value->date_assessment;
					$data_arr[1]['backgroundColor'] = get_colors($i);

				}

				if ($i == 2) {
					// code...
					$data_arr[2]['data'][1] = get_standard_score($value->sum_scaled_score);
					$data_arr[2]['label'] = $value->date_assessment;
					$data_arr[2]['backgroundColor'] = get_colors($i);

				}

			}

			if ($years > 5) {
				// code...

				//$data_xy['y']['5'][] = array('label'=>$value->date_assessment,'data'=>get_standard_score($value->sum_scaled_score);

				if ($i == 0) {
					// code...
					$data_arr[0]['data'][2] = get_standard_score($value->sum_scaled_score);
					$data_arr[0]['label'] = $value->date_assessment;
					$data_arr[0]['backgroundColor'] = get_colors($i);

				}

				if ($i == 1) {
					// code...
					$data_arr[1]['data'][2] = get_standard_score($value->sum_scaled_score);
					$data_arr[1]['label'] = $value->date_assessment;
					$data_arr[1]['backgroundColor'] = get_colors($i);

				}

				if ($i == 2) {
					// code...
					$data_arr[2]['data'][2] = get_standard_score($value->sum_scaled_score);
					$data_arr[2]['label'] = $value->date_assessment;
					$data_arr[2]['backgroundColor'] = get_colors($i);

				}

			}
			$label[$i] = $value->date_assessment;
			++$i;
			}

				//echo json_encode(array('status'=>true,'data'=>$data_xy));

				
				echo json_encode(array('status'=>true,'data'=>$data_arr,'label'=>$label));
		}else{
				echo json_encode(array('status'=>true,'data'=>$data_xy));

		}
	}



public function weighing($student_id)
{
	// code...
	if($result = $this->weighing_model->get($student_id)){
		$data = array();// array('status'=>true,'data'=>'');
		$a = array('upon_entry'=>'','20_days'=>'','40_days'=>'','terminal'=>'');


			$data_arr = array(
				0=>array('data'=>array(0,0,0,0),'label'=>"height"),
				1=>array('data'=>array(0,0,0,0),'label'=>"weight")
			);
			$i=0;
			$u_date = '';

		foreach ($result as $key => $value) {
			// code...


			if ($value->weighing_type == 1) {
				// code...
					$u_date = $value->date_weighing;
					$data_arr[0]['data'][0] = $value->weight;
					$data_arr[0]['label'] = 'Weight';
					$data_arr[0]['backgroundColor'] = get_colors(0);

					$data_arr[1]['data'][0] = $value->height;
					$data_arr[1]['label'] = "Height";
					$data_arr[1]['backgroundColor'] = get_colors(1);
			}

			if ($value->weighing_type == 2) {
				// code...
					$data_arr[0]['data'][1] = $value->weight;
					$data_arr[0]['label'] = 'Weight';
					$data_arr[0]['backgroundColor'] = get_colors(0);

					$data_arr[1]['data'][1] = $value->height;
					$data_arr[1]['label'] = "Height";
					$data_arr[1]['backgroundColor'] = get_colors(1);

			}
			if ($value->weighing_type == 3) {
				// code...
									$data_arr[0]['data'][2] = $value->weight;
					$data_arr[0]['label'] = 'Weight';
					$data_arr[0]['backgroundColor'] = get_colors(0);

					$data_arr[1]['data'][2] = $value->height;
					$data_arr[1]['label'] = "Height";
					$data_arr[1]['backgroundColor'] = get_colors(1);

			}
			if ($value->weighing_type == 4) {
				// code...
					$data_arr[0]['data'][3] = $value->weight;
					$data_arr[0]['label'] = 'Weight';
					$data_arr[0]['backgroundColor'] = get_colors(0);

					$data_arr[1]['data'][3] = $value->height;
					$data_arr[1]['label'] = "Height";
					$data_arr[1]['backgroundColor'] = get_colors(1);

			}
			$i++;
		}
		//$data['data'] = $a;
		echo json_encode(array('status'=>true,'data'=>$data_arr,'u_date'=>$u_date));
	}

}



} /* end class */

 ?>