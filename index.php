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
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
		}

		.text-header {
			margin-top: 30px;
		}

		.input-field {
			width: 550px;
			color: lightgray;
		}

		.field-email{
			margin-top: 160px;
		}

		.field-password{
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
	</style>

</head>
<body>
	<div class="container-content">
		<div class="d-flex text-center nav-bar">
			<div class="flex-grow-1 text-nav-bar">Classroom</div>
		</div>
		<div class="d-flex flex-column justify-content-center login-box">
			<div class="text-header">LOGIN</div>
			<form class="d-flex flex-column align-items-center" action = "./get-login.php" method = "post">
				<input type="email" name="email" class="input-field field-email" placeholder="Email"/>
				<input type="password" name="password" class="input-field field-password" placeholder="Password"/>
				<input type="submit" class="main-button btn-login" value="login"/>
				<a href="./register.php" class="main-button-outline btn-register text-decoration-none text-center">register</a>
			</form>
		</div>
	</div>
</body>
</html>