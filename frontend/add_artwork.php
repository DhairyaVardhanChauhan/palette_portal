<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config.php';

// Check if the form was submitted
if (isset($_POST['submit'])) {
	
	// Get the form data
	$name = $_POST['name'];
	$type = $_POST['type'];
	$description = $_POST['description'];
	$cost = $_POST['cost'];
	$image_name = $_FILES['image']['name'];
	$image_tmp_name = $_FILES['image']['tmp_name'];
	
	// Check if all required fields are filled
	if (!empty($name) && !empty($type) && !empty($description) && !empty($cost) && !empty($image_name) && !empty($image_tmp_name)) {
		
		// Connect to the database using variables from config file
		$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		// Prepare the SQL query
		$sql = "INSERT INTO artwork (name, type, description, cost) VALUES ('$name', '$type', '$description', '$cost')";
		
		// Execute the query
		if (mysqli_query($conn, $sql)) {
			// Get the ID of the newly added artwork
			$artwork_id = mysqli_insert_id($conn);
			
			// Move the uploaded image to the artwork folder
			$upload_dir = 'artwork/';
			$image_path = $upload_dir . $image_name;
			
			if (move_uploaded_file($image_tmp_name, $image_path)) {
				// Update the artwork record with the image path
				$sql = "UPDATE artwork SET image_path='$image_path' WHERE id=$artwork_id";
				mysqli_query($conn, $sql);
				
                header("Location: display.php");
                exit();
            }
             else {
				echo "Error uploading image.";
			}
		} else {
			echo "Error adding artwork: " . mysqli_error($conn);
		}
		
		mysqli_close($conn);
		
	} else {
		echo "Please fill in all fields.";
	}
	
}
?>
