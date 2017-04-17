<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require 'include/functions.php';
include_once("include/connection.php");
if($_POST['submit']){
	
		$username = encoding($_POST['username']);
		$password = $_POST['password'];
	
		if(signUpRuleChecker($username,$password)){
			#Creating prepared sql statement
			$sql = "INSERT INTO users(username, password, active) VALUES(:username,:password,'1')";
			$stmt = $dbCon->prepare($sql);
			try{
			#Runs the sql statement with given parameters
			$result = $stmt->execute(array(
			':username' => $username,
			':password' => password_hash($password, PASSWORD_DEFAULT,['cost' => 12])
			));
			header('Location: index.php');
			} catch(PDOException $e){
				#echo $e;
				echo 'Your username must be unique, try another';
			}
		}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SignUp</title>
</head>

<body>

	<h1>SignUp</h1>
	
	<form method="post"  action="SignUp.php">
		<input type="text" placeholder="Username" maxlength='25' name="username"  /><br />
		<input type="password" placeholder="Password" maxlength='50' name="password" /><br />
		<input type="submit" name="submit"  value="Sign Up" />
	
	</form>
	
	<h2>Username and password rules</h2>
	
	<p>Usernames must have more than one and max 25 character and must be unique.</p>
	<p>Password must have 10 or more character and at least one letter and one digit.</p>
	<p>The username and password must not be the same.</p>
	
	<a href="index.php">Click here to return to login page. </a>
</body>


</html>
