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
                    $notification = $note;                
                }
 /*
 * Push notificaion 
 * Reference : http://developer.android.com/google/gcm/gcm.html(documentation on GCM)
 */
      
/*  
 * An ID issued by the GCM servers to the Android application that
 * allows it to receive messages. Once the Android application has the registration ID,
 * it sends it to the 3rd-party application server, which uses it to identify each device that has 
 * registered to receive messages for a given Android application. In other words, a registration ID is tied to a 
 * particular Android application running on a particular device. 
 */
               //sending push notification from here. 
               $reg = array('This is suppose to be the appId');//e,g : APA91bHpdz1fTBvCxbA1qRzDRsxTGNTeRqZ1Xnsz4zwrg5d_u4ycxTGNTeRqZ1Xnsz4zwrg5d_u4ycSxZwccjtupiOR25wvVwbqOf-6U_sD3GmvVjHfYJSwF123ZX2L1aw_JUy-EiiO-ApARgjIPvT6rJLVz2Eli2YXLuCjr4oXjOQQ
               $msg = array("message" =>json_encode($notification) );
               $GC = new GCM();
               $GC->send_notification($reg, $msg);  
               
            }
          sqlsrv_close($con);   
     }
}
    class GCM { 
    /** 
     * Sending Push Notification 
     */
    public function send_notification($reg, $msg) {
      
        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $reg,
            'data' => $msg,//$json, // [{"foo":"bar"}]
        );
        $headers = array( 
        /*
         * http://developer.android.com/google/gcm/gs.html
         * API Key documentation 
         */
            'Authorization: key=' ."AIzaSyBTGGuH4Q4f56k3yU1v7hqcWiJBLnqVej8",// API key
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
             
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) { 
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch); 
        echo $result;            
    }
}
        
?>