 <?php 
 session_start();
 if(isset($_SESSION["message_error"]))
 {
     echo $_SESSION["message_error"];
     unset( $_SESSION["message_error"]);
 }       
?>