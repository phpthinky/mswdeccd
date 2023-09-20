<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nutricare extends MY_Controller
  {
    private $user_id;
  public function __construct()
  {
    // code...
    parent::__construct();
       
    if (!$this->aauth->is_loggedin()) {
      // code...
      redirect('login?url='.current_url());
    }
    $this->user_id= $this->session->userdata('id');
    //$this->aauth->add_member($this->user_id,'nutricare');
    //exit();
    if(!$this->aauth->is_member('nutricare',$this->user_id) || !$this->aauth->is_admin($this->user_id) ) {
      redirect('permission/deny');
    }
    

    $this->load->model('pupils/pupils_model');
  
  }

  public function index() {
    //$this->aauth->create_group('hobbits');
//$this->aauth->create_group('elves');
  //  $this->aauth->create_user('gandalf@example.com', 'gandalfpass', 'GandalfTheGray');
    
//$this->aauth->create_perm('walk_unseen');
//$this->aauth->create_perm('immortality');

//$this->aauth->allow_group('hobbits','walk_unseen');
//$this->aauth->allow_group('elves','immortality');

//$this->aauth->allow_user(4,'immortality');
  /*
if($this->aauth->is_group_allowed('hobbits','immortality')){
  echo "Hobbits are immortal";
} else {
  echo "Hobbits are NOT immortal";
}
* /
$r = $this->aauth->allow_user(3,2);
//var_dump($r);
//exit();
//$grop = $this->aauth->list_groups();
//var_dump($grop);
if($this->aauth->is_allowed(2,4)){
  echo "Gandalf is immortal";
} else {
  echo "Gandalf is NOT immortal";
}
       // echo $this->aauth->get_errors();
*/
//$this->aauth->update_perm(1,'teacher');
//$this->aauth->update_perm(2,'secretary');
 //$result = $this->aauth->list_group_perms('nutricare');

 //echo "<pre/>";
 //echo json_encode($result);
 //$this->aauth->delete_user(2);
 //$this->aauth->delete_user(3);
 //$this->aauth->delete_user(4);
//$this->aauth->create_user('teacher1@gmail.com','123456','teacher1');
//$this->aauth->create_user('teacher2@gmail.com','123456','teacher2');
//$this->aauth->allow_user(5,1);
//$this->aauth->allow_user(6,1);
 
//$teacher1 = $this->aauth->is_member(4,1);
//var_dump($teacher1);
    //exit();
   $data = new stdClass();
   $data->content = 'nutricare/index';

   $data->totalPupils = $this->pupils_model->getCountAll(0,0);


   $this->template->nutricare($data);

  }
  public function center($value='')
  {
    // code...
    $data = new stdClass();
    $data->title = 'Daycare Center';
    $data->content ='nutricare/center';
    $this->template->nutricare($data);
  }
  public function workers($value='')
  {
    // code...

    $data = new stdClass();
    $data->title = 'Daycare Center';
    $data->content ='nutricare/workers';
    $this->template->nutricare($data);
  }

  public function logout() {
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('role');
    $this->session->unset_userdata('id');
    $this->session->sess_destroy();
    redirect('home');
  }

}