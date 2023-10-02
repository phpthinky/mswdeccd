<?php 


/**
 * 
 */
class Workers_model extends CI_model
{
	
	function __construct()
	{
		// code...
		parent::__construct();
	}

	public function getWorkerId($id)
	{
		// code...
		$this->db->where('userId',$id);
		$result = $this->db->get('eworkers')->row(0);
		return $result->workersId;
	}
	public function getWorker($id)
	{
		// code...
		//return $this->db->get_where('eworkers', array('userId'=>$id))->row(0);
		$query = $this->db->select('*')
							->from('eworkers')
							->where('workersId',$id)
							->get();
							if($result = $query->result()){
								return $result[0];
							}
							return false;

	}
	public function list_active_Workers($center_id='')
	{
		// code...
		if (!empty($center_id)) {
			// code...
			return $this->db->get_where('center_workers_schoolyear',array('center_id'=>$center_id))->result();

		}else{
			return $this->db->get('center_workers_schoolyear')->result();
		}
	}


	public function list_inactive_Workers($center_id='')
	{
		// code...
		if (!empty($center_id)) {
			// code...
			return $this->db->get_where('eworkers_inactive',array('center_id'=>$center_id))->result();

		}else{
			return $this->db->get('eworkers_inactive')->result();
			
		}
	}
	public function list_all_Workers($center_id='')
	{
		// code...
		if (!empty($center_id)) {
			// code...
			return $this->db->get_where('center_workers',array('center_id'=>$center_id))->result();

		}else{
			return $this->db->get('center_workers')->result();
		}
	}
	public function save($data='')
	{
		// code...
		if (!empty($data->workersId)) {
			// code...
			return 'updated.';
		}else{
			return $this->add($data);
		}
	}
	public function add($data='')
	{
		// cod
			if($this->db->insert('eworkers',$data)){
			return array('status'=>true,'msg'=>'Successfully added!');

			}else{
				return array('status'=>false,'msg'=>'Database error: Unknown error occured.');
			}

	}
	public function exists($data)
	{
		// code...
		//return $this->db->get_where('ecenter',['centerName'=>$str])->result();
		$this->db->where('fName',$data->fName);
		$this->db->where('mName',$data->mName);
		$this->db->where('lName',$data->lName);
		$this->db->where('ext',$data->ext);
		if($this->db->get('eworkers')->result()){
			return true;
		}
		return false;
	}
		public function getWorkers()
	{
		// code...
		$this->db->select("workersId,CONCAT(fName,' ', mName,' ', lname,' ', ext) as workerName");
		return $this->db->get('eworkers')->result();
	}
		public function getAll()
	{
		// code...
		//$this->db->select('workersId,CONCAT(fName, mName, lname, ext) as workerName');
		return $this->db->get('eworkers')->result();
	}

