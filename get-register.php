<?php 
    include("./db-connect.php");
    session_start();
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $unhashpassword = $_POST["password"];
    $confirmpassword = $_POST['confirmpassword'];
    $date = time();
    $querycheck = "SELECT * FROM user WHERE email = '".$email."'";
    $rescheck = mysqli_query($con, $querycheck);
    if (!$rescheck) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    $rowcheck = mysqli_fetch_array($rescheck);
    if ($rowcheck == null){
        if ($unhashpassword == $confirmpassword) {
            $password = password_hash($unhashpassword, PASSWORD_BCRYPT);
            $query = "INSERT INTO user VALUES ('', '$firstname', '$lastname', '$email', '$password', '$date', '$date')";
            mysqli_query($con, $query);
            echo '<script>alert("Registeration Complete!");
                    window.location = "./index.php";</script>';
                    exit;
        }
        else {
            echo '<script>alert("Password do not match");
                    window.location = "./register.php";</script>';
                    exit;
        }
    }
    else if ($rowcheck['email'] == $email){
        echo '<script>alert("This email already exist!");
                window.location = "./register.php";</script>';
                exit;
    }
?>