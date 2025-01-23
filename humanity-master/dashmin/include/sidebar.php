<?php
session_start();
if (!isset($_SESSION['Role_id'])) {
    // If session variable 'role_id' is not set, redirect to login page
    header("Location: ../login.php");
    exit();
}
$role_id = $_SESSION['Role_id'];

?>

<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>HUMANITY</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <!-- Check if session is set for username and role -->
                <?php if (isset($_SESSION['username'])): ?>
                    <h6 class="mb-0"><?php echo htmlspecialchars($_SESSION['username']); ?></h6>
                <?php else: ?>
                    <h6 class="mb-0">Guest</h6>
                    <span>Not Logged In</span>
                <?php endif; ?>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

          
            
          <?php 
if ($role_id == 2) { 
    ?>
        <a href="add_ngo.php" class="nav-item nav-link">
            <i class="fa fa-th me-2"></i>Add NGO
        </a>
        <a href="add_brand.php" class="nav-item nav-link">
            <i class="fa fa-th me-2"></i>Add brands
        </a>
        <a href="view_ngo.php" class="nav-item nav-link">
            <i class="fa fa-th me-2"></i>NGO Details
        </a>
        <a href="brand_details.php" class="nav-item nav-link">
            <i class="fa fa-th me-2"></i>Brand Details
        </a>
        <a href="user_details.php" class="nav-item nav-link">
            <i class="fa fa-th me-2"></i>User Details
        </a>
        <a href="contact_details.php" class="nav-item nav-link">
            <i class="fa fa-th me-2"></i>Contact Details
        </a>
        <a href="mails.php" class="nav-item nav-link">
            <i class="fa fa-th me-2"></i>Mails
        </a>
    <?php 
    } 
    else if($role_id == 1){
      ?>
       <a href="user_details.php" class="nav-item nav-link">
            <i class="fa fa-th me-2"></i>User Details
        </a>
        <a href="user_donation.php" class="nav-item nav-link">
            <i class="fa fa-th me-2"></i>Your Donations
        </a>
      <?php   
    }
    else if($role_id == 3){
        ?>
           <a href="view_ngo.php" class="nav-item nav-link">
            <i class="fa fa-th me-2"></i>NGO Details
        </a>
        <a href="donation.php" class="nav-item nav-link">
            <i class="fa fa-th me-2"></i>Donations
        </a>
        <?php   
      }
    else {
        // If role is not 1, 2, or 3, redirect the user to login page
        header("Location: ../login.php");
        exit();
    }
          ?>

         
        </div>
    </nav>
</div>
<!-- Sidebar End -->
  <!-- Content Start -->
  <div class="content">
 

<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search" placeholder="Search">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <!-- Message Dropdown -->
      
        <!-- Notification Dropdown -->
    
        <!-- User Dropdown -->
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">
                    <!-- Check if session is set and Role_id is 2 -->
                    <?php if (isset($_SESSION['username'])): ?>
                        <!-- Display the username if the user is an admin (Role_id = 2) -->
                        <?php echo htmlspecialchars($_SESSION['username']); ?>
                    <?php else: ?>
                        <!-- Display "Guest" or another fallback text if the user is not an admin -->
                        Guest
                    <?php endif; ?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
             
                <a href="logout.php" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>

            <!-- Navbar End -->
