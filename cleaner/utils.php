<?php
	
function cleanNumber($number) {
	
	preg_match_all('!\d+!', $number, $matches);
	return preg_replace('/[^0-9]+/', '', $number);
	//~ return filter_var($number, FILTER_SANITIZE_NUMBER_INT);
	
}
