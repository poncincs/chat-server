<!-- login.php -->
<?php
include_once('config/mysql.php');
include_once('variables.php');
?>

<div class="wrapper">
    <form action="post_login.php" method="POST">
        <h1>Login</h1>
        <div class="input-box">
            <!-- <i class='bx bxs-user'></i> -->
            <i class='bx bx-chevron-down'></i>
            <input type="text" id="uname-login" name="uname-login" placeholder="Username" required>
        </div>
        <div class="input-box">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" id="psw-login" name="psw-login" placeholder="Password" required>
            <i class="bx bx-hide show-hide showBtn"></i>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox">Remember me</label>
            <a href="#">Forgot passord?</a>
        </div>

        <input type="submit" name="submit" class="btn" value="Login">

        <div class="register-link">
            <p>Don't have an account? <label for="check">Signup</label></p>
        </div>
    </form>
</div>