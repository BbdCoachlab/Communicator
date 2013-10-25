<?php
//add link between user, department, and note
function linkDepartmentNotificationUser($conn, $id_department, $id_notification, $id_user)
{
    //Inserting a link into the database
    $insertQuery = "INSERT INTO [Department_Note_User] (Notification_id_notification, Department_id_department, User_id_user) 
                    VALUES (?, ?, ?)";
    $insertStatement = sqlsrv_query($conn, $insertQuery, array($id_notification, $id_department, $id_user));
    if($insertStatement===false){
        echo "Notification to Department to User link failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and close database
    //array($id_department, $id_notification, $id_user, $insertStatement);
    sqlsrv_free_stmt($insertStatement);
}

//
//delete 3-way link or delete all received notifications
//get all notifications for a specific user.
//get all users a specific notifiaction was sent to.
//received: update received count.
?>