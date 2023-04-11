<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
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
        <form id="contactForm">
            <h3> Sign Up </h3>

            <label for="username">Username</label>
            <input type="text" placeholder="Username" name="username" id="inputname" required>
<!-- 
            <label for="username">Email</label>
            <input type="email" placeholder="Email" id="name" required> -->

            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password" id="inputPassword" required>

            <label for="password">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" name="confirm_password" id="inputpassword" required>

            <button type="submit" class="login-btn"><a href="index.html">Register</a></button>
            <div class="buttons-row">
            <a href="login.php">Already a member?</a>
                </a>
            </div>
        </form>
    </div>

    <script src="../scripts/loginstyle.js"></script>
    <script src="../scripts/login.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script> 

   <!-- --------------------------------------------------------------------- -->
</body>

</html>