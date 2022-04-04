<?php
    include("./db-connect.php");
    session_start();
    $type = $_POST["type"];
    $id = $_GET["id"];
    $date = time();
    $query = "UPDATE $type SET deleted_at = $date WHERE id = '".$id."'";
    $res = mysqli_query($con, $query);
    if (!$res) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    $row = mysqli_fetch_array($res);
    if ($row == null) {
        echo '<script>alert("Password do not match");
                window.location = "../register.php";</script>';
                exit;
    }
?>