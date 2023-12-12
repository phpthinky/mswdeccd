<?php 

/**
 * 
 */
class Scaled_score
{
	public static function _get($type,$score,$age){
		switch ($type) {
			case 'gross_motor':
				// code...
			return self::gross($score,$age);
				break;
			case 'fine_motor':
				// code...
			return self::fine($score,$age);
				break;
			case 'self_help':
				// code...
			return self::self_help($score,$age);
				break;
			case 'expressive_lang':
				// code...
			return self::expressive_lang($score,$age);
				break;
			case 'receiptive_lang':
				// code...
			return self::receiptive_lang($score,$age);
				break;
			case 'cognitive':
				// code...
			return self::cognitive($score,$age);
				break;
			case 'social_emotion':
				// code...
			return self::social_emotion($score,$age);
				break;
			
			default:
				// code...
			return 0;
				break;

		}
	}
	public static function gross($score='',$age='')
	{
		// code...
	
		if ($age <= 3.0) {
			// code...
			return 0;
		}
		if ($age >= 3.1 && $age <= 4.0) {
			// code...

			if ($score <= 3) {
				// code...
				return 1;
			}

			if ($score <= 4) {
				// code...
				return 2;
			}


			if ($score == 5) {
				// code...
				return 3;
			}
			if ($score == 6) {
				// code...
				return 5;
			}
			if ($score == 7) {
				// code...
				return 6;
			}
			if ($score == 8) {
				// code...
				return 7;
			}

			if ($score == 9) {
				// code...
				return 8;
			}
			if ($score == 10) {
				// code...
				return 10;
			}

			if ($score == 11) {
				// code...
				return 11;
			}
			if ($score == 12) {
				// code...
				return 12;
			}

			if ($score == 13) {
				// code...
				return 14;
			}
			return 0;
		}

		if ($age >= 4.1 && $age <= 5.0) {
			// code...
			
			if ($score <= 5) {
				// code...
				return 1;
			}

			if ($score <= 6) {
				// code...
				return 2;
			}


			if ($score == 7) {
				// code...
				return 4;
			}
			if ($score == 8) {
				// code...
				return 5;
			}
			if ($score == 9) {
				// code...
				return 7;
			}
			if ($score <= 10) {
				// code...
				return 8;
			}

			if ($score == 11) {
				// code...
				return 10;
			}
			if ($score == 12) {
				// code...
				return 11;
			}

			if ($score == 13) {
				// code...
				return 13;
			}
			return 0;
		}
		if ($age >= 5.1 && $age <= 5.11) {
	
		if ($score <= 10) {
			// code...
			return 1;
		}
		if ($score == 11) {
			// code...
			return 4;
		}
		if ($score == 12) {
			// code...
			return 1;
		}
		if ($score == 13) {
			// code...
			return 11;
		}
		
	}
	}

	public static function fine($score='',$age='')
	{
		// code...
	

		if ($age <= 3.0) {
			// code...
			return 0;
		}
		if ($age >= 3.1 && $age <= 4.0) {
			// code...
	

		if ($score <= 3) {
			// code...
			return 2;
		}
		if ($score == 4) {
			// code...
			return 4;
		}
		if ($score == 5) {
			// code...
			return 5;
		}
		if ($score == 6) {
			// code...
			return 7;
		}
		if ($score == 7) {
			// code...
			return 9;
		}
		if ($score == 8) {
			// code...
			return 10;
		}
		if ($score == 9) {
			// code...
			return 12;
		}
		if ($score == 10) {
			// code...
			return 13;
		}
		if ($score == 11) {
			// code...
			return 14;
		}
				return 0;
		}

		if ($age >= 4.1 && $age <= 5.0) {
			// code...
		
		

		if ($score <= 3) {
			// code...
			return 1;
		}
		if ($score == 4) {
			// code...
			return 2;
		}
		if ($score == 5) {
			// code...
			return 4;
		}
		if ($score == 6) {
			// code...
			return 5;
		}
		if ($score == 7) {
			// code...
			return 7;
		}
		if ($score == 8) {
			// code...
			return 9;
		}
		if ($score == 9) {
			// code...
			return 10;
		}
		if ($score == 10) {
			// code...
			return 12;
		}
		if ($score == 11) {
			// code...
			return 14;
		}
		return 0;
		}
		if ($age >= 5.1 && $age <= 5.11) {
	
		if ($score <= 5) {
			// code...
			return 1;
		}
		if ($score == 6) {
			// code...
			return 3;
		}
		if ($score == 7) {
			// code...
			return 5;
		}
		if ($score == 8) {
			// code...
			return 7;
		}
		if ($score == 9) {
			// code...
			return 8;
		}
		if ($score == 10) {
			// code...
			return 10;
		}
		if ($score == 11) {
			// code...
			return 12;
		}
		
	}
	}


