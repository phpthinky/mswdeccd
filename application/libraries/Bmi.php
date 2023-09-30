<?php 
/**
 * 
 */
class Bmi
{
	public $age;
	public $height;
	public $weight;
	//public $age;
	public $birthdate;
	public $weighingdate;


	//public $ci;
	
	function __construct()
	{
		// code...
//		$this->ci = & get_instance();
		//$this->run();
	}
	public function get($weight,$height,$birthdate=null,$weighingdate=null)
	{
		// code...

		$this->height = $height;
		$this->weight = $weight;
		$this->weighingdate = $weighingdate;
		$this->birthdate = $birthdate;
		//if (!empty($birthdate) && !empty($weighingdate) ) {
			// code...
		//	$this->age = getAge($this->birthDate,$this->weighingdate);
		//}

		$height_to_inches = $height * 0.393701;
		$weight_to_pound = $weight * 2.2;

		$bmi = round($weight_to_pound/($height_to_inches * $height_to_inches)* 703,2);
		return $this->result($bmi); 
	}
	public function result($bmi)
	{
		// code...
		$msg = '';
		return $bmi;
		if ($bmi  <= 18.5) {
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


//12 x 2.2  = 26.4
//90 x 0.393701 = 35.43
//bmi= 26.4/700.86
 ?>