<?php

include 'frontend/config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'pfp/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:frontend/login.php');
         }else{
            $message[] = 'registeration failed!';
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

    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/login-page.css">

    <title> Palette Portal | Register </title>

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
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
            <form action="" method="post">
            <h3> Sign Up </h3>

            <label for="username">Username</label>
            <input type="text" placeholder="Username" name="name" required>

            <label for="email">Email</label>
            <input type="email" placeholder="Email" name="email" required>

            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password" minlength="8" required>

            <label for="password">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" name="cpassword" minlength="8" required>
            
            <label for="username">Avatar</label>
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">

            
            <input type="submit" name="submit" class="login-btn" value="Register">
            <div class="buttons-row">
            <p><a href="frontend/login.php">Already a member?</a></p>
            </div>
        </form>
    </div>

    <script src="scripts/loginstyle.js"></script>
    <script src="scripts/login.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script> 

</body>

</html>