	public static function self_help($score='',$age='')
	{
		// code...
	

		if ($age <= 3.0) {
			// code...
			return 0;
		}
		if ($age >= 3.1 && $age <= 4.0) {
			// code...

			if ($score <= 9) {
				// code...
				return 1;
			}
			if ($score == 10) {
				// code...
				return 2;
			}
			if ($score == 11) {
				// code...
				return 3;
			}
			if ($score == 12) {
				// code...
				return 4;
			}
			if ($score <= 14) {
				// code...
				return 5;
			}
			if ($score == 15) {
				// code...
				return 6;
			}
			if ($score == 16) {
				// code...
				return 7;
			}
			if ($score == 17) {
				// code...
				return 8;
			}
			if ($score <= 19) {
				// code...
				return 9;
			}

			if ($score == 20) {
				// code...
				return 10;
			}
			if ($score == 21) {
				// code...
				return 11;
			}
			if ($score == 22) {
				// code...
				return 12;
			}

			if ($score <= 24) {
				// code...
				return 13;
			}
			if ($score == 25) {
				// code...
				return 14;
			}
			if ($score == 26) {
				// code...
				return 15;
			}

			if ($score == 27) {
				// code...
				return 16;
			}
			return 0;
		}

		elseif ($age >= 4.1 && $age <= 5.0) {
			// code...
		
			if ($score <= 15) {
				// code...
				return 1;
			}
			if ($score == 16) {
				// code...
				return 2;
			}
			if ($score == 17) {
				// code...
				return 3;
			}
			if ($score == 18) {
				// code...
				return 4;
			}
			if ($score == 19) {
				// code...
				return 5;
			}
			if ($score == 20) {
				// code...
				return 6;
			}
			if ($score == 21) {
				// code...
				return 8;
			}
			if ($score == 22){
				// code...
				return 9;
			}

			if ($score == 23) {
				// code...
				return 10;
			}
			if ($score == 24) {
				// code...
				return 11;
			}
			if ($score == 25) {
				// code...
				return 12;
			}

			if ($score <= 26) {
				// code...
				return 13;
			}
			if ($score == 27) {
				// code...
				return 14;
			}
			return 0;
		}
		elseif ($age >= 5.1 && $age <= 5.11) {
		if ($score <= 19) {
			// code...
			return 2;
		}
		if ($score == 20) {
			// code...
			return 3;
		}
		if ($score == 21) {
			// code...
			return 4;
		}
		if ($score == 22) {
			// code...
			return 6;
		}
		if ($score == 23) {
			// code...
			return 7;
		}
		if ($score == 24) {
			// code...
			return 9;
		}
		if ($score == 25) {
			// code...
			return 10;
		}
		if ($score == 26) {
			// code...
			return 12;
		}
		if ($score == 27) {
			// code...
			return 13;
		}
	}	

	}


	public static function receiptive_lang($score='',$age='')
	{
		// code...
	

		if ($age <= 3.0) {
			// code...
			return 0;
		}
		if ($age >= 3.1 && $age <= 4.0) {
			// code...
		
			if ($score <= 1) {
				// code...
				return 3;
			}
			if ($score == 2) {
				// code...
				return 5;
			}
			if ($score == 3) {
				// code...
				return 7;
			}
			if ($score == 4) {
				// code...
				return 10;
			}
			if ($score == 5) {
				// code...
				return 12;
			}
			return 0;
		}

		if ($age >= 4.1 && $age <= 5.0) {
			// code...
			
			if ($score <= 1) {
				// code...
				return 1;
			}
			if ($score == 2) {
				// code...
				return 3;
			}
			if ($score == 3) {
				// code...
				return 6;
			}
			if ($score == 4) {
				// code...
				return 9;
			}
			if ($score == 5) {
				// code...
				return 11;
			}
			return 0;
		}
		if ($age >= 5.1 && $age <= 5.11) {
		
			if ($score <= 2) {
				// code...
				return 1;
			}
			if ($score == 3) {
				// code...
				return 4;
			}
			if ($score == 4) {
				// code...
				return 8;
			}
			if ($score == 5) {
				// code...
				return 11;
			}
	}
	}


