<?php
include("config.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $ngo_id = $_POST['id'];  // The NGO ID
    $donor_name = mysqli_real_escape_string($conn, $_POST['donor_name']);
    $donor_email = mysqli_real_escape_string($conn, $_POST['donor_email']);
    $donor_address = mysqli_real_escape_string($conn, $_POST['donor_address']);
    $donation_amount = mysqli_real_escape_string($conn, $_POST['donation']);
    
    // Set status to 1 (indicating successful donation)
    $status = 1;

    // SQL query to insert data into the donations table
    $query = "INSERT INTO donations (ngo_id, donor_name, donor_email, donor_address, donation, status) 
              VALUES ('$ngo_id', '$donor_name', '$donor_email', '$donor_address', '$donation_amount', '$status')";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Successfully inserted data
        echo "<script>alert('Thank you for your donation!'); window.location.href = 'donate.php';</script>";
    } else {
        // Error inserting data
        echo "<script>alert('Something went wrong. Please try again.'); window.history.back();</script>";
    }
}
?>