		public function getCountAll($centerId=false)
	{
		// code...
		if ($centerId) {
				// code...
			$this->db->where('centerId',$centerId);
		}
		$query = $this->db->get('eworkers');
		return $query->num_rows();
	}
	public function getCenterWorkers($centerId)
	{
		// code...
		$this->db->select("workersId,CONCAT(fName,' ', mName,' ', lname,' ', ext) as workerName");
		$this->db->where('centerId',$centerId	);
		return $this->db->get('eworkers')->result();
	}
	public function addtomyschoolyear($data)
	{
		// code...
		if (!$this->checkMySchooYear($data)) {
			// code...
			$this->db->insert('eschoolyear_by_worker',$data);
			return array('status'=>true,'msg'=>'Successfully added.');
		}else{
			return array('status'=>false,'msg'=>'Record already exist.');

		}
	}
	public function checkMySchooYear($data)
	{
		// code...
		$query = $this->db->where('workersId',$data->workersId);
		$query = $this->db->where('YearId',$data->YearId);

		$query = $this->db->get('eschoolyear_by_worker');
		if($query->num_rows() > 0 ){
			return true;
		}
		return false;
	}
	public function listmyschoolyear($id)
	{
		// code...
		$this->db->select('eschoolyear.YearId,YearStart,YearEnd');
		$this->db->from('eschoolyear');
		$this->db->join('eschoolyear_by_worker','eschoolyear.YearId = eschoolyear_by_worker.YearId',false);
		$this->db->where('eschoolyear_by_worker.workersId',$id);
		$query = $this->db->get();
		if($result = $query->result()){
			$data =  array();
			foreach ($result as $key => $value) {
				// code...
				$data[$key] = $value;
				$data[$key]->totalPupils = $this->getTotalStudents($value->YearId,$id);
				$data[$key]->totalRepeater = $this->getTotalStudentsByType($value->YearId,$id,2);
				$data[$key]->totalGraduates = $this->getTotalStudentsByType($value->YearId,$id,3);
			}
			return $data;
		}
		return false;
	}
	public function getTotalStudents($YearId,$workersId)
	{
		// code...
	$this->db->select("c.*");
    $this->db->from('eschoolyear_by_worker a');
    $this->db->join('eschoolyear_by_worker_students b','b.YearId = a.YearId','left');
    $this->db->join('epupils c','c.pupilsId = b.studentId','left');
    $this->db->where('b.YearId',$YearId);
    $this->db->where('b.workersId',$workersId  );
    $this->db->group_by('c.pupilsId');
    $query = $this->db->get();
    return $query->num_rows();
	}

	public function getTotalStudentsByType($YearId,$workersId,$type)
	{
		// code...
	$this->db->select("c.*");
    $this->db->from('eschoolyear_by_worker a');
    $this->db->join('eschoolyear_by_worker_students b','b.YearId = a.YearId','left');
    $this->db->join('epupils c','c.pupilsId = b.studentId','left');
    $this->db->where('a.YearId',$YearId);
    $this->db->where('a.workersId',$workersId  );
    $this->db->where('b.StudentType',$type  );
    $query = $this->db->get();
    return $query->num_rows();
	}

	public function listMyStudents($id)
	{
		// code...
		$this->db->select('eschoolyear.YearId,YearStart,YearEnd');
		$this->db->from('eschoolyear');
		$this->db->join('eschoolyear_by_worker','eschoolyear.YearId = eschoolyear_by_worker.YearId',false);
		$query = $this->db->get();
		return $query->result();
	}
	public function getMyCenterId($workersId)
	{
		// code...
		$result = $this->db->get_where('eworkers',array('workersId'=>$workersId))->row(0);
		if (!empty($result) ){
			// code...
		return $result->workersId;

		}
		return 0;
	}


	public function getStartEndClassess($id)
	{
		// code...
		$result = $this->db->get_where('eschoolyear',array('YearId'=>$id))->row(0);
		return tomdy($result->YearStart).' to '.tomdy($result->YearEnd);
	}

	public function addtomystudent($data)
	{
		// code...
			if (!$this->myStudentExist($data)) {
				// code...

			 $this->db->insert('eschoolyear_by_worker_students',$data);

			 return true;
			}
			return false;
	}
	public function myStudentExist($data)
	{
		// code...
		$this->db->select('*');
		$this->db->from('eschoolyear_by_worker_students a');
		$this->db->join('eschoolyear_by_worker b','b.YearId = a.YearId');
		$this->db->where('a.YearId',$data->YearId);
		$this->db->where('a.StudentId',$data->StudentId);
		$this->db->where('b.workersId',$data->workersId);
		$query = $this->db->get('eschoolyear_by_worker_students');
		if($query->num_rows() > 0){
			return true;
		}
		return false;
	}
	
	public function remove($id='')
	{
		// code...
	// code...
		$this->db->delete('eschoolyear_by_worker',array('workersId',$id));
		$this->db->delete('eschoolyear_by_worker_students',array('workersId',$id));
		$this->db->delete('eworkers',array('workersId'=>$id));
		return true;
	}
}
 ?>