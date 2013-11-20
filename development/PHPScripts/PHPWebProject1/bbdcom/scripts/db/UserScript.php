<?php
function addUser($id_user, $name, $surname, $email, $profile_pic_url, $birthdate, $department){
    //connecting to the server and database
    $conn = connectToDB();
    
    //Inserting a user into the database
    $insertQuery = "INSERT INTO [User] (id_user, name, surname, email, profile_pic_url, birthdate) 
                    VALUES (?,?,?,?,?,?);";
    $insertStatement = sqlsrv_query($conn, $insertQuery, array($id_user, $name, $surname, $email, $profile_pic_url, $birthdate));
    if($insertStatement===false){
        echo "error UserScript.php : User insertion failed -> ";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement
    sqlsrv_free_stmt($insertStatement);
    
    //check if user's department exists if not add the department
    if (!isDepartment($conn, $department)) //DepartmentScript.php
    {
    	addDepartment($conn, $department); //DepartmentScript.php
    }
    
    //get department id
    $id_department = getDepartmentID($conn, $department); //DepartmentScript.php
    
    //link new user and (new)department
    linkDepartmentAndUser($conn, $id_department, $id_user); //Department_UserScript.php
    
    //increase department size
    increaseDepartmentSize($conn, $id_department); //DepartmentScript.php //CHANGE LATER
    
    //close connection
    sqlsrv_close($conn);
    return "adding user successful";
}

function isUser($id_user){
    //connect to the server
    $conn = connectToDB();
    //check if user is in database
    $selectQuery = "SELECT * FROM [User] 
                  WHERE id_user = ?;";
    $selectStatement = sqlsrv_query($conn,$selectQuery,array($id_user));
    if($selectStatement === false){
        echo "error UserScript.php : isUser query failed -> ";
        die(print_r(sqlsrv_errors(), true));
        
    } else {
        $name = sqlsrv_fetch_array($selectStatement);
        
        //return false if user query is null
        if ($name[1]==null)
        {
        	sqlsrv_free_stmt($selectStatement);
            sqlsrv_close($conn);
            return false;
        }
        
        //free statement, close connection and return true
        sqlsrv_free_stmt($selectStatement);
        sqlsrv_close($conn);
        return true;
    }
    
    
    
}

//retreive first five birthdays
function getCurrentBirthdays(){
    //connect to the server
    $currentMonth = date("n");
    $currentDay = date("j");
    $conn = connectToDB();
    //select first five birthdays
    //date name surname department
    $selectQuery = "SELECT id_user, birthdate, name, surname FROM [User]
                    WHERE (DATEPART(dd, birthdate) = ? AND DATEPART(mm, birthdate) = ?)";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($currentDay, $currentMonth));
    if ($selectStatement === false)
    {
        echo "error UserScript.php : retrieving first five upcoming birthdays failed -> ";
        die(print_r(sqlsrv_errors(), true));
    }
    $outputarray = array();
    while ($results = sqlsrv_fetch_array($selectStatement, SQLSRV_FETCH_ASSOC))
    {
        $userDepartmentListNames = array();
        $userDepartmentListIDs = getUserDepartmentList($conn, $results['id_user']);
        for ($i = 0; $i < count($userDepartmentListIDs); $i++)
        {
            array_push($userDepartmentListNames,getDepartmentName($conn,$userDepartmentListIDs[$i]));
        }
        $results['departments'] = $userDepartmentListNames;
        //array_push($results,array('departments'=>$userDepartmentListNames));
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
	$selectQuery = "SELECT name, surname FROM [User] WHERE id_user = ?;";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($id_user));
    if ($selectStatement===false)
    {
    	echo "error UserSript.php : retrieving user name and surname has failed -> ";
        die(print_r(sqlsrv_errors(), true));
    }
    $outputarray = sqlsrv_fetch_array($selectStatement);
    sqlsrv_free_stmt($selectStatement);
    return $outputarray;
}

//remove user
//update user


?>