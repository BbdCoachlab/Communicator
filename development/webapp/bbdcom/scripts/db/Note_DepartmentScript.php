<?php
//add note department link
function linkNotificationAndDepartment($conn, $id_department, $id_notification){
    
    //Inserting a link into the database
    $insertQuery = "INSERT INTO Note_Department (Department_id_department, Notification_id_notification) 
                    VALUES (?,?)";
    $insertStatement = mysqli_prepare($conn, $insertQuery);
    if($insertStatement===false){
        echo "Department to Notification link failed";
        die(print_r(mysqli_error(), true));
    }
	//bind parameters and execute statement
	mysqli_stmt_bind_param($insertStatement,"ii",$id_department, $id_notification);
	mysqli_stmt_execute($insertStatement);
    //free statement
    mysqli_stmt_close($insertStatement);
}
//get received counter
function receivedCount($conn, $id_department, $id_notification){
    
    $selectQuery = "SELECT received_counter 
                    FROM Note_Department 
                    WHERE Department_id_Department = ? AND Notification_id_notification = ?;";
    $selectstatement = mysqli_prepare($conn, $selectQuery);
    if ($selectstatement===false)
    {
    	die(print_r(mysqli_error(),true));
    }
	//bind parameters and execute statement
	mysqli_stmt_bind_param($selectstatement,"ii",$id_department, $id_notification);
	mysqli_stmt_execute($selectstatement);
	//fetch results
	mysqli_stmt_bind_result($selectStatement, $receivedCounter);
	mysqli_stmt_fetch($selectStatement);
    //free statement
    mysqli_stmt_close($selectstatement);
    return $receivedCounter;
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
    $statement = mysqli_prepare($conn,$updateQuery);
    if ($statement===false)
    {
    	die(print_r(mysqli_error(),true));
    }
	//bind parameters and execute statement
	mysqli_stmt_bind_param($selectstatement,"iii",$newReceivedCounter,$id_department, $id_notification);
	mysqli_stmt_execute($selectstatement);
    //free statement
    mysqli_stmt_close($selectstatement);
    return "succesfull";
}

// delete notification if received_counter equals group size.
//select notification for specific department
//remove note department
?>