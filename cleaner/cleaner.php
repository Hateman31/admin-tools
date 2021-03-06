<?php

include('../Classes/PHPexcel.php');
require_once('utils.php');

if ( isset($_FILES['uploadfile']) ){
	
	$xls = $_FILES['uploadfile']['tmp_name'];
	$obj = PHPExcel_IOFactory::load($xls);
	$obj->setActiveSheetIndex(0);
	$table = $obj->getActiveSheet()->toArray();
	
	//~ 2) в перой строке нет имен
	//~ ***
	$column_num = -1;
	foreach( $table[0] as $key=>$name ) {
		if (mb_strtoupper($name) == 'COMMENT') {
			$column_num = $key;
			break;
		}
	}	
	if ($column_num == -1) {
		echo "Comment are not found!";
	} else {
		$rows = array_slice($table,1);
		foreach($rows as $row ) {
			$number = $row[$column_num];
			if (strlen($number)) {
				$new_number = cleanRow($number);
				//~ 7 (391) 256-76-89 +7 (960) 759-95-75 => 7391256768979607599575 
				echo $number,' => ',$new_number,' <br>';
			}
		}
	}
} else {
	die("Error!");
}
