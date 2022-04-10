<?php
    include("./db-connect.php");
    session_start();
    $user_id = $_SESSION['id'];
    $post_id = $_POST["post_id"];
    $comment = $_POST["comment"];
    $date = time();

    if($comment == "") {
        echo '<script>alert("Please enter value!!");
        history.back();</script>';
        exit;
    }
    $query = "INSERT INTO `comment` (`post_id`, `description`, `created_by`, `updated_by`) VALUES ($post_id, '$comment', $user_id, $user_id)";
    mysqli_query($con, $query);
    echo '<script>alert("Comment Complete!");
		history.back();</script>';
    exit;
?>