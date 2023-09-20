<?php 
/**
 * 
 */
class Template extends MY_Controller
{
	
	function __construct()
	{
		// code...
		parent::__construct();
	}
	public function dashboard($data='')
	{
		// code...
		//$data->content = 'settings/index';
		$this->load->view('template/dashboard_template',$data);
	}
	public function default($data='')
	{
		// code...
		$data->content = 'Home/index';
		$this->load->view('template/default_template',$data);
	}
	public function nutricare($data='')
	{
		// code...
		$this->load->view('template/nutricare_template',$data);
	}
	public function iassess($data='')
	{
		// code...

		$this->load->view('template/iassess_template',$data);
	}
}

 ?>