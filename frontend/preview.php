<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Palette Portal - Artwork Preview</title>
    <style>
      /* Global styles */
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #121212;
      }

      /* Card styles */
      .card {
        background-color: #A6D0DD;
        border: 2px solid #ffff;
        box-shadow: 0px 2px 5px rgba(0,0,0,0.2);
        padding: 20px;
        max-width: 600px;
        margin: 0 auto;
        text-align: center;

      }

      .card h1 {
        margin: 0;
        font-size: 2em;
        color: #000;
      }

      .card img {
        max-width: 100%;
        height: auto;
        margin-bottom: 20px;
      }

      .card p {
        margin: 0;
        font-size: 1.2em;
        color: #000;
        line-height: 1.5em;
      }

      .card strong {
        font-weight: bold;
      }

      .card button {
        background-color: #000;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 1.2em;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <?php
      require_once "config.php";

      // get artwork details
      $sql = "SELECT * FROM artwork WHERE id = ?";
      $stmt = mysqli_prepare($conn, $sql);

      mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        echo "<div class='card'>";
        echo "<h1>" . $row['name'] . "</h1>";
        echo "<img src='" . $row['image_path'] . "' alt='" . $row['name'] . "'>";
        echo "<p><strong>Type: </strong>" . $row['type'] . "</p>";
        echo "<p><strong>Description: </strong>" . $row['description'] . "</p>";
        echo "<p><strong>Cost: </strong>$" . $row['cost'] . "</p>";
        echo "<a href='checkout.php?id=" . $row['id'] . "'><button>Buy Now</button></a>";
        echo "</div>";
      } else {
        echo "<p>No artwork found.</p>";
      }

      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    ?>
  </body>
</html>
