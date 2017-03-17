<?php

include('../Classes/PHPexcel.php');

if ( isset($_FILES['uploadfile']) ){
	echo $_FILES['uploadfile']['name'] . " was uploaded!","<br>";
	
	$xls = $_FILES['uploadfile']['tmp_name'];
	$obj = PHPExcel_IOFactory::load($xls);
	$ws = $obj->setActiveSheetIndex(1);
	$table = $obj->getActiveSheet()->toArray();
	
	//~ var_dump($table);
	
	foreach($table as $row) {
		echo '<tr>';
		// Цикл по колонкам
		foreach( $row as $col ) {
			echo '<td>'.$col.'</td>';
		}	
	}
} else {
	echo "Error!";
}
