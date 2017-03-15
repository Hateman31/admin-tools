<?php

function checkForInjection($command) {

	$sql = array(
		"CREATE", "SELECT", "DROP", "ALTER", 
		"INSERT", "DELETE", "WHERE", "GROUP", 
		"TRUNCATE", "GO", "CRE", "SEL", "DRO", 
		"ALT", "INS", "DEL", "WHE", "GRO", "TRUN", "GO"
	);
	
	//~ if (is_numeric($command)===false ) {
		//~ return $res;
	//~ }
	
	$command = mb_strtoupper($command);
	
	foreach ($sql as $word) {
		$pos = strpos($command, $word);
		if ($pos !== false) {
			return false;
		}
	}

	return true;	
}
