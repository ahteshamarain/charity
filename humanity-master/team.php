<?php 
include("include/header.php");
include("config.php");


$query = "SELECT * FROM brands";
$result = mysqli_query($conn, $query); 
?>


    <div class="divider col-sm-12 col-xs-12 col-md-12 text-center">
        <div class="header-text"> Our <span>Brans partner</span></div>
    </div>

    <section id="team">
      <div class="bg-white">
        <div class="inner-container overlay-light row-of-columns">

         <!-- team members -->
          <div class="col-lg-12 col-sm-12 text-center">
            <div class="team-members row">
            <?php 
                        if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){

                        ?>
                <div class="col-md-3 col-sm-6 wow animated-longer-delay-2 fadeInDown ">
                  <div class="panel">
                    <div class="panel-body">
                      <div class="col-xs-12">
                        <div class="avatar-team-member effects-container effects-enlarge">
                            <a href="#">
                            <img src="./dashmin/uploads/<?php echo $row['brand_image']; ?>" alt="image">
                            </a>
                        </div>
                      </div>
                            <h3><?php echo $row['brand_name']; ?></h3>
                            <h4><?php echo $row['position']; ?></h4>
                            <p> <?php echo $row['brand_details']; ?> </p>
                            <div class="text-center">
                              <ul class="list-unstyled list-inline list-social-sq-primary">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                              </ul>
                          </div>
                        </div>
                    </div>
                </div>
                <?php 
                        }
                      }
                ?>
   
            </div>

          
       </div><!-- / end team members -->
    </div><!-- / end inner container-->
    </div><!-- / end background color wrapper-->
  </section><!--=== / END meet the team ===-->

  <?php 
include("include/footer.php")
?>