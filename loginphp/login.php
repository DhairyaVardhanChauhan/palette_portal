<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: ../pages/index.html");
                            
                        }
                    }

                }

    }
}    


}


?>





<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/login-page.css">

    <title> Palette Portal | Login </title>

    <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
</head>

<body>
    <div id="background"></div>
    <div class="dots">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="form-container">
        <h3
            style="width: fit-content; margin-left: auto; margin-right: auto; font-size: 2em; margin-top: 0%; margin-bottom: 0.5em; font-weight: 3rem;">
            Pallete
            Portal</h3>
        <form action="" method="post">
            <h3> Login </h3>

            <label for="username">Username</label>
            <input type="text" placeholder="Username" name="username" id="inputEmail4" required>

            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password" id="inputPassword4" required>

            <button type="submit" class="login-btn"><a href="../pages/index.html">Log In</a></button>
            <div class="buttons-row">
                <a href="register.php">New Here? Join Us.</a>
            </div>
        </form>
    </div>

    <script src="../scripts/loginstyle.js"></script>
    <script src="../scripts/login.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script> 

   <!-- --------------------------------------------------------------------- -->
</body>

</html>