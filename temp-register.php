<!-- signup.php -->
<?php
include_once('config/mysql.php');
include_once('variables.php');
?>

<div class="title">Sign Up Page</div>
<form action="post_signup.php" method="POST">
    <div class="container">
        <label for="full-name">Full Name</label>
        <div class="row">
            <input type="text" id="full-name" name="full-name" placeholder="Your full name..." required>
        </div>
        <label for="email-signup">Email</label>
        <div class="row">
            <input type="email" id="email-signup" name="email-signup" placeholder="Your email..." required>
        </div>
        <label for="uname-signup">Username</label>
        <div class="row">
            <input type="text" id="uname-signup" name="uname-signup" placeholder="Your username..." required>
        </div>
        <label for="psw-signup">Password</label>
        <div class="row">
            <input type="password" id="psw-signup" name="psw-signup" placeholder="Your password..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Votre mot de passe doit contenir au minimum une majuscule, une minuscule, chiffre et 8 caractères" required>
        </div>
        <label for="psw-repeat">Repeat Password</label>
        <div class="row">
            <input type="password" id="psw-repeat" name="psw-repeat" placeholder="Repeat your password..." required>
        </div>
        <p>Gender :</p>
        <div class="flex-container">
            <div class="flex-left">
                <input type="radio" id="female" name="gender" value="female" required>
                <label for="female" class="gender">Female</label>
            </div>
            <div class="flex-middle">
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="male" class="gender">Male</label>
            </div>
            <div class="flex-right">
                <input type="radio" id="other" name="gender" value="other" required>
                <label for="other" class="gender">Other</label>
            </div>
        </div>
        <div class="submit">
            <input type="submit" name="submit" value="Submit">
        </div>
    </div>
</form>