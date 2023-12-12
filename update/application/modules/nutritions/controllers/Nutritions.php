<?php 

/**
 * 
 */
class Nutritions extends MY_Controller
{
	
	function __construct()
	{
		// code...
		parent::__construct();
		$this->init();
	}
	public function init()
	{
		// code...
		if (!$this->aauth->is_loggedin()) {
			// code...
			redirect('login');
		}
			$this->load->model('nutritions_model');

	}
	public function index()
	{
		// code...
		$data = new stdClass();
		$data->content = 'nutritions/index';
		$this->template->dashboard($data);
	}
	public function wfh()
	{
		// code...
		if ($this->input->post()) {
			// code...
			$form = $this->input->post('form');
			switch ($form) {
				case 'remove':
					// code...
					if($this->nutritions_model->remove_wfh($this->input->post('id'))){
						echo json_encode(array('status'=>true,'mg'=>'Successfully removed.'));
					}else{
						echo json_encode(array('status'=>false,'mg'=>'Nothing to removed.'));

					}

					break;
				case 'add':

				$this->add();
				break;
				default:
					// code...
				echo json_encode(noinputdata());
					break;
			}

			exit();
		}

		$data = new stdClass();
		$data->table = 'listdata_wfh';
		$data->content = 'nutritions/wfh';
		$this->template->dashboard($data);
	}
	public function listdata_wfh($value='')
	{
        $listdata = $this->nutritions_model->getWFH();
        if (!empty($listdata)) {
          // code...
          $data = array();
          foreach ($listdata as $key => $value) {
            // code...
            $data[] = array(
              $value->height,
              $value->su_weight,
              $value->u_weight,
              $value->n_weight,
              $value->ov_weight,
              $value->ob_weight,
              '<button class="btn btn-default bt-xs btn-trash" data-id="'.$value->id.'"><i class="fas fa-trash"></i></button>'

            );

          }
          echo json_encode(array('data'=>$data));
     	}else{
     		echo json_encode(array('data'=>false));
     	}
	}
	public function add_wfh($value='')
	{
		// code...
		if ($this->input->post()) {
			// code...

        $postdata = $this->input->post();
        $insertdata = array();
        $insertdata['height'] = $postdata['height'];
        $insertdata['su_weight'] = $postdata['suw'];
        $insertdata['u_weight'] = $postdata['uw'];
        $insertdata['n_weight'] = $postdata['nw'];
        $insertdata['ov_weight'] = $postdata['ovw'];
        $insertdata['ob_weight'] = $postdata['obw'];
        $insertdata['gender'] = $postdata['gender'];
        $insertdata['age'] = $postdata['age_limit'];

        $this->settings_model->addWFH($insertdata);
        
		}
	}
	public function wfa($value='')
	{
		// code...
		if ($this->input->post()) {
			// code...

			$postdata = $this->input->post();

			$form = $postdata['form'];
			unset($postdata['form']);

			switch ($form) {
				case 'Add':
					// code...
					
					if (!empty($postdata['age'])) {
						// code...
						$this->nutritions_model->addWFA($postdata);
					}
					break;

					case 'Remove':
						$this->nutritions_model->removeWFA($postdata);
					break;
				
				default:
					// code...
				echo json_encode($noinputdata);
					break;
			}
			exit();
		}
		$data = new stdClass();
		$data->content = 'nutritions/wfa';
		$this->template->dashboard($data);


	}

	public function hfa($value='')
	{
		// code...
		if ($this->input->post()) {
			// code...
			$postdata = $this->input->post();

			var_dump($postdata);
			exit();
		}
		$data = new stdClass();
		$data->content = 'nutritions/hfa';
		$this->template->dashboard($data);

		
	}
}

 ?>