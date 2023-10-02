<?php 

/**
  * 
  */
 class Settings_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		// code...
 		parent::__construct();
 	}
 	public function addschoolyear($data)
 	{
 		// code...
 		if(!$this->isExist($data)){
 			$this->db->insert('eschoolyear',$data);
 			return $this->db->insert_id();
 		}
 		return false;
 	}
 	public function isExist($data)
 	{
 		// code...
 		$this->db->select('*');
 		$this->db->from('eschoolyear');
 		$this->db->where('YearStart',$data->YearStart);
 		$this->db->where('YearEnd',$data->YearEnd);
 		$query =  $this->db->get();
 		if ($query->num_rows() > 0) {
 			// code...
 			return true;
 		}
 		return false;
 	}
 	public function listschoolyears()
 	{
 		// code...
 		return $this->db->get('eschoolyear')->result();
 	}





//scaled score equivalent raw score 
  public function getrawscores($recordno='',$age_limit=0)
  {
    // code...
    if ($age_limit > 0) {
      // code...
  return $this->db->get_where('assessment_raw_score',array('record_no'=>$recordno,'age_limit'=>$age_limit))->result();
    }else{
  return $this->db->get_where('assessment_raw_score',array('record_no'=>$recordno,'age_limit'=>1))->result();

    }
  }

  public function save_raw_score($data)
  {
    // code...
    if($row = $this->db->get_where('assessment_raw_score',array('age_limit'=>$data['age_limit'],'scaled_score'=>$data['scaled_score'],'record_no'=>$data['record_no']))->row(0)) {
      // code...
      $this->db->where('id',$row->id);
      $this->db->update('assessment_raw_score',$data);
    }else{
      $this->db->insert('assessment_raw_score',$data);
    }
    //return $this->db->replace('assessment_raw_score',$data);
}


  public function removescaledscore($id,$recordno='')
  {
    // code...
    $this->db->where('id',$id);
    return $this->db->delete('assessment_raw_score');
  }



//standard score equivalent  sum scaled scores


  public function getsumscaledscores($recordno='')
  {
    // code...
  return $this->db->get_where('assessment_sum_scaled_score',array('record_no'=>$recordno))->result();
  }

  public function replacestandardscore($data)
  {
    // code...
    return $this->db->replace('assessment_sum_scaled_score',$data);
  }
  public function removesumscaledscore($id,$recordno='')
  {
    // code...
    $this->db->where('id',$id);
    return $this->db->delete('assessment_sum_scaled_score');
  }
  public function getweighingid($date,$center)
  {
    // code...
    if ($row = $this->db->get_where('weighing_schedule',array('weighingSchedule'=>$date))->row(0)) {
      // code...
      return $row->scheduleId;
    }else{
      $data = array(
        'weighingSchedule'=>$date,
        'centerId'=>$center
      );
      $this->db->insert('weighing_schedule',$data);
      return $this->db->insert_id();
    }
  }

  public function addstudentfeeding($data)
  {
    // code...
      return $this->db->insert('epupils_feeding',$data);
     // return $this->db->insert_id();
    
  }
  public function checkfeeding($data)
  {
    // code...
    if ($this->db->get_where('epupils_feeding',$data)->result()) {
      // code...
      return true;
    }
    return false;
  }
  public function getWFH($data='')
  {
    // code...
    if (!empty($data)) {
      // code...
      return $this->db->get_where('e_zscore_wfh',$data)->result();

    }else{
      return $this->db->get('e_zscore_wfh')->result();
    }
  }
  public function addWFH($data='')
  {
    // code...
    if($this->db->get_where('e_zscore_wfh',array('height'=>$data['height'],'gender'=>$data['gender']))->result()){
      $this->db->where(array('height'=>$data['height'],'gender'=>$data['gender']));
      return $this->db->update('e_zscore_wfh',$data);
    }else{
      return $this->db->insert('e_zscore_wfh',$data);

    }
  }

 } ?>