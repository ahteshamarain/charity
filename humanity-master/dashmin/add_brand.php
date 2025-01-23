<?php 
include("include/header.php");
include("include/sidebar.php");

?>

<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- Brand Form -->
        <div class="col-12"> <!-- Use col-12 to ensure full width on all screen sizes -->
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Your Brand</h6>
                <form action="brand_action.php" method="POST" enctype="multipart/form-data">
                    <!-- Brand Name -->
                    <div class="mb-3">
                        <label for="brand_name" class="form-label">Brand Name</label>
                        <input type="text" class="form-control" id="brand_name" name="brand_name" required>
                    </div>

                 
                

                  

                    <!-- Position -->
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" name="position" required>
                    </div>

                    <!-- Brand Image -->
                    <div class="mb-3">
                        <label for="brand_image" class="form-label">Brand Image</label>
                        <input type="file" class="form-control" id="brand_image" name="brand_image">
                    </div>

                    <div class="mb-3">
                        <label for="brand_details" class="form-label">Brand Details</label>
                        <input type="text" class="form-control" id="brand_details" name="brand_details">
                    </div>

                    <!-- Password -->
                

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
