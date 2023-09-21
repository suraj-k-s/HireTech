<?php
include('../Connection/Connection.php');

session_start();
if(isset($_POST["btn_submit"]))
{
	$selU="select * from tbl_user where user_email='".$_POST["txt_username"]."' and user_password='".$_POST["txt_password"]."'";
	$rowU=$conn->query($selU);
	
	
	$selE="select * from tbl_labour where labour_email='".$_POST["txt_username"]."' and labour_password='".$_POST["txt_password"]."'";
	$rowE=$conn->query($selE);
	
	
	$selA="select * from tbl_admin where admin_email='".$_POST["txt_username"]."' and admin_password='".$_POST["txt_password"]."'";
	$rowA=$conn->query($selA);
	
	
	if($dataU=$rowU->fetch_assoc())
	{
		if($dataU["user_status"]=="1")
		{
			echo "<script>alert('Sorry Your Account Disabled')</script>";
		}
		else if($dataU["user_status"]=="0")
		{
			$_SESSION["userid"]=$dataU["user_id"];
			$_SESSION["username"]=$dataU["user_name"];
			header("location:../user/HomePage.php");
		}
	}
	else if($dataE=$rowE->fetch_assoc())
	{
		
		if($dataE["labour_status"]=="0")
		{
			echo "<script>alert('Verification Under Proccessing')</script>";
		}
		else if($dataE["labour_status"]=="2")
		{
			echo "<script>alert('Sorry Your Account Disabled')</script>";
		}
		else if($dataE["labour_status"]=="1")
		{
			$_SESSION["labourid"]=$dataE["labour_id"];
			$_SESSION["labourname"]=$dataE["labour_name"];
			header("location:../labour/HomePage.php");
		}
		
	}
	else if($dataA=$rowA->fetch_assoc())
	{
		
		$_SESSION["adminid"]=$dataA["admin_id"];
		$_SESSION["adminname"]=$dataA["admin_name"];
		header("location:../Admin/HomePage.php");
	}
	else
	{
		echo "<script>alert('Invalid E-mail or Password')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../Template/Login/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>

			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mb-3">
						<h1>HIRE TECH</h1>
					</div>
					<div class="heading mb-4">
						<h4>Login into your account</h4>
					</div>
					<form method="post" autocomplete="off">
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" name="txt_username"  placeholder="Email Address" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="txt_password"  placeholder="Password" required>
						</div>
						<div class="row mb-3">
							
						</div>
						<div class="text-left mb-3">
							<button type="submit" name="btn_submit"  class="btn">Login</button>
						</div>
						<div class="text-center mb-2">
							
						<div style="color: #777">Don't have an account
							<a href="../index.php" class="register-link">Back To Home</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>