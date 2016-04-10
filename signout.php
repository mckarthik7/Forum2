<?php
session_start();
//session_unset();
//session_destroy();
$_SESSION['signed_in']=false;
$_SESSION['user_id']=0;
echo 'You are ssigned out now!';
echo '<a href=login.php>Sign in!</a>';
?>