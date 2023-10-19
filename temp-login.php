<!-- login.php -->
<?php
include_once('config/mysql.php');
include_once('variables.php');
?>
<div class="title">Login Page</div>
<form action="post_login.php" method="POST">
    <div class="container">
        <label for="email-login">Email</label>
        <div class="row">
            <input type="email" id="email-login" name="email-login" placeholder="Your email..." required>
        </div>
        <label for="psw-login">Password</label>
        <div class="row">
            <input type="password" id="psw-login" name="psw-login" placeholder="Your password..." required>
        </div>

        <input type="checkbox" checked="checked" name="remember" id="remember" value="Remember"><label for="remember">Remember me</label>

        <div class="submit">
            <input type="submit" name="submit" value="Submit">
        </div>
        <div class="forgot-psw">
            <span>Forgot <a href="#">password?</a></span>
        </div>

    </div>
</form>