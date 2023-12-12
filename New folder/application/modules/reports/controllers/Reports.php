<?php 
/**
 * 
 */
class Reports extends MY_Controller
{
	private $worker_id = 0;
	function __construct()
	{
		// code...
		parent::__construct();
		if (!$this->aauth->is_loggedin()) {
			// code...
			redirect('login');
		}
		$this->worker_id = $this->session->userdata('workersId');
		$this->load->model('reports/reports_model');
		$this->load->model('settings/settings_model');
	}
	public function feeding($worker_id=0,$year_start='',$year_end='')
	{
		// code...


		$data = new stdClass();
		
		$data->list_feeding = $this->reports_model->get_supplementary_feeding();
		$data->content = 'reports/supplementaryfeeding';
		$this->template->dashboard($data);
	}
	public function assessment($domain='')
	{
		// code...
		if ($domain ==  'all') {
			// code...
			$this->assessment_all();
			//exit();
		}else{

			if ($this->input->post()) {
				// code...
				var_dump($this->input->post());
				exit();
			}


			$data = new stdClass();

		    $data->schoolyears = $this->settings_model->listschoolyears();

		    $data->centers = $this->centers_model->getCenters();
		    $data->workers = $this->workers_model->getWorkers();
				
			$data->content = 'reports/assessment';
			$this->template->dashboard($data);

		}
	}
	private function assessment_all(){

		$data = new stdClass();

	    $data->schoolyears = $this->settings_model->listschoolyears();

	    $data->centers = $this->centers_model->getCenters();
	    $data->workers = $this->workers_model->getWorkers();
			
		$data->content = 'reports/assessment_all';
		$this->template->dashboard($data);

	}


	public function get_assessment($value='')
	{
		// code...
		if ($this->input->post()) {
			// code...
			$data = new stdClass();
			$data->center_id= $this->input->post('center_id');
			$data->year_id= $this->input->post('year_id');
			$data->domain= $this->input->post('domain');
			$type = $this->input->post('type');

			if ($type == 2) {
				// code...
			$schedule = $this->input->post('s_schedule');

			}else{
			$schedule = $this->input->post('schedule');

			}
			
			$order_by =$this->input->post('score_sort_by');
			$result =$this->reports_model->get_assessment_rawscore($data,$schedule,$order_by);
			//var_dump($result);
			if (empty($result)) {
				// code...
				echo json_encode(noinput());
				exit;
			}
			$data = array();
			foreach ($result as $key => $value) {
				
				if ($type == 1) {
					// code...
					
					if ($schedule == 'raw_score_1') {
						// code...
						$data[$key]['student_name']=$value->student_name;
						$data[$key]['score']=$value->raw_score_1;
					}
					if ($schedule == 'raw_score_2') {
					
						$data[$key]['student_name']=$value->student_name;
						$data[$key]['score']=$value->raw_score_2;
					}
					if ($schedule == 'raw_score_3') {

						$data[$key]['student_name']=$value->student_name;
						$data[$key]['score']=$value->raw_score_3;
					}
				}
				if ($type ==  2) {
					// code...
					
					if ($schedule == 'raw_score_1') {
						// code...
						$data[$key]['student_name']=$value->student_name;
						$data[$key]['score']=$value->scaled_score_1;
					}
					if ($schedule == 'raw_score_2') {
					
						$data[$key]['student_name']=$value->student_name;
						$data[$key]['score']=$value->scaled_score_2;
					}
					if ($schedule == 'raw_score_3') {

						$data[$key]['student_name']=$value->student_name;
						$data[$key]['score']=$value->scaled_score_3;
					}
				}
				if ($type == 3) {
					// code...

					if ($schedule == 'raw_score_1') {
						// code...
						$data[$key]['student_name']=$value->student_name;
						$data[$key]['score']=$value->scaled_score_1;
					}
					if ($schedule == 'raw_score_2') {
					
						$data[$key]['student_name']=$value->student_name;
						$data[$key]['score']=$value->scaled_score_2;
					}
					if ($schedule == 'raw_score_3') {

						$data[$key]['student_name']=$value->student_name;
						$data[$key]['score']=$value->scaled_score_3;
					}

				}

			}
			echo  json_encode(array('data'=>$data));
			exit();
		}

				echo json_encode(noinputdata());
				exit;
	}

