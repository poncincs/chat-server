<!-- register.php -->
<?php
include_once('config/mysql.php');
include_once('variables.php');
?>

<div class="wrapper">
    <form action="post_register.php" method="POST">
        <h1>Register</h1>
        <div class="input-box">
            <i class='bx bx-user'></i>
            <input type="text" id="full-name" name="full-name" placeholder="Full Name" required>
        </div>
        <div class="input-box">
            <i class='bx bxs-envelope'></i>
            <input type="email" id="email-register" name="email-register" placeholder="Email" required>
        </div>
        <div class="input-box">
            <i class='bx bxs-user'></i>
            <input type="text" id="uname-register" name="uname-register" placeholder="Username" required>
        </div>
        <div class="input-box">
            <i class='bx bxs-lock-alt'></i>
            <input onkeyup="trigger()" type="password" id="psw-register" name="psw-register" placeholder="Password" required>
            <i class="bx bx-hide show-hide showBtn"></i>
        </div>
        <div class="indicator">
            <span class="weak"></span>
            <span class="medium"></span>
            <span class="strong"></span>
        </div>
        <div class="text"></div>
        <div class="input-box">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" id="psw-repeat" name="psw-repeat" placeholder="Repeat Password" required>
            <i class="bx bx-hide show-hide showBtn"></i>
        </div>
        <input type="submit" name="submit" class="btn" value="Register">

        <div class="login-link">
            <p>Already have an account? <label for="check">Login</label></p>
        </div>
    </form>
</div>

<script type="text/javascript" src="js/passwordIndicator.js"></script>