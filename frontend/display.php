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
    <!-- <style>
      /* Global styles */
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f7f7f7;
      }

      #header {
  background-color: rgba(28, 35, 49, 0.8);
  backdrop-filter: blur(10px);
  color: #fff;
  text-align: center;
  padding: 20px;
  position: fixed;
  top: 0;
  width: 100%;
}


      #header h1 {
        margin: 0;
      }

      #container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 20px;
      }

      .artwork {
        background-color: #fff;
        box-shadow: 0px 2px 5px rgba(0,0,0,0.2);
        padding: 20px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        cursor: pointer;
      }

      .artwork img {
        margin-bottom: 10px;
        width: 100%;
        max-height: 300px;
        object-fit: cover;
      }
    </style> -->
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
      <!-- <div class="item">
        
       <a href="../pages/shop.html"><img src="https://picsum.photos/1200/1201" alt="Image 1"></a>
      </div>
      <div class="item">
        <a href="../pages/shop.html"><img src="https://picsum.photos/1200/1202" alt="Image 2"></a>
      </div>
      <div class="item">
        <a href="../pages/shop.html"><img src="https://picsum.photos/1200/1203" alt="Image 3"></a>
      </div>
      <div class="item">
        <a href="../pages/shop.html"><img src="https://picsum.photos/1200/1204" alt="Image 4"></a>
      </div>
      <div class="item">
        <a href="../pages/shop.html"><img src="https://picsum.photos/1200/1205" alt="Image 5"></a>
      </div>
      <div class="item">
        <a href="../pages/shop.html"><img src="https://picsum.photos/1200/1206" alt="Image 6"></a>
      </div>
      <div class="item">
        <a href="../pages/shop.html"><img src="https://picsum.photos/1200/1207" alt="Image 7"></a>
      </div>
      <div class="item">
        <a href="../pages/shop.html"><img  src="https://picsum.photos/1200/1208" alt="Image 8"></a>
      </div>
      <div class="item">
        <a href="../pages/shop.html"><img  src="https://picsum.photos/1200/1209" alt="Image 9"></a>
      </div>
      <div class="item">
        <a href="../pages/shop.html"><img  src="https://picsum.photos/1200/1210" alt="Image 10"></a>
      </div>
      <div class="item">
        <a href="../pages/shop.html"><img  src="https://picsum.photos/1200/1211" alt="Image 11">  </a>
      </div>
      <div class="item">
        <a href="../pages/shop.html"><img  src="https://picsum.photos/1200/1212" alt="Image 12"></a>
      </div>
      
      <div class="item">
        <a href="../pages/shop.html"><img  src="https://picsum.photos/1200/1212" alt="Image 12"></a>
      </div>
       -->
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
