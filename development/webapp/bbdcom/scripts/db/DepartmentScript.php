<?php
function isDepartment($conn, $name){
    //check if department is in database
    $selectQuery = "SELECT TOP 1 * FROM [Department] 
                  WHERE name =?;";
    $selectStatement = sqlsrv_query($conn,$selectQuery, array($name));
    if($selectStatement === false){
        //Free the statement
        //sqlsrv_free_stmt($testStatement);
        //return false;
        echo "error DepartmentScript : isDepartment check statement has failed -> ";
        die(print_r(sqlsrv_errors(), true));
    } else {
        //check if query result is null
        $id_department = sqlsrv_fetch_array($selectStatement);
        if ($id_department[0]==null)
        {
            sqlsrv_free_stmt($selectStatement);
        	return false;
        }
        //free statemnet and return true
        sqlsrv_free_stmt($selectStatement);
        return true;
    }
    
}

function addDepartment($conn, $name){
    //Inserting a department into the database
    $insertQuery = "INSERT INTO [Department] (name) 
                    VALUES (?);";
    $insertStatement = sqlsrv_query($conn,$insertQuery, array($name));
    if($insertStatement===false){
        echo "department insertion failed";
        die(print_r(sqlsrv_errors(), true));
    }
    //free statement and free statement
    sqlsrv_free_stmt($insertStatement);
}
//retreive department size
function departmentSize($conn, $id_department){
    //Retrieve current department size
    $selectQuery = "SELECT department_size 
                    FROM [Department] 
                    WHERE id_department = ?;";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($id_department));
    if ($selectStatement===false)
    {
        echo "error DepartmentScript.php : retrieving the department size has failed -> ";
    	die(print_r(sqlsrv_errors(),true));
    }
    $DepartmentSize = sqlsrv_fetch_array($selectStatement);
    //free statement and return department size
    sqlsrv_free_stmt($selectStatement);
    return $DepartmentSize[0];
}

//increase department size
function increaseDepartmentSize($conn, $id_department){
    //retrieve current department size.
    $currentDepartmentSize = departmentSize($conn, $id_department);
    //set new department size
    $newDepartmentSize = $currentDepartmentSize + 1;
    //update table entry department size
    $updateQuery = "UPDATE Department 
                    SET department_size = ? 
                    WHERE id_department = ?";
    $updateStatement = sqlsrv_query($conn,$updateQuery,array($newDepartmentSize,$id_department));
    if ($updateStatement===false)
    {
        echo "error DepartmentScript.php : updating department size has failed -> ";
    	die(print_r(sqlsrv_errors(),true));
    }
    //free statement
    sqlsrv_free_stmt($updateStatement);
    
}
//retrieve the department id
function getDepartmentID($conn, $name)
{
	//Retrieve current size
    $selectQuery = "SELECT id_department 
                    FROM [Department] 
                    WHERE name = ?;";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($name));
    if ($selectStatement===false)
    {
        echo "error DepartmentScript.php : Fetching department id has failed -> ";
    	die(print_r(sqlsrv_errors(),true));
    }
    $DepartmentID = sqlsrv_fetch_array($selectStatement);
    //free statement and return department ID
    sqlsrv_free_stmt($selectStatement);
    return $DepartmentID[0];
}

//retrieve the deparment name
function getDepartmentName($conn, $id_department)
{
	//Retrieve current size
    $selectQuery = "SELECT name 
                    FROM [Department] 
                    WHERE id_department = ?;";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($id_department));
    if ($selectStatement===false)
    {
        echo "error DepartmentScript.php : retrieving department name has failed -> ";
    	die(print_r(sqlsrv_errors(),true));
    }
    $DepartmentName = sqlsrv_fetch_array($selectStatement);
    sqlsrv_free_stmt($selectStatement);
    return $DepartmentName[0];
}

//list departments
function getAllDepartments()
{
	//connecting to the database
    $conn = connectToDB();
    
    //check if department is in database
    $selectQuery = "SELECT name FROM [Department];";
    $selectStatement = sqlsrv_query($conn,$selectQuery);
    if($selectStatement === false){
        //Free the statement and close the database connection
        echo "error DepartmentScript.php : retrieving all departments failed ->";
    	die(print_r(sqlsrv_errors(),true));
    }
    $outputarray = array();
    while ($result = sqlsrv_fetch_array($selectStatement))
    {
        array_push($outputarray, $result[0]);
    }
    
    //Free the statement and close the database connection
    sqlsrv_free_stmt($selectStatement);
    sqlsrv_close($conn);
    return $outputarray;
}
//decrease department size
//delete department
//edit department name...maybe
?>