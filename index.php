<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Password Validation</title>
		<meta charset="UTF-8">
		<meta name="description" content="Login Gateway">
		<meta name="author" content="Johnson">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<script src="./lib/validate.min.js"></script>
		<script src="./lib/rainbow.js"></script>
		<style>
		@font-face {
			font-family: Gravity;
			src: url(./lib/Gravity-Regular.otf);
		}
		body {
			font-family: Gravity;
		}		
		.gateway {
			width: 400px;
			margin: auto;
			margin-top:20px;
		}
		</style>
	</head>
	<body>
	<div class="container">
	<form action="verify.php" method="post">  
		<table class="gateway table table-striped table-bordered">
			<thead>
				<tr><th>Login Gateway</th></tr>
			</thead>
			<tbody>
				<tr>
					<td>Email</td>
					<td><input type="email" id="email" name="email"></input><div id="email_err"></div></td>
				</tr>
				<tr>
					<td>Password </td>
					<td><input type="password" id="password" name="password"></input><div id="pw_err"></div></td>
				</tr>
				<tr><td colspan="2" >
				<button type="button" id="sub" class="btn btn-sm btn-default">Login <span class="glyphicon glyphicon-chevron-up"></span></button>
				<a href="regit.html" class="btn btn-sm btn-default">New Account <span class="glyphicon glyphicon-user"></span></a>
				</td></tr>
			</tbody>	
		</table>
	</form>	
	<div id="err" style="text-align:center;color:red;">
	<?php
	if($_GET["f"]==1) echo "Login Information has error. Check again.";
	?>
	</div>
	</div>
	
	<script>
	$(function(){
		$("th").attr('colspan',2);
		$("tr td:first-child").css({"width":"170px","text-align":"right","vertical-align":"middle"});
	});	
	$("#email").blur(validEM);
	$("#password").blur(validPW);
	$("#sub").click(function(){
		var a = validEM();
		var b = validPW();
		if (a && b == true)
			$("form").submit();
		else
			$("#err").text("Login Information has error. Check again.")
	});
	
	function validEM() {
		re = /(.+)@(.+){2,}\.(.+){2,}/;
		if (re.test($("#email").val())==true){
			$("#email_err").html("");
			return true;
		} else {
			$("#email_err").html("<span style='color:red'>Invalid Email<span>");	
			return false;
		}
	}
	
	function validPW() {
		var input = $("#password").val();
		if(input!=""){
			re=/.{8,}/;
			if(re.test(input)){
				re= /[a-z]/;
				re2= /[A-Z]/;
				if(re.test(input) & re2.test(input)){
					re= /\W/;
					if(!(re.test(input))){
						$("#pw_err").html("");	
						return true;
					} else{
						$("#pw_err").html("<span style='color:red'>Invalid Password<span>");		
						return false;
					}
				} else {
					$("#pw_err").html("<span style='color:red'>Invalid Password<span>");		
					return false;					
				}
			} else {
				$("#pw_err").html("<span style='color:red'>Invalid Password<span>");	
				return false;
			}
		} else { 
			$("#pw_err").html("<span style='color:red'>Password cannot be empty!<span>");
			return false;
		}
	}
	</script>
	</body>
</html>	