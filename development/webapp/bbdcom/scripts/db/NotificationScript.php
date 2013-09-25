<?php
function addNotification($id_notification, $subject, $image_url, $message, $rsvp_type, $expiry_date, $target_department){
    $conn = connectToDB();
    //Inserting a notification into the database
    $insertQuery = "INSERT INTO [Notification] (id_notification, subject, image, message, rsvp_type, expiry_date) 
                    VALUES (?,?,?,?,?,?);";
    $insertStatement = sqlsrv_query($conn,$insertQuery,array($id_notification, $subject, $image_url, $message, $rsvp_type, $expiry_date));
    if($insertStatement===false){
        echo "Notification insertion failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and close connection
    sqlsrv_free_stmt($insertStatement);
    
    //get target departments id
    $id_department = getDepartmentID($conn, $target_department);
    //link notification to target department
    linkNotificationAndDepartment($conn, $id_department, $id_notification);
    //get all users in target group
    $targetGroupMembers = getGroupMembers($conn, $id_department);
    //link notification, department and user
    for ($i = 0; $i < count($targetGroupMembers); $i++)
    {
        linkDepartmentNotificationUser($conn, $id_department, $id_notification, $targetGroupMembers[$i]);
    }
    
    //close connection
    sqlsrv_close($conn);
    return "Added Notificaion";
}
//get notification
//delete notification
//delete expired
?>