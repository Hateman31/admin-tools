<?php

include('checking.php');

echo checkForInjection('select') ? "true":"not true","<br>";

echo checkForInjection('111 222') ? "true":"not true","<br>";

echo checkForInjection('111 222 drop') ? "true":"not true","<br>";
