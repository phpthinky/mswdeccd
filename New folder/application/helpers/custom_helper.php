<?php 

if (!function_exists('gender')) {
	// code...
	function gender($num)
	{
		// code...
		$gender = '';
		switch ($num) {
			case 1:
				// code...
			$gender = 'Male';
				break;
			case 2:
			$gender = 'Female';
			break;
			default:
				// code...
			$gender ="Unknown";
				break;
		}
		return $gender;
	}
}

if (!function_exists('studtype')) {
	// code...
	function studtype($num)
	{
		// code...
		if ($num == 2) {
			// code...
			return 'Repeater';
		}else{
			return 'New';
		}
	}
}
if (!function_exists('profile')) {
			function profile($data)
		{
			// code...
			$profile = $data->profile;
			if (empty($data->profile)) {
				// code...
				
				switch ($data->gender) {
                    case '1':
                      // code...
                      $profile = base_url('assets/dist/img/user2-160x160.jpg');
                      break;

                    case '2':
                      // code...
                      $profile = base_url('assets/dist/img/user4-128x128');
                      break;
                    default:
                      // code...
                      $profile = base_url('assets/dist/img/user2-160x160.jpg');
                      break;
                  }

			}
			return	 $profile;
		}
}
if (!function_exists('tomdy')) {
			function tomdy($date){
					$date = strtotime($date);
					return date('m/d/Y',$date);
		
		}
}

if (!function_exists('noinput')) {
			function noinput(){
		return array('status'=>false,'msg'=>'No input data.');

		}
}

if (!function_exists('recordexist')) {
			function recordexist(){
		return array('status'=>false,'msg'=>'Record already exist.');

		}
}


if (!function_exists('unknownerror')) {
			function unknownerror(){
		return array('status'=>false,'msg'=>'Something went wrong. Pls. try again.');

		}
}

if (!function_exists('saveError')) {
			function saveError($type=false){
				if (!$type) {
					// code...
		return array('status'=>false,'msg'=>'No data was added. Database error occcured.');
				}else{

		return json_encode(array('status'=>false,'msg'=>'No data was added. Database error occcured.'));
				}

		}
}
if (!function_exists('savesuccess')) {
			function savesuccess($type=false){
				if (!$type) {
					// code...

		return array('status'=>true,'msg'=>'Successfully added.');
				}else{

		return json_encode(array('status'=>true,'msg'=>'Successfully added.'));
				}


		}
}

if (!function_exists('update')) {
			function update($error=false){
				if ($error) {
					// code...

		return array('status'=>false,'msg'=>'No changes.');
				}else{

		return array('status'=>true,'msg'=>'Successfully updated.');
				}


		}
}
if (!function_exists('showresponse')) {
			function showresponse($e){
		
				$response = null;
			switch ($e) {
				case 1:
					// code...
					$response = array('status'=>true,'msg'=>'Data successfully added.');
					break;
				case 10:
					// code...
					$response = array('status'=>true,'msg'=>'Data successfully save.');
					break;
				case 11:
					// code...
					$response = array('status'=>true,'msg'=>'Record successfully updated.');
					break;

				case 2:
					// code...
					$response =  array('status'=>false,'msg'=>'Something went wrong. Pls. try again.');
					break;
				
				case 3:
					// code...
					$response =  array('status'=>false,'msg'=>'Already exist.');

					break;
				default:
					// code...
					$response = array('status'=>false,'msg'=>'No input data.');
					break;

			}
			return $response;
		}
}
if (!function_exists('getAge')) {
	// code...
	function getAge($dob,$cod=false,$format = false){

	$dateofbirth = new DateTime($dob);
	if (!empty($cod)) {
		// code...
	$today = new DateTime($cod);
	}else{
	$today = new DateTime(date('Y-m-d'));

	}
		$age = $today->diff($dateofbirth);
		return $age;
	}
}


if (!function_exists('to_batch_array')) {
	// code...
	function to_batch_array($array,$item){
		$data=array();
          $keys = array();
          for ($i=0; $i < count($array[$item]); $i++) { 
            // code...

               foreach ($array as $key => $value) {
                if ($i<=0) {
                  // code...
                $keys[] = $key;
                }
               }
               foreach ($keys as $k => $v) {
                   $data[$i][$v] = $array[$v][$i];
                  

               }

          }
          return $data;
	}
}

