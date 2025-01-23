<?php
session_start(); // Start the session

include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch the hashed password and role_id from the database based on username
    $sql = "SELECT id, username, password, Role_id FROM Login_details WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Check if the username exists
    if ($row) {
        // Verify the password with the hashed one
        if (password_verify($password, $row['password'])) {
            // Login successful: store user data in session
            $_SESSION['id'] = $row['id']; // Store user ID in session
            $_SESSION['username'] = $row['username']; // Store username in session
            $_SESSION['Role_id'] = $row['Role_id']; // Store Role_id in session

            // Redirect based on Role_id
            if ($_SESSION['Role_id'] == 1) {
                // If Role_id is 1, redirect to the user page (index.php)
                echo "<script>
                        alert('Login successful!');
                        window.location.href = 'index.php';
                      </script>";
            } elseif ($_SESSION['Role_id'] == 2 || $_SESSION['Role_id'] == 3) {
                // If Role_id is 2 or 3, redirect to the admin page (admin.php)
                echo "<script>
                        alert('Login successful!');
                        window.location.href = './dashmin/index.php';
                      </script>";
            }
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "No user found with that username!";
    }
}
?>
