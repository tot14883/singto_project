<?php
    include("./controller/db-connect.php");
    session_start();
		if(isset($_SESSION['id'])) {
			echo '<script>window.location = "home.php";</script>';
			exit;
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="css/index.css">

	<title>Class room</title>

	<style>
		.nav-bar {
			background-color: var(--primary);
			border-bottom: 1px solid var(--blue-ocean);
		}

		.login-box {
			width: 1076px;
			align-items: center;

			margin: 85px auto;
			padding-bottom: 48px;
		}

		.text-header {
			margin-top: 30px;
		}

		.input-field {
			width: 550px;
			color: lightgrey;
		}

		.field-email{
			margin-top: 160px;
		}

		.field-password{
			margin-top: 32px;
		}

		.field-firstname{
			margin-top: 32px;
		}

		.field-lastname{
			margin-top: 32px;
		}

		.btn-login {
			font-size: 13px;
			width: 173px;
			margin-top: 51px;
			padding: 12px 57px;
		}

		.btn-register {
			font-size: 13px;
			color: #fff;

			width: 173px;
			margin-top: 22px;
			padding: 12px 57px;
		}

		.title {
			font-size: var(--font-20);
			font-weight: 700;
			color: #fff;
		}

		.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
			width: 291px;
			background-color: var(--red-rose);
			margin: auto;
			padding: 20px;
			border: 1px solid var(--red-cover-pink);
		}

		.btn-modal {
			padding: 8px 34px;
		}
	</style>

</head>
<body>
	<div class="container-content">
		<div class="d-flex text-center nav-bar">
			<div class="flex-grow-1 text-nav-bar">Classroom</div>
		</div>
		<div class="d-flex flex-column justify-content-center login-box box-primary">
			<div class="text-header">Register</div>
			<form class="d-flex flex-column align-items-center" action = "./controller/get-register.php" method="post">
				<input type="email" name="email" class="input-field field-email" placeholder="Email"/>
				<input type="password" name="password" class="input-field field-password" placeholder="Password"/>
				<input type="password" name="confirmpassword" class="input-field field-password" placeholder="Confirm Password"/>
				<input type="text" name="firstname" class="input-field field-firstname" placeholder="Firstname"/>
				<input type="text" name="lastname" class="input-field field-lastname" placeholder="Lastname"/>
				<input type="submit" class="main-button btn-login" value="Register"/>
				<a href="./index.php" class="main-button-outline btn-register text-decoration-none text-center">Login</a>
			</form>
		</div>
	</div>
	<div id="myModal" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="title text-center">
				register success
			</div>
			<div class="mt-2"></div>
			<div class="d-flex flex-column">
				<div class="d-flex justify-content-center align-items-center">
						<div class="btn-button-primary btn-modal">login</div>
						<div class="m-1"></div>
						<div class="btn-button-primary btn-modal" id="close">close</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$("#myBtn").click(function() {
			$('.modal').css('display', 'block');
		});

		$("#close").click(function() {
			$('.modal').css('display', 'none');
		});

	</script>
</body>
</html>