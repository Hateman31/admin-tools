<?php

require_once('utils.php');

$str1 = '7(47350)4-22-67';
$str2 = '(495) 797-87-11 , 796-90-47';

echo $str2,' => ',cleanRow($str2);
print('<br>');
$res = str_replace(array(',','\n'),';',$str2);
var_dump($res); var_dump(strpos($res,';'));
print('<br>');








