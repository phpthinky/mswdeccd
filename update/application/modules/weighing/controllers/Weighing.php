<?php 	/**
 * 
 */
class Weighing extends MY_Controller
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
	}
	public function index($value='')
	{
		// code...

		$data = new stdClass();
		$data->workersId = $this->workersId;
		//$data->listMyStudents = $this->workers_model->listMyStudents($this->workersId,$YearId);
		$data->content = 'weighing/index';
		$this->template->dashboard($data);

	}
	public function add()
	{
		// code...
		if ($this->input->post()) {
			// code...
			//echo json_encode(savesuccess());
			$postdata = new stdClass();
			$centerId = $this->workers_model->getMyCenterId($this->workersId);

			$postdata->centerId = $centerId;
			$postdata->weighingSchedule = $this->input->post('dateOfWeighing');
			$postdata->status = 1;
	  	$result = $this->weighing_model->addschedule($postdata);
	  	echo json_encode(showresponse($result));
	  }else{

	  echo json_encode(noinput());
	  }
  }
public function getlist($id='')
{
	// code...
			$centerId = $this->workers_model->getMyCenterId($this->workersId);
			$result = $this->weighing_model->listschedules($centerId);
			if (!empty($result)) {
				// code...
				$data = array();
				foreach ($result as $key => $value) {
					// code...
					$data[] = array(
						$value->scheduleId,
						tomdy($value->weighingSchedule),
						$value->centerName,
						$value->status,
						''
					);
				}
				echo json_encode(array('data'=>$data));
			}else{
				echo json_encode(array('data'=>array()));

			}
}
public function edit($id='')
{
	// code...
	$data = new stdClass();
    $data->content = 'students/edit';
    $this->template->dashboard($data);
}


} ?>