	public static function expressive_lang($score='',$age='')
	{
		// code...

		if ($age <= 3.0) {
			// code...
			return 0;
		}
		if ($age >= 3.1 && $age <= 4.0) {
			// code...
			
			if ($score <= 2) {
				// code...
				return 1;
			}
			if ($score == 3) {
				// code...
				return 3;
			}
			if ($score == 4) {
				// code...
				return 4;
			}
			if ($score == 5) {
				// code...
				return 6;
			}
			if ($score == 6) {
				// code...
				return 9;
			}
			if ($score == 7) {
				// code...
				return 11;
			}
			if ($score == 8) {
				// code...
				return 13;
			}
			return 0;
		}

		if ($age >= 4.1 && $age <= 5.0) {
			// code...
		

			if ($score <= 5) {
				// code...
				return 2;
			}
			if ($score == 6) {
				// code...
				return 5;
			}
			if ($score == 7) {
				// code...
				return 8;
			}
			if ($score == 8) {
				// code...
				return 11;
			}
				return 0;
		}
		if ($age >= 5.1 && $age <= 5.11) {
		

			if ($score <= 7) {
				// code...
				return 5;
			}
			if ($score == 8) {
				// code...
				return 11;
			}
				return 0;
		
		}
	}
		

	public static function cognitive($score='',$age='')
	{
		// code...

		if ($age <= 3.0) {
			// code...
			return 0;
		}
		if ($age >= 3.1 && $age <= 4.0) {
			// code...
			

			if ($score == 0) {
				// code...
				return 3;
			}
			if ($score == 1) {
				// code...
				return 4;
			}
			if ($score <= 3) {
				// code...
				return 5;
			}
			if ($score == 4) {
				// code...
				return 6;
			}
			if ($score == 5) {
				// code...
				return 7;
			}
			if ($score == 6) {
				// code...
				return 8;
			}
			if ($score == 7) {
				// code...
				return 9;
			}
			if ($score <= 9) {
				// code...
				return 10;
			}
			if ($score == 10) {
				// code...
				return 11;
			}
			
			if ($score == 11) {
				// code...
				return 12;
			}
			
			if ($score == 12) {
				// code...
				return 13;
			}
			
			if ($score <= 14) {
				// code...
				return 14;
			}
			
			if ($score == 15) {
				// code...
				return 15;
			}
			
			if ($score == 16) {
				// code...
				return 16;
			}
			if ($score == 17) {
				// code...
				return 17;
			}
			if ($score == 18) {
				// code...
				return 18;
			}
			if ($score == 19) {
				// code...
				return 19;
			}
			if ($score <= 21) {
				// code...
				return 16;
			}
			return 0;
		}

		if ($age >= 4.1 && $age <= 5.0) {
			// code...
	
			if ($score <= 0) {
				// code...
				return 1;
			}
			if ($score == 1) {
				// code...
				return 2;
			}
			if ($score <= 3) {
				// code...
				return 3;
			}
			if ($score == 4) {
				// code...
				return 4;
			}
			if ($score == 5) {
				// code...
				return 5;
			}
			if ($score <= 7) {
				// code...
				return 6;
			}
			if ($score == 8) {
				// code...
				return 7;
			}
			if ($score <= 10) {
				// code...
				return 8;
			}
			if ($score == 11) {
				// code...
				return 9;
			}
			if ($score == 12) {
				// code...
				return 10;
			}
			
			if ($score <= 14) {
				// code...
				return 11;
			}
			
			if ($score == 15) {
				// code...
				return 12;
			}
			
			if ($score <= 17) {
				// code...
				return 13;
			}
			
			if ($score == 18) {
				// code...
				return 14;
			}
			if ($score <= 20) {
				// code...
				return 15;
			}
			if ($score == 21) {
				// code...
				return 16;
			}		
			return 0;
		}
		if ($age >= 5.1 && $age <= 5.11) {
		
			if ($score <= 9) {
				// code...
				return 1;
			}
			if ($score == 10) {
				// code...
				return 2;
			}
			if ($score == 11) {
				// code...
				return 3;
			}
			if ($score == 12) {
				// code...
				return 4;
			}
			if ($score == 13) {
				// code...
				return 5;
			}
			if ($score == 14) {
				// code...
				return 6;
			}
			if ($score == 15) {
				// code...
				return 7;
			}
			if ($score == 16) {
				// code...
				return 8;
			}
			if ($score == 17) {
				// code...
				return 9;
			}
			
			if ($score == 18) {
				// code...
				return 10;
			}
			
			if ($score == 19) {
				// code...
				return 11;
			}
			
			if ($score == 20) {
				// code...
				return 12;
			}
			
			if ($score == 21) {
				// code...
				return 13;
			}
	}

	}
	public static function social_emotion($score='',$age='')
	{
		// code...


		if ($age <= 3.0) {
			// code...
			return 0;
		}
		if ($age >= 3.1 && $age <= 4.0) {
			// code...
			if ($score <=9) {
				// code...
				return 1;
			}

			if ($score <= 11) {
				// code...
				return 2;
			}

			if ($score == 12) {
				// code...
				return 3;
			}

			if ($score == 13) {
				// code...
				return 4;
			}
			if ($score == 14) {
				// code...
				return 5;
			}
			if ($score == 15) {
				// code...
				return 6;
			}
			if ($score == 16) {
				// code...
				return 7;
			}
			if ($score <= 18) {
				// code...
				return 8;
			}

			if ($score == 19) {
				// code...
				return 9;
			}
			if ($score == 20) {
				// code...
				return 10;
			}
			if ($score == 21) {
				// code...
				return 11;
			}
			if ($score == 22) {
				// code...
				return 12;
			}

			if ($score == 23) {
				// code...
				return 13;
			}
			if ($score == 24) {
				// code...
				return 14;
			}
			return 0;
		}

		if ($age >= 4.1 && $age <= 5.0) {
			// code...


			if ($score <= 13) {
				// code...
				return 1;
			}

			if ($score <= 14) {
				// code...
				return 2;
			}

			if ($score == 15) {
				// code...
				return 3;
			}

			if ($score == 16) {
				// code...
				return 4;
			}
			if ($score == 17) {
				// code...
				return 5;
			}
			if ($score == 18) {
				// code...
				return 7;
			}
			if ($score == 19) {
				// code...
				return 8;
			}

			if ($score == 20) {
				// code...
				return 9;
			}
			if ($score == 21) {
				// code...
				return 10;
			}
			if ($score == 22) {
				// code...
				return 11;
			}
			if ($score == 23) {
				// code...
				return 12;
			}

			if ($score == 24) {
				// code...
				return 13;
			}

			return 0;
		}

		if ($age >= 5.1 && $age <= 5.11) {
			// code...

		if ($score <= 15) {
			// code...
			return 1;
		}
		if ($score == 16) {
			// code...
			return 2;
		}
		if ($score == 17) {
			// code...
			return 3;
		}
		if ($score == 18) {
			// code...
			return 5;
		}
		if ($score == 19) {
			// code...
			return 6;
		}
		if ($score == 20) {
			// code...
			return 7;
		}
		if ($score == 21) {
			// code...
			return 9;
		}
		if ($score == 22) {
			// code...
			return 10;
		}
		if ($score == 23) {
			// code...
			return 11;
		}
		
		if ($score == 24) {
			// code...
			return 13;
		}
		if ($score == 18) {
			// code...
			return 10;
		}
		
		if ($score == 19) {
			// code...
			return 11;
		}
		
		if ($score == 20) {
			// code...
			return 12;
		}
		
		if ($score == 21) {
			// code...
			return 13;
		}
		}
		

	}


} ///end of class

 ?>