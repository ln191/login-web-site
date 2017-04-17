<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
  
if($_POST['submit']){
	include_once("connection.php");
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT id, username, password FROM Users WHERE username = '$username' AND password = '$password' AND active = '1'";
	
	$query = mysqli_query($dbCon, $sql);
	
	if($query)
	{
		$row = mysqli_fetch_row($query);
		$userId = $row[0];
		$dbUsername = $row[1];
		$dbPassword = $row[2];
		
		$_SESSION['username'] = $dbUsername;
		$_SESSION['id'] = $userId;
		
		header('Location: user.php');
	}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>

<body>

	<h1>Login</h1>
	
	<form method="post"  action="index.php">
		<input type="text" placeholder="Username" name="username"  /><br />
		<input type="password" placeholder="Password" name="password" /><br /><br />
		<input type="submit" name="submit"  value="Log In" /><br /><br />
	
	</form>
	
	<a href="SignUp.php">If you are not sign up then Click here to go to the Sign Up page. </a><br />
	
</body>


</html>