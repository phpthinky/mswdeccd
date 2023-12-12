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
	}
	public function feeding($worker_id=0,$year_start='',$year_end='')
	{
		// code...


		$data = new stdClass();
		
		$data->list_feeding = $this->reports_model->get_supplementary_feeding();
		$data->content = 'reports/supplementaryfeeding';
		$this->template->dashboard($data);
	}
}

 ?>