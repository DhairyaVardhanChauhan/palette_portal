<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE name = '$username' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:welcome.php');
   }else{
      $message[] = 'incorrect password or username!';
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
            <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>

        <form action="" method="post" enctype="multipart/form-data">
            <h3> Login </h3>

            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username"  required>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password"  required>

            <input type="submit" name="submit" class="login-btn" value="Log in">
            <div class="buttons-row">
                <p><a href="register.php">New Here? Join Us.</a></p>
            </div>
        </form>
    </div>

    <script src="../scripts/loginstyle.js"></script>
    <script src="../scripts/login.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script> 

   <!-- --------------------------------------------------------------------- -->
</body>

</html>