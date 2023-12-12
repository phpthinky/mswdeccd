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
	}
	public function index($site='')
	{
		// code...
		//$activesite = $this->session->userdata('activesite');
		if (!empty($site)) {
			// code...
			switch ($site) {
				case 'nutricare':
					// code...
				$this->session->set_userdata('activesite', 'nutricare');
					break;
				
				default:
					// code...
				$this->session->set_userdata('activesite','assessment');

					break;
			}
		}
		//var_dump($session_data);
		//exit();
		$this->load->model('dashboard/dashboard_model');
		$this->load->model('workers/workers_model');
		$data = new stdClass();
		if ($this->aauth->is_admin()) {
			// code...
		   $data->totalPupils = $this->dashboard_model->getTotalStudents(0,0);
		   $data->totalNormal =$this->dashboard_model->getTotalNormal();
		   $data->totalMalnourish =$this->dashboard_model->getTotalMalnourish();
		   $data->totalObese =$this->dashboard_model->getTotalObese();

		}else{

			$center_id = $this->workers_model->get_center($this->worker_id);
		   $data->totalPupils = $this->dashboard_model->getTotalStudents($center_id,$this->worker_id);

		   $data->totalNormal =$this->dashboard_model->getTotalNormal($center_id,$this->worker_id);
		   $data->totalMalnourish =$this->dashboard_model->getTotalMalnourish($center_id,$this->worker_id);
		   $data->totalObese =$this->dashboard_model->getTotalObese($center_id,$this->worker_id);


	
		}

		  $data->totalWorker = $this->workers_model->getCountAll();
		  $data->totalCenter = $this->centers_model->getCountAll();



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
} ?>