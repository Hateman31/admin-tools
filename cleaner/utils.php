<?php
	
function cleanNumber($number) {
	
	preg_match_all('!\d+!', $number, $matches);
	return preg_replace('/[^0-9]+/', '', $number);
	
}

function cleanRow($number) {
	//~ (495) 797-87-11 , 796-90-47 => 49579787117969047 
	$res = str_replace(array(',','\n'),';',$number);
	if(strpos($res,';') !== false ) {
		$new_number = '';
		foreach(explode(';',$res) as $token) {
			$new_number .= cleanNumber($token);
			$new_number = $new_number.';'; 
		}	
	} else {
		$new_number = cleanNumber($number);
	}
	return $new_number;
}
