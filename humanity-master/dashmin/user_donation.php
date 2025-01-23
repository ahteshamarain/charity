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
$id = $_SESSION['id'];

if ($role_id == 1) {
    // Query to fetch donation details
    $query = "SELECT * FROM donations AS d 
              INNER JOIN Login_details AS l ON l.id = d.id 
              INNER JOIN ngo_details AS n ON n.user_id = l.id";
    $result = mysqli_query($conn, $query); // Assume $conn is the database connection variable
?>

<!-- Dropdown for Viewing Status -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- Accented Table -->
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Donations</h6>
                <table class="table table-striped" style="width: 100%;"> 
                    <thead>
                        <?php 
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Donor Name</th>
                            <th scope="col">Donor Email</th>
                            <th scope="col">Donor Address</th>
                            <th scope="col">Donations</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo htmlspecialchars($row['donor_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['donor_email']); ?></td>
                            <td><?php echo htmlspecialchars($row['donor_address']); ?></td>
                            <td><?php echo htmlspecialchars($row['donation']); ?></td>
                            <td>
                                <!-- Disabled Dropdown to View Status -->
                                <select name="status" class="form-control" disabled>
                                    <option value="pending" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Pending</option>
                                    <option value="pickup" <?php echo ($row['status'] == 2) ? 'selected' : ''; ?>>Pickup</option>
                                    <option value="delivered" <?php echo ($row['status'] == 3) ? 'selected' : ''; ?>>Delivered</option>
                                </select>
                            </td>
                        </tr>
                        <?php 
                        }
                    }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
} else {
    // If user does not have permission to view this page
    echo "<div class='container-fluid pt-4 px-4'>
            <div class='alert alert-danger'>You do not have permission to access this page.</div>
          </div>";
}
?>

<?php 
include("include/footer.php");
?>
