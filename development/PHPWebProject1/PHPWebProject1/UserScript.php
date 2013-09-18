<?php
include("connectionScript.php");
function addUser($id_user, $name, $surname, $email, $profile_pic_url, $birthdate, $group){
    //connecting to the server and database
    connectToDB();
    
    
    //Inserting a user into the database
    $insertQuery = "INSERT INTO [User] (id_user, name, surname, email, profile_pic_url, birthdate) VALUES ('".$id_user."', '".$name."', '".$surname."', '".$email."', '".$profile_pic_url."', '".$birthdate."')";
    $insertStatement = sqlsrv_query($conn,$insertQuery);
    if($insertStatement===false){
        echo "User insertion failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement
    sqlsrv_free_stmt($insertStatement);
    
    
    /*verification: print out id and name of added user*/
    $testQuery = "SELECT * FROM [User] WHERE id_user =".$id_user.";";
    $testStatement = sqlsrv_query($conn,$testStatement);
    if($testStatement === false){
        echo "test query could not connect";
        die(print_r(sqlsrv_errors(), true));
    } else {
        while($row = sqlsrv_fetch_array($testStatement, SQLSRV_FETCH_ASSOC)){
            echo $row["id_user"]." , ".$row["name"];
        }
    }
    /* Free the statement and connection resources. */
    sqlsrv_free_stmt($testStatement);
    
    //close database connection
    sqlsrv_close($conn);
}

function isUser($id_user){
    //connecting to the database
    $serverName = '(localdb)\Projects';
    $connOptions = array('AttachDBFileName'=>'C:\Users\Bandile\AppData\Local\Microsoft\VisualStudio\SSDT\v11.0\CommunicatorDB\CommunicatorDB.mdf','Database'=>'CommunicatorDB');
    $conn = sqlsrv_connect($serverName, $connOptions);
    if ($conn === false){
        die("Connection to Database failed: Make sure the server and database addresses are correct");
    }
    
    
    //check if user is in database
    $testQuery = "SELECT * FROM [User] WHERE id_user =".$id_user.";";
    $testStatement = sqlsrv_query($conn,$testStatement);
    if($testStatement === false){
        return false;
    } else {
        //Free the statement and close the database connection
        sqlsrv_free_stmt($testStatement);
        sqlsrv_close($conn);
        return true;
    }
    
    
    
}

//getUser
//remove user
//update user


?>