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

	public function current_assessment($type='')
	{
		// code...
		$sql = "SELECT * FROM `assessment` ORDER BY date_assessment DESC LIMIT 1;";
		$query = $this->db->query($sql);
		if($row = $query->row(0)){
			$type = $row->type;
			$sql2 =  sprintf("SELECT student_id, SUM(scaled_score) as score,type,date_assessment FROM assessment WHERE type = %u GROUP BY(student_id);",$row->type);

			$query2 = $this->db->query($sql2);
			if($result = $query2->result()){
				foreach ($result as $key => $value) {
					// code...
					$result[$key]->scaled_score = get_standard_score($value->score);
				}
				return $result;
			}
			return false;

		}
		return 0;

	}

	public function get_current_weighing($worker_id=0)
	{
		// code...
		$wfa_suw =0;
		$wfa_uw=0;
		$wfa_n=0;
		$wfa_ow =0;
		$wfa_ob =0;

		$hfa_ss =0;
		$hfa_s=0;
		$hfa_n=0;
		$hfa_t =0;
		$hfa_st =0;

		$wfh_sw =0;
		$wfh_uw=0;
		$wfh_n=0;
		$wfh_ow =0;
		$wfh_ob =0;

		if ($worker_id > 0) {
			// code...
			$result =$this->db->get_where('v_current_weighing',array('worker_id'=>$worker_id))->result();
		}else{
			$result =$this->db->get('v_current_weighing')->result();
		}

		if(!empty($result)){
			foreach ($result as $key => $value) {
				// code...
				if ($value->wfa == 'OB') {
					// code...
					++$wfa_ob;
				}

				if ($value->wfa == 'OW') {
					// code...
					++$wfa_ow;
				}
				if ($value->wfa == 'N') {
					// code...
					++$wfa_n;
				}
				if ($value->wfa == 'UW') {
					// code...
					++$wfa_uw;
				}
				if ($value->wfa == 'SUW') {
					// code...
					++$wfa_suw;
				}
				//height for age
				if ($value->hfa == 'ST') {
					// code...
					++$hfa_st;
				}

				if ($value->hfa == 'T') {
					// code...
					++$hfa_t;
				}
				if ($value->hfa == 'N') {
					// code...
					++$hfa_n;
				}
				if ($value->hfa == 'S') {
					// code...
					++$hfa_s;
				}
				if ($value->hfa == 'SS') {
					// code...
					++$hfa_ss;
				}
				//weight for height

				if ($value->wfh== 'OB') {
					// code...
					++$wfh_ob;
				}

				if ($value->wfh== 'OW') {
					// code...
					++$wfh_ow;
				}
				if ($value->wfh== 'N') {
					// code...
					++$wfh_n;
				}
				if ($value->wfh== 'UW') {
					// code...
					++$wfh_uw;
				}
				if ($value->wfh== 'SUW') {
					// code...
					++$wfh_suw;
				}

			}
			$data = array(
				'wfa'=>array($wfa_suw,$wfa_uw,$wfa_n,$wfa_ow,$wfa_ob),
				'hfa'=>array($hfa_ss,$hfa_s,$hfa_n,$hfa_t,$hfa_st),
				'wfh'=>array($wfa_suw,$wfa_uw,$wfa_n,$wfa_ow,$wfa_ob),

			);
			return $data;
		}
		return false;

	}


	public function get_current_weighing_bysector($sector='',$worker_id=0)
	{
		// code...
		$wfa_suw =0;
		$wfa_uw=0;
		$wfa_n=0;
		$wfa_ow =0;
		$wfa_ob =0;

		$hfa_ss =0;
		$hfa_s=0;
		$hfa_n=0;
		$hfa_t =0;
		$hfa_st =0;

		$wfh_sw =0;
		$wfh_uw=0;
		$wfh_n=0;
		$wfh_ow =0;
		$wfh_ob =0;

		if ($worker_id > 0) {
			// code...
			$result =$this->db->get_where('v_current_weighing',array('student_sector'=>$sector,'worker_id'=>$worker_id))->result();
		}else{
			$result =$this->db->get_where('v_current_weighing',array('student_sector'=>$sector))->result();

		}

		if(!empty($result)){
			foreach ($result as $key => $value) {
				// code...
				if ($value->wfa == 'OB') {
					// code...
					++$wfa_ob;
				}

				if ($value->wfa == 'OW') {
					// code...
					++$wfa_ow;
				}
				if ($value->wfa == 'N') {
					// code...
					++$wfa_n;
				}
				if ($value->wfa == 'UW') {
					// code...
					++$wfa_uw;
				}
				if ($value->wfa == 'SUW') {
					// code...
					++$wfa_suw;
				}
				//height for age
				if ($value->hfa == 'ST') {
					// code...
					++$hfa_st;
				}

				if ($value->hfa == 'T') {
					// code...
					++$hfa_t;
				}
				if ($value->hfa == 'N') {
					// code...
					++$hfa_n;
				}
				if ($value->hfa == 'S') {
					// code...
					++$hfa_s;
				}
				if ($value->hfa == 'SS') {
					// code...
					++$hfa_ss;
				}
				//weight for height

				if ($value->wfh== 'OB') {
					// code...
					++$wfh_ob;
				}

				if ($value->wfh== 'OW') {
					// code...
					++$wfh_ow;
				}
				if ($value->wfh== 'N') {
					// code...
					++$wfh_n;
				}
				if ($value->wfh== 'UW') {
					// code...
					++$wfh_uw;
				}
				if ($value->wfh== 'SUW') {
					// code...
					++$wfh_suw;
				}

			}
			
			$data = array(
				'wfa'=>array($wfa_suw,$wfa_uw,$wfa_n,$wfa_ow,$wfa_ob),
				'hfa'=>array($hfa_ss,$hfa_s,$hfa_n,$hfa_t,$hfa_st),
				'wfh'=>array($wfa_suw,$wfa_uw,$wfa_n,$wfa_ow,$wfa_ob),

			);
			/*
			$data = new stdClass();

				$data->wfa=array($wfa_suw,$wfa_uw,$wfa_n,$wfa_ow,$wfa_ob);
				$data->hfa=array($hfa_ss,$hfa_s,$hfa_n,$hfa_t,$hfa_st);
				$data->wfh=array($wfa_suw,$wfa_uw,$wfa_n,$wfa_ow,$wfa_ob);

			*/
			return $data;
		}
		return false;

	}

	public function list_all_child_current_weighing($worker_id=0)
	{
		// code...
		if (empty($worker_id)) {

		return $this->db->get('v_current_weighing')->result();
			// code...
		}else{
		return $this->db->get_where('v_current_weighing',array('worker_id'=>$worker_id))->result();

		}
	}


} ?>