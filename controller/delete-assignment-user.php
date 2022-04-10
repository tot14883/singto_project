<?php
	 include("./db-connect.php");
	 session_start();
	 $assignment_id = $_POST["assign_user_id"];
	 $queryDel = "DELETE FROM  assignment_user WHERE id = $assignment_id";
	 $resDel = mysqli_query($con, $queryDel);
	 if($resDel) {
				echo '<script>alert("ลบเเรียบร้อย");
				history.back();</script>';
				exit;
		}
		else {
				echo '<script>alert("ลบไม่สำเร็จ");
				history.back();</script>';
				exit;
		}

?>