<?php 

//use PhpOffice\PhpSpreadsheet\Spreadsheet;
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
	function get_wfa($percentage=0)
	{
		// code...
		//$percentage = ($actual_weight/$ideal_weight) * 100;
		if ($percentage < 50) {
			// code...
			return 'SU';
		}elseif ($percentage <= 80) {
			// code...
			return 'U';

		} elseif ($percentage > 80 && $percentage <= 110) {
			// code...
			return 'N';
		}
		elseif ($percentage > 111 && $percentage < 121) {
			// code...
			return 'OW';
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
	function get_hfa($percentage=0)
	{


//		$percentage = ($actual_height/$ideal_height) * 100;
		if ($percentage < 50) {
			// code...
			return 'SS';
		}elseif ($percentage <= 80) {
			// code...
			return 'S';

		} elseif ($percentage > 80 && $percentage <= 110) {
			// code...
			return 'N';
		}
		elseif ($percentage > 111 && $percentage < 120) {
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
	function get_wfh($percentage=0)
	{
		// code...
		//echo "$age - $weight - $e_weight";
		//exit();

		//3-12months = age+9/2
		//1-6 yrs = agex2+8
		//7-12 yrs = agex7-5/2
		/*
		if ($age < 1) {
			// code...
			$e_weight = ($age+9)/2;
		}
		if ($age >=1 && $age <=6) {
			// code...
			$e_weight = ($age * 2) + 8;
		}
		if ($age >= 7 && $age <= 12) {
			// code...
			$e_weight = (($age * 7)-5)/2;
		}
		*/
	//$percentage = ($weight/$e_weight) * 100;

		if ($percentage < 70) {
			// code...
			return 'SAM';
		}elseif ($percentage <= 80) {
			// code...
			return 'MAM';

		} elseif ($percentage > 80 && $percentage <= 110) {
			// code...
			return 'N';
		}
		elseif ($percentage > 110 && $percentage <= 126) {
			// code...
			return 'OW';
		}else {
			// code...
			return 'OB';
		}
	

	}
}


if (!function_exists('weight_on_child_height')) {
	// code...
	function weight_on_child_height($age,$height)
	{
		// code...
		// $age in months
		if ($age < 24) {
			// code...
			return 0;
		}
		if ($age >= 24 && $age <=59) {
			// code..
			$weight = array(
				65=>7.6,
				66=>7.8,
				67=>8.1,
				68=>8.3,
				69=>8.5,
				70=>8.8,
				71=>9,
				72=>9.2,
				73=>9.5,
				74=>9.6,
				75=>9.8,
				76=>10.1,
				77=>10.2,
				78=>10.4,
				79=>10.6,
				80=>10.8,
				81=>11,
				82=>11.2,
				83=>11.4,
				84=>11.6,
				85=>11.9,
				86=>12.2,
				87=>12.4,
				88=>12.7,
				89=>12.9,
				90=>13.1,
				91=>13.4,
				92=>13.6,
				93=>13.8,
				94=>14.1,
				95=>14.3,
				96=>14.6,
				97=>14.8,
				98=>15.1,
				99=>15.4,
				100=>15.7,
				101=>15.9,
				102=>16.3,
				103=>16.6,
				104=>16.9,
				105=>17.2,
				106=>17.5,
				107=>17.9,
				108=>18.2,
				109=>18.6,
				110=>18.9,
				111=>19.3,
				112=>19.7,
				113=>20.1,
				114=>20.5,
				115=>20.9,
				116=>21.3,
				117=>21.7,
				118=>22.1,
				119=>22.5,
				120=>22.9,
			);

			foreach ($weight as $key => $value) {
				// code...
				if ($height == $key) {
					// code...
					return $value;					
				}
			}
		}

		//60months to 71months (not supported age)
		if ($height > 120) {
			// code...

			return round($height/5.25,1);
			

		}
		if ($age >=60 && $age <=71) {
			// code...
			return round($height/5.25,1);

		}
		if ($age >= 72 && $age <= 100) {
			// code...
			return round($height/4.25,1);

		}
	

	}


}


if (!function_exists('get_whz')) {
	// code...
	function get_whz($age,$gender, $height, $weight, $class=null)
	{
		if ($age < 24) {
			// code...

				if ($height > 86) {
					// code...
					return 'NA';
				}

				if ($height < 45) {
					// code...
					return 'NA';
				}

				if ($gender == 2) {
					// code...
				$file = 'assets/json/whz-igirls.json';

				}else{
				$file = 'assets/json/whz-iboys.json';

				}

		}else{

			if ($height > 120) {
				// code...
				return 'NA';
			}

			if ($height < 65) {
				// code...
				return 'NA';
			}
			if ($gender == 2) {
				// code...
			$file = 'assets/json/whz-girls.json';

			}else{
			$file = 'assets/json/whz-boys.json';

			}
		}



        $jsonString = file_get_contents($file);
        $data =  json_decode($jsonString,true);

        foreach ($data as $key => $value) {
        	// code...
        		//echo "$key = $height \n";
        	if ($key == $height) {
        		// code...
        		$sam = explode(";",$value["SAM"]);
        		if ($weight >= $sam[0] AND $weight <= $sam[1]) {
        			// code...
        			return "SAM";
        		}

        		$mam = explode(";",$value["MAM"]);
        		if ($weight >= $mam[0] AND $weight <= $mam[1]) {
        			// code...
        			return "MAM";
        		}

        		$norm = explode(";",$value["N"]);
        		if ($weight >= $norm[0] AND $weight <= $norm[1]) {
        			// code...
        			return "N";
        		}


        		$sam = explode(";",$value["OV"]);
        		if ($weight >= $sam[0] AND $weight <= $sam[1]) {
        			// code...
        			return "OV";
        		}
        		$sam = explode(";",$value["OB"]);
        		if ($weight >= $sam[0]) {
        			// code...
        			return "OB";
        		}
        		return 'NA';
        	}
        }



	}
 }


if (!function_exists('whz_old')) {
	// code...
	function whz_old($gender, $height, $weight)
	{

		if ($gender == 2) {
			// code...
		$file = 'assets/excel/whz-igirls.xlsx';

		}else{
		$file = 'assets/excel/whz-iboys.xlsx';

		}

		
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(true);
        $Spreadsheet = $reader->load($file);
        $sheet = $Spreadsheet->getSheet($Spreadsheet->getFirstSheetIndex());
        //$data = $sheet->toArray();
        foreach ($sheet->getRowIterator() as $row) {
        	// code...
        	if ($row->getRowIndex() === 1) {
        		// code...
        		continue;
        	}
        	$cells = iterator_to_array($row->getCellIterator("A","F"));
        	
        		$data[$cells["A"]->getValue()] = array(
        			'SAM'=>$cells["B"]->getValue(),
        			'MAM'=>$cells["C"]->getValue(),
        			'N'=>$cells["D"]->getValue(),
        			'OV'=>$cells["E"]->getValue(),
        			'OB'=>$cells["F"]->getValue()
        			);
        }
        echo json_encode($data);
        exit();
        foreach ($data as $key => $value) {
        	// code...
        	if ($key === $height) {
        		// code...
        		//echo $height;
        		$sam = explode(";",$value["SAM"]);
        		if ($weight >= $sam[0] AND $weight <= $sam[1]) {
        			// code...
        			return "SAM";
        		}

        		$mam = explode(";",$value["MAM"]);
        		if ($weight >= $mam[0] AND $weight <= $mam[1]) {
        			// code...
        			return "MAM";
        		}

        		$norm = explode(";",$value["N"]);
        		if ($weight >= $norm[0] AND $weight <= $norm[1]) {
        			// code...
        			return "Normal";
        		}


        		$sam = explode(";",$value["OV"]);
        		if ($weight >= $sam[0] AND $weight <= $sam[1]) {
        			// code...
        			return "OV";
        		}


        		$sam = explode(";",$value["OB"]);
        		if ($weight >= $sam[0]) {
        			// code...
        			return "OB";
        		}
        		return false;
        	}
        }



	}
 }
