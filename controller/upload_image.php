<?php
	include("./db-connect.php");
	session_start();
	$user_id = $_SESSION["id"];
	$target_dir = "../img_profiles/";
	$target_file = $target_dir . basename($_FILES["fileToUploadPhoto"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUploadPhoto"]["tmp_name"]);
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
		if (move_uploaded_file($_FILES["fileToUploadPhoto"]["tmp_name"], $target_file)) {
			$target_dir = "./img_profiles/";
			$target_file = $target_dir . basename($_FILES["fileToUploadPhoto"]["name"]);
			$update_profile = "UPDATE user SET photo='$target_file' WHERE id=$user_id";
			$rescheck = mysqli_query($con, $update_profile);
			if ($rescheck) {
				$_SESSION["photo"] = $target_file;
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