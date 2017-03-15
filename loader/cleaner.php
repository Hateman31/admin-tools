<?php

function cleanNumber($num) 
{
	
	$res = trim($num);
	
	$chars = array("(",")","-"," ");
		
	$res = str_replace($chars,"",$res);
	
	$res = str_replace("+7","8",$res);
	
	
	return $res;

}
