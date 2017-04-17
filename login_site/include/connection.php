<?php
#Connects to a local mySql Database, with Exception handeling 
try{
	$dbCon = new PDO('mysql:host=127.0.0.1;dbname=login_DB','root','pwd');
	$dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOexception $e) {
	echo $e->getMessage();
}
?>