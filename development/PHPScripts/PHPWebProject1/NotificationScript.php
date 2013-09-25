<?php
function addNotification($id_notification, $subject, $image_url, $message, $rsvp_type, $expiry_date, $target_department, $notification_type){
    $conn = connectToDB();
    //Inserting a notification into the database
    $insertQuery = "INSERT INTO [Notification] (id_notification, subject, image, message, rsvp_type, expiry_date, notification_type) 
                    VALUES (?,?,?,?,?,?,?);";
    $insertStatement = sqlsrv_query($conn,$insertQuery,array($id_notification, $subject, $image_url, $message, $rsvp_type, $expiry_date, $notification_type));
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

//get notification
//delete notification
//delete expired
?>