<?php
	include("./db-connect.php");
	session_start();
	$user_id = $_SESSION["id"];
	$class_id = $_POST["class_id"];
	$target_dir = "../class_bg/";
	$target_file = $target_dir . basename($_FILES["fileToUploadClassBg"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUploadClassBg"]["tmp_name"]);
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
		if (move_uploaded_file($_FILES["fileToUploadClassBg"]["tmp_name"], $target_file)) {
			$target_dir = "./class_bg/";
			$target_file = $target_dir . basename($_FILES["fileToUploadClassBg"]["name"]);
			$update_profile = "UPDATE class_bg SET photo='$target_file' WHERE id=$class_id";
			$rescheck = mysqli_query($con, $update_profile);
			if ($rescheck) {
				echo '<script>alert("แก้ไขเเรียบร้อย");
				history.back();</script>';
				exit;
		}
		else {
				echo '<script>alert("แก้ไขไม่สำเร็จ");
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