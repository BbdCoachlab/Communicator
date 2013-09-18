<?php
function addUser($id_user, $name, $surname, $email, $profile_pic_url, $birthdate, $department){
    //connecting to the server and database
    $conn = connectToDB();
    
    //Inserting a user into the database
    $insertQuery = "INSERT INTO [User] (id_user, name, surname, email, profile_pic_url, birthdate) 
                    VALUES (?,?,?,?,?,?);";
    $insertStatement = sqlsrv_query($conn, $insertQuery, array($id_user, $name, $surname, $email, $profile_pic_url, $birthdate));
    if($insertStatement===false){
        echo "User insertion failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and close database
    sqlsrv_free_stmt($insertStatement);
    //check if user's department exists if not add the department
    if (!isDepartment($conn, $department))
    {
    	addDepartment($conn, $department);
    }
    //get department id
    $id_department = getDepartmentID($conn, $department);
    //link user and department
    linkDepartmentAndUser($conn, $id_department, $id_user);
    //increase department size
    increaseDepartmentSize($conn, $id_department);
    //close connection
    sqlsrv_close($conn);
}

function isUser($id_user){
    //connect to the server
    $conn = connectToDB();
    //check if user is in database
    $testQuery = "SELECT * FROM [User] 
                  WHERE id_user = ?;";
    $testStatement = sqlsrv_query($conn,$testStatement,array($id_user));
    if($testStatement === false){
        //Free the statement and close the database connection
        sqlsrv_free_stmt($testStatement);
        sqlsrv_close($conn);
        return false;
    } else {
        //Free the statement and close the database connection
        sqlsrv_free_stmt($testStatement);
        sqlsrv_close($conn);
        return true;
    }
    
    
    
}

//retreive first five birthdays
function firstFiveBirthdays(){
    //connect to the server
    $today = date("m/d/Y");
    $conn = connectToDB();
    //select first five birthdays
    //date name surname department
    $selectQuery = "SELECT TOP 5 id_user, birthdate, name, surname FROM [User]
                    WHERE birthdate = ?;";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($today));
    if ($selectStatement === false)
    {
        sqlsrv_free_stmt($selectStatement);
        sqlsrv_close($conn);
    	return null;
    }
    $outputarray = array();
    $userDepartmentListNames = array();
    while ($results = sqlsrv_fetch_array($selectStatement, SQLSRV_FETCH_ASSOC))
    {
        $userDepartmentListIDs = getUserDeparmentList($conn, $results['id_user']);
        for ($i = 0; $i < count($userDepartmentListIDs); $i++)
        {
            array_push($userDepartmentListNames,getDepartmentName($conn,$userDepartmentListIDs[$i]));
        }
        array_push($results,array("departments"=>$userDepartmentListNames));
        array_push($outputarray, json_encode($results));
    }
    sqlsrv_free_stmt($selectStatement);
    sqlsrv_close($conn);
    return json_encode($outputarray);
}

//retrieve all birthdays
function getAllBirthdays()
{
	//connect to the server
    $today = date("m/d/Y");
    $conn = connectToDB();
    //select first five birthdays
    //date name surname department
    $selectQuery = "SELECT id_user, birthdate, name, surname FROM [User]
                    WHERE birthdate = ?;";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($today));
    if ($selectStatement === false)
    {
        sqlsrv_free_stmt($selectStatement);
        sqlsrv_close($conn);
    	return null;
    }
    $outputarray = array();
    $userDepartmentListNames = array();
    while ($results = sqlsrv_fetch_array($selectStatement, SQLSRV_FETCH_ASSOC))
    {
        $userDepartmentListIDs = getUserDeparmentList($conn, $results['id_user']);
        for ($i = 0; $i < count($userDepartmentListIDs); $i++)
        {
            array_push($userDepartmentListNames,getDepartmentName($conn,$userDepartmentListIDs[$i]));
        }
        array_push($results,array("departments"=>$userDepartmentListNames));
        array_push($outputarray, json_encode($results));
    }
    sqlsrv_free_stmt($selectStatement);
    sqlsrv_close($conn);
    return json_encode($outputarray);
}

//get user name and surname
function getUserNameAndSurname($conn, $id_user)
{
	$selectQuery = "SELECT name, surname WHERE id_user = ?;";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($id_user));
    if ($selectStatement===false)
    {
    	sqlsrv_free_stmt($selectStatement);
        return null;
    }
    $outputarray = sqlsrv_fetch_array($selectStatement);
    sqlsrv_free_stmt($selectStatement);
    return $outputarray;
}

//remove user
//update user


?>