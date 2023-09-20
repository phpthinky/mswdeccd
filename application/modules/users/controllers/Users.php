<?php 

/**
  * 
  */
 class Users extends MY_Controller
 {
 	private $userId;
 	function __construct()
 	{
 		// code...
 		parent::__construct();
 		if(!$this->aauth->is_loggedin()){
 			redirect('login');
 		}
 		$this->userId = $this->session->userdata('id');
 	}
 	public function index($value='')
 	{
 		// code...
 		$data = new stdClass();

 		$users = $this->aauth->get_user();
 		$data->email = $users->email;
 		$data->username = $users->email;
 		$data->content = 'users/index';
 		$this->template->dashboard($data);
 	}
 	public function update()
 	{
 		// code...
 		if ($this->input->post()) {
 			// code...
			$this->aauth->update_user($this->userId,$this->input->post('email'));
			exit();
		 		$users = $this->aauth->get_user();
		 		if ($users->pass == $this->aauth->hash_password($this->input->post('cpassword'),$this->userId)) {
		 			// code...

		 			if($result = $this->aauth->update_user($this->userId,$this->input->post('email'),$this->input->post('npassword'),$this->input->post('username'))){

		 				echo json_encode(showresponse(11));	
			 		}else{

			 			echo json_encode(showresponse(2));
			 		}
		 		}else{
		 			echo json_encode(array('status'=>false,'msg'=>'Invalid password!'));
		 		}
 		}else{
 			echo json_encode(noinput());
 		}
 	}

 } ?>