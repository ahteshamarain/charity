<?php 
include("include/header.php");
?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row w-100">
        <!-- Sign Up Form -->
        <div class="col-md-12 offset-md-3 just">
            <h2 id="signup" class="text-center mb-4">Add Your NGO</h2>
            <form action="ngo_action.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Full Name:</label>
                    <input type="text" class="form-control" id="username" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" class="form-control" id="email" name="email_address" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                </div>
                <div class="form-group">
                    <label for="user_image">Profile Image:</label>
                    <input type="file" class="form-control" id="user_image" name="profile_image">
                </div>
                <div class="form-group">
                    <label for="user_password">Password:</label>
                    <input type="password" class="form-control" id="user_password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_user_password">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirm_user_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Submit</button>
            </form>
            <br>
        </div>
    </div>
</div>
<?php 
include("include/footer.php");
?>
