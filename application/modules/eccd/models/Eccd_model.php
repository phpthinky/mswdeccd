<?php 

/**
  * 
  */
 class Eccd_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		// code...
 		parent::__construct();
 	}
 	public function get($id){
 		return $this->db->get_where('epupils',['pupilsId'=>$id])->row(0);
 	}
 	public function list_students($center_id=0,$worker_id=0,$date_weighing='')
 	{
 		// code...
 		if (!empty($worker_id) && !empty($date_weighing)) {
 			// code...
 			return false;
 		}
 		if (!empty($worker_id)) {
 			// code...
 			//return false;
 			if($students = $this->db->get_where('center_students_schoolyear',array('worker_id'=>$worker_id))->result()){
 				$id =array();
 				foreach ($students as $key => $student) {
 					// code...
 					$id[] = $student->student_id;

 				}
 								$this->db->where_in('student_id',$id);
 								return $this->db->get('v_current_weighing')->result();

 			}
 		}

 		return $this->db->get('v_current_weighing')->result();
 	}

 	public function getAll_v($centerId=0,$workersId=0){
 		if ($centerId > 0 && $workersId > 0) {
 			// code...
 			$this->db->where('worker_id',$workersId);
 			$this->db->where('center_id',$centerId);
 			return $this->db->get('estudents')->result();

 		}elseif($centerId > 0){
			$this->db->where('center_id',$centerId);
 			return $this->db->get('estudents')->result();

 		}else{

 			return $this->db->get('estudents')->result();
 		}
 	}
 	public function getAll($centerId=0,$workersId=0){
 		if ($centerId > 0 && $workersId > 0) {
 			// code...
 			$this->db->where('workersId',$workersId);
 			$this->db->where('centerId',$centerId);
 			return $this->db->get('epupils')->result();

 		}elseif($centerId > 0){
			$this->db->where('centerId',$centerId);
 			return $this->db->get('epupils')->result();

 		}else{

 			return $this->db->get('epupils')->result();
 		}
 	}
 	public function save($data='')
 	{
 		// code...
 		if (!empty($data->id)) {
 			// code...
 		}else{
 			$this->add($data);
 		}
 	}
 	public function add($data)
 	{
 		// code...
 		if (!$this->if_nameexist($data)) {
 			// code...

 		$this->db->insert('epupils',$data);
		return $this->db->insert_id();

 		}else{
 			return false;
 		}
	}
	public function if_nameexist($data){
		$this->db
				->select('*')
				->where('fName',$data->fName)
				->where('mName',$data->mName)
				->where('lName',$data->lName);
				$query = $this->db->get('epupils');
				$result = $query->result();
				return $result;


	}

	public function getcountAll($centerId=0,$workersId=0)
	{
		// code...
		if ($centerId !== 0 and $workersId !== 0) {
			// code...
		}else{
			$query = $this->db->get('epupils');
			return $query->num_rows();
		}
	}
	public function listachild($type=0,$year_id=0,$center_id=0,$worker_id = 0 ,$student_id = 0)
	{
		// code...
		$table ="";
		switch ($type) {
			case 1:
				// code...
			$table = 'v_uponentry';
				break;
			case 2:
				// code...
			$table = 'v_20days';
				break;
			case 3:
				// code...
			$table = 'v_40days';
				break;
			case 4:
				// code...
			$table = 'v_terminal';
				break;
			
			default:
				// code...
			$table = 'v_uponentry';
				break;
		}
		if ($year_id > 0) {
			// code...
			return $this->listbyyear($table,$year_id,$center_id,$worker_id);

		}else{
			return $this->listall($table,$center_id,$worker_id);

		}
	}
	public function listbyyear($table,$year_id,$center_id=0,$worker_id = 0 ,$student_id = 0)
	{
		// code...

		// code...
		if ($center_id > 0 && $worker_id >0 && $student_id>0) {
			// code...


		$sql = sprintf("SELECT DISTINCT t1.*,w.date_weighing,w.weight,w.height, w.wfa, w.hfa, w.wfh, w.status FROM `".$table."` `t1` LEFT JOIN e_weighing w ON w.id = t1.weighing_id WHERE center_id = %u and worker_id = %u and student_id = %u and year_id = %u",$center_id,$worker_id,$student_id,$year_id);

		$query = $this->db->query($sql);
		return $query->result();
		}elseif($center_id >0 && $worker_id>0){

		$sql = sprintf("SELECT DISTINCT t1.*,w.date_weighing,w.weight,w.height, w.wfa, w.hfa, w.wfh, w.status FROM `".$table."` `t1` LEFT JOIN e_weighing w ON w.id = t1.weighing_id WHERE center_id = %u and worker_id = %u and year_id = %u",$center_id,$worker_id , $year_id);
		$query = $this->db->query($sql);
		return $query->result();

		}
		elseif($center_id >0){

		$sql = sprintf("SELECT DISTINCT t1.*,w.date_weighing,w.weight,w.height, w.wfa, w.hfa, w.wfh, w.status FROM `".$table."` `t1` LEFT JOIN e_weighing w ON w.id = t1.weighing_id WHERE center_id = %u and year_id = %u",$center_id,$year_id);
		$query = $this->db->query($sql);
		return $query->result();
		
		}

		else{

		$sql = sprintf("SELECT DISTINCT t1.*,w.date_weighing,w.weight,w.height, w.wfa, w.hfa, w.wfh, w.status FROM `".$table."` `t1` LEFT JOIN e_weighing w ON w.id = t1.weighing_id WHERE  year_id = %u ",$year_id);
				$query = $this->db->query($sql);
				return $query->result();
		
		}
	}
	public function listall($table,$center_id=0,$worker_id = 0 ,$student_id = 0)
	{
		// code...

		// code...
		if ($center_id > 0 && $worker_id > 0 && $student_id > 0) {
			// code...


		$sql = sprintf("SELECT DISTINCT t1.*,w.date_weighing,w.weight,w.height, w.wfa, w.hfa, w.wfh, w.status FROM `".$table."` `t1` LEFT JOIN e_weighing w ON w.id = t1.weighing_id WHERE center_id = %u and worker_id = %u and student_id = %u",$center_id,$worker_id,$student_id);

		$query = $this->db->query($sql);
		return $query->result();
		}elseif($center_id > 0 && $worker_id > 0){

		$sql = sprintf("SELECT DISTINCT t1.*,w.date_weighing,w.weight,w.height, w.wfa, w.hfa, w.wfh, w.status FROM `".$table."` `t1` LEFT JOIN e_weighing w ON w.id = t1.weighing_id WHERE center_id = %u and worker_id = %u",$center_id,$worker_id);
		$query = $this->db->query($sql);
		return $query->result();

		}
		elseif($center_id > 0){

		$sql = sprintf("SELECT DISTINCT t1.*,w.date_weighing,w.weight,w.height, w.wfa, w.hfa, w.wfh, w.status FROM `".$table."` `t1` LEFT JOIN e_weighing w ON w.id = t1.weighing_id WHERE center_id = %u",$center_id);
		$query = $this->db->query($sql);
		return $query->result();
		
		}

		else{

		$sql = sprintf("SELECT DISTINCT t1.*,w.date_weighing,w.weight,w.height, w.wfa, w.hfa, w.wfh, w.status FROM `".$table."` `t1` LEFT JOIN e_weighing w ON w.id = t1.weighing_id;");
				$query = $this->db->query($sql);
				return $query->result();
		
		}
	}
	public function getinterval($numberofdays=20,$date_uponentry='',$student_id =0 )
	{
		// code...
		$date = date('Y-m-d',strtotime($date_uponentry.' + '.$numberofdays .' days'));

		if ($student_id > 0) {
			// code...

			$sql2 = sprintf("SELECT * from e_weighing WHERE date_weighing = '%s' and student_id = %u ORDER BY date_weighing asc LIMIT 1;",$date,$student_id);
			

			$query = $this->db->query($sql2);
			return $query->row(0);

		}else{

			$sql2 = sprintf("SELECT * from e_weighing WHERE %s > date_weighing GROUP by student_id LIMIT 1;",$date);
			$query = $this->db->query($sql2);
			return $query->result();
	
		}



	}

	public function list_child_assessment($center_id=0,$worker_id=0,$year_id=0,$type=0)
	{
		// code...
		$this->db->select('v_sum_scaled_score.*,student_name');
		$this->db->from('v_sum_scaled_score');
		$this->db->join('center_students_schoolyear','center_students_schoolyear.student_id = v_sum_scaled_score.student_id');
		$this->db->where('center_id',$center_id);
		$this->db->where('v_sum_scaled_score.worker_id',$worker_id);
		$this->db->where('v_sum_scaled_score.year_id',$year_id);
		$this->db->where('type',$type);
		$query = $this->db->get();
		return $query->result();

	}


	public function im($value='')
	{
		// code...
	}
