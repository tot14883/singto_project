<?php
    include("./db-connect.php");
    session_start();
    $user_id = $_SESSION['id'];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $file_name = $_POST["file_name"];
    $file_path = $_POST["file_path"];
    $file_extension = $_POST["file_extension"];
    $due_date = $_POST["due_date"];
    $classroom_id = $_POST["classroom_id"];
    if($title == '' && $description == '') {
        echo '<script>alert("Please enter value!!");
        window.location = "../home.php";</script>';
        exit;
    }
    $userId = $_SESSION['id'];
    $query = "INSERT INTO `assignment` (`id`, `title`, `description`, `file_name`, `file_path`, `file_extension`, `due_date`, `classroom_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, '$title', '$description', '$file_name', '$file_path', '$file_extension', '$due_date', '$classroom_id', '$user_id', '', current_timestamp(), NULL, NULL)";
    mysqli_query($con, $query);
    echo '<script>alert("Create Complete!");
        window.location = "../manage_class.php";</script>';
        exit;
?>