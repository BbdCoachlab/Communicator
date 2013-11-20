<?php
function isDepartment($conn, $name){
    //check if department is in database
    $selectQuery = "SELECT * FROM Department 
                  WHERE name =? 
				  LIMIT 1;";
    $selectStatement = mysqli_prepare($conn,$selectQuery);
    if($selectStatement === false){
        //Free the statement
        //sqlsrv_free_stmt($testStatement);
        //return false;
        echo "error DepartmentScript : isDepartment check statement has failed -> ";
        die(print_r(mysqli_error(), true));
    } else {
		//bind and execute query
		mysqli_stmt_bind_param($selectStatement,"s",$name);
		mysqli_stmt_execute($selectStatement);
        //check if query result is null
		mysqli_stmt_bind_result($selectStatement, $res_ID, $res_name);
		mysqli_stmt_fetch($selectStatement);
        if ($res_ID == null)
        {
            mysqli_stmt_close($selectStatement);
        	return false;
        }
        //free statemnet and return true
        mysqli_stmt_close($selectStatement);
        return true;
    }
    
}

function addDepartment($conn, $name){
    //Inserting a department into the database
    $insertQuery = "INSERT INTO Department (name) 
                    VALUES (?);";
    $insertStatement = mysqli_prepare($conn,$insertQuery);
    if($insertStatement===false){
        echo "error DepartmentScript : department insertion failed -> ";
        die(print_r(mysqli_error(), true));
    }
	//bind parameters and execute statement
	mysqli_stmt_bind_param($insertStatement,"s",$name);
	mysqli_stmt_execute($insertStatement);
    //free statement
    mysqli_stmt_close($insertStatement);
}
/*/retrieve department size
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
    
}*/
//retrieve the department id
function getDepartmentID($conn, $name)
{
	//Retrieve current size
    $selectQuery = "SELECT id_department 
                    FROM Department 
                    WHERE name = ?;";
    $selectStatement = mysqli_prepare($conn, $selectQuery);
    if ($selectStatement===false)
    {
        echo "error DepartmentScript.php : Fetching department id has failed -> ";
    	die(print_r(mysqli_error(), true));
    }
	//bind parameters and execute
	mysqli_stmt_bind_param($selectStatement,"s",$name);
	mysqli_stmt_execute($selectStatement);
	//fetch results
	mysqli_stmt_bind_result($selectStatement, $res_DepartmentID);
	mysqli_stmt_fetch($selectStatement);
    //free statement and return department ID
    mysqli_stmt_close($selectStatement);
    return $res_DepartmentID;
}

//retrieve the deparment name
function getDepartmentName($conn, $id_department)
{
	//Retrieve current size
    $selectQuery = "SELECT name 
                    FROM Department 
                    WHERE id_department = ?;";
    $selectStatement = mysqli_prepare($conn, $selectQuery);
    if ($selectStatement===false)
    {
        echo "error DepartmentScript.php : retrieving department name has failed -> ";
    	die(print_r(mysqli_error(),true));
    }
	mysqli_stmt_bind_param($selectStatement,"i",$id_department);
	mysqli_stmt_execute($selectStatement);
	mysqli_stmt_bind_result($selectStatement, $res_DepartmentName);
	mysqli_stmt_fetch($selectStatement);
    //free statement and return department ID
    mysqli_stmt_close($selectStatement);
    return $res_DepartmentName;
}

//list departments
function getAllDepartments()
{
	//connecting to the database
    $conn = connectToDB();
    
    //check if department is in database
    $selectQuery = "SELECT name FROM Department;";
    $selectStatement =  mysqli_prepare($conn,$selectQuery);
    if($selectStatement === false){
        //Free the statement and close the database connection
        echo "error DepartmentScript.php : retrieving all departments failed ->";
    	die(print_r(mysqli_error(),true));
    }
    $outputarray = array();
	mysqli_stmt_execute($selectStatement);
	mysqli_stmt_bind_result($selectStatement, $res_DepartmentName);
    while (mysqli_stmt_fetch($selectStatement))
    {
        array_push($outputarray, $res_DepartmentName);
    }
    
    //Free the statement and close the database connection
    mysqli_stmt_close($selectStatement);
    mysqli_close($conn);
    return $outputarray;
}
//decrease department size
//delete department
//edit department name...maybe
?>