<?php
session_start();
if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
}
session_destroy();
header('Location: /bbdcom/index.php');

?>
