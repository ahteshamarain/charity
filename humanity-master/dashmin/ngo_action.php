<?php
include('../config.php'); // Database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and get input data
    $username = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email_address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    
    // Password validation
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.location.href='ngo.php';</script>";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert login details into `Login_details` table with Role_id = 3 (for NGO)
    $query = "INSERT INTO Login_details (username, email, phone, password, Role_id) 
              VALUES ('$username', '$email', '$phone', '$hashed_password', 3)";
    
    if (mysqli_query($conn, $query)) {
        // Get the last inserted user id
        $user_id = mysqli_insert_id($conn);

        // Handle profile image upload
        $profile_image = '';
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
            $image_name = $_FILES['profile_image']['name'];
            $image_tmp = $_FILES['profile_image']['tmp_name'];
            $image_path = 'uploads/' . $image_name;

            // Move uploaded image to the 'uploads' directory
            if (move_uploaded_file($image_tmp, $image_path)) {
                $profile_image = $image_path;
            } else {
                echo "<script>alert('Error uploading image.'); window.location.href='ngo.php';</script>";
                exit();
            }
        }

        // Insert additional NGO details into `Ngo_details` table
        $details_query = "INSERT INTO Ngo_details (user_id, full_name, phone_number, address, profile_image) 
                          VALUES ('$user_id', '$username', '$phone', '$address', '$profile_image')";

        if (mysqli_query($conn, $details_query)) {
            echo "<script>alert('NGO added successfully!'); window.location.href='add_ngo.php';</script>";
        } else {
            echo "<script>alert('Error saving user details: " . mysqli_error($conn) . "'); window.location.href='add_ngo.php';</script>";
        }
    } else {
        echo "<script>alert('Error inserting user: " . mysqli_error($conn) . "'); window.location.href='add_ngo.php';</script>";
    }
}
?>
