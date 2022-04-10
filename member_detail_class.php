<?php
include("./controller/db-connect.php");
session_start();

if(!isset($_SESSION["id"])) {
	session_destroy();
	echo '<script>alert("You have been Log out!");
		 window.location = "index.php";</script>';
		 exit;
}

$class_id = $_GET['id'];
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

		.btn-edit, .btn-del {
			width: 50px;
			font-size: 13px;
			font-weight: 700;
			color: #fff;
		}

		.box-comments {
			width: 943px;

			margin: 8px auto;
			padding: 8px;
			background-color: var(--primary);
			border: 1px solid var(--blue-ocean);
		}


		.field-comments,
		.field-comments::-webkit-input-placeholder {
			font-size: 16px;
			padding: 4px;
			background-color: var(--gray-cement);
		}

		.btn-comment {
			margin-left: 11px;
		}

		.line {
			width: 100%;
			height: 1px;
			background-color: var(--blue-ocean);
		}

		.box-add-comment {
			margin-top: 8px;
		}

		.box-author-post {
			margin-left: 14px;
		}

		.display-post-author {
			font-size: 16px;
			font-weight: 700;
			color: #fff;
		}

		.display-post-datetime {
			font-size: 10px;
			font-weight: 300;
			color: var(--gray-cement);
		}

		.box-display-post-header {
			margin-bottom: 8px;
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

		.profile-image {
			border-radius: 50%;
		}

		.fileToUploadPhoto {
			display: none;
		}

		.drop-down-edit {
			position: relative;
		}

		.group-drop-down-edit {
			visibility: hidden;

			position: absolute;
			margin-top: 8px;
			margin-left: -50px;
			width: 67px;
			background-color: var(--gray-cement);
		}

		.drop-down-text {
			font-size: 10px;
			color: #fff;
			padding: 4px;
			text-align: right;
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

		.form-edit {
			width: 100%;
		}

		.btn-cancel {
			width: 174px;
			margin-top: 12px;
			color: #fff;
		}

		.btn-update {
			width: 174px;
			margin-top: 12px;
			color: #fff;
		}

		.author {
			font-size: var(--font-14);
			color: #fff;
			margin-top: 27px;
		}
	</style>

</head>
<body>
	<div class="container-content">
		<div class="d-flex text-center nav-bar">
			<div id="showSidebar" class="show-sidebar justify-content-center align-items-center align-self-center ml-2">
				<img class="image-fit-width" src="imgs/align_left_free_icon_font.png" width="32" height="32"/>
			</div>
			<div class="flex-grow-1 text-nav-bar">
				<a href="home.php" class="text-decoration-none text-light">
					Classroom
				</a>
			</div>
		</div>
		<?php
		$query = "SELECT * FROM classroom a LEFT JOIN user b ON a.created_by = b.id WHERE a.id = $class_id AND deleted_at IS NULL";
		$res = mysqli_query($con, $query);
		while ($row = mysqli_fetch_array($res)) {
			$isCreatedBy = 	$_SESSION['id'] == $row['created_by'];
		?>
		<div class="d-flex flex-column box-profile">
			<div class="d-flex flex-grow-1 group-edit">
				<!-- <div class="d-flex flex-grow-1 group-edit">
					<form action="./controller/upload_image_class_bg.php" method="post" enctype="multipart/form-data" class="d-flex justify-content-between" id="formUploadImageClassBg">
							<input type="hidden" name="class_id" value="<?php echo $_GET['id']; ?>"/>
							<input type="file" name="fileToUploadClassBg" id="fileToUploadClassBg" class="fileToUploadPhoto"/>
							<button type="button" id="upload_image_class_bg" class="main-button edit-button text-center">edit</button>
						</form>
				</div> -->
				<?php if($isCreatedBy) { ?>
				<div class="drop-down-edit" id="show-drop-down">
					<img src="imgs/menu_dots_vertical_free_icon_font.png" width="19" height="19"/>
					<div class="d-flex flex-column group-drop-down-edit">
						<div class="drop-down-text" id="dd-edit">
							Edit
						</div>
						<div class="drop-down-text" id="dd-delete">
							<a href="./controller/get-delete-classroom.php?type=classroom&&id=<?php echo $class_id ?>">Delete</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="d-flex box-infomation-author">
				<div class="d-flex flex-column align-items-center box-img-profile">
					<div class="img-profile">
						<img class="profile-image image-fit-width" src="<?php echo $row['photo'] ?? 'imgs/circle.png' ?>" width="131" height="131"/>
					</div>
					<?php if($isCreatedBy) { ?>
					<div class="mt-2"></div>
					<form action="./controller/upload_image.php" method="post" enctype="multipart/form-data" class="d-flex justify-content-between" id="formUploadImage">
						<input type="file" name="fileToUploadPhoto" id="fileToUploadPhoto" class="fileToUploadPhoto"/>
						<button type="button" class="main-button btn-edit-photo" id="upload_image">upload photo</i>
					</form>
					<?php } ?>
				</div>
				<div class="d-flex flex-column box-subject">
					<div class="text-title-code-subject text-header">
						<?php echo $row['subject_number']; ?>
					</div>
					<div class="text-desc-code-subject text-header">
					<?php echo $row['classname']; ?>
					</div>
				</div>
			</div>
			<div class="d-flex flex-grow-1 box-author">
				<div class="author"><?php echo $row['firstname'].' '.$row['lastname']; ?></div>
			</div>
		</div>
		<?php } ?>
		<div class="title-detail">Classwork detail</div>
		<?php
				$assigmentId = $_GET['assigment'];
				$queryAssign = "SELECT * FROM assignment WHERE id = $assigmentId";
				$resAssign = mysqli_query($con, $queryAssign);
				while ($rowAssign = mysqli_fetch_array($resAssign)) {
		?>
		<div class="d-flex flex-column box-content">
			<div class="d-flex justify-content-between">
				<div class="text-title"><?php echo $rowAssign['title']?></div>
				<div class="d-flex flex-column">
					<a href="edit_classwork.php?id=<?php echo $_GET['id']?>&&assigment=<?php echo $_GET['assigment']?>" class="main-button btn-edit">Edit</a>
					<form action="./controller/delete-assign.php" method="post">
							<input type="hidden" name="back2" value="1"/>
							<input type="hidden" name="assignment_id" value="<?php echo $_GET['assigment']; ?>"/>
							<input type="submit" class="main-button-outline btn-del mt-2" value="Del"/>
						</form>
				</div>
			</div>
			<div class="text-desc">
				<?php echo $rowAssign['description'] ?>
			</div>
			<?php if($rowAssign['upload_file'] != null) { ?>
			<div class="d-flex flex-column file-detail">
				<div class="file-detail-name"><?php echo  explode("/",$rowAssign['upload_file'])[2] ?></div>
				<div class="file-detail-extension"><?php echo  explode('.',explode("/",$rowAssign['upload_file'])[2])[1] ?></div>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		<?php
				$assigmentId = $_GET['assigment'];
				$queryAssignUser = "SELECT * FROM assignment_user a LEFT JOIN user b ON a.created_by = b.id WHERE a.assignment_id = $assigmentId";
				$resAssignUser = mysqli_query($con, $queryAssignUser);
				$countAssignUser = mysqli_num_rows($resAssignUser);
				if($countAssignUser > 0) {
		?>
		<div class="title-detail">Sent</div>
		<?php
				while ($rowAssignUser = mysqli_fetch_array($resAssignUser)) {
		?>
		<div class="d-flex flex-column mt-3 box-comments">
			<div	div class="d-flex justify-content-between box-display-post-header">
				<div class="d-flex box-display-profile">
					<div class="img-profile">
						<img class="profile-image image-fit-width" src="<?php echo $rowAssignUser['photo'] ?? 'imgs/circle.png' ?>" width="37" height="37"/>
					</div>
					<div class="d-flex flex-column box-author-post">
						<div class="display-post-author">
						 <?php echo $rowAssignUser['firstname'].' '.$rowAssignUser['lastname']?>
						</div>
					</div>
				</div>
				<?php
					if($rowAssignUser['upload_file'] != null) {
				?>
				<div class="d-flex flex-column file-detail">
					<div class="file-detail-name"><a href="<?php echo $rowAssignUser['upload_file'] ?>"><?php echo explode('/',$rowAssignUser['upload_file'])[2] ?></a></div>
					<div class="file-detail-extension"><a href="<?php echo $rowAssignUser['upload_file'] ?>"><?php echo explode('.',explode('/',$rowAssignUser['upload_file'])[2])[1] ?></a></div>
				</div>
				<?php } ?>
			</div>
			<?php
				if($countAssignUser > 1) {
			?>
			<div class="line"></div>
			<?php } ?>
		</dvi>
		<?php }
			}
		?>
	</div>

	<div class="d-flex flex-column menubar">
		<div id="hideSidebar" class="hide-sidebar align-self-end">
			<img class="image-fit-width" src="imgs/align_left_free_icon_font.png" width="32" height="32" />
		</div>
		<div class="d-flex flex-column img-profile align-self-center">
			<img class="profile-image image-fit-width" src="<?php echo  $_SESSION['photo'] ?? 'imgs/circle.png' ?>" width="106" height="106"/>
			<form action="./controller/upload_image.php" method="post" enctype="multipart/form-data" class="d-flex justify-content-between" id="formUploadImageSidebar">
						<input type="file" name="fileToUploadPhoto" id="fileToUploadPhotoSidebar" class="fileToUploadPhoto"/>
						<button type="button" class="main-button btn-edit-profile text-center" id="upload_image_sidebar">edit photo</button>
			</form>
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
		<a href="member_class.php?id=<?php echo $row[0]; ?>" class="text-decoration-none">
			<div class="d-flex card-items justify-content-between justify-content-center align-items-center">
				<div class="img-profile">
					<img class="profile-image image-fit-width" src="<?php echo $row['photo'] ?? 'imgs/circle.png' ?>" width="42" height="42" />
				</div>
				<div class="subject-code-sidebar">
					<?php echo $row['subject_number']; ?>
				</div>
				<div class="subject-name-sidebar">
					<?php echo $row['classname']; ?>
				</div>
			</div>
		</a>
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
		<a href="member_class.php?id=<?php echo $row['classroom_id']; ?>" class="text-decoration-none">
			<div class="d-flex card-items justify-content-between justify-content-center align-items-center">
				<div class="img-profile">
					<img class="profile-image image-fit-width" src="<?php echo $row['photo'] ?? 'imgs/circle.png' ?>" width="42" height="42" />
				</div>
				<div class="subject-code-sidebar">
					<?php echo $row['subject_number'];?>
				</div>
				<div class="subject-name-sidebar">
					<?php echo $row['classname'];?>
				</div>
			</div>
		</a>
		<?php } ?>
		<div class="line mt-2"></div>
		<form method="get" class="form-logout" action="./controller/get-logout.php">
			<button class="main-button btn-logout text-center" value="logout">Logout</button>
		</form>
	</div>

	<div id="myModal" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-title text-center">
				EDIT CLASS
			</div>
			<div class="mt-2"></div>
			<div class="d-flex flex-column align-items-center">
				<form action="./controller/post-edit-classroom.php" method="post" class="d-flex flex-column align-items-center form-edit">
					<input type="hidden" name="classroom_id" value="<?php echo $_GET['id']; ?>"/>
					<input class="input-field modal-field field-introduction" name="nameClass" placeholder="Introduction to e-Business"/>
					<input class="input-field modal-field field-code" name="code" placeholder="095432"/>
					<input class="input-field modal-field field-room" name="room" placeholder="Room (not required)"/>
					<input type="submit" class="main-button btn-update" value="update"/>
				</form>
				<button class="main-button-outline btn-cancel" id="btn-cancel">cancel</button>
			</div>
		</div>
	</div>
	<script>
		$("#showSidebar").click(function() {
			$('.menubar').css('transform', 'translate(0px, 0px)');
		});

		$("#hideSidebar").click(function() {
			$('.menubar').css('transform', 'translate(-10000px, 0px)');
		});

		$("#upload_image_sidebar").click(function() {
			$("#fileToUploadPhotoSidebar").click();
			$("#fileToUploadPhotoSidebar").on("change", function(){
				$("#formUploadImageSidebar").submit();
			});
		});

		var isShow = false;
		$("#show-drop-down").click(function() {
			if(!isShow) {
				$('.group-drop-down-edit').css('visibility', 'visible');
			}
			else {
				$('.group-drop-down-edit').css('visibility', 'hidden');
			}

			isShow = !isShow;
		});

		$("#upload_image").click(function() {

			$("#fileToUploadPhoto").click();
			$("#fileToUploadPhoto").on("change", function(){
				$("#formUploadImage").submit();
			});
		});


		$("#dd-edit").click(function() {
			$('.modal').css('display', 'block');
		});

		$("#btn-cancel").click(function() {
			$('.modal').css('display', 'none');
		});
	</script>
</body>
</html>