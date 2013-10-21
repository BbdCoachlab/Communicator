<?php
function addNotification($subject, $image_url, $message, $rsvp_type, $expiry_date, $target_department, $notification_type){
    $conn = connectToDB();
    //Inserting a notification into the database
    $insertQuery = "INSERT INTO [Notification] (subject, image, message, rsvp_type, expiry_date, notification_type) 
                    VALUES (?,?,?,?,?,?);";
    $insertStatement = sqlsrv_query($conn,$insertQuery,array($subject, $image_url, $message, $rsvp_type, $expiry_date, $notification_type));
    if($insertStatement===false){
        echo "error NotificationScript : Notification insertion failed -> ";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and close connection
    sqlsrv_free_stmt($insertStatement);
    
    //get id of inserted notifiation: this is not the best way of doing this since I believe the could be interleaving problems when run concurrently however it is a temporary solution.
    $selectQuery = "SELECT TOP 1 id_notification FROM [Notification] ORDER BY id_notification DESC;";
    $selectStatement = sqlsrv_query($conn,$selectQuery);
    if($selectStatement===false){
        echo "error NotificationScript : Fetching newly inserted notification ID has failed -> ";
        die(print_r(sqlsrv_errors(), true));
    }
    
    $new_notification = sqlsrv_fetch_array($selectStatement);
    //free statement and close connection
    sqlsrv_free_stmt($selectStatement);
    
    $id_notification = $new_notification[0];
    //get target departments id
    $id_department = getDepartmentID($conn, $target_department);
    //link notification to target department
    linkNotificationAndDepartment($conn, $id_department, $id_notification);
    //get all users in target group
    $targetDepartmentMembers = getDepartmentMembers($conn, $id_department);
    //link notification, department and user
    for ($i = 0; $i < count($targetDepartmentMembers); $i++)
    {
        linkDepartmentNotificationUser($conn, $id_department, $id_notification, $targetDepartmentMembers[$i]);
    }
    
    //close connection
    sqlsrv_close($conn);
    return "Notification Added Successfully";
}

function getNotificationType($conn, $id_notification)
{
	$selectQuery = "SELECT notification_type FROM [Notification] WHERE id_notification = ?;";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($id_notification));
    if ($selectStatement===false)
    {
    	sqlsrv_free_stmt($selectStatement);
        die(print_r(sqlsrv_errors(), true));
        //return null;
    }
    $outputarray = sqlsrv_fetch_array($selectStatement);
    sqlsrv_free_stmt($selectStatement);
    return $outputarray;
}

//get notification id
//function getNotificationID(){

//}
//delete notification
//delete expired
?>