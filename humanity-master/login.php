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
    .btn-primary {
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
        <h2>Login</h2>
        <form action="login_action.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>
    </div>
</div>
<?php 
include("include/footer.php");
?>
