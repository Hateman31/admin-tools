<?php

$str = '7(47350)4-22-67';
print($str);
print('<br>');
print_r(preg_replace('/[^0-9]+/', '', $str));
