<?php
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donation_id = $_POST['donation_id'];
    $status = $_POST['status'];

    // Update the status in the database
    $query = "UPDATE donations SET status = '$status' WHERE id = '$donation_id'";
    if (mysqli_query($conn, $query)) {
        // Redirect back to the page after the update
        header("Location: donation.php");
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>
