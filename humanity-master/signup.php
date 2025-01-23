<?php 
include("include/header.php");
?>
<style>
    .form-container {
        max-width: 500px;
        margin: auto;
        padding: 30px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-control {
        font-size: 16px;
        padding: 15px;
    }
    h2 {
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }
    .btn-success {
        width: 100%;
        padding: 10px;
    }
    p {
        text-align: center;
        margin-top: 15px;
    }
</style>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="form-container">
        <h2>Sign Up</h2>
        <form action="signup_action.php" method="POST">
            <div class="form-group">
                <label for="new_username">Username:</label>
                <input type="text" class="form-control" id="new_username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="new_password">Password:</label>
                <input type="password" class="form-control" id="new_password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-success">Sign Up</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
        <br>
    </div>
    <br><br>
</div>
<?php 
include("include/footer.php");
?>
