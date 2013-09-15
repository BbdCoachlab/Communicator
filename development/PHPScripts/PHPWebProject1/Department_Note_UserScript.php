<?php
//add link between user, department, and note
function linkDepartmentNotificationUser($id_department, $id_notification, $id_user)
{
	//connecting to the server and database
    $conn = connectToDB();
    
    //Inserting a link into the database
    $insertQuery = "INSERT INTO [Department_Note_User] (Department_id_department, Notification_id_notification , User_id_user) 
                    VALUES (?,?,?)";
    $insertStatement = sqlsrv_query($conn, $insertQuery, array($id_deparment, $id_notification, $id_user));
    if($insertStatement===false){
        echo "Notification to Department to User link failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and close database
    sqlsrv_free_stmt($insertStatement);
    sqlsrv_close($conn);
}

//delete 3-way link or delete all received notifications
//get all notifications for a specific user.
//get all users a specific notifiaction was sent to.
//received: update received count.
?>