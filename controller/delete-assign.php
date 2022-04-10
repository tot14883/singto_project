<?php
	 include("./db-connect.php");
	 session_start();
	 $assignment_id = $_POST["assignment_id"];
	 $queryDel = "DELETE FROM  assignment_user WHERE assignment_id = $assignment_id";
	 $resDel = mysqli_query($con, $queryDel);
	 if($resDel) {
	 $query = "DELETE FROM  assignment WHERE id = $assignment_id";
	 $res = mysqli_query($con, $query);
		if ($res) {
				if(isset($_POST["back2"])) {
					echo '<script>alert("ลบเเรียบร้อย");
					history.go(-2);</script>';
					exit;
				}
				echo '<script>alert("ลบเเรียบร้อย");
				history.back();</script>';
				exit;
		}
		else {
				echo '<script>alert("ลบไม่สำเร็จ");
				history.back();</script>';
				exit;
		}
	}
	else {
		echo '<script>alert("ลบไม่สำเร็จ");
		history.back();</script>';
		exit;
	}
?>