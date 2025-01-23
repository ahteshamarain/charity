<?php 
include("include/header.php");
include("config.php");

$query = "SELECT * FROM ngo_details AS ng INNER JOIN Login_details AS ld ON ld.id = ng.user_id WHERE ld.Role_id = 3";
$result = mysqli_query($conn, $query); 
?>

<div class="divider col-sm-12 col-xs-12 col-md-12 text-center">
    <div class="header-text"> Our <span>Services</span></div>
</div>
<div class="text-center">
    <a href="ngo.php" class="btn btn-success btn-lg">Add Your NGO</a>
</div>
<br><br>
<section id="blog-isotope" class="subpage bg-white">
    <div class="overlay-light">
        <div id="content" class="container">
            <!-- posts -->
            <?php 
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <!-- post 3 -->
            <div class="col-md-3 col-sm-6 wow animated-longer-delay-2 fadeInDown">
                <div class="panel" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <div class="panel-body text-center" style="text-align: center;">
                        <div class="col-xs-12">
                            <div class="avatar-team-member effects-container effects-enlarge">
                                <a href="#">
                                    <img src="./dashmin/<?php echo $row['profile_image']; ?>" alt="image" style="max-width: 100%; height: auto; object-fit: cover;"/>
                                </a>
                            </div>
                        </div>
                        <h3><?php echo $row['full_name']; ?></h3>
                        <h4><?php echo $row['email']; ?></h4>
                        <p> <?php echo $row['address']; ?> </p>
                        
                        
                        <!-- Donate Button -->
                        <div class="text-center">
                            <a href="donate.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-lg">Donate</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                }
            }
            ?>
        </div>
    </div><!-- /end overlay -->
</section><!--=== / END blog ===-->

<?php 
include("include/footer.php")
?>
