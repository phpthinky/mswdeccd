<?php 

/**
  * 
  */
 class Charts_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		// code...
 		parent::__construct();
 	}
 	public function scaled_score($student_id=0)
 	{
 		// code...
    	return $this->db->get_where('v_raw_score',array('student_id'=>$student_id))->result();


 	}

 	public function standard_score($student_id=0)
 	{
 		// code...
    	return $this->db->get_where('v_sum_scaled_score',array('student_id'=>$student_id))->result();


 	}

  public function get_sum_scaled_score($worker_id=0,$year_id=0,$type=0)
  {
    // code...
    return $this->db->get_where('v_sum_scaled_score',array('worker_id'=>$worker_id,'year_id'=>$year_id,'type'=>$type))->result();
  }
 } 
?>