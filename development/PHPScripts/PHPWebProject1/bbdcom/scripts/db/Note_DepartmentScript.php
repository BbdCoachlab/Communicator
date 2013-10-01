<?php
//add note department link
function linkNotificationAndDepartment($conn, $id_deparment, $id_notification){
    
    //Inserting a link into the database
    $insertQuery = "INSERT INTO [Note_Department] (Department_id_department, Notification_id_notification) 
                    VALUES (?,?)";
    $insertStatement = sqlsrv_query($conn, $insertQuery, array($id_deparment, $id_notification));
    if($insertStatement===false){
        echo "Department to Notification link failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and close database
    sqlsrv_free_stmt($insertStatement);
}
//get received counter
function receivedCount($conn, $id_department, $id_notification){
    
    $selectQuery = "SELECT received_counter 
                    FROM [Note_Department] 
                    WHERE Department_id_Department = ? AND Notification_id_notification = ?;";
    $statement = sqlsrv_query($conn, $selectQuery, array($id_department, $id_notification));
    if ($statement===false)
    {
    	die(print_r(sqlsrv_errors(),true));
    }
    $receivedcounter = sqlsrv_fetch_array($statement);
    sqlsrv_free_stmt($statement);
    return $receivedcounter[0];
}

//increase received counter
function increaseReceivedCounter($conn, $id_department, $id_notification){
    //connecting to the server
    //$conn = connectToDB();
    $currentReceivedCounter = receivedCount($conn, $id_department, $id_notification);
    //add 1 to received_counter
    $newReceivedCounter = $currentReceivedCounter + 1;
    //update table entry department size
    $updateQuery = "UPDATE Notification_Department 
                    SET received_counter = ? 
                    WHERE Department_id_department = ? AND Notification_id_notification = ?";
    $statement = sqlsrv_query($conn,$updateQuery,array($newReceivedCounter,$id_department, $id_notification));
    if ($statement===false)
    {
    	die(print_r(sqlsrv_errors(),true));
    }
    sqlsrv_free_stmt($statement);
    sqlsrv_close($conn);
    return "succesfull";
}

// delete notification if received_counter equals group size.
//select notification for specific department
//remove note department
?>