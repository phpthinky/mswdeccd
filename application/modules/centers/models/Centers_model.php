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
			return 'updated.';
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
			if($this->db->insert('ecenter',$data)){
			return array('status'=>true,'msg'=>'Successfully added!');

			}else{
				return array('status'=>false,'msg'=>'Database error: Unknown error occured.');
			}

		}

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
		$this->db->delete('ecenter',array('centerId'=>$id));
		
	}
}
 ?>