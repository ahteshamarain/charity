<?php
// Include database connection
include("../config.php");

// Initialize a variable to store the message
$message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $brand_name = mysqli_real_escape_string($conn, $_POST['brand_name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $brand_details = mysqli_real_escape_string($conn, $_POST['brand_details']);
    
    // Handle the file upload for brand image
    $brand_image = "";
    if (isset($_FILES['brand_image']) && $_FILES['brand_image']['error'] == 0) {
        $target_dir = "uploads/"; // Specify the directory where the images will be stored
        $target_file = $target_dir . basename($_FILES["brand_image"]["name"]);
        
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($_FILES["brand_image"]["tmp_name"], $target_file)) {
            $brand_image = basename($_FILES["brand_image"]["name"]); // Save the image name
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }

    // Insert the form data into the database
    $sql = "INSERT INTO brands (brand_name, position, brand_image, brand_details) 
            VALUES ('$brand_name', '$position', '$brand_image', '$brand_details')";
    
    if (mysqli_query($conn, $sql)) {
        $message = "Brand added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
    
    // Close the database connection
    mysqli_close($conn);
    
    // Show alert message using JavaScript
    echo "<script type='text/javascript'>alert('$message');
    window.location.href = 'add_brand.php'
    </script>";

}
?>
