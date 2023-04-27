<!DOCTYPE html>
<html>
  <head>
  <title>Explore</title>
    <link rel="stylesheet" href="../styles/explore.css">
    <link href='https://fonts.googleapis.com/css?family=Baloo Bhai 2' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Baloo Bhai' rel='stylesheet'>
    <style>
      .item img {
        transition: transform 0.3s ease;
      }
      .item img:hover {
        transform: translateY(-10px);
      }
    </style>

  </head>
  <body>

  <nav class="navbar">
      <a href="../frontend/welcome.php"><button class="post-btn">Home</button></a>
      <h1><a href="#" class="navbar-brand">Explore</a></h1>
        <div class="button-container">
          <button id = "mode" class = "change-mode" onclick="toggleBackgroundColor()">Dark Mode</button>
         <a href="addartwork.html"><button class="post-btn">Post</button></a>

        </div>
    </nav>

    <main>
      
    <?php
      require_once "config.php";

      // display artwork
      $sql = "SELECT * FROM artwork";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='item' onclick=\"location.href='preview.php?id=".$row['id']."'\">";
          echo "<img src='" . $row['image_path'] . "' alt='" . $row['name'] . "'>";
          echo "</div>";
        }
      } else {
        echo "<p>No artwork found.</p>";
      }

      mysqli_close($conn);
    ?>
    </main>

  </body>
  <script src="../scripts/explore.js"></script>
</html>
