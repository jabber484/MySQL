<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "keep";
	$id = $_SESSION["id"];
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM acc_info INNER JOIN login ON acc_info.uid=login.uid WHERE acc_info.uid=$id";
	$result = $conn->query($sql);
	$info = $result->fetch_assoc();
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>Registration</title>
		<meta charset="UTF-8">
		<meta name="description" content="Registration">
		<meta name="author" content="Johnson">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<script src="./lib/rainbow.js"></script>
		<style>
		@font-face {
			font-family: Gravity;
			src: url(./lib/Gravity-Regular.otf);
		}		
		.form {
			margin-top: 15px;
			margin-bottom: 5px;
		}
		.banner {
			box-shadow: inset 0 0 10px #000000; 
			background-color: #F5FFFA;
			padding-top: 30px;
			padding-bottom: 10px;
		}	
		body {
			font-family: Gravity;
		}
		</style>
	</head>
	<body>
	<div class="banner">
		<div class="container">
			<h1 class="rainbow">Account Information</h1>
		</div>
	</div>
	<div class="container">
	<table class="form table table-striped table-bordered">
		<thead>
			<tr><th>Personal Information</th></tr>
		</thead>
		<tbody>
			<tr><td>Salutation</td><td><div id="salutation"></div></td></tr>
			<tr><td>Given name </td><td><div id="name"></div></tr>
			<tr><td>Surname </td><td><div id="surname"></div></td></tr>
			<tr><td>Job title </td><td><div id="title"></div></td></tr>
		</tbody>
		<thead>
			<tr><th>Account Information</th></tr>
		</thead>
		<tbody>
			<tr>
				<td>Email address</td>
				<td><div id="email"></div></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><div id="password"></div></td>
			</tr>
		</tbody>	
		<thead>
			<tr><th>Contact Information</th></tr>
		</thead>
		<tbody>
			<tr><td>Phone number </td><td><div id="phone"></div></td></tr>
			<tr>
				<td>Address </td>
				<td><div id="address"></div></td>
			</tr>
		</tbody>				
	</table>
	<a href="index.php" class="btn btn-md btn-default">Return<span class="glyphicon glyphicon-user"></span></a>
	</div>
	</body>
	<script>
	$(function(){
		$("th").attr('colspan',2);
		$("tr td:first-child").css({"width":"120px","text-align":"right","vertical-align":"middle"});
	});
	
	$("#salutation").text("<?php echo $info['sal'];?>");
	$("#name").text("<?php echo $info['name'];?>");
	$("#surname").text("<?php echo $info['surname'];?>");
	$("#title").text("<?php echo $info['title'];?>");
	$("#email").text("<?php echo $info['email'];?>");
	$("#password").text("<?php echo $info['pw'];?>");
	$("#phone").text("<?php echo $info['phone'];?>");
	$("#address").text("<?php echo $info['address'];?>");
	
	$('h1.rainbow').rainbow({	
		colors: [
			'#FF0000',
			'#f26522',
			'#fff200',
			'#00a651',
			'#28abe2',
			'#2e3192',
			'#6868ff',
			'#000000'
		],
		animate: true,
		animateInterval: 100,
		pad: true,
		pauseLength: 100,
	});
	</script>
</html>
