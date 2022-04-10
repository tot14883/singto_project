<?php
    include("./db-connect.php");
    session_start();
    $user_id = $_SESSION['id'];
    $title = $_POST["title"];
		$assignmentId = $_POST["assignment_id"];
    $description = $_POST["description"];
    $classroom_id = $_POST["classroom_id"];
		$updateFilename = $_POST['updateFileName'];
    $target_dir = "../files_class/";
    $target_file = $target_dir . basename($_FILES["fileAssigment"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($title == '' && $description == '') {
        echo '<script>alert("Please enter value!!");
        window.location = "../home.php";</script>';
        exit;
    }

    if(basename($_FILES["fileAssigment"]["name"]) == '' || strlen(basename($_FILES["fileAssigment"]["name"])) <= 0) {
				if(strlen($updateFilename) <= 0) {
        	$query = "UPDATE `assignment` SET `title`='$title', `description`='$description', `classroom_id`='$classroom_id', `updated_by`='$user_id' WHERE id='$assignmentId'";
				}
				else {
					$query = "UPDATE `assignment` SET `title`='$title', `description`='$description',  `upload_file`='$updateFilename', `classroom_id`='$classroom_id', `updated_by`='$user_id' WHERE id='$assignmentId'";
				}
				$rescheck = mysqli_query($con, $query);
        if ($rescheck) {
            echo '<script>alert("Edit Complete!");
            history.back();</script>';
            exit;
        }
        else {
                echo '<script>alert("Edit Uncomplete!");
                history.back();</script>';
                exit;
        }
    }

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileAssigment"]["tmp_name"]);
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
        if (move_uploaded_file($_FILES["fileAssigment"]["tmp_name"], $target_file)) {
            $target_dir = "./files_class/";
            $target_file = $target_dir . basename($_FILES["fileAssigment"]["name"]);
            $userId = $_SESSION['id'];
						$query = "UPDATE `assignment` SET `title`='$title', `description`='$description',  `upload_file`='$target_file', `classroom_id`='$classroom_id', `updated_by`='$user_id' WHERE id='$assignmentId'";
            $rescheck = mysqli_query($con, $query);
            if ($rescheck) {
                echo '<script>alert("Edit Complete!");
                history.back();</script>';
                exit;
            }
            else {
                    echo '<script>alert("Edit Uncomplete!");
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