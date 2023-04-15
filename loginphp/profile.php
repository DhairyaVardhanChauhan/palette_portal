<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>
<!doctype html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="../styles/card.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Palette Portal | Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar sticky-top bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" >
  <div class="container-fluid" class="opacity-25">
    <a class="navbar-brand" href="#">Palette Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="welcome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/explore.html">Explore</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="profile.php">Profile</a>
        </li>
       
      </ul>
      <a href="../loginphp/logout.php">
        <button class="btn btn-outline-success" type="submit">Logout</button>
        </a>

      </form>
    </div>
  </div>
</nav>



    <h3>About</h3>
    <p>wgfefwh wseufighwueif wefgiwuefgwus</p>
    <h3>This is title</h3>
    <br><br>
    salfhsafhasjdf adlajkshfl 



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>