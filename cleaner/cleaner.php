<?php

include('../Classes/PHPexcel.php');

if ( isset($_FILES['uploadfile']) ){
	echo $_FILES['uploadfile']['name'] . " was uploaded!","<br>";
	
	$xls = $_FILES['uploadfile']['tmp_name'];
	$obj = PHPExcel_IOFactory::load($xls);
	$obj->setActiveSheetIndex(0);
	$table = $obj->getActiveSheet()->toArray();
	
	foreach($table as $row) {
		echo '<tr>';
		// Цикл по колонкам
		foreach( $row as $col ) {
			echo $col.' ';
		}	
		echo '<br>';
	}
} else {
	echo "Error!";
}
