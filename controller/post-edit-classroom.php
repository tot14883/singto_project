<?php
    include("./db-connect.php");
    session_start();
    $nameClass = $_POST["nameClass"];
    $code = $_POST["code"];
		$room = $_POST["room"];
    $classRoom = $_POST["classroom_id"];
		if($nameClass == '' && $code == '') {
			echo '<script>alert("Please enter value!!");
			window.location = "../home.php";</script>';
			exit;
		}
		$querycheck = "SELECT * FROM classroom WHERE subject_number='$code' OR classname='$nameClass'";
		$rescheck = mysqli_query($con, $querycheck);
		if (!$rescheck) {
				printf("Error: %s\n", mysqli_error($con));
				exit();
		}
		$rowcheck = mysqli_fetch_array($rescheck);
		if ($rowcheck == null){
			$query = "UPDATE classroom SET classname='$nameClass', subject_number='$code', room='$room' WHERE id = $classRoom";
			$res = mysqli_query($con, $query);

			if ($res) {
					echo '<script>alert("แก้ไขเเรียบร้อย");
					history.back();</script>';
					exit;
			}
			else {
					echo '<script>alert("แก้ไขไม่สำเร็จ");
					history.back();</script>';
					exit;
			}
		}
		else if ($rowcheck['subject_number'] == $code){
			echo '<script>alert("This code already exist!");
							history.back();</script>';
							exit;
		}
?>