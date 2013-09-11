<?php
function isDepartment($name){
    //connecting to the database
    $conn = connectToDB();
    
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
    $conn = connectToDB();
    //Inserting a department into the database
    $insertQuery = "INSERT INTO [Department] (name, department_size) 
                    VALUES ('".$name."', 0);";
    $insertStatement = sqlsrv_query($conn,$insertQuery);
    if($insertStatement===false){
        echo "department insertion failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and free statement
    sqlsrv_free_stmt($insertStatement);
    sqlsrv_close($conn);
    return "successful";
}
//increase department size
function increaseDepartmentSize($name){
    //connecting to the server
    $conn = connectToDB();
    //Retrieve current size
    $selectQuery = "SELECT department_size 
                    FROM [Department] 
                    WHERE name = '".$name."';";
    $statement = sqlsrv_query($conn,$selectQuery);
    if ($statement===false)
    {
    	die(print_r(sqlsrv_errors(),true));
    }
    $currentDepartmentSize = sqlsrv_fetch_array($statement);
    sqlsrv_free_stmt($statement);
    //set new department size
    $newDepartmentSize = $currentDepartmentSize[0] + 1;
    //update table entry department size
    $updateQuery = "UPDATE Department SET department_size = ? WHERE name = ?";
    $statement = sqlsrv_query($conn,$updateQuery,array($newDepartmentSize,$name));
    if ($statement===false)
    {
    	die(print_r(sqlsrv_errors(),true));
    }
    sqlsrv_free_stmt($statement);
    sqlsrv_close($conn);
    return "succesfull";
    
}
//decrease department size
//return department size
//delete department
//list department
//edit department name...maybe
?>