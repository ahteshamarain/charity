<?php 
include("include/header.php");
include("include/sidebar.php");
include("../config.php");

if (!isset($_SESSION['Role_id'])) {
    header("Location: ../login.php");
    exit();
}

$role_id = $_SESSION['Role_id'];
$id = $_SESSION['id'];

if ($role_id == 3) {
    $query = "SELECT d.id, d.donor_name, d.donor_email, d.donor_address, d.donation, d.status 
              FROM donations AS d 
              INNER JOIN Login_details AS l ON l.id = d.id 
              INNER JOIN ngo_details AS n ON n.user_id = l.id";
    $result = mysqli_query($conn, $query);
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Donations</h6>
                <table class="table table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Donor Name</th>
                            <th>Donor Email</th>
                            <th>Donor Address</th>
                            <th>Donations</th>
                            




                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['donor_name']; ?></td>
                                    <td><?php echo $row['donor_email']; ?></td>
                                    <td><?php echo $row['donor_address']; ?></td>
                                    <td><?php echo $row['donation']; ?></td>
                             

                                    <td>
                                        <form action="update_status.php" method="POST">
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Pending</option>
                                                <option value="2" <?php echo ($row['status'] == 2) ? 'selected' : ''; ?>>Pickup</option>
                                                <option value="3" <?php echo ($row['status'] == 3) ? 'selected' : ''; ?>>Delivered</option>
                                            </select>
                                            <input type="hidden" name="donation_id" value="<?php echo $row['id']; ?>">
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="6">No donations found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
} elseif ($role_id == 1) {
    $query = "SELECT id, username, email, phone FROM Login_details WHERE Role_id = 1 AND id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">User Details</h6>
                <table class="table table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="4">No user details found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
}
include("include/footer.php");
?>
