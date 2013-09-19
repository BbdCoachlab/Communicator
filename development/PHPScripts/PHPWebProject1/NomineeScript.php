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

//return Category leader user IDs
function getLeaderIDsAndCategories($conn)
{
    $outputarray = array();
    //Select category leader in category 1
    $selectQuery1 = "SELECT User_id_user, MAX(categpry_1) FROM [Nominee];";
    //Select category leader in category 1
    $selectQuery2 = "SELECT User_id_user, MAX(categpry_2) FROM [Nominee];";
    //Select category leader in category 1
    $selectQuery3 = "SELECT User_id_user, MAX(categpry_3) FROM [Nominee];";
    
    //process select query 1
    $selectStatement = sqlsrv_query($conn, $selectQuery1);
    if ($selectStatement === false)
    {
        array_push($outputarray,null);
        sqlsrv_free_stmt($selectStatement);
    }else{
        $catergoryLeaderID = sqlsrv_fetch_array($selectStatement);
        array_push($outputarray,array($catergoryLeaderID[0],"category_1"));
        sqlsrv_free_stmt($selectStatement);
    }
    
    //process select query 2
    $selectStatement = sqlsrv_query($conn, $selectQuery2);
    if ($selectStatement === false)
    {
        array_push($outputarray,null);
        sqlsrv_free_stmt($selectStatement);   	
    }else{
        $catergoryLeaderID = sqlsrv_fetch_array($selectStatement);
        array_push($outputarray,array($catergoryLeaderID[0],"category_2"));
        sqlsrv_free_stmt($selectStatement);
    }
    
    //process select query 3
    $selectStatement = sqlsrv_query($conn, $selectQuery3);
    if ($selectStatement === false)
    {
        array_push($outputarray,null);
        sqlsrv_free_stmt($selectStatement);   	
    }else{
        $catergoryLeaderID = sqlsrv_fetch_array($selectStatement);
        array_push($outputarray,array($catergoryLeaderID[0],"category_3"));
        sqlsrv_free_stmt($selectStatement);
    }
    
    sqlsrv_close($conn);
    return $outputarray;
}

//get the nominee category leaders
function getCategoryLeaders()
{
	//connect to the database
    $conn = connectToDB();
    //retrieve the leader IDs
    $leaderIDs = getLeaderIDs($conn);
    $outputArray = array();
    //get the names, surnames and departments of the category leaders 
    for ($i = 0; $i < count($leaderIDs); $i++)
    {
        $leaderDepartmentListIDs = getUserDeparmentList($conn, $leaderIDs[$i][0]);
        $leaderDepartmentListNames = array();
        for ($j = 0; $j < count($leaderDepartmentListIDs); $j++)
        {
            array_push($leaderDepartmentListNames,getDepartmentName($conn,$leaderDepartmentListIDs[$j]));
        }
        $leaderNameAndSurname = getUserNameAndSurname($conn,$leaderIDs[$i]);
        array_push($leaderNameAndSurname,$leaderDepartmentListNames,$leaderIDs[$i][1]);
        array_push($outputArray, $leaderNameAndSurname);
    }
    
}

//return nominee values
?>