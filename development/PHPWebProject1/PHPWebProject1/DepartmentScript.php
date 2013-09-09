<?php
function isDepartment($name){
    //connecting to the database
    $serverName = '(localdb)\Projects';
    $connOptions = array('AttachDBFileName'=>'C:\Users\Bandile\AppData\Local\Microsoft\VisualStudio\SSDT\v11.0\CommunicatorDB\CommunicatorDB.mdf','Database'=>'CommunicatorDB');
    $conn = sqlsrv_connect($serverName, $connOptions);
    if ($conn === false){
        die("Connection to Database failed: Make sure the server and database addresses are correct");
    }
    
    
    //check if department is in database
    $testQuery = "SELECT TOP 1 * FROM Group WHERE name =".$name.";";
    $testStatement = sqlsrv_query($conn,$testStatement);
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

function addDepartment($name){
    //connecting to the server and database
    $serverName = '(localdb)\Projects';
    $connOptions = array('AttachDBFileName'=>'C:\Users\Bandile\AppData\Local\Microsoft\VisualStudio\SSDT\v11.0\CommunicatorDB\CommunicatorDB.mdf','Database'=>'CommunicatorDB');
    $conn = sqlsrv_connect($serverName, $connOptions);
    if ($conn === false){
        die("Connection to Database failed: Make sure the server and database addresses are correct");
    }
    //Inserting a department into the database
    $insertQuery = "INSERT INTO Department (name, department_size) VALUES ('".$name."', 0);";
    $insertStatement = sqlsrv_query($conn,$insertQuery);
    if($insertStatement===false){
        echo "department insertion failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and free statement
    sqlsrv_free_stmt($insertStatement);
    sqlsrv_close($conn);
}
//increase department size
function increaseDepartmentSize(){
    
}
//decrease department size
//return department size
//delete department
//list department
//edit department name...maybe
?>