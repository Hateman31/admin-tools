<?php

$str = 'In My Cart : 11 12 items';
preg_match_all('!\d+!', $str, $matches);
print_r($matches);

print_r(filter_var($str, FILTER_SANITIZE_NUMBER_INT));

print_r(intval(preg_replace('/[^0-9]+/', '', $string), 10));
