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
  public function class_schedule_save($data)
  {
    // code...
    if (!empty($data->YearId)) {
      // code...
      return $this->updateschoolyear($data);
    }else{
      return $this->addschoolyear($data);
    }
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

  public function updateschoolyear($data)
  {
      $this->db->where('YearId',$data->YearId);
      return $this->db->update('eschoolyear',$data);
   
  }

  public function getSchoolYearTitle($id)
  {
    // code...
    if($row = $this->db->get_where('eschoolyear',array('YearId'=>$id))->row(0)){
    return toymd($row->YearStart). ' - '. toymd($row->YearEnd);

    }
    return '';
  }

  public function class_schedule_status($year_id=0)
  {
    $sql = sprintf("UPDATE eschoolyear set Status = 2 where Status = 1 and YearId <> %u ",$year_id);
   return $this->db->query($sql);
  }
  public function class_schedule_remove($data)
  {
    // code...
    $this->db->delete('eschoolyear',$data);
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
    $this->db->order_by('YearStart','DESC');
 		return $this->db->get('eschoolyear')->result();
 	}
  public function getSchoolYear($year_id)
  {
    // code...
    $row = $this->db->get_where('eschoolyear',array('YearId'=>$year_id))->row(0);
    return tomdy($row->YearStart).' - '.tomdy($row->YearEnd);
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

  public function update_table($value='')
  {
    // code...
    $sql = "DROP TABLE IF EXISTS weighing_schedule;";
    $this->db->query($sql);

    $sql2 = "RENAME TABLE weighing to e_weighing;";
    $this->db->query($sql2);

    $sql3 = "ALTER TABLE `e_weighing` CHANGE `weighingId` `id` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `scheduleId` `date_weighing` DATE NOT NULL, CHANGE `pupilsId` `student_id` INT(11) NOT NULL;";
    $this->db->query($sql3);
  }

  public function reset_all($value='')
  {
      $this->db->truncate('ecenter');
    $this->db->truncate('eparent');
    $this->db->truncate('epupils');
    $this->db->truncate('epupils_feeding');
    $this->db->truncate('eschoolyear');
    $this->db->truncate('eschoolyear_by_worker');
    $this->db->truncate('eschoolyear_by_worker_students');
    $this->db->truncate('eworkers');
    $this->db->truncate('e_zscore_wfh');
    $this->db->truncate('e_zscore_wfa');
    $this->db->truncate('e_zscore_hfa');
    $this->db->truncate('weighing');
    $this->db->truncate('weighing_schedule');
    $this->db->delete('aauth_users',array('id <>'=>1));
    $this->db->delete('aauth_user_to_group',array('user_id <>'=>1));
    $sql = "ALTER TABLE `aauth_users` AUTO_INCREMENT = 2";
    $this->db->query($sql);
    
    $sql2 = "ALTER TABLE `eworkers` AUTO_INCREMENT = 2";
    $this->db->query($sql2);
  }

 } ?>