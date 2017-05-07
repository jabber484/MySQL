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
	$sal = $_POST["salutation"];
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$tittle = $_POST["tittle"];
	$em = $_POST["email"];
	$pw = hash("sha512",$_POST["password"]);	
	$phone = $_POST["phone"];	
	$add = $_POST["add1"];	
	if($_POST["add2"]!="")
		$add = $add . "," . $_POST["add2"];
	if($_POST["add3"]!="")
		$add = $add . "," . $_POST["add3"];
	
	
	$sql = "INSERT INTO acc_info (sal, name, surname, title, phone, address) VALUES ('$sal','$name','$surname','$tittle','$phone','$add')";
	if ($conn->query($sql) === False)
		echo "Error: " . $sql . "<br>" . $conn->error;
	
	$sql = "INSERT INTO login (email, pw) VALUES ('$em','$pw')";
	if ($conn->query($sql) === TRUE) {
		$sql = "SELECT uid FROM login WHERE email='$em'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc(); 
		session_start();
		$_SESSION["id"] = $row["uid"];
		header('Location: display.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}	
	
	$conn->close();
?>