<?php 

/**
 * 
 */
class Reports_model extends CI_Model
{
	
	public function get_supplementary_feeding($year='')
	{
		// code...
		$result = $this->db->get('center_schoolyear')->result();
		return $result;
	}
	public function getCDC()
	{
		// code...
	}

	public function getCDCchildren()
	{
		// code...
	}
	public function getSNP()
	{
		// code...
	}
	public function getSNPchldren()
	{
		// code...
	}
	public function get_assessment_rawscore($data,$schedule,$order_by)
	{
		// code...
		$this->db->select('*');
		$this->db->from('v_assessment');
		$this->db->where('center_id',$data->center_id);
		$this->db->where('year_id',$data->year_id);
		$this->db->where('domain',$data->domain);
		$this->db->order_by($schedule,$order_by);
		$query = $this->db->get();
		//return $this->db->get_compiled_select();
		return $query->result();
	}

	public function list_all_students($center_id,$year_id)
	{
		// code...
		return $this->db->get_where('center_students_schoolyear',array('center_id'=>$center_id,'year_id'=>$year_id))->result();
	}

}
