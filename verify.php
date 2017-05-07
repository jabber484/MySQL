<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "keep";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	//continue
	$em = $_POST["email"];
	$pw = hash("sha512",$_POST["password"]);	
	
	$sql = "SELECT pw FROM login WHERE email='$em'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc(); 
		if( $pw == $row["pw"]){
			$sql = "SELECT uid FROM login WHERE email='$em'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc(); 
			session_start();
			$_SESSION["id"] = $row["uid"];
			header('Location: display.php');
		} else
			header("Location: index.php?f=1");
	} else
		header("Location: index.php?f=1");
	$conn->close();
	exit();
?>
