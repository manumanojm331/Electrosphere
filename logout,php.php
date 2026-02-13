<?php
session_start();
// Unset the user_logged_in session variable
unset($_SESSION['user_logged_in']);
unset($_SESSION['user_email']);

// Redirect back to the homepage
header('Location: signin.php');
exit;
?>