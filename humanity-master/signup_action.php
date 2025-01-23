<?php
include('config.php'); // Make sure you have a database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the passwords match
    if ($password == $confirm_password) {
        // Hash the password using PASSWORD_DEFAULT algorithm
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into the database with the hashed password
        $sql = "INSERT INTO Login_details (username, email, phone, password, Role_id) 
                VALUES ('$username', '$email', '$phone', '$hashed_password' , 1)";
        
        if (mysqli_query($conn, $sql)) {
            // Show success alert and redirect to login.php
            echo "<script>
                    alert('Registration successful!');
                    window.location.href = 'login.php';
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Passwords do not match!";
    }
}
?>
