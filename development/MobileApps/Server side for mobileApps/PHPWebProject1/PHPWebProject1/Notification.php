<?php

$note = '';
require 'ConDb.php';
$ev = new notification();
$ev ->notify();

class notification
{
   public function notify()
   {
      $db = new conectDB();
      $con =  $db->Opencon();
           $notificationQuery = "SELECT * FROM dbo.Notification;";
           $result = sqlsrv_query($con,$notificationQuery);
           if(!$result)
            {
         echo("Query failed");
            }
            else
            {           
                while($note = sqlsrv_fetch_array($result))
                {
                    $notification = $note;
                }
            }
          sqlsrv_close($con);
          echo (json_encode($notification));
  }
}


?>