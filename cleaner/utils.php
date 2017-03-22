<?php
	
function cleanNumber($number) {
	
	$res = $number;
	
	$res = str_replace(array(',','\n'),';',$res);
	
	

	return $res;
	
}
