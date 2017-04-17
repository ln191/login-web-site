<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if($_POST['submit']){
	include_once("connection.php");
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
		$sql = "INSERT INTO Users(username, password, active) VALUES('$username','$password','1')";
	
		$query = mysqli_query($dbCon, $sql);
	
		if($query){
			header('Location: index.php');
		}
		else{
		echo "We where unable to create an account please try again";
		}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> PHP/MySQL SignUp</title>
</head>

<body>

	<h1>PHP/MySQL SignUp</h1>
	
	<form method="post"  action="SignUp.php">
		<input type="text" placeholder="Username" maxlength='20' name="username"  /><br />
		<input type="password" placeholder="Password" maxlength='8' name="password" /><br />
		<input type="submit" name="submit"  value="Sign Up" />
	
	</form>

</body>


</html>
