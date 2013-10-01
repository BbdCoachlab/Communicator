<?php
//add department user link: increase department count
function linkDepartmentAndUser($conn, $id_department, $id_user)
{   
    //Inserting a link into the database
    $insertQuery = "INSERT INTO [Department_User] (Department_id_department, User_id_user) 
                    VALUES (?,?)";
    $insertStatement = sqlsrv_query($conn, $insertQuery, array($id_department, $id_user));
    if($insertStatement===false){
        echo "error Department_UserScript.php : Department to User link failed -> ";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement
    sqlsrv_free_stmt($insertStatement);
}
//fetch all users linked with a department
function getDepartmentMembers($conn, $id_department)
{
    //select user IDs linked to the department
    $selectQuery = "SELECT User_id_user FROM [Department_User]
                    WHERE Department_id_department = (?)";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($id_department));
    if ($selectStatement === false)
    {
        sqlsrv_free_stmt($selectStatement);
    	return null;
    }
    $outputarray = array();
    while ($results = sqlsrv_fetch_array($selectStatement))
    {
        array_push($outputarray, $results[0]);
    }
    //free statement and close connection
    sqlsrv_free_stmt($selectStatement);
    return $outputarray;
}
//fetch all departments linked with a user
function getUserDeparmentList($conn, $id_user)
{
	//select user IDs linked to the department
    $selectQuery = "SELECT Department_id_department FROM [Department_User]
                    WHERE User_id_user = ?";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($id_user));
    if ($selectStatement === false)
    {
        echo "error Department_UserScript.php : fetching user's departments failed -> ";
        die(print_r(sqlsrv_errors(), true));
    }
    $outputarray = array();
    while ($results = sqlsrv_fetch_array($selectStatement))
    {
        array_push($outputarray, $results[0]);
    }
    //free statement and close connection
    sqlsrv_free_stmt($selectStatement);
    return $outputarray;
}

//delete department user link


?>