<?php 


/**
 * 
 */
class Centers_model extends CI_model
{
	
	function __construct()
	{
		// code...
		parent::__construct();
	}
	public function save($data='')
	{
		// code...
		if (!empty($data->centerId)) {
			// code...
			return $this->edit($data);
		}else{
			return $this->add($data);
		}
	}
	public function add($data='')
	{
		// code...
		if($this->exists($data->centerName)){
			return array('status'=>false,'msg'=>'Records already exist!');
		}else{

			try {
				$this->db->insert('ecenter',$data);	
				$result = array('status'=>true,'msg'=>'Successfully added!');

			} catch (Exception $e) {
				$result = array('status'=>false,'msg'=>$e->getMessage());
			}
				return $result;
		
		}

	}

	public function edit($data)
	{
		

			try {
				$this->db->where('centerId',$data->centerId);	
				$this->db->update('ecenter',$data);	
				$result = array('status'=>true,'msg'=>'Successfully added!');

			} catch (Exception $e) {
				$result = array('status'=>false,'msg'=>$e->getMessage());
			}
				return $result;
		
		return $result;

	}
	public function exists($str)
	{
		// code...
		return $this->db->get_where('ecenter',['centerName'=>$str])->result();
	}
	public function getAll()
	{
		// code...
		return $this->db->get('ecenter')->result();
	}
	
	public function getAll_v()
	{
		// code...
		return $this->db->get('center_schoolyear')->result();
	}

	public function getCountAll()
	{
		// code...
		$query = $this->db->get('ecenter');
		return $query->num_rows();
	}

	public function getCenters()
	{
		// code...
		$this->db->select('centerId, centerName');
		return $this->db->get('ecenter')->result();
	}
	public function remove($id)
	{
		// code...
		$this->db->select('workersId');
		$this->db->from('eworkers');
		$this->db->where('centerId',$id);
		$query = $this->db->get();

			$workersIds = array();
		if($result = $query->result()){
			foreach ($result as $key => $value) {
				// code...
				$workersIds[] = $value->workersId;
			}
			$this->db->delete('eworkers',array('centerId'=>$id));
		}
		if (!empty($workersIds)) {
			// code...
			for ($i=0; $i < count($workersIds) ; $i++) { 
				// code...
				$this->db->delete('eschoolyear_by_worker',array('workersId',$workersIds[$i]));
				$this->db->delete('eschoolyear_by_worker_students',array('workersId',$workersIds[$i]));
			}
		}
		$this->db->delete('ecenter',array('centerId'=>$id));
		
	}
}
 ?>