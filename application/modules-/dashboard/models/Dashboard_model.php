<?php /**
 * 
 */
class Dashboard_model extends CI_Model
{
	public function getTotalStudents($center_id=0,$worker_id=0)
	{
		if ($center_id > 0 && $worker_id > 0) {
			// code...
			$sql = sprintf("SELECT SUM(total_students) as total FROM `center_workers_schoolyear` WHERE center_id =%u AND worker_id = %u",$center_id,$worker_id);
			$query = $this->db->query($sql);
			if ($result = $query->result()) {
				// code...
				return $result[0]->total;
			}

		}else{

			$sql = sprintf("SELECT SUM(total_students) as total FROM `center_workers_schoolyear`");
			$query = $this->db->query($sql);
			if ($result = $query->result()) {
				// code...
				return $result[0]->total;
			}
		}
	}

	public function getTotalNormal($center_id=0,$worker_id=0)
	{
		// code...
		if($center_id && $worker_id){

		$sql = sprintf("SELECT W.*,S.gender,S.center_id,S.worker_id,S.year_id FROM `v_weighing` W LEFT JOIN center_students_schoolyear S ON W.student_id = S.student_id WHERE wfh = 'N' AND center_id = %u and worker_id = %u",$center_id,$worker_id);
		$query = $this->db->query($sql);

				if($row = $query->result()){
					return count($row);
				}
				return 0;

		}else{

		$sql = sprintf("SELECT W.*,S.gender,S.center_id,S.worker_id,S.year_id FROM `v_weighing` W LEFT JOIN center_students_schoolyear S ON W.student_id = S.student_id WHERE wfh ='N';");
				$query = $this->db->query($sql);
				if($row = $query->result()){
					return count($row);
				}
				return 0;
		
		}
	
	}


	public function getTotalMalnourish($center_id=0,$worker_id=0)
	{
		// code...
		if($center_id && $worker_id){

		$sql = sprintf("SELECT W.*,S.gender,S.center_id,S.worker_id,S.year_id FROM `v_weighing` W LEFT JOIN center_students_schoolyear S ON W.student_id = S.student_id WHERE wfh = 'SAM' OR wfh ='MAM' AND center_id = %u and worker_id = %u",$center_id,$worker_id);
		$query = $this->db->query($sql);
		
				if($row = $query->result()){
					return count($row);
				}
				return 0;

		}else{

		$sql = sprintf("SELECT * FROM `v_weighing` WHERE wfh = 'SAM' OR wfh = 'MAM';");
				$query = $this->db->query($sql);
				if($row = $query->result()){
					return count($row);
				}
				return 0;
		
		}
	
	}

	public function getTotalObese($center_id=0,$worker_id=0)
	{
		// code...
		if($center_id && $worker_id){

		$sql = sprintf("SELECT W.*,S.gender,S.center_id,S.worker_id,S.year_id FROM `v_weighing` W LEFT JOIN center_students_schoolyear S ON W.student_id = S.student_id WHERE wfh ='OB' AND center_id = %u and worker_id = %u",$center_id,$worker_id);
		$query = $this->db->query($sql);
		
				if($row = $query->result()){
					return count($row);
				}
				return 0;

		}else{

		$sql = sprintf("SELECT * FROM `v_weighing` WHERE wfh ='OB';");
				$query = $this->db->query($sql);
				if($row = $query->result()){
					return count($row);
				}
				return 0;
		
		}
	
	}



} ?>