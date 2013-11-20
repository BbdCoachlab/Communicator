<?php
//add link between user, department, and note
function linkDepartmentNotificationUser($conn, $id_department, $id_notification, $id_user)
{
    //Inserting a link into the database
    $insertQuery = "INSERT INTO Department_Note_User (Notification_id_notification, Department_id_department, User_id_user) 
                    VALUES (?, ?, ?)";
    $insertStatement = mysqli_prepare($conn, $insertQuery);
    if($insertStatement===false){
        echo "error Deaprtment_Note_UserScript.php : Notification to Department to User link failed -> ";
        die(print_r(mysqli_error(), true));
    }
	//bind parameters and execute queries
    mysqli_stmt_bind_param($insertStatement,"iis",$id_notification, $id_department, $id_user);
	mysqli_stmt_execute($insertStatement);
    //close statement
	mysqli_stmt_close($insertStatement);
}

//
//delete 3-way link or delete all received notifications
//get all notifications for a specific user.
//get all users a specific notification was sent to.
//received: update received count.
?>