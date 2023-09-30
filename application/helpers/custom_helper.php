<?php 

if (!function_exists('gender')) {
	// code...
	function gender($num)
	{
		// code...
		if ($num == 1) {
			// code...
			return 'Female';
		}else{
			return 'Male';
		}
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
 ?>