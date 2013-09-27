<?php
//is nominated
function isNominee($id_user)
{
	//connect to the server
    $conn = connectToDB();
    //check if nominee is in database
    $testQuery = "SELECT * FROM [Nominee] 
                  WHERE User_id_user = ?";
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

//add nominee
function addNominee($User_id_user, $category){
    
    //connecting to the server and database
    $conn = connectToDB();
    //Inserting a nominee into the database
    $insertQuery = "INSERT INTO Nominee (User_id_user, ?) 
                    VALUES (?,1);";
    $insertStatement = sqlsrv_query($conn,$insertQuery, array($category, $User_id_user));
    if($insertStatement===false){
        echo "Nominee insertion failed";
        die(print_r(sqlsrv_errors(), true));
    }
    
    //free statement and close connection
    sqlsrv_free_stmt($insertStatement);
    sqlsrv_close($conn);
}
//get current users cataegory votes
function getCurrentCategoryVotes($conn, $id_user, $category)
{
	//Retrieve current size
    $selectQuery = "SELECT ? 
                    FROM [Nominee] 
                    WHERE id_user = ?;";
    $statement = sqlsrv_query($conn, $selectQuery, array($category, $id_department));
    if ($statement===false)
    {
    	die(print_r(sqlsrv_errors(),true));
    }
    $categoryVotes = sqlsrv_fetch_array($statement);
    sqlsrv_free_stmt($statement);
    return $categoryVotes[0];
}

//vote
function vote($id_user, $category)
{
	//connecting to the server
    $conn = connectToDB();
    $currentCategoryVotes = getCurrentCategoryVotes($conn, $id_user, $category);
    //set new department size
    $newCategoryVotes = $currentCategoryVotes + 1;
    //update table entry department size
    $updateQuery = "UPDATE [Nominee] 
                    SET ? = ? 
                    WHERE id_user = ?";
    $statement = sqlsrv_query($conn,$updateQuery,array($category, $newCategoryVotes, $id_user));
    if ($statement===false)
    {
    	die(print_r(sqlsrv_errors(),true));
    }
    sqlsrv_free_stmt($statement);
    sqlsrv_close($conn);
    return "succesfull";
}

//clear nominee table
function clearNominees( )
{
    //connect to the server
	$conn = connectToDB();
    //delete query
    $deleteQuery = "DELETE FROM [Nominee]";
    $statement = sqlsrv_query($conn, $deleteQuery);
    if ($statement === false)
    {
    	die(print_r(sqlsrv_errors(),true));
    }
    sqlsrv_free_stmt($statement);
    sqlsrv_close($conn);
    return "succesfull";
}

//return nominee values
?>