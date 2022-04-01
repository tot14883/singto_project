<?php 
    include("./db-connect.php");
    session_start();

    //bcrypt
    $regEmail = mysqli_real_escape_string($con, $_POST['email']);
    $regPassword = mysqli_real_escape_string($con, $_POST['password']);

    $strSQL = "SELECT * FROM user WHERE email = '".$regEmail."'";
    $objQuery = mysqli_query($con, $strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
    echo json_encode($objResult);
    if (!$objQuery) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    if ($objResult != ""){
        if (password_verify($regPassword, $objResult["password"])){
            if($objResult["email"] != NULL)
			{
                $_SESSION["id"] = $objResult["id"];
                $_SESSION["firstname"] = $objResult["firstname"];
                $_SESSION["lastname"] = $objResult["lastname"];
                $_SESSION["email"] = $objResult["email"];
                $_SESSION["password"] = $objResult["password"];
                session_write_close();
				header("location:home.php");
			}
        }
        else {
            echo '<script>alert("Email or Password Incorrect!");
                window.location = "index.php";</script>';
                exit;
        }
    }
    else {
        echo '<script>alert("Email or Password Incorrect!");
                window.location = "index.php";</script>';
                exit;
    }
        
    mysqli_close($con);
?>