/*
	public function total_students($center_id=0,$year_id=0,$worker_id=0)
	{
		// code...
		$sql = "SELECT COUNT(*) as total_students,year_id,worker_id,center_id FROM `center_students_schoolyear` GROUP BY center_id,year_id,worker_id;";
		
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function total_boys_girls($value='')
	{
		// code...
		$sql = "SELECT year_id,worker_id,center_id,(SELECT count(*) FROM center_students_schoolyear as t1 WHERE gender = 1 AND t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id GROUP BY center_id,year_id,worker_id,gender limit 1) as boys,(SELECT count(*) FROM center_students_schoolyear as t3 WHERE gender = 2 AND t3.center_id = t2.center_id and t3.worker_id = t2.worker_id AND t3.year_id = t2.year_id GROUP BY center_id,year_id,worker_id,gender limit 1) as girls FROM `center_students_schoolyear` as t2 GROUP BY center_id,year_id,worker_id,gender;";

		$query = $this->db->query($sql);
		return $query->result();
	}

	public function v_uponentry_boys($value='')
	{
		// code...
		$sql = "SELECT center_id,worker_id,year_id,
	(SELECT count(*) FROM `v_uponentry_boys` as `t1` WHERE wfa = 'SUW' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as SUW,
	(SELECT count(*) FROM `v_uponentry_boys` as `t1` WHERE wfa = 'UW' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as UW,
	(SELECT count(*) FROM `v_uponentry_boys` as `t1` WHERE wfa = 'N' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as N,
	(SELECT count(*) FROM `v_uponentry_boys` as `t1` WHERE wfa = 'OW' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as OW,
	
	(SELECT count(*) FROM `v_uponentry_boys` as `t6` WHERE hfa = 'SS' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_SS,
	(SELECT count(*) FROM `v_uponentry_boys` as `t6` WHERE hfa = 'S' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_S,
	(SELECT count(*) FROM `v_uponentry_boys` as `t6` WHERE hfa = 'N' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_N,
	(SELECT count(*) FROM `v_uponentry_boys` as `t6` WHERE hfa = 'T' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_T,

	(SELECT count(*) FROM `v_uponentry_boys` as `T7` WHERE wfh = 'SW' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_SW,
	(SELECT count(*) FROM `v_uponentry_boys` as `T7` WHERE wfh = 'W' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_W,
	(SELECT count(*) FROM `v_uponentry_boys` as `T7` WHERE wfh = 'N' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_N,
	(SELECT count(*) FROM `v_uponentry_boys` as `T7` WHERE wfh = 'OW' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_OW,
	(SELECT count(*) FROM `v_uponentry_boys` as `T7` WHERE wfh = 'OB' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_OB
FROM `v_uponentry_boys` as `t2` GROUP BY center_id,worker_id,year_id;
";
	}


	public function v_uponentry_girls($value='')
	{
		// code...
		$sql = "SELECT center_id,worker_id,year_id,
	(SELECT count(*) FROM `v_uponentry_girls` as `t1` WHERE wfa = 'SUW' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as SUW,
	(SELECT count(*) FROM `v_uponentry_girls` as `t1` WHERE wfa = 'UW' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as UW,
	(SELECT count(*) FROM `v_uponentry_girls` as `t1` WHERE wfa = 'N' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as N,
	(SELECT count(*) FROM `v_uponentry_girls` as `t1` WHERE wfa = 'OW' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as OW,
	
	(SELECT count(*) FROM `v_uponentry_girls` as `t6` WHERE hfa = 'SS' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_SS,
	(SELECT count(*) FROM `v_uponentry_girls` as `t6` WHERE hfa = 'S' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_S,
	(SELECT count(*) FROM `v_uponentry_girls` as `t6` WHERE hfa = 'N' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_N,
	(SELECT count(*) FROM `v_uponentry_girls` as `t6` WHERE hfa = 'T' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_T,

	(SELECT count(*) FROM `v_uponentry_girls` as `T7` WHERE wfh = 'SW' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_SW,
	(SELECT count(*) FROM `v_uponentry_girls` as `T7` WHERE wfh = 'W' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_W,
	(SELECT count(*) FROM `v_uponentry_girls` as `T7` WHERE wfh = 'N' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_N,
	(SELECT count(*) FROM `v_uponentry_girls` as `T7` WHERE wfh = 'OW' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_OW,
	(SELECT count(*) FROM `v_uponentry_girls` as `T7` WHERE wfh = 'OB' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_OB
FROM `v_uponentry_girls` as `t2` GROUP BY center_id,worker_id,year_id;";
	}
public function v_20days_boys($value='')
	{
		// code...
		$sql = "SELECT center_id,worker_id,year_id,
	(SELECT count(*) FROM `v_20days_boys` as `t1` WHERE wfa = 'SUW' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as SUW,
	(SELECT count(*) FROM `v_20days_boys` as `t1` WHERE wfa = 'UW' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as UW,
	(SELECT count(*) FROM `v_20days_boys` as `t1` WHERE wfa = 'N' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as N,
	(SELECT count(*) FROM `v_20days_boys` as `t1` WHERE wfa = 'OW' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as OW,
	
	(SELECT count(*) FROM `v_20days_boys` as `t6` WHERE hfa = 'SS' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_SS,
	(SELECT count(*) FROM `v_20days_boys` as `t6` WHERE hfa = 'S' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_S,
	(SELECT count(*) FROM `v_20days_boys` as `t6` WHERE hfa = 'N' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_N,
	(SELECT count(*) FROM `v_20days_boys` as `t6` WHERE hfa = 'T' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_T,

	(SELECT count(*) FROM `v_20days_boys` as `T7` WHERE wfh = 'SW' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_SW,
	(SELECT count(*) FROM `v_20days_boys` as `T7` WHERE wfh = 'W' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_W,
	(SELECT count(*) FROM `v_20days_boys` as `T7` WHERE wfh = 'N' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_N,
	(SELECT count(*) FROM `v_20days_boys` as `T7` WHERE wfh = 'OW' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_OW,
	(SELECT count(*) FROM `v_20days_boys` as `T7` WHERE wfh = 'OB' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_OB
FROM `v_20days_boys` as `t2` GROUP BY center_id,worker_id,year_id;
";
	}


	public function v_20days_girls($value='')
	{
		// code...
		$sql = "SELECT center_id,worker_id,year_id,
	(SELECT count(*) FROM `v_20days_girls` as `t1` WHERE wfa = 'SUW' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as SUW,
	(SELECT count(*) FROM `v_20days_girls` as `t1` WHERE wfa = 'UW' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as UW,
	(SELECT count(*) FROM `v_20days_girls` as `t1` WHERE wfa = 'N' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as N,
	(SELECT count(*) FROM `v_20days_girls` as `t1` WHERE wfa = 'OW' AND  t1.center_id = t2.center_id and t1.worker_id = t2.worker_id AND t1.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as OW,
	
	(SELECT count(*) FROM `v_20days_girls` as `t6` WHERE hfa = 'SS' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_SS,
	(SELECT count(*) FROM `v_20days_girls` as `t6` WHERE hfa = 'S' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_S,
	(SELECT count(*) FROM `v_20days_girls` as `t6` WHERE hfa = 'N' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_N,
	(SELECT count(*) FROM `v_20days_girls` as `t6` WHERE hfa = 'T' AND  t6.center_id = t2.center_id and t6.worker_id = t2.worker_id AND t6.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as HFA_T,

	(SELECT count(*) FROM `v_20days_girls` as `T7` WHERE wfh = 'SW' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_SW,
	(SELECT count(*) FROM `v_20days_girls` as `T7` WHERE wfh = 'W' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_W,
	(SELECT count(*) FROM `v_20days_girls` as `T7` WHERE wfh = 'N' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_N,
	(SELECT count(*) FROM `v_20days_girls` as `T7` WHERE wfh = 'OW' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_OW,
	(SELECT count(*) FROM `v_20days_girls` as `T7` WHERE wfh = 'OB' AND  T7.center_id = t2.center_id and T7.worker_id = t2.worker_id AND T7.year_id = t2.year_id  GROUP BY center_id,worker_id,year_id) as WFH_OB
FROM `v_20days_girls` as `t2` GROUP BY center_id,worker_id,year_id;";
	}
*/

//end of class

 } ?>