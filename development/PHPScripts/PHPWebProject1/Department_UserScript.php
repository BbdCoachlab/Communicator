<?php
//add department user link: increase department count
function linkDepartmentAndUser($id_department, $id_user)
{
	//connecting to the server and database
    $conn = connectToDB();
    
    //Inserting a link into the database
    $insertQuery = "INSERT INTO [Department_User] (Department_id_department, User_id_user) 
                    VALUES (?,?)";
    $insertStatement = sqlsrv_query($conn, $insertQuery, array($id_deparment, $id_user));
    if($insertStatement===false){
        echo "Department to User link failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and close database
    sqlsrv_free_stmt($insertStatement);
    sqlsrv_close($conn);
}

//delete department user link
//fetch all groups linked with user
//fetch all users linked with group
?>