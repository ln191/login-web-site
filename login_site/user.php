<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if(isset($_SESSION['id'])) {
	$userId = $_SESSION['id'];
	$username = $_SESSION['username'];
}else {
	header('Location: index.php');
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> User site</title>
</head>

<body>

	Welcome, <?php echo $username; ?>. You are logged in. Your user Id is <?php echo $userId; ?>. <br /> <br />
	
	<form action="logout.php">
		
		<input type="submit" value="Log Out" />
	
	</form>
</body>


</html>