<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require 'include/functions.php';
include_once("include/connection.php");
#Runs when user press log in button
if($_POST['submit']){
	
	#Take the values from the input fields
	#Here i use may encoding function to encode the user input to prevent XSS attacks
	$username = encoding($_POST['username']);
	$password = $_POST['password'];

	#Creating prepared sql statement
	$sql = "SELECT id, username, password FROM users WHERE username = :username AND active = '1' LIMIT 1";
	$stmt = $dbCon->prepare($sql);
	#Runs the sql statement with given parameters
	$stmt->execute(array(
	':username' => $username
	));
	#Get user returned as an obj
	$user = $stmt->fetch(PDO::FETCH_OBJ);
	
	#see if it has found any rows that match from the database
	if($stmt->rowCount()){
		#verify that the given password match the hashed password in DB
		if(password_verify($password, $user->password)){
			
			#setup the session with found values
			$_SESSION['username'] = $user->username;
			$_SESSION['id'] = $user->id;
		
			#moves to the users page
			header('Location: include/user.php');
		}else{
			echo 'incorrect password';
		}
	}	
	else{
		echo 'incorrect username';
	}
	
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>

<body>

	<h1>Login</h1>
	
	<form method="post"  action="index.php">
		<input type="text" placeholder="Username" maxlength='25' name="username"  /><br />
		<input type="password" placeholder="Password" maxlength='50' name="password" /><br /><br />
		<input type="submit" name="submit"  value="Log In" /><br /><br />
	
	</form>
	
	<a href="SignUp.php">If you are not sign up then Click here to go to the Sign Up page. </a><br />
	
</body>


</html>