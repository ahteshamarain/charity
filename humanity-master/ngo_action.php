<?php
include('config.php'); // Database connection file

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
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert login details into `users` table
    $query = "INSERT INTO Login_details (username, email, phone , password , Role_id) VALUES ('$username', '$email', '$phone' , '$hashed_password' , 4)";
    
    if (mysqli_query($conn, $query)) {
        // Get the last inserted user id
        $user_id = mysqli_insert_id($conn);

        // Insert additional details into `user_details` table
        $profile_image = '';
        if (isset($_FILES['profile_image'])) {
            $image_name = $_FILES['profile_image']['name'];
            $image_tmp = $_FILES['profile_image']['tmp_name'];
            $image_path = 'uploads/' . $image_name;
            move_uploaded_file($image_tmp, $image_path);
            $profile_image = $image_path;
        }

        $details_query = "INSERT INTO Ngo_details (user_id, full_name, phone_number, address, profile_image) 
                          VALUES ('$user_id', '$username', '$phone', '$address', '$profile_image')";

    if (mysqli_query($conn, $details_query)) {
            echo "<script>alert('NGO Request sent successfully!'); window.location.href='service.php';</script>";
        } else {
            echo "<script>alert('Error saving user details: " . mysqli_error($conn) . "'); window.location.href='ngo.php';</script>";
        }
    } else {
        echo "<script>alert('Error inserting user: " . mysqli_error($conn) . "'); window.location.href='ngo.php';</script>";
    }
}
?>
