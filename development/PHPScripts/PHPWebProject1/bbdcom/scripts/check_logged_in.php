<?php
session_start();
    if(!isset($_SESSION['logged_in'])){
        $_SESSION['login_message']='<div class="alert alert-dismissable alert-warning">'
                                    .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                    .'<strong>Please login</strong>'
                                    .'</div>';
        header('Location: /bbdcom/index.php');
    }
?>
