<?php

include('../Classes/PHPexcel.php');

if ( isset($_FILES['uploadfile']) ){
	echo $_FILES['uploadfile']['name'] . " was uploaded!";
} else {
	echo "Error!";
}
