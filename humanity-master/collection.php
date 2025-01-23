<?php 
include("include/header.php")
?>

    <div class="divider col-sm-12 col-xs-12 col-md-12">
        <div class="header-text"><span>Donation</span> Collected!</div>
    </div>
      <div class="fun-fact col-md-12">
        <div class="stat">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="milestone-counter">
                    <i class="fa fa-user fa-3x"></i>
                    <span class="stat-count highlight">122</span>
                    <div class="milestone-details">Happy Customers</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="milestone-counter">
                    <i class="fa fa-coffee fa-3x"></i>
                    <span class="stat-count highlight">4226</span>
                    <div class="milestone-details">Ordered Coffee's</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="milestone-counter">
                    <i class="fa fa-trophy fa-3x"></i>
                    <span class="stat-count highlight">14</span>
                    <div class="milestone-details">Awards Win</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="milestone-counter">
                    <i class="fa fa-camera fa-3x"></i>
                    <span class="stat-count highlight">232</span>
                    <div class="milestone-details">Photos Taken</div>
                </div>
            </div>
    </div><!-- stat -->
  </div>

    <!-- ============FOOTER============= -->

    
    <footer id="footer">
      <div class="footer-wrap">
       <div class="footer-top-line">
           <img src="img/footer-top-line.jpg" alt="color top line">
       </div>
        <div class="container">
            <div class="footer-adress-block">
                <h4>Great love for humanity</h4>
                <ul>
                    <li><span class="fa fa-home"></span><a href="#">Elm St, Chandni Chowk</a></li>
                    <li><span class="fa fa-phone"></span><a href="tel:">+1 123 4567 890- 95</a></li>
                    <li><span class="fa fa-envelope"></span><a href="mailto:hello@humanity.com">hello@humanity.com</a></li>
                    <li><span class="fa fa-map-marker"></span><a href="#">Locate us on map!</a></li>
                </ul>
            </div>
            <div class="footer-flikr">
                <h4>humanity Flickr Feed</h4>
                    <div class="flikr-block">
                        <div class="flikr-img">
                            <a href="#"><img src="img/flikr1.jpg" alt="flikr"></a>
                        </div>
                        <div class="flikr-img">
                            <a href="#"><img src="img/flikr2.jpg" alt="flikr"></a>
                        </div>
                        <div class="flikr-img">
                            <a href="#"><img src="img/flikr3.jpg" alt="flikr"></a>
                        </div>
                        <div class="flikr-img">
                            <a href="#"><img src="img/flikr4.jpg" alt="flikr"></a>
                        </div>
                        <div class="flikr-img">
                            <a href="#"><img src="img/flikr5.jpg" alt="flikr"></a>
                        </div>
                        <div class="flikr-img">
                            <a href="#"><img src="img/flikr6.jpg" alt="flikr"></a>
                        </div>
                    </div>
                <span>View more at <a href="#">flickr.com/humanity</a></span>
            </div>
            <div class="footer-link">
                <h4>Links</h4>
                <ul>
                    <li><a href="#"><i class="fa fa-external-link"></i> FAQ</a></li>
                    <li><a href="#"><i class="fa fa-external-link"></i> Help</a></li>
                    <li><a href="#"><i class="fa fa-external-link"></i> Copyright</a></li>
                    <li><a href="#"><i class="fa fa-external-link"></i> Careers</a></li>
                    <li><a href="#"><i class="fa fa-external-link"></i> Advertisement</a></li>
                    <li><a href="#"><i class="fa fa-external-link"></i> Hadippa</a></li>
                </ul>
            </div>
            <div class="footer-write">
                <h4>Be with us!</h4>
                <p>Are you a paasionate in helping needy people? Cuz if so, we need you, you’re welcome! Otherwise..lol jk.</p>
                <button class="button-main bg-green">I’m a volunteer</button>
                <button class="button-main bg-fio-point">I’m a Donor</button>
            </div>
        </div>
        <div class="move-top-page">
            <div class="container">
                  <div class="footer-bottom-content">
                       <div class="button-totop">
                          <span class="fa fa-angle-up"></span>
                       </div>
                        <nav>
                            <a href="#">Home</a>
                            <a href="#">Work</a>
                            <a href="#">About</a>
                            <a href="#">Sign In</a>
                            <a href="#">Donate</a>
                            <a href="#">Contact</a>
                        </nav>
                        <div class="copyright">
                            <span>Copyright 2014 Theme<br></span>
                            <span>All Rights Reserved</span>
                        </div>
                  </div>
            </div>
        </div>
      </div>
    </footer>

    <!-- script references -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/nav-hover.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
        <script src="js/main.js"></script>
    <!-- Place in the <head>, after the three links -->

        <script type="text/javascript">
            $(document).ready(function(){

                //Check to see if the window is top if not then display button
                $(window).scroll(function(){
                    if ($(this).scrollTop() > 100) {
                        $('.button-totop').fadeIn();
                    } else {
                        $('.button-totop').fadeOut();
                    }
                });

                //Click event to scroll to top
                $('.button-totop').click(function(){
                    $('html, body').animate({scrollTop : 0},800);
                    return false;
                });

            });
        </script>
    </body>
</html>
