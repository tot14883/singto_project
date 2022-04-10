<?php
	  include("./db-connect.php");
    session_start();
    $user_id = $_SESSION['id'];
		$assignment_id = $_POST['assignment_id'];
    $target_dir = "../files_class/";
    $target_file = $target_dir . basename($_FILES["fileAssignUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(basename($_FILES["fileAssignUpload"]["name"]) == '' || strlen(basename($_FILES["fileAssignUpload"]["name"])) <= 0) {
			echo '<script>alert("กรุณาใส่ไฟล์");
			history.back();</script>';
			exit;
    }

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileAssignUpload"]["tmp_name"]);
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
        if (move_uploaded_file($_FILES["fileAssignUpload"]["tmp_name"], $target_file)) {
            $target_dir = "./files_class/";
            $target_file = $target_dir . basename($_FILES["fileAssignUpload"]["name"]);
            $userId = $_SESSION['id'];
            $query = "INSERT INTO `assignment_user` (`upload_file`, `turnedIn`, `assignment_id`, `created_by`, `updated_by`) VALUES ('$target_file', '1', '$assignment_id', '$user_id', '$user_id')";
            $rescheck = mysqli_query($con, $query);
            if ($rescheck) {
                echo '<script>alert("Upload Complete!");
                history.back();</script>';
                exit;
            }
            else {
                    echo '<script>alert("Upload Uncomplete!");
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

