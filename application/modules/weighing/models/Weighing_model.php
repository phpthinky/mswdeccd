<?php 

/**
  * 
  */
 class Weighing_model extends CI_Model
 {
 	function __construct()
 	{
 		// code...
 		parent::__construct();
 	}
  public function add($data)
  {
    // code...

 
    if($this->check($data->pupilsId,$data->scheduleId)){
      return 3;
    }else{
      if($this->db->insert('weighing',$data)){
      return 1;

      }
      return 2;
    }

  }
  public function check($pupilsId,$scheduleId)
  {
    // code...
   if($result =  $this->db->get_where('weighing',array('pupilsId'=>$pupilsId,'scheduleId'=>$scheduleId))->result()){

    return true;
   }else{
    return false;
   }

  }

  public function get($id)
  {
    // code...
    $this->db->select('a.*,b.weighingSchedule');
    $this->db->from('weighing a');
    $this->db->where('pupilsId',$id);
    $this->db->join('weighing_schedule b','b.scheduleId = a.scheduleId','left');
    $this->db->order_by('weighingSchedule','DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function addschedule($data)
  {
    // code...weighing_schedule
    if (!$this->checkschedule($data)) {
      // code...
      if($this->db->insert('weighing_schedule',$data)){
        return 1;
      }
      return 2;
    }
      return 3;

  }
  public function checkschedule($data)
  {
    // code...
    $this->db->where('centerId',$data->centerId);
    $this->db->where('weighingSchedule',$data->weighingSchedule);
    $q = $this->db->get('weighing_schedule');
    if($q->num_rows() > 0){
      return true;
    }
    return false;
  }
  public function listschedules($centerId)
  {
    // code...
    $this->db->select('a.*,b.centerName');
    $this->db->from('weighing_schedule a');
    $this->db->join('ecenter b','b.centerId = a.centerId','left');
    $this->db->where('a.centerId',$centerId);
    $this->db->group_by('a.weighingSchedule');
    return $this->db->get('weighing_schedule')->result();
  }
  public function getHeight($id)
  {
    // code...


    $this->db->select('a.height');
    $this->db->from('weighing a');
    $this->db->where('pupilsId',$id);
    $this->db->join('weighing_schedule b','b.scheduleId = a.scheduleId','left');
    $this->db->order_by('weighingSchedule','DESC');
    $query = $this->db->get();

    if($query->num_rows() > 0){

      $row = $query->row(0);
      return $row->height;

    }
    return 0;



  }

  public function getWeight($id)
  {
    // code...
    $this->db->select('a.weight');
    $this->db->from('weighing a');
    $this->db->join('weighing_schedule b','b.scheduleId = a.scheduleId','left');
    $this->db->where('pupilsId',$id);
    $this->db->order_by('b.weighingSchedule','desc');
    $this->db->limit('1');
    $query = $this->db->get();
    if($query->num_rows() > 0){

      $row = $query->row(0);
      return $row->weight;

    }
    return 0;

  }
  public function getWeightData($workersId,$centerId,$date_range=false)
  {
    // code...
    if ($date_range) {
      // code...
    }else{

      $this->db->select('a.*,b.weighingSchedule as weighing_date');
      $this->db->from('weighing a');
      $this->db->join('weighing_schedule b','b.scheduleId = a.scheduleId','left');
      $this->db->where('pupilsId',$id);
      $this->db->order_by('b.weighingSchedule','desc');
      $this->db->limit('1');
      $query = $this->db->get();
      if($query->num_rows() > 0){


      }
    }
  }
  public function getlowestdate($pupilsId)
  {
    // code...


      $this->db->select('b.weighingSchedule as weighing_date');
      $this->db->from('weighing a');
      $this->db->join('weighing_schedule b','b.scheduleId = a.scheduleId','left');
      $this->db->where('pupilsId',$id);
      $this->db->order_by('weighing_date','asc');
      $this->db->limit('1');
      $query = $this->db->get();
      if($query->num_rows() > 0){


      }
  }
}