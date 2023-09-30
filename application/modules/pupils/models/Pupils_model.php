<?php 

/**
  * 
  */
 class Pupils_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		// code...
 		parent::__construct();
 	}
 	public function get($id){
 		return $this->db->get_where('epupils',['pupilsId'=>$id])->row(0);
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
 } ?>