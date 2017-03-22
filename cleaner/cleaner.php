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
				//~ (495) 797-87-11 , 796-90-47 => 49579787117969047 
				$res = str_replace(array(',','\n'),';',$number);
				if( strpos(';',$res) !== false ) {
					$new_number = '';
					foreach(explode(';',$res) as $token) {
						$new_number .= cleanNumber($token);
						$new_number = $new_number.';'; 
					}	
				} else {
					$new_number = cleanNumber($number);
				}
				echo $number,' => ',$new_number,' <br>';
			}
		}
	}
} else {
	die("Error!");
}
