<?php

$dbCon = mysqli_connect("localhost","root","pwd","bad_DB",3306);

if (mysqli_connect_errno()){
	echo "Failed to connect: " . mysqli_connect_errno();
}

?>