if (!function_exists('job_status')) {
	// code...
	function job_status($num){
		$job ='Unknown';
		switch ($num) {
			case 1:
				// code...
			$job = 'Job Order';
				break;
			
			case 1:
				// code...
			$job = 'Contractual';
				break;
			case 1:
				// code...
			$job = 'Permanent';
				break;
			case 1:
				// code...
			$job = 'Resigned';
				break;
			case 1:
				// code...
			$job = 'Retired';
				break;

			default:
				// code...
			$job = 'Not Specified';
				break;
		}
		return $job;
	}

}



if (!function_exists('get_domain')) {
	// code...

	function get_domain($title){
		$domain = '';
		switch ($title) {
			case 'gross_motor':
			$domain = 'GROOS MOTOR';
				// code...
				break;
			case 'fine_motor':
			$domain = 'FINE MOTOR';
				// code...
				break;
			case 'self_help':
			$domain = 'SELF HELP';
				// code...
				break;
			case 'expressive_lang':
			$domain = 'EXPRESSIVE LANGUAGE';
				// code...
				break;
			case 'receiptive_lang':
			$domain = 'RECEIPTIVE LANGUAGE';
				// code...
				break;
			case 'cognitive':
			$domain = 'COGNITIVE';
				// code...
				break;
			case 'social_emotion':
			$domain = 'SOCIAL EMOTIONAL';
				// code...
				break;
			
			default:
				// code...
			$domain = 'NOT VALID DOMAIN';
				break;
		}
		return $domain;

	}
}
if (!function_exists('get_standard_score')) {
	// code...

	function get_standard_score($num){
		$score = array(
			29=>37,
			30=>38,
			31=>40,
			32=>41,
			33=>43,
			34=>44,
			35=>45,
			36=>47,
			37=>48,
			38=>50,
			39=>51,
			40=>53,
			41=>54,
			42=>56,
			43=>57,
			44=>59,
			45=>60,
			46=>62,
			47=>63,
			48=>65,
			49=>66,
			50=>67,
			51=>69,
			52=>70,
			53=>72,
			54=>73,
			55=>75,
			56=>76,
			57=>78,
			58=>79,
			59=>81,
			60=>82,
			61=>84,
			62=>85,
			63=>86,
			64=>88,
			65=>89,
			66=>91,
			67=>92,
			68=>94,
			69=>95,
			70=>97,
			71=>98,
			72=>100,
			73=>101,
			74=>103,
			75=>104,
			76=>105,
			77=>107,
			78=>108,
			79=>110,
			80=>111,
			81=>113,
			82=>114,
			83=>116,
			84=>117,
			85=>119,
			86=>120,
			87=>122,
			88=>123,
			89=>124,
			90=>126,
			91=>127,
			92=>129,
			93=>130,
			94=>132,
			95=>133,
			96=>135,
			97=>136,
			98=>138
		);
		foreach ($score as $key => $value) {
			// code...
			if ($num == $key) {
				// code...
				return $value;
			}
		}
		return 0;

	}

}

if(!function_exists('get_scaled_interpretation')){

	function get_scaled_interpretation($num)
	{
		$text = '';
		if ($num <= 3) {
			// code...
			$text = 'Suggest significant delay in overall development';
		}

		if ($num >=4 && $num <= 6) {
			// code...
			$text = 'Suggest slight delay in overall development';
		}

		if ($num >= 7 && $num <= 13) {
			// code...
			$text = 'Average development';
		}

		if ($num >=14 && $num <= 16) {
			// code...
			$text = 'Suggest slightly advanced overall development';
		}

		if ($num >= 17 && $num <= 19) {
			// code...
			$text = 'Suggest highly advanced development';
		}
		return $text;
	}
}

if(!function_exists('get_standard_interpretation')){

	function get_standard_interpretation($num)
	{

		$text = '';
		if ($num <= 69) {
			// code...
			$text = 'Suggest significant delay in overall development';
		}

		if ($num >=70 && $num <= 79) {
			// code...
			$text = 'Suggest slight delay in overall development';
		}

		if ($num >= 80 && $num <= 119) {
			// code...
			$text = 'Average development';
		}

		if ($num >=120 && $num <= 129) {
			// code...
			$text = 'Suggest slightly advanced overall development';
		}

		if ($num >= 130) {
			// code...
			$text = 'Suggest highly advanced development';
		}
		return $text;



	}
}

if(!function_exists('get_colors')){

	function get_colors($num)
	{
		// code...
		$colors = array(
				"orange",
				"red",
				"dodgerblue",
				"green",
				"blue",
				"brown",
				"violet",
				);
		return $colors[$num];
	}
}
