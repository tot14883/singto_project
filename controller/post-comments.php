<?php
	include("./db-connect.php");
	session_start();
	$user_id = $_SESSION["id"];
	$classroom_id = $_POST["classroom_id"];
	$description = $_POST["description"];
	$target_dir = "../files_comment/";
	$target_file = $target_dir . basename($_FILES["uploadFileComment"]["name"]);
	$date = time();
	$uploadOk = 1;

	if(basename($_FILES["uploadFileComment"]["name"]) == '' || strlen(basename($_FILES["uploadFileComment"]["name"])) <= 0) {
		$update_profile = "INSERT INTO `post` (`id`, `description`, `classroom_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '$description', $classroom_id, $user_id, $user_id, $date, $date, $date)";

		$rescheck = mysqli_query($con, $update_profile);
		if ($rescheck) {
			echo '<script>alert("โพสต์เเรียบร้อย");
			history.back();</script>';
			exit;
		}
		else {
				echo '<script>alert("โพสต์ไม่สำเร็จ");
				history.back();</script>';
				exit;
		}
	}

	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["uploadFileComment"]["tmp_name"]);
		if($check !== false) {
			echo '<script>alert("File is an image - ' . $check["mime"] . '.");
			history.back();</script>';
			exit;
			$uploadOk = 1;
		} else {
			echo '<script>alert("File is not an image.");
			history.back();</script>';
			exit;
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo '<script>alert("Sorry, file already exists.");
		history.back();</script>';
		exit;
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo '<script>alert("Sorry, your file was not uploaded");
		history.back();</script>';
		exit;
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["uploadFileComment"]["tmp_name"], $target_file)) {
			$target_dir = "./files_comment/";
			$target_file = $target_dir . basename($_FILES["uploadFileComment"]["name"]);
			$update_profile = "INSERT INTO `post` (`id`, `description`, `upload_file`, `classroom_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '$description', '$target_file', $classroom_id, $user_id, $user_id, $date, $date, $date)";

			$rescheck = mysqli_query($con, $update_profile);
			if ($rescheck) {
				echo '<script>alert("โพสต์เเรียบร้อย");
				history.back();</script>';
				exit;
			}
			else {
					echo '<script>alert("โพสต์ไม่สำเร็จ");
					history.back();</script>';
					exit;
			}
		} else {
			echo '<script>alert("Sorry, there was an error uploading your file.");
			history.back();</script>';
			exit;
		}
	}
?>