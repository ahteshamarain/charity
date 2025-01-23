<?php 
include("include/header.php");
include("include/sidebar.php");
?>

<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- NGO Form -->
        <div class="col-12"> <!-- Use col-12 to ensure full width on all screen sizes -->
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Your NGO</h6>
                <form action="ngo_action.php" method="POST" enctype="multipart/form-data">
                    <!-- Full Name -->
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email_address" required>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                    </div>

                    <!-- Profile Image -->
                    <div class="mb-3">
                        <label for="profile_image" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="profile_image" name="profile_image">
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Form End -->

<?php 
include("include/footer.php");
?>
