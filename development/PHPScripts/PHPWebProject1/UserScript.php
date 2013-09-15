<?php
function addUser($id_user, $name, $surname, $email, $profile_pic_url, $birthdate, $group){
    //connecting to the server and database
    $conn = connectToDB();
    
    
    //Inserting a user into the database
    $insertQuery = "INSERT INTO [User] (id_user, name, surname, email, profile_pic_url, birthdate) 
                    VALUES (?,?,?,?,?,?)";
    $insertStatement = sqlsrv_query($conn, $insertQuery, array($id_user, $name, $surname, $email, $profile_pic_url, $birthdate));
    if($insertStatement===false){
        echo "User insertion failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and close database
    sqlsrv_free_stmt($insertStatement);
    sqlsrv_close($conn);
}

function isUser($id_user){
    //connect to the server
    $conn = connectToDB();
    //check if user is in database
    $testQuery = "SELECT * FROM [User] 
                  WHERE id_user = ?";
    $testStatement = sqlsrv_query($conn,$testStatement,array($id_user));
    if($testStatement === false){
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
    $selectQuery = "SELECT TOP 5 * FROM [User]
                    WHERE birthdate = ?";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($today));
    if ($selectStatement === false)
    {
        sqlsrv_free_stmt($testStatement);
        sqlsrv_close($conn);
    	return null;
    }
    $results = sqlsrv_fetch_array($selectStatement, SQLSRV_FETCH_ASSOC);
    $test = json_encode($results);
    sqlsrv_free_stmt($testStatement);
    sqlsrv_close($conn);
    return $test;
}
//getUser
//remove user
//update user


?>