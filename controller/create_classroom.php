<?php
    include("./db-connect.php");
    session_start();
    $introduction = $_POST["introduction"];
    $code = $_POST["code"];
    $room = $_POST["room"];
    if($introduction == '' && $code == '') {
        echo '<script>alert("Please enter value!!");
        window.location = "../home.php";</script>';
        exit;
    }
    $querycheck = "SELECT * FROM classroom WHERE subject_number = '".$code."'";
    $rescheck = mysqli_query($con, $querycheck);
    if (!$rescheck) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    $rowcheck = mysqli_fetch_array($rescheck);
    if ($rowcheck == null){
				$userId = $_SESSION['id'];
				$query = "INSERT INTO `classroom`(`classname`, `subject_number`, `room`, `created_by`, `updated_by`) VALUES ('$introduction', '$code', '$room', '$userId', '$userId')";
                mysqli_query($con, $query);
				echo '<script>alert("Create Class Complete!");
				        window.location = "../home.php";</script>';
				        exit;
    }
    else if ($rowcheck['subject_number'] == $code){
        echo '<script>alert("This code already exist!");
                window.location = "../home.php";</script>';
                exit;
    }
?>