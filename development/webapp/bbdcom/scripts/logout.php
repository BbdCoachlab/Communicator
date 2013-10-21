<?php
// This file checks for login and redirects to the home page when user has logged out.
session_start();
if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
}
session_destroy();
header('Location: /bbdcom/index.php');

?>
