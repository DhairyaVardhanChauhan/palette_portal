<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};


?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/general.css">

    <title> Palette Portal </title>

    <script src="https://unpkg.com/ityped@1.0.3"></script>
</head>

<body>
<?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id     = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>
    <header>
        <h1 class="logo"> Palette Portal </h1>
        
        <h1> Hello, <span><?php echo $fetch_user['name']; ?></span> </h1>
        
        <div class="btn-rw">
            <a href="../pages/explore.html">
                <button id="login-btn"> explore </button>
            </a>
            <a href="profile.php">
                <button id="login-btn"> Profile </button>
            </a>
            <a href="logout.php">
                <button id="login-btn"> Logout </button>
            </a>

            

        </div>
    </header>
    <div class="display-text-container">
        <h2><span class="display-text"></span></h2>
        <div class="search-input">
            <input class="searchbar" type="text" placeholder="Search..." onfocus="showBar()" onblur="hideBar()">
            <div class="autocom-box">
            </div>
        </div>
    </div>

    <main class="art-preview">
        
        <div class="art"></div>
        <div class="art"></div>
        <div class="art"></div>
        <div class="art"></div>
        <div class="art"></div>
        <div class="art"></div>
    </main>

    <script src="../scripts/index.js"></script>
</body>

</html>