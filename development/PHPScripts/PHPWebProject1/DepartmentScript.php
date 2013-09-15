<?php
function isDepartment($name){
    //connecting to the database
    $conn = connectToDB();
    
    //check if department is in database
    $testQuery = "SELECT TOP 1 * FROM Group 
                  WHERE name =?;";
    $testStatement = sqlsrv_query($conn,$testStatement, array($name));
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
                    VALUES (?, 0);";
    $insertStatement = sqlsrv_query($conn,$insertQuery, array($name));
    if($insertStatement===false){
        echo "department insertion failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and free statement
    sqlsrv_free_stmt($insertStatement);
    sqlsrv_close($conn);
    return "successful";
}
//retreive department size
function departmentSize($conn, $name){
    //Retrieve current size
    $selectQuery = "SELECT department_size 
                    FROM [Department] 
                    WHERE name = ?;";
    $statement = sqlsrv_query($conn, $selectQuery, array($name));
    if ($statement===false)
    {
    	die(print_r(sqlsrv_errors(),true));
    }
    $DepartmentSize = sqlsrv_fetch_array($statement);
    sqlsrv_free_stmt($statement);
    return $DepartmentSize[0];
}

//increase department size
function increaseDepartmentSize($name){
    //connecting to the server
    $conn = connectToDB();
    $currentDepartmentSize = departmentSize($conn, $name);
    //set new department size
    $newDepartmentSize = $currentDepartmentSize + 1;
    //update table entry department size
    $updateQuery = "UPDATE Department 
                    SET department_size = ? 
                    WHERE name = ?";
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
//delete department
//list department

//edit department name...maybe
?>