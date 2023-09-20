<?php /**
 * 
 */
class Dashboard extends MY_Controller
{
	
	function __construct()
	{
		// code...
		parent::__construct();
		if(!$this->aauth->is_loggedin()){
			redirect('login');
		}
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
		$data = new stdClass();

		   $data->totalPupils = $this->pupils_model->getCountAll(0,0);
		   $data->totalWorker = $this->workers_model->getCountAll();
		   $data->totalCenter = $this->centers_model->getCountAll();



		$data->content = 'dashboard/index';
		$this->template->dashboard($data);
	}
} ?>