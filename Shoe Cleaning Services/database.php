<?php

$sname= "localhost:3306";
$unmae= "root";
$password = "1234";

$db_name = "scs";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);



if (!$conn) {
	echo "Connection failed!";
}