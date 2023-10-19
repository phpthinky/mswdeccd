<?php 
if (!function_exists('ideal_weight')) {
	// code...
	function ideal_weight($years=0,$months=0)
	{
		// code...
		if ($years <= 0 && $months <= 0 ) {
			// code...
			return 0;
		}
		if ($years == 0) {
			// code...
			$ideal_weight = ($months + 9)/2;
			return $ideal_weight;
		}

		if ($years >= 1 && $years <= 5) {
			// code...
        	$age_year = $years + ($months/12);
        	$ideal_weight = 2 * ($age_year + 5);
        	return $ideal_weight;

		}else{
        	$age_year = $years + ($months/12);
        	$ideal_weight = 4 * ($age_year);
        	return $ideal_weight;
		}
	}
}
if (!function_exists('get_wfa')) {
	// code...
	function get_wfa($actual_weight,$ideal_weight)
	{
		// code...
		$percentage = ($actual_weight/$ideal_weight) * 100;
		if ($percentage < 50) {
			// code...
			return 'SU';
		}elseif ($percentage <= 80) {
			// code...
			return 'U';

		} elseif ($percentage > 80 && $percentage <= 100) {
			// code...
			return 'N';
		}
		elseif ($percentage > 100 && $percentage < 110) {
			// code...
			return 'OV';
		}else {
			// code...
			return 'OB';
		}
		

	}
}



if (!function_exists('ideal_height')) {
	// code...
	function ideal_height($age=0,$gender=0)
	{
		// code...
		$height = 0;
		if ($gender == 1) {
			// code...
			switch ($age) {
				case 1:
					// code...
				$height = 75;
					break;
				
				case 2:
					// code...
				$height = 84.5;
					break;
				case 3:
					// code...
				$height = 93.9;
					break;
				case 4:
					// code...
				$height = 101.6;
					break;
				case 5:
					// code...
				$height = 108.4;
					break;
				default:
					// code...
					$height = 0;
					break;
			}
		}elseif($gender == 2){

			switch ($age) {
				case 1:
					// code...
				$height = 76.1;
					break;
				
				case 2:
					// code...
				$height = 85.6;
					break;
				case 3:
					// code...
				$height = 94.9;
					break;
				case 4:
					// code...
				$height = 102.9;
					break;
				case 5:
					// code...
				$height = 109.9;
					break;
				default:
					// code...
					$height = 0;
					break;
			}
		}else{
			return 0;
		}
		return $height;
	}
}


if (!function_exists('get_hfa')) {
	// code...
	function get_hfa($actual_height,$ideal_height)
	{


		$percentage = ($actual_height/$ideal_height) * 100;
		if ($percentage < 50) {
			// code...
			return 'SS';
		}elseif ($percentage <= 80) {
			// code...
			return 'S';

		} elseif ($percentage > 80 && $percentage <= 100) {
			// code...
			return 'N';
		}
		elseif ($percentage > 100 && $percentage < 110) {
			// code...
			return 'T';
		}else {
			// code...
			return 'ST';
		}
	}
}


if (!function_exists('get_wfh')) {
	// code...
	function get_wfh($weight,$height,$birthdate=null,$weighingdate=null)
	{
		// code...

			$height_to_inches = $height * 0.393701;
			$weight_to_pound = $weight * 2.2;

			$bmi = round($weight_to_pound/($height_to_inches * $height_to_inches)* 703,2);
			$msg = '';

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

 ?>