<?php 

	/**
	 * 
	 */
	class Nutritions_model extends CI_Model
	{
		
		function __construct()
		{
			// code...
			parent::__construct();
		}

		  public function getWFH($data='')
		  {
		    // code...
		    if (!empty($data)) {
		      // code...
		      return $this->db->get_where('e_zscore_wfh',$data)->result();

		    }else{
		      return $this->db->get('e_zscore_wfh')->result();
		    }
		  }
		  public function addWFH($data='')
		  {
		    // code...
		    if($this->db->get_where('e_zscore_wfh',array('height'=>$data['height'],'gender'=>$data['gender']))->result()){
		      $this->db->where(array('height'=>$data['height'],'gender'=>$data['gender']));
		      return $this->db->update('e_zscore_wfh',$data);
		    }else{
		      return $this->db->insert('e_zscore_wfh',$data);

		    }
		  }
		  public function removeWFH($id=0)
		  {
		  	// code...
		  	return $this->db->delete('e_zscore_wfh',array('id'=>$id));
		  }


		  public function getWFA($data='')
		  {
		    // code...
		    if (!empty($data)) {
		      // code...
		      return $this->db->get_where('e_zscore_wfa',$data)->result();

		    }else{
		      return $this->db->get('e_zscore_wfa')->result();
		    }
		  }
		  public function addWFA($data='')
		  {
		    // code...
		    if($this->db->get_where('e_zscore_wfa',array('height'=>$data['height'],'gender'=>$data['gender']))->result()){
		      $this->db->where(array('height'=>$data['height'],'gender'=>$data['gender']));
		      return $this->db->update('e_zscore_wfa',$data);
		    }else{
		      return $this->db->insert('e_zscore_wfa',$data);

		    }
		  }
		  public function removeWFA($id=0)
		  {
		  	// code...
		  	return $this->db->delete('e_zscore_wfa',array('id'=>$id));
		  }
	}
 ?>