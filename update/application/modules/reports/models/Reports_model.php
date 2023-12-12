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

}
