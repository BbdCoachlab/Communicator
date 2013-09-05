<?php
function addNotification($id_notification, $subject, $image, $message, $rsvp_type, $expiry_date){
    //connecting to the server and database
    $serverName = '(localdb)\Projects';
    $connOptions = array('AttachDBFileName'=>'C:\Users\Bandile\AppData\Local\Microsoft\VisualStudio\SSDT\v11.0\CommunicatorDB\CommunicatorDB.mdf','Database'=>'CommunicatorDB');
    $conn = sqlsrv_connect($serverName, $connOptions);
    if ($conn === false){
        die("Connection to Database failed: Make sure the server and database addresses are correct");
    }
    //Inserting a notification into the database
    $insertQuery = "INSERT INTO Notification (id_notification, subject, image, message, rsvp_type, expiry_date) VALUES ('".$id_notification."', '".$subject."', '".$image."', '".$message."', '".$rsvp_type."', '".$expiry_date."');";
    $insertStatement = sqlsrv_query($conn,$insertQuery);
    if($insertStatement===false){
        echo "Notification insertion failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and close connection
    sqlsrv_free_stmt($insertStatement);
    sqlsrv_close($conn);
}
//get notification
//delete notification
//delete expired
?>