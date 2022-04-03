<?php
include("./controller/db-connect.php");
session_start();

if(!isset($_SESSION["id"])) {
	session_destroy();
	echo '<script>alert("You have been Log out!");
		 window.location = "index.php";</script>';
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

		.box-profile {
			width: 1076px;

			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);

			margin-left: auto;
			margin-right: auto;
			margin-top: 8px;
			padding: 8px;
		}

		.group-edit {
			align-self: end;
		}

		.edit-button {
			width: 42px;
			color: #fff;
			font-size: 13px;
		}

		.btn-edit-photo {
			width: 98px;
			color: #fff;
			font-size: 13px;
		}

		.box-infomation-author {
			margin-top: 198px;
		}

		.box-img-profile {
			margin-left: 38px;
		}

		.box-subject {
			margin-left: 50px;
		}

		.box-author {
			align-self: end;
		}

		.title-detail {
			width: 943px;
			margin-left: auto;
			margin-right: auto;

			font-size: 24px;
			font-weight: 700;
			color: #fff;
		}

		.box-content {
			width: 943px;

			margin-top: 8px;
			margin-left: auto;
			margin-right: auto;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);

			padding: 16px;
		}

		.text-title {
			font-size: 16px;
			font-weight: 300;
			color: #fff;
		}

		.text-datetime {
			font-size: 10px;
			font-weight: 300;
			color: #B5C4D3;
		}

		.text-desc {
			font-size: 15px;
			font-weight: 300;
			color: #fff;
			white-space: pre-line;
		}

		.file-detail {
			margin-top: 8px;
			margin-left: 8px;
			width: 262px;
			padding: 8px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
		}

		.file-detail-name {
			width: 262px;
			text-overflow: ellipsis;
			white-space: nowrap;
			font-size: 16px;
			font-weight: 300;
			color: #fff;
		}

		.file-detail-extension {
			font-size: 10px;
			font-weight: 300;
			color: var(--gray-cement);
		}

		.box-your-work {
			width: 255px;
			padding: 8px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
		}

		.box-work-submit {
			padding: 8px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
		}

		.box-footer {
			width: 943px;
			margin: 8px auto;
		}

		.title-your-work {
			font-size: 24px;
			font-weight: 700;
			color: #fff;
		}

		.btn-add-file {
			width:100%;
			background-color: var(--gray-cement);
			font-size: 15px;
			font-weight: 300;
			margin-top: 8px;
			color: #5876FF;
		}

		.btn-submit {
			width:100%;
			color: #fff;
			padding: 4px;
			margin-top: 8px;
			font-size: 13px;
			font-weight: 700;
			color: #fff;
		}

		.btn-unsubmit {
			width: 115px;
			color: #fff;
			padding: 4px;
			margin-top: 16px;
			font-size: 13px;
			font-weight: 700;
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
			margin-left: 8px
			text-overflow: ellipsis;
			overflow: hidden;
			white-space: nowrap;
		}

		.btn-edit-profile {
			color: #fff;
		}

		.btn-logout {
			width: 173px;
			color: #fff;
			margin: 8px auto;
		}

		.form-logout {
			align-self: center;
		}
	</style>

