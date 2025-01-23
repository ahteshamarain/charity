<?php 
include("include/header.php");
include("include/sidebar.php");
include("../config.php");
if (!isset($_SESSION['Role_id'])) {
    // If session variable 'role_id' is not set, redirect to login page
    header("Location: ../login.php");
    exit();
}
// Handle delete action
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Perform delete query
    $deleteQuery = "DELETE FROM Login_details WHERE id = $delete_id";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script type='text/javascript'>
                alert('Record deleted successfully!');
                window.location.href='user_details.php'; // Reload the page after alert
              </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
$role_id = $_SESSION['Role_id'];

if($role_id == 2){

// Set default status if not set
$query = "SELECT * FROM Login_details WHERE Role_id = 1";
$result = mysqli_query($conn, $query); // Assume $conn is the database connection variable
?>

<!-- Dropdown for Selecting Status -->
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>

                            <td>
                                <!-- Delete Button -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                </form>
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
}
elseif($role_id == 1){
$user_id = $_SESSION['id'];
$query = "SELECT * FROM Login_details WHERE Role_id = 1 AND id = '$user_id'";
$result = mysqli_query($conn, $query); 
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
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>

                     
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
}
?>
<!-- Table End -->

<?php 
include("include/footer.php");
?>
