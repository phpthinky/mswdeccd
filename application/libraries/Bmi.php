<?php 
/**
 * 
 */
class Bmi
{
	public $age;
	public $height;
	public $weight;
	pulic $ci;
	
	function __construct($weight,$height)
	{
		// code...
//		$this->ci = & get_instance();
		$this->height = $height;
		$this->weight = $weight;
	}
	public function run()
	{
		// code...
		$height_to_inches = intval($this->height) * 0.393701;
		$weight_to_pound = intval($this->weight) * 2.2;

		$bmi = round($weight_to_pound/($height_to_inches * *height_to_inches)* 703,2);
		return $this->result($bmi); 
	}
	public function result($bmi)
	{
		// code...
		$msg = '';
		if ($bmi  18.5) {
			// code...
			$msg = 'UW';
		}elseif($bmi <= 24.9){
			$msg ='N';
		}elseif($bmi <= 29.9){
			$msg = 'OW';
		}else{
			$msg = 'O';
		}
		return $msg;

	}
}
 ?>