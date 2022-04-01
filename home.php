<?php
include("./db-connect.php");
session_start();
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

		.content {
			width: 1141px;
			margin-top: 28px;
			margin-left: auto;
			margin-right: auto;
		}

		.text {
			font-size: 32px;
			font-weight: 700;
			color: #fff;
		}

		.btn-create-class {
			font-size: 13px;
			font-weight: 700;
			color: #fff;
		}

		.grid-container {
			display: grid;
			grid-template-columns: auto auto auto;
			grid-gap: 10px;
			padding: 10px;
		}

		.grid-container>div {
			width: 334px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
			text-align: center;
			padding: 16px;
		}

		.btn-class-div {
			width: 44px;
			font-size: 11px;
			font-weight: 700;
			color: #fff;

			align-self: end;
		}

		.subject-code {
			width: 199px;
			font-size: 20px;
			font-weight: 700;
			color: #fff;
		}

		.subject-name {
			width: 199px;
			text-overflow: ellipsis;
			overflow: hidden;
			white-space: nowrap;

			font-size: 20px;
			font-weight: 700;
			color: #fff;
		}

		.subject-author {
			font-size: 14px;
			font-weight: 700;
			color: #fff;
			align-self: end;
		}

		.text-my-classroom {
			margin-top: 16px;
		}

		.text-all-class {
			margin-top: 16px;
		}

		.modal {
			display: none;
			/* Hidden by default */
			position: fixed;
			/* Stay in place */
			z-index: 1;
			/* Sit on top */
			padding-top: 100px;
			/* Location of the box */
			left: 0;
			top: 0;
			width: 100%;
			/* Full width */
			height: 100%;
			/* Full height */
			overflow: auto;
			/* Enable scroll if needed */
			background-color: rgb(0, 0, 0);
			/* Fallback color */
			background-color: rgba(0, 0, 0, 0.4);
			/* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
			width: 291px;
			background-color: var(--red-rose);
			margin: auto;
			padding: 20px;
			border: 1px solid var(--red-cover-pink);
		}

		.btn-ok {
			width: 108px;
		}


		.modal1 {
			display: none;
			/* Hidden by default */
			position: fixed;
			/* Stay in place */
			z-index: 1;
			/* Sit on top */
			padding-top: 100px;
			/* Location of the box */
			left: 0;
			top: 0;
			width: 100%;
			/* Full width */
			height: 100%;
			/* Full height */
			overflow: auto;
			/* Enable scroll if needed */
			background-color: rgb(0, 0, 0);
			/* Fallback color */
			background-color: rgba(0, 0, 0, 0.4);
			/* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content1 {
			width: 636px;
			background-color: var(--primary);
			margin: auto;
			padding: 20px;
			border: 1px solid var(--blue-ocean);
		}

		.modal-title {
			font-size: 32px;
			font-weight: 700;
			color: #fff;
		}

		.modal-field {
			font-size: 16px;
			padding: 4px;
			margin-top: 8px;
		}

		.btn-create {
			width: 174px;
			margin-top: 12px;
			color: #fff;
		}

		.btn-cancel {
			width: 174px;
			margin-top: 12px;
			color: #fff;
		}

		/** Menu bar */
		.menubar {
			width: 379px;
			height: 100%;
			padding: 16px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);

			position: fixed;
			transform: translate(-10000px, 0px);
			top: 0;
		}

		.text-name {
			font-size: 20px;
			font-weight: 700;
			color: #fff;
		}

		.line {
			width: 100%;
			height: 1px;
			background-color: var(--blue-ocean);
		}

		.text-title {
			margin-top: 16px;
			font-size: 20px;
			font-weight: 700;
			color: #B5C4D3;
		}

		.card-items {
			margin-top: 8px;
		}

		.subject-code-sidebar {
			font-size: 16px;
			font-weight: 700;
			color: #B5C4D3;
			margin-left: 8px;
		}

		.subject-name-sidebar {
			width: 199px;
			font-size: 16px;
			font-weight: 700;
			color: #B5C4D3;
			margin-left: 8px;
			text-overflow: ellipsis;
			overflow: hidden;
			white-space: nowrap;
		}
	</style>

</head>

<body>
	<div class="container-content">
		<div class="d-flex text-center nav-bar">
			<div id="showSidebar" class="show-sidebar justify-content-center align-items-center align-self-center ml-2">
				<img class="image-fit-width" src="imgs/align_left_free_icon_font.png" width="32" height="32" />
			</div>
			<div class="flex-grow-1 text-nav-bar">Classroom</div>
		</div>
		<div class="d-flex flex-column content">
			<!-- Enrolled -->
			<div class="d-flex flex-grow-1 justify-content-between justify-content-center align-items-center box-header">
				<div class="text text-enrolled">Enrolled</div>
				<input type="submit" class="main-button btn-create-class" id="btn-create-class" value="Create class" />
			</div>
			<div class="grid-container">
				<?php
				$session_id = $_SESSION['id'] ?? 0;
				$query = "SELECT * FROM classroom_user a LEFT JOIN classroom b ON a.classroom_id = b.id LEFT JOIN user c ON b.created_by = c.id WHERE a.user_id = 1";
				$res = mysqli_query($con, $query);
				if (!$res) {
					printf("Error: %s\n", mysqli_error($con));
					exit();
				}
				while ($row = mysqli_fetch_array($res)) { ?>
					<div class="item_<?php echo $row['classroom_id']; ?>">
						<div class="d-flex flex-column">
							<input type="submit" class="main-button btn-class-div" value="Join" />
							<div class="d-flex">
								<div class="img-profile">
									<img class="profile image-fit-width" src="<?php echo $row['class_image'] ?? 'imgs/circle.png'; ?>" width="82" height="82" />
								</div>
								<div class="d-flex flex-column  justify-content-center align-items-center subject-detail">
									<div class="subject-code text-left"><?php echo $row['subject_number'] ?? '-'; ?></div>
									<div class="subject-name text-left"><?php echo $row['classname'] ?? '-'; ?></div>
								</div>
							</div>
							<div class="subject-author"><?php echo $row['firstname'].' '.$row['firstname']?? '-'; ?></div>
						</div>
					</div>
				<?php } ?>
			</div>

			<!-- Classroom -->
			<div class="d-flex flex-grow-1 box-header">
				<div class="text text-my-classroom">My Classroom</div>
			</div>
			<div class="grid-container">
				<div class="item1">
					<div class="d-flex flex-column">
						<input type="submit" class="main-button btn-class-div" value="leave" />
						<div class="d-flex">
							<div class="img-profile">
								<img class="profile image-fit-width" src="imgs/circle.png" width="82" height="82" />
							</div>
							<div class="d-flex flex-column  justify-content-center align-items-center subject-detail">
								<div class="subject-code text-left">935 002</div>
								<div class="subject-name text-left">Introduction to e-Bu...Introduction to e-Bu...Introduction to e-Bu...</div>
							</div>
						</div>
						<div class="subject-author">Kanda Sorn-in</div>
					</div>
				</div>
			</div>


			<!-- Classroom -->
			<div class="d-flex flex-grow-1 box-header">
				<div class="text text-all-class">All class</div>
			</div>
			<div class="grid-container">
				<div class="item1">
					<div class="d-flex flex-column">
						<input type="submit" class="main-button btn-class-div" id="btn-join" value="Join" />
						<div class="d-flex">
							<div class="img-profile">
								<img class="profile image-fit-width" src="imgs/circle.png" width="82" height="82" />
							</div>
							<div class="d-flex flex-column  justify-content-center align-items-center subject-detail">
								<div class="subject-code text-left">935 002</div>
								<div class="subject-name text-left">Introduction to e-Bu...Introduction to e-Bu...Introduction to e-Bu...</div>
							</div>
						</div>
						<div class="subject-author">Kanda Sorn-in</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="myModal" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="title text-center">
				Join class success
			</div>
			<div class="mt-2"></div>
			<div class="d-flex flex-column">
				<div class="d-flex justify-content-center align-items-center">
					<div class="btn-button-primary btn-modal btn-ok text-center" id="btn-ok">ok</div>
				</div>
			</div>
		</div>
	</div>

	<div id="myModal1" class="modal1">
		<!-- Modal content -->
		<div class="modal-content1">
			<div class="modal-title text-center">
				CREATE CLASS
			</div>
			<div class="mt-2"></div>
			<div class="d-flex flex-column align-items-center">
				<input class="input-field modal-field field-introduction" placeholder="Introduction to e-Business" />
				<input class="input-field modal-field field-code" placeholder="095432" />
				<input class="input-field modal-field field-room" placeholder="Room (not required)" />
				<input type="submit" class="main-button btn-create" value="create" />
				<input type="submit" class="main-button-outline btn-cancel" id="btn-cancel" value="cancel" />
			</div>
		</div>
	</div>

	<div class="d-flex flex-column menubar">
		<div id="hideSidebar" class="hide-sidebar align-self-end">
			<img class="image-fit-width" src="imgs/align_left_free_icon_font.png" width="32" height="32" />
		</div>
		<div class="img-profile align-self-center">
			<img class="profile image-fit-width" src="imgs/circle.png" width="106" height="106" />
		</div>
		<div class="text-name align-self-center">
			chatchai prathammate
		</div>
		<div class="line mt-2"></div>
		<div class="text-title">
			My classroom
		</div>
		<div class="d-flex card-items justify-content-between justify-content-center align-items-center">
			<div class="img-profile">
				<img class="profile image-fit-width" src="imgs/circle.png" width="42" height="42" />
			</div>
			<div class="subject-code-sidebar">
				935 342
			</div>
			<div class="subject-name-sidebar">
				my classroom 101my classroom 101my classroom 101my classroom 101my classroom 101
			</div>
		</div>
		<div class="text-title">
			Enrolled
		</div>
		<div class="d-flex card-items justify-content-between justify-content-center align-items-center">
			<div class="img-profile">
				<img class="profile image-fit-width" src="imgs/circle.png" width="42" height="42" />
			</div>
			<div class="subject-code-sidebar">
				935 342
			</div>
			<div class="subject-name-sidebar">
				my classroom 101my classroom 101my classroom 101my classroom 101my classroom 101
			</div>
		</div>
		<div class="d-flex card-items justify-content-between justify-content-center align-items-center">
			<div class="img-profile">
				<img class="profile image-fit-width" src="imgs/circle.png" width="42" height="42" />
			</div>
			<div class="subject-code-sidebar">
				935 342
			</div>
			<div class="subject-name-sidebar">
				my classroom 101my classroom 101my classroom 101my classroom 101my classroom 101
			</div>
		</div>
	</div>

	<script>
		$("#btn-join").click(function() {
			$('.modal').css('display', 'block');
		});

		$("#btn-ok").click(function() {
			$('.modal').css('display', 'none');
		});

		$("#btn-create-class").click(function() {
			$('#myModal1').css('display', 'block');
		});

		$("#btn-cancel").click(function() {
			$('#myModal1').css('display', 'none');
		});

		$("#showSidebar").click(function() {
			$('.menubar').css('transform', 'translate(0px, 0px)');
		});

		$("#hideSidebar").click(function() {
			$('.menubar').css('transform', 'translate(-10000px, 0px)');
		});
	</script>
</body>

</html>