	public function get_assessment_all($center_id=0,$year_id=0,$type='raw_score',$schedule=1)
	{

    if ($result = $this->reports_model->list_all_students($center_id,$year_id)) {
      //echo "$type $schedule";
      //var_dump($result);
      //exit;
      $data = array();
      $i = 0;
      $j=1;
    	$this->load->model('assessment/assessment_model','massessment');
      if ($type =='raw_score') {
        // code...
      foreach ($result as $key => $value) {
        // code...
        $data[$i] = $value;
        if ($schedule == 1) {
          // coschedulede...       
        $domain = $this->massessment->get_raw_score($value->student_id,'gross_motor'); 
        $data[$i]->gross_motor = (!empty($domain) ? $domain[0]->raw_score_1 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'fine_motor'); 
        $data[$i]->fine_motor = (!empty($domain) ? $domain[0]->raw_score_1 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'self_help'); 
        $data[$i]->self_help = (!empty($domain) ? $domain[0]->raw_score_1 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'expressive_lang'); 
        $data[$i]->expressive_lang = (!empty($domain) ? $domain[0]->raw_score_1 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'receiptive_lang'); 
        $data[$i]->receiptive_lang = (!empty($domain) ? $domain[0]->raw_score_1 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'cognitive'); 
        $data[$i]->cognitive = (!empty($domain) ? $domain[0]->raw_score_1 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'social_emotion'); 
        $data[$i]->social_emotion = (!empty($domain) ? $domain[0]->raw_score_1 : 0);
        $data[$i]->no = $j;
        }
        if ($schedule == 2) {
          // code...

        $domain = $this->massessment->get_raw_score($value->student_id,'gross_motor'); 
        $data[$i]->gross_motor = (!empty($domain) ? $domain[0]->raw_score_2 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'fine_motor'); 
        $data[$i]->fine_motor = (!empty($domain) ? $domain[0]->raw_score_2 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'self_help'); 
        $data[$i]->self_help = (!empty($domain) ? $domain[0]->raw_score_2 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'expressive_lang'); 
        $data[$i]->expressive_lang = (!empty($domain) ? $domain[0]->raw_score_2 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'receiptive_lang'); 
        $data[$i]->receiptive_lang = (!empty($domain) ? $domain[0]->raw_score_2 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'cognitive'); 
        $data[$i]->cognitive = (!empty($domain) ? $domain[0]->raw_score_2 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'social_emotion'); 
        $data[$i]->social_emotion = (!empty($domain) ? $domain[0]->raw_score_2 : 0);
        $data[$i]->no = $j;
        
 
        }
        if ($schedule == 3) {
          // code...
        
        $domain = $this->massessment->get_raw_score($value->student_id,'gross_motor'); 
        $data[$i]->gross_motor = (!empty($domain) ? $domain[0]->raw_score_3 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'fine_motor'); 
        $data[$i]->fine_motor = (!empty($domain) ? $domain[0]->raw_score_3 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'self_help'); 
        $data[$i]->self_help = (!empty($domain) ? $domain[0]->raw_score_3 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'expressive_lang'); 
        $data[$i]->expressive_lang = (!empty($domain) ? $domain[0]->raw_score_3 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'receiptive_lang'); 
        $data[$i]->receiptive_lang = (!empty($domain) ? $domain[0]->raw_score_3 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'cognitive'); 
        $data[$i]->cognitive = (!empty($domain) ? $domain[0]->raw_score_3 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'social_emotion'); 
        $data[$i]->social_emotion = (!empty($domain) ? $domain[0]->raw_score_3 : 0);
        $data[$i]->no = $j;
        
        
        }
        
        $i++;
        $j++;
      }

      }else if ($type == 'scaled_score') {
      foreach ($result as $key => $value) {
        $data[$i] = $value;
        if ($schedule == 1) {
          // coschedulede...       
        $domain = $this->massessment->get_raw_score($value->student_id,'gross_motor'); 
        $data[$i]->gross_motor = (!empty($domain) ? $domain[0]->scaled_score_1 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'fine_motor'); 
        $data[$i]->fine_motor = (!empty($domain) ? $domain[0]->scaled_score_1 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'self_help'); 
        $data[$i]->self_help = (!empty($domain) ? $domain[0]->scaled_score_1 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'expressive_lang'); 
        $data[$i]->expressive_lang = (!empty($domain) ? $domain[0]->scaled_score_1 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'receiptive_lang'); 
        $data[$i]->receiptive_lang = (!empty($domain) ? $domain[0]->scaled_score_1 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'cognitive'); 
        $data[$i]->cognitive = (!empty($domain) ? $domain[0]->scaled_score_1 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'social_emotion'); 
        $data[$i]->social_emotion = (!empty($domain) ? $domain[0]->scaled_score_1 : 0);
        $data[$i]->no = $j;
        }
        if ($schedule == 2) {
          // code...

        $domain = $this->massessment->get_raw_score($value->student_id,'gross_motor'); 
        $data[$i]->gross_motor = (!empty($domain) ? $domain[0]->scaled_score_2 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'fine_motor'); 
        $data[$i]->fine_motor = (!empty($domain) ? $domain[0]->scaled_score_2 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'self_help'); 
        $data[$i]->self_help = (!empty($domain) ? $domain[0]->scaled_score_2 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'expressive_lang'); 
        $data[$i]->expressive_lang = (!empty($domain) ? $domain[0]->scaled_score_2 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'receiptive_lang'); 
        $data[$i]->receiptive_lang = (!empty($domain) ? $domain[0]->scaled_score_2 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'cognitive'); 
        $data[$i]->cognitive = (!empty($domain) ? $domain[0]->scaled_score_2 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'social_emotion'); 
        $data[$i]->social_emotion = (!empty($domain) ? $domain[0]->scaled_score_2 : 0);
        $data[$i]->no = $j;
        
        
        }
        if ($schedule == 3) {
          // code...
        

        $domain = $this->massessment->get_raw_score($value->student_id,'gross_motor'); 
        $data[$i]->gross_motor = (!empty($domain) ? $domain[0]->scaled_score_3 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'fine_motor'); 
        $data[$i]->fine_motor = (!empty($domain) ? $domain[0]->scaled_score_3 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'self_help'); 
        $data[$i]->self_help = (!empty($domain) ? $domain[0]->scaled_score_3 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'expressive_lang'); 
        $data[$i]->expressive_lang = (!empty($domain) ? $domain[0]->scaled_score_3 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'receiptive_lang'); 
        $data[$i]->receiptive_lang = (!empty($domain) ? $domain[0]->scaled_score_3 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'cognitive'); 
        $data[$i]->cognitive = (!empty($domain) ? $domain[0]->scaled_score_3 : 0);
        $domain = $this->massessment->get_raw_score($value->student_id,'social_emotion'); 
        $data[$i]->social_emotion = (!empty($domain) ? $domain[0]->scaled_score_3 : 0);
        $data[$i]->no = $j;
        
        
        }
        
        $i++;
        $j++;
      }
      }
      echo json_encode(array('data'=>$data));

    }else{
      echo json_encode(array('data'=>array()));

    }

	}

} ?>