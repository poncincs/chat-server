<!-- logout.php -->
<?php
session_start();
// Redirect to home page 
header("Location: index.php?logout=true");
// Deleting session variables
$_SESSION = array();
session_destroy();
