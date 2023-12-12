<?php 

/**
 * 
 */
class Users_model extends CI_Model
{
	
	function __construct()
	{
		// code...
	}
	public function getId($phar)
	{
		// code...
		$this->db->where('id',$phar);
	}
}
 ?>