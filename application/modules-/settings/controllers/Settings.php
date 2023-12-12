<?php 

/**
  * 
  */
 class Settings extends MY_Controller
 {
 	
 	function __construct()
 	{
 		// code...
 		parent::__construct();
   
    if (!$this->aauth->is_loggedin()) {
      // code...
      redirect('login?url='.current_url());
    }
    /*
    if (!$this->aauth->is_admin()) {
      // code...
      redirect('permission/deny');
    }
    */
    $this->load->model('centers/centers_model');
    $this->load->model('workers/workers_model');
    $this->load->model('settings/settings_model');
 	}
 	public function index()
 	{


    $data = new stdClass();

    $data->centers = $this->centers_model->getCenters();
    $data->workers = $this->workers_model->getWorkers();
 		$data->content = 'settings/index';
    $this->template->dashboard($data);
  }

    public function schoolyear($data='')
    {
      // code...
      if ( $this->input->post()) {
        $form= $this->input->post('form');
        switch ($form) {
          case 'Add':
            // code...

        $postdata = new stdClass();
        $postdata->YearStart = $this->input->post('startdate');
        $postdata->YearEnd = $this->input->post('enddate');

        if($result = $this->settings_model->class_schedule_save($postdata)){
          echo json_encode(savesuccess());
        }else{
          echo json_encode(showresponse(2));
        }
            break;
          case 'Update':

        $postdata = new stdClass();
        $postdata->YearId = $this->input->post('YearId');
        $postdata->YearStart = $this->input->post('startdate');
        $postdata->YearEnd = $this->input->post('enddate');

        if($result = $this->settings_model->class_schedule_save($postdata)){
          echo json_encode(update());
        }else{
          echo json_encode(update(1));
        }
          break;
          case 'Remove':
            $postdata = array();
            $postdata['YearId'] = $this->input->post('id');
            $result = $this->settings_model->class_schedule_remove($postdata);
          break;
          default:
            // code...
          echo json_encode(noinput());
            break;
        }
      exit();
      }
      $data = new stdClass();
    $data->content = 'settings/schoolyear';

      $this->template->dashboard($data);
    }
    public function listschoolyears($value='')
    {
      // code...
      if($result = $this->settings_model->listschoolyears()){
          $data = array();
        foreach ($result as $key => $value) {
          // code...
          $data[] = array(
            $value->YearId,
            tomdy($value->YearStart).'<input type="hidden" name="td_startdate" value="'.$value->YearStart.'" >',
            tomdy($value->YearEnd).'<input type="hidden" name="td_enddate" value="'.$value->YearEnd.'" >',
            $value->Status,
            '<button class="btn btn-sm btn-default btn-edit-schoolYear" data-id="'.$value->YearId.'"><i class="fas fa-edit"></i></button> | <button class="btn btn-sm btn-default btn-remove-class"  data-id="'.$value->YearId.'"><i class="fas fa-trash"></i></button>'

          );
        }
          echo json_encode(array('status'=>true,'data'=>$data));

       
      }else{
          echo json_encode(array('status'=>false,'data'=>array()));
        }

    }
    public function selectschoolyear($value='')
    {
      // code...
      if ($this->input->post()) {
        // code...
      }
      echo json_encode(array('status'=>false,'msg'=>'No input data.'));
    }
    public function feeding($value='')
    {
      // code...
    }
    public function assessment($value='')
    {
      // code...
    }
    public function rawscoretable($form='',$age_limit='')
    {
      // code...
      if ($this->input->post()) {
        // code...
        $form = $this->input->post('form');

        switch ($form) {
          case 'scaled_score':
            // code...
          $result = $this->settings_model->checkscore($this->input->post('scaled_score'),1);
          echo json_encode(array('status'=>$result));
            break;
          case 'add':
          $postdata = $this->input->post();
          $age_limit = $postdata['age_limit'];
          unset($postdata['age_limit']);
          unset($postdata['form']);

          $data = to_batch_array($postdata,'scaled_score');
          foreach ($data as $key => $value) {
            // code...
            $value['record_no']=1;
            $value['age_limit']=$age_limit;
          $this->settings_model->save_raw_score($value);

          }
            break;

            case 'remove':
            $this->settings_model->removescaledscore($this->input->post('id'));
            break;
          default:
            // code...
          echo json_encode(showresponse(3));

            break;
        }
        exit();
      }
      if (!empty($form)) {
        // code...
        $tabledata = array();
        if($result = $this->settings_model->getrawscores(1,$age_limit)){
          foreach ($result as $key => $value) {
            // code...
            $tabledata[] = array(
              $value->scaled_score,
              $value->gross_motor,
              $value->fine_motor,
              $value->self_help,
              $value->receiptive_lang,
              $value->expressive_lang,
              $value->cognitive,
              $value->social_emotion,
              '<button class="btn btn-sm btn-default btn-remove" data-id="'.$value->id.'"><i class="fas fa-trash"></i></button>'
              );
          }

          echo json_encode(array('data'=>$tabledata));

        }else{
          echo json_encode(array('data'=>array()));
        }
        exit();
      }

      $data = new stdClass();
      
      $data->title = 'Raw Score Table';
      $data->content = 'settings/rawscoretable';
      $this->template->dashboard($data);
    }
    public function sumscaledscore($list='')
    {
      // code...

      // code...
      if ($this->input->post()) {
        // code...
        $form = $this->input->post('form');

        switch ($form) {
          case 'add':
          $postdata = $this->input->post();
          unset($postdata['form']);

          $data = to_batch_array($postdata,'scaled_score');
          foreach ($data as $key => $value) {
            // code...
          $this->settings_model->replacestandardscore($value);

          }
            break;

            case 'remove':
            $this->settings_model->removesumscaledscore($this->input->post('id'));
            break;
          default:
            // code...
          echo json_encode(showresponse(3));

            break;
        }
        exit();
      }
      if (!empty($list)) {
        // code...
        $tabledata = array();
        if($result = $this->settings_model->getsumscaledscores(2)){
          foreach ($result as $key => $value) {
            // code...
            $tabledata[] = array(
              $value->scaled_score,
              $value->standard_score,
              '<button class="btn btn-sm btn-default btn-remove" data-id="'.$value->id.'"><i class="fas fa-trash"></i></button>'
              );
          }

          echo json_encode(array('data'=>$tabledata));

        }else{
          echo json_encode(array('data'=>array()));
        }
        exit();
      }

      $data = new stdClass();
      
      $data->title = 'Raw Score Table';
      $data->content = 'settings/standardscoretable';
      $this->template->dashboard($data);
    }
    public function zscorewfh($form='')
    {
      $data = new stdClass();

      $data->title = 'Z Score Table';
      $data->content = 'settings/wfh';
      $this->template->dashboard($data);
      
    }

    public function zscorewfa($form='')
    {
      // code...
      if (!empty($_GET['form'])) {
        // code...
        $form = $_GET['form'];
        $listdata = $this->settings_model->getWFH();
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
              ''

            );

          }
          echo json_encode(array('data'=>$data));
        }
        exit();
      }

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
        
        exit();
      }
      $data = new stdClass();

      $data->title = 'Z Score Table';
      $data->content = 'settings/wfa';
      $this->template->dashboard($data);
      
    }
    public function address($value='')
    {
      // code...

      $data = new stdClass();
      $data->list_all = array();
      $data->title = 'Address Managements';
      $data->content = 'settings/address';
      $this->template->dashboard($data);
       
    }
    public function backup($value='')
    {
      // code...
      $result = false;
      if ($this->input->post()) {
        // code...
        $form = $this->input->post('form');
        switch ($form) {
          case 'Reset':
            // code...
          $result = "Tables successfully emptied".
          $this->settings_model->reset_all();
            break;
            case 'Update':
            $result = $this->settings_model->update_table();
            break;
          
          default:
            // code...
          $result = "No input received.";

            break;
        }
      }
      $data = new stdClass();
      $data->action = $result;
      $data->content = 'settings/backup';
      $this->template->dashboard($data);    

    }
  }


?>

