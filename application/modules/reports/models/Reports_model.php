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
	public function list_feeding_by_year($year_id=0,$date_feeding=0)
	{
		// code...
		 /*$this->db
				->select('center_schoolyear.*')
				->from('center_schoolyear')
				->join('center_students_schoolyear','center_students_schoolyear.center_id = center_schoolyear.center_id')
				->where('center_students_schoolyear.year_id',$year_id);
			$query = $this->db->get();
			return $query->result();

			*/
			$sql = sprintf("SELECT DISTINCT center_id, worker_id, year_id, (SELECT count(*) FROM `center_students_schoolyear` as t2 WHERE gender = 1 AND t2.center_id = t1.center_id GROUP BY center_id) as total_students_boys, (SELECT count(*) FROM `center_students_schoolyear` as t2 WHERE gender = 2 AND t2.center_id = t1.center_id GROUP BY center_id) as total_students_girls,(SELECT `center_workers`.`worker_name` from `center_workers` where `center_workers`.`worker_id` = t1.worker_id) AS `worker_name`,(SELECT `center_workers`.`contact_number` from `center_workers` where `center_workers`.`worker_id` = t1.worker_id) AS `contact_number` FROM center_students_schoolyear as t1 WHERE year_id = %u;",$year_id);
			$query = $this->db->query($sql);
			if($result =$query->result()){
				$feeding = $this->get_supplementary_feeding();
				$data =  array();
				foreach ($result as $key => $value) {
					// code...
					$row = $this->db->get_where('center_schoolyear',array('center_id'=>$value->center_id))->row(0);
					$result[$key]->center_name = $row->center_name;
					$result[$key]->barangay = $row->barangay;
					$result[$key]->center_address = $row->center_address;
					$result[$key]->total_students = $value->total_students_boys + $value->total_students_girls;
				}

				return $result;
			}
			return false;

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

	public function list_all_students($center_id=0,$year_id=0)
	{
		// code...
		if ($center_id > 0 && $year_id> 0) {
			// code...
		
		return $this->db->get_where('center_students_schoolyear',array('center_id'=>$center_id,'year_id'=>$year_id))->result();
		}elseif ($center_id == 0 && $year_id> 0) {
			// code...
		
		return $this->db->get_where('center_students_schoolyear',array('year_id'=>$year_id))->result();
		}
		else{

		return $this->db->get('center_students_schoolyear')->result();
		}
	}


}
