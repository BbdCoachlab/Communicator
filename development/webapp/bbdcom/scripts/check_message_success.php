 <?php 
 if(isset($_SESSION["message_error"]))
 {
     echo $_SESSION["message_error"];
     unset( $_SESSION["message_error"]);
 } 
 
 if(isset($_SESSION["message_success"]))
 {
     echo $_SESSION["message_success"];
     unset( $_SESSION["message_success"]);
 }
?>