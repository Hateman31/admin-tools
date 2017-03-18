<?php

include('../Classes/PHPexcel.php');

if ( isset($_FILES['uploadfile']) ){
	
	$xls = $_FILES['uploadfile']['tmp_name'];
	$obj = PHPExcel_IOFactory::load($xls);
	$obj->setActiveSheetIndex(0);
	$table = $obj->getActiveSheet()->toArray();
	
	//~ 1) столбца 'COMMENT' нет
	//~ 2) в перой строке нет имен
	//~ ***
	$column_num = -1;
	foreach( $table[0] as $key=>$name ) {
		if (mb_strtoupper($name) == 'COMMENT') {
			$column_id = $key;
			break;
		}
	}	
	
	foreach( array_slice($table,1) as $row ) {
		echo $row[column_id];
	}
	
} else {
	die("Error!");
}
