<?php

//echo("In page");
require 'ConDb.php';
$ev = new notification();
$ev ->notify();

class notification
{
   
   public function notify()
   {
     //  echo("In notify");
       
      $db = new conectDB();
      $con =  $db->Opencon();
     // echo("one");
           $notificationQuery = "SELECT * FROM dbo.Notification;";
           $result = sqlsrv_query($con,$notificationQuery);
           
           if(!$result)
            {
         echo("Query failed");
            }
            else
            {
              // echo("ok");
                while($note = sqlsrv_fetch_array($result))
                {
                  
                    $json = json_encode($note);
                    echo(   $json);
                  //  $json = json_encode($result);
                    //echo($result."Itumeleneng");
                   
                }
            }
          sqlsrv_close($con);
  }
   
}

?>