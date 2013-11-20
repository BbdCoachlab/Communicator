<?php
function addNotification($subject, $image_url, $message, $rsvp_type, $expiry_date, $target_department, $notification_type){
    $conn = connectToDB();
    //Inserting a notification into the database
    $insertQuery = "INSERT INTO Notification (subject, image, message, rsvp_type, expiry_date, notification_type) 
                    VALUES (?,?,?,?,?,?);";
    $insertStatement = mysqli_prepare($conn,$insertQuery);
    if($insertStatement===false){
        echo "error NotificationScript : Notification insertion failed -> ";
        die(print_r(mysqli_error(), true));
    }
	//bind parameters and execute queries
    mysqli_stmt_bind_param($insertStatement,"ssssss",$subject, $image_url, $message, $rsvp_type, $expiry_date, $notification_type);
	mysqli_stmt_execute($insertStatement);
	
    $id_notification = mysqli_insert_id($conn);
    
	//close statement
	mysqli_stmt_close($insertStatement);
	
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
    mysqli_close($conn);
    return "Notification Added Successfully";
}

function getNotificationType($conn, $id_notification)
{
	$selectQuery = "SELECT notification_type FROM Notification WHERE id_notification = ?;";
    $selectStatement = mysqli_prepare($conn, $selectQuery);
    if ($selectStatement===false)
    {
    	sqlsrv_free_stmt($selectStatement);
        die(print_r(mysqli_error(), true));
        //return null;
    }
	//bind and execute query
	mysqli_stmt_bind_param($selectStatement,"i",$id_notification);
	mysqli_stmt_execute($selectStatement);
	//get query results
	mysqli_stmt_bind_result($selectStatement, $notification_type);
	mysqli_stmt_fetch($selectStatement);
	//close the statement
    mysqli_stmt_close($selectStatement);
    return $notification_type;
}

//get notification id
//function getNotificationID(){

//}
//delete notification
//delete expired
?>