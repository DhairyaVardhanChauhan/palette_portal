<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
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

    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/general.css">

    <title> Palette Portal </title>

    <script src="https://unpkg.com/ityped@1.0.3"></script>
</head>

<body>
    <header>
        <h1 class="logo"> Palette Portal </h1>
        <h1 class="logo"><?php echo "Hello, ".$_SESSION['username']?></h1>

        <div class="btn-rw">
            <a href="../pages/explore.html">
                <button id="login-btn"> explore </button>
            </a>
            <a href="../loginphp/profile.php">
                <button id="login-btn"> Profile </button>
            </a>
            <a href="../loginphp/logout.php">
                <button id="login-btn"> Logout </button>
            </a>

            

        </div>
    </header>

    <div class="display-text-container">
        <h2><span class="display-text"></span></h2>
        <div class="search-input">
            <input class="searchbar" type="text" placeholder="Search..." onfocus="showBar()" onblur="hideBar()">
            <div class="autocom-box">
                <!-- here list are inserted from javascript -->
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