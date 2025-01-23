<?php 
include("include/header.php");
include("config.php");

if(isset($_GET['id'])){
  $id = $_GET['id'];
}
?>

<div class="divider col-sm-12 col-xs-12 col-md-12 text-center">
    <div class="header-text"><span>Donate</span> Here</div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <!-- Donate Form -->
        <div class="col-md-12">
            <h2 class="text-center">Donate Now</h2>
            <form action="process_donation.php" method="POST" class="text-center">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>" required>

                <!-- Donor Full Name -->
                <div class="form-group">
                    <label for="donor_name">Donor's Name:</label>
                    <input type="text" class="form-control" id="donor_name" name="donor_name" required>
                </div>

                <!-- Donor Email Address -->
                <div class="form-group">
                    <label for="donor_email">Donor's Email :</label>
                    <input type="email" class="form-control" id="donor_email" name="donor_email" required>
                </div>

                <!-- Donor Address -->
                <div class="form-group">
                    <label for="donor_address">Address:</label>
                    <input type="text" class="form-control" id="donor_address" name="donor_address" required>
                </div>

                <!-- Donation Amount -->
                <div class="form-group">
                    <label for="donation_amount">Donation:</label>
                    <input type="text" class="form-control" id="donation" name="donation" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-lg">Donate Now</button>
            </form>
            <br><br>
        </div>
    </div>
</div>

<?php 
include("include/footer.php")
?>
