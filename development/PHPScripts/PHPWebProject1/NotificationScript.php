<?php
function addNotification($id_notification, $subject, $image_url, $message, $rsvp_type, $expiry_date,$target_departments){
    $conn = connectToDB();
    //Inserting a notification into the database
    $insertQuery = "INSERT INTO [Notification] (id_notification, subject, image, message, rsvp_type, expiry_date) VALUES ('".$id_notification."', '".$subject."', '".$image_url."', '".$message."', '".$rsvp_type."', '".$expiry_date."');";
    $insertStatement = sqlsrv_query($conn,$insertQuery);
    if($insertStatement===false){
        echo "Notification insertion failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and close connection
    sqlsrv_free_stmt($insertStatement);
    sqlsrv_close($conn);
    return "Added Notificaion";
}
//get notification
//delete notification
//delete expired
?>