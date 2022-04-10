<?php
    include("./db-connect.php");
    session_start();
    $type = $_GET["type"];
    $id = $_GET["id"];
    $user_id = $_SESSION["id"];
    $date = time();
    $query = "DELETE FROM classroom WHERE id = $id";
    $res = mysqli_query($con, $query);
    if ($res) {
        $query = "DELETE FROM classroom_user WHERE id = $id AND classroom_id = $user_id";
        $res = mysqli_query($con, $query);
        if ($res) {
            echo '<script>alert("ลบเเรียบร้อย");
            window.location = "../index.php";</script>';
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