</head>
<body>
	<div class="container-content">
		<div class="d-flex text-center nav-bar">
			<div id="showSidebar" class="show-sidebar justify-content-center align-items-center align-self-center ml-2">
				<img class="image-fit-width" src="imgs/align_left_free_icon_font.png" width="32" height="32"/>
			</div>
			<div class="flex-grow-1 text-nav-bar">Classroom</div>
		</div>
		<div class="d-flex flex-column box-profile">
			<div class="d-flex flex-grow-1 group-edit">
				<button class="main-button edit-button text-center">edit</button>
			</div>
			<div class="d-flex box-infomation-author">
				<div class="d-flex flex-column align-items-center box-img-profile">
					<div class="img-profile">
						<img class="profile image-fit-width" src="imgs/circle.png" width="131" height="131"/>
					</div>
					<button class="main-button btn-edit-photo text-center">edit photo</button>
				</div>
				<div class="d-flex flex-column box-subject">
					<div class="text-title-code-subject text-header">
						935432
					</div>
					<div class="text-desc-code-subject text-header">
						Introduction to e-Business
					</div>
				</div>
			</div>
			<div class="d-flex flex-grow-1 box-author">
					<div class="author">author</div>
				</div>
		</div>
		<div class="title-detail">Classwork detail</div>
		<div class="d-flex flex-column box-content">
			<div class="text-title">(งานกลุ่ม 3 คน) project 25 คะแนน</div>
			<div class="text-datetime">Aug 5, 2020</div>
			<div class="text-desc">
				1.ไฟล์ .doc
				2.ไฟล์ .pdf
				3.Link : Drive ที่เก็บ Source code ทั้งหมด
				ไม่ต้อง print
				Deadline 26 เมษายน 2564
				1 กลุ่มส่งแค่คนเดียวเท่านั้น
			</div>
			<div class="d-flex flex-column file-detail">
				<div class="file-detail-name">แผนการสอน-แบบประมวลราย...</div>
				<div class="file-detail-extension">PDF</div>
			</div>
		</div>
		<div class="d-flex mt-3 box-footer">
			<div class="d-flex flex-column box-your-work justify-content-center align-items-center">
				<div class="title-your-work">your work</div>
				<div class="btn-add-file align-self-center">+ add file</div>
				<div class="main-button btn-submit text-center align-self-center">submit</div>
			</div>
			<div class="d-flex flex-column file-detail">
				<div class="file-detail-name">แผนการสอน-แบบประมวลราย...</div>
				<div class="file-detail-extension">PDF</div>
				<div class="main-button-outline btn-unsubmit text-center align-self-center">unsubmit</div>
			</div>
		</dvi>
	</div>

	<div class="d-flex flex-column menubar">
		<div id="hideSidebar" class="hide-sidebar align-self-end">
			<img class="image-fit-width" src="imgs/align_left_free_icon_font.png" width="32" height="32" />
		</div>
		<div class="d-flex flex-column img-profile align-self-center">
			<img class="profile image-fit-width" src="imgs/circle.png" width="106" height="106" />
			<button class="main-button btn-edit-profile text-center">edit photo</button>
		</div>
		<div class="text-name align-self-center">
			<?php echo $_SESSION['firstname'].' '. $_SESSION['lastname']; ?>
		</div>
		<div class="line mt-2"></div>
		<?php
			$session_id = $_SESSION['id'] ?? 0;
			$query = "SELECT * FROM classroom a LEFT JOIN user b ON a.created_by = b.id WHERE b.id = $session_id";
			$res = mysqli_query($con, $query);
			if(mysqli_num_rows($res) > 0) {
		?>
		<div class="text-title">
			My classroom
		</div>
		<?php
			}

			if (!$res) {
				printf("Error: %s\n", mysqli_error($con));
				exit();
			}
			while ($row = mysqli_fetch_array($res)) {
		?>
		<div class="d-flex card-items justify-content-between justify-content-center align-items-center">
			<div class="img-profile">
				<img class="profile image-fit-width" src="imgs/circle.png" width="42" height="42" />
			</div>
			<div class="subject-code-sidebar">
				<?php echo $row['subject_number']; ?>
			</div>
			<div class="subject-name-sidebar">
				<?php echo $row['classname']; ?>
			</div>
		</div>
		<?php } ?>

		<?php
				$session_id = $_SESSION['id'] ?? 0;
				$query = "SELECT * FROM classroom_user a LEFT JOIN classroom b ON a.classroom_id = b.id LEFT JOIN user c ON b.created_by = c.id WHERE a.user_id = $session_id";
				$res = mysqli_query($con, $query);
				if(mysqli_num_rows($res) > 0) {
		?>
		<div class="text-title">
			Enrolled
		</div>
		<?php
			}

			if (!$res) {
				printf("Error: %s\n", mysqli_error($con));
				exit();
			}
			while ($row = mysqli_fetch_array($res)) {
		?>
		<div class="d-flex card-items justify-content-between justify-content-center align-items-center">
			<div class="img-profile">
				<img class="profile image-fit-width" src="imgs/circle.png" width="42" height="42" />
			</div>
			<div class="subject-code-sidebar">
				<?php echo $row['subject_number'];?>
			</div>
			<div class="subject-name-sidebar">
				<?php echo $row['classname'];?>
			</div>
		</div>
		<?php } ?>
		<div class="line mt-2"></div>
		<form method="get" class="form-logout" action="./controller/get-logout.php">
			<button class="main-button btn-logout text-center" value="logout">Logout</button>
		</form>
	</div>
	<script>
		$("#showSidebar").click(function() {
			$('.menubar').css('transform', 'translate(0px, 0px)');
		});

		$("#hideSidebar").click(function() {
			$('.menubar').css('transform', 'translate(-10000px, 0px)');
		});
	</script>
</body>
</html>