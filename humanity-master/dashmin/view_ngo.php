<?php 
include("include/header.php");
include("include/sidebar.php");
include("../config.php");

if (!isset($_SESSION['Role_id'])) {
    // If session variable 'role_id' is not set, redirect to login page
    header("Location: ../login.php");
    exit();
}

$role_id = $_SESSION['Role_id'];

if ($role_id == 2) {
    // Set default status if not set
    $status = isset($_POST['status']) ? $_POST['status'] : 'request';

    // Modify the query to filter based on status
    if ($status == 'accepted') {
        $query = "SELECT * FROM ngo_details AS ng INNER JOIN Login_details AS ld ON ld.id = ng.user_id WHERE ld.Role_id = 3";
    } elseif ($status == 'rejected') {
        $query = "SELECT * FROM ngo_details AS ng INNER JOIN Login_details AS ld ON ld.id = ng.user_id WHERE ld.Role_id = 5";
    } else {
        // Default to 'request' if no status is selected
        $query = "SELECT * FROM ngo_details AS ng INNER JOIN Login_details AS ld ON ld.id = ng.user_id WHERE ld.Role_id = 4";
    }

    $result = mysqli_query($conn, $query); // Assume $conn is the database connection variable

    $alertMessage = ""; // Variable to hold the alert message

    // Handle Accept or Reject Actions
    if (isset($_POST['action']) && isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        $role_id = $_POST['action'] == 'accept' ? 3 : 5; // Set role_id based on action

        // Update Role_id in the database
        $updateQuery = "UPDATE Login_details SET Role_id = $role_id WHERE id = $user_id";
        if (mysqli_query($conn, $updateQuery)) {
            $alertMessage = "Role updated successfully!";  // Set the alert message
        } else {
            $alertMessage = "Error updating record: " . mysqli_error($conn);
        }
    }
?>
<!-- Dropdown for Selecting Status -->
<div class="container-fluid pt-4 px-4">
    <!-- Status Filter Dropdown -->
    <form method="POST" class="mb-4">
        <select name="status" class="form-select" onchange="this.form.submit()">
            <option value="request" <?php if ($status == 'request') echo 'selected'; ?>>Request</option>
            <option value="accepted" <?php if ($status == 'accepted') echo 'selected'; ?>>Accepted</option>
            <option value="rejected" <?php if ($status == 'rejected') echo 'selected'; ?>>Rejected</option>
        </select>
    </form>

    <div class="row g-4">
        <!-- Accented Table -->
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Accented Table</h6>
                <table class="table table-striped" style="width: 100%;"> 
                    <thead>
                        <?php 
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Profile Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $counter = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $user_id = $row['user_id'];
                            $current_status = $row['Role_id'] == 3 ? 'Accepted' : ($row['Role_id'] == 5 ? 'Rejected' : 'Request');
                        ?>
                        <tr>
                            <th scope="row"><?php echo $counter++; ?></th>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['address']; ?></td>

                            <!-- Display the image from the uploads folder -->
                            <td><img src="<?php echo $row['profile_image'] ?>" alt="<?php echo $row['full_name']; ?>'s Image" width="50" height="50"></td>

                            <!-- Show current status -->
                            <td><?php echo $current_status; ?></td>

                            <!-- Show Accept/Reject buttons only for 'Request' status -->
                            <?php if ($row['Role_id'] == 4) { ?>
                                <td>
                                    <!-- Form for Accept Button -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="hidden" name="action" value="accept">
                                        <button type="submit" class="btn btn-success">Accept</button>
                                    </form>

                                    <!-- Form for Reject Button -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="hidden" name="action" value="reject">
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </form>
                                </td>
                            <?php } else { ?>
                                <!-- Empty cell if already accepted or rejected -->
                                <td></td>
                            <?php } ?>
                        </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
                        }
} elseif ($role_id == 3) {
    $ngo_id = $_SESSION['id'];

    // Modify the query to filter based on status
    $query = "SELECT * FROM ngo_details AS ng INNER JOIN Login_details AS ld ON ld.id = ng.user_id WHERE ld.Role_id = 3 AND ng.user_id = '$ngo_id'";
    $result = mysqli_query($conn, $query); // Assume $conn is the database connection variable
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- Accented Table -->
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Accented Table</h6>
                <table class="table table-striped" style="width: 100%;"> 
                    <thead>
                        <?php 
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Profile Image</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $counter = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $current_status = '';
                            if ($row['Role_id'] == 3) {
                                $current_status = 'Accepted';
                            } elseif ($row['Role_id'] == 4) {
                                $current_status = 'Pending';
                            } elseif ($row['Role_id'] == 5) {
                                $current_status = 'Rejected';
                            }
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['address']; ?></td>

                            <!-- Display the image from the uploads folder -->
                            <td><img src="<?php echo $row['profile_image'] ?>" alt="<?php echo $row['full_name']; ?>'s Image" width="50" height="50"></td>

                            <!-- Show current status -->
                            <td><?php echo $current_status; ?></td>
                        </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
                        }
} else {
    echo '<p>No records found.</p>';
}

// Show alert if there is a message set


include("include/footer.php");
?>
