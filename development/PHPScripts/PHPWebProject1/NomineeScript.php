<?php
//is nominated
function isNominee($id_user, $category)
{
	//connect to the server
    $conn = connectToDB();
    //check if nominee is in database
    $selectQuery = "SELECT ? FROM [Nominee] 
                  WHERE User_id_user = ? AND ";
    $selectStatement = sqlsrv_query($conn,$selectQuery,array($category, $id_user));
    if($selectStatement === false){
        echo "error NomineeScript.php : isNominee query failed -> ";
        die(print_r(sqlsrv_errors(), true));
    } else {
        //if the user is a nominee but is not nominated for the passed category then return false
        $result = sqlsrv_fetch_array($selectStatement);
        if ($result[0]==0)
        {
        	sqlsrv_free_stmt($selectStatement);
            return false;
        }
        
        //Free the statement and close the database connection and return true
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
    $insertQuery = "INSERT INTO [Nominee] (User_id_user, ?) 
                    VALUES (?,1);";
    $insertStatement = sqlsrv_query($conn,$insertQuery, array($category, $User_id_user));
    if($insertStatement===false){
        echo "error NomineeScript.php : Nominee insertion failed -> ";
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
                    WHERE User_id_user = ?;";
    $selectStatement = sqlsrv_query($conn, $selectQuery, array($category, $id_user));
    if ($selectStatement===false)
    {
        echo "error NomineeScript.php : current votes query fail -> ";
    	die(print_r(sqlsrv_errors(),true));
    }
    $categoryVotes = sqlsrv_fetch_array($selectStatement);
    sqlsrv_free_stmt($selectStatement);
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
                    WHERE User_id_user = ?";
    $updateStatement = sqlsrv_query($conn,$updateQuery,array($category, $newCategoryVotes, $id_user));
    if ($updateStatement===false)
    {
        echo "error NomineeScript.php : voting for user has fail -> ";
    	die(print_r(sqlsrv_errors(),true));
    }
    //free statement, close connection and return 'successfull'
    sqlsrv_free_stmt($updateStatement);
    sqlsrv_close($conn);
    return "successfull";
}

//clear nominee table
function clearNominees()
{
    //connect to the server
	$conn = connectToDB();
    //delete query
    $deleteQuery = "DELETE FROM [Nominee]";
    $deleteStatement = sqlsrv_query($conn, $deleteQuery);
    if ($deleteStatement === false)
    {
        echo "error NomineeScript.php : deleting Nominees has failed -> ";
    	die(print_r(sqlsrv_errors(),true));
    }
    
    //free statement, close connection and return 'successful'
    sqlsrv_free_stmt($deleteStatement);
    sqlsrv_close($conn);
    return "successfull";
}

//return Category leader user IDs
function getLeaderIDsAndCategories($conn)
{
    $outputarray = array();
    
    //Select category leader in category 1
    $selectQuery1 = "SELECT User_id_user, MAX(category_1) FROM [Nominee];";
    //Select category leader in category 1
    $selectQuery2 = "SELECT User_id_user, MAX(category_2) FROM [Nominee];";
    //Select category leader in category 1
    $selectQuery3 = "SELECT User_id_user, MAX(category_3) FROM [Nominee];";
    
    //process select query 1
    $selectStatement = sqlsrv_query($conn, $selectQuery1);
    if ($selectStatement === false)
    {
        echo "error NomineeScript.php : retrieving category_1 leader -> ";
    	die(print_r(sqlsrv_errors(),true));
    }else{
        $catergoryLeader = sqlsrv_fetch_array($selectStatement);
        if ($catergoryLeader[1] == 0)
        {
        	array_push($outputarray, array(null,"category_1"));
        }else
        {
        	array_push($outputarray,array($catergoryLeader[0],"category_1"));
        }
        
        sqlsrv_free_stmt($selectStatement);
    }
    
    //process select query 2
    $selectStatement = sqlsrv_query($conn, $selectQuery2);
    if ($selectStatement === false)
    {
        echo "error NomineeScript.php : retrieving category_2 leader -> ";
    	die(print_r(sqlsrv_errors(),true));
    }else{
        $catergoryLeader = sqlsrv_fetch_array($selectStatement);
        if ($catergoryLeader[1] == 0)
        {
        	array_push($outputarray, array(null,"category_2"));
        }else
        {
        	array_push($outputarray,array($catergoryLeader[0],"category_2"));
        }
        
        sqlsrv_free_stmt($selectStatement);
    }
    
    //process select query 3
    $selectStatement = sqlsrv_query($conn, $selectQuery3);
    if ($selectStatement === false)
    {
        echo "error NomineeScript.php : retrieving category_3 leader -> ";
    	die(print_r(sqlsrv_errors(),true));
    }else{
        $catergoryLeader = sqlsrv_fetch_array($selectStatement);
        if ($catergoryLeader[1] == 0)
        {
        	array_push($outputarray, array(null,"category_3"));
        }else
        {
        	array_push($outputarray,array($catergoryLeader[0],"category_3"));
        }
        
        sqlsrv_free_stmt($selectStatement);
    }
    return $outputarray;
}

//get the nominee category leaders
function getCategoryLeaders()
{
	//connect to the database
    $conn = connectToDB();
    //retrieve the leader IDs
    $leaderIDs = getLeaderIDsAndCategories($conn);
    $outputArray = array();
    //get the names, surnames and departments of the category leaders 
    for ($i = 0; $i < count($leaderIDs); $i++)
    {
        
        $leaderDepartmentListIDs = getUserDeparmentList($conn, $leaderIDs[$i][0]); //Department_UserScript.php
        
        $leaderDepartmentListNames = array();
        for ($j = 0; $j < count($leaderDepartmentListIDs); $j++)
        {
            array_push($leaderDepartmentListNames,getDepartmentName($conn,$leaderDepartmentListIDs[$j])); //DepartmentScript.php
        }
        $leaderNameAndSurname = getUserNameAndSurname($conn,$leaderIDs[$i]); //UserScript.php
        array_push($leaderNameAndSurname,$leaderDepartmentListNames,$leaderIDs[$i][1]);
        array_push($outputArray, $leaderNameAndSurname);
    }
    
    //close connection and return category leaders
    sqlsrv_close($conn);
    return $outputArray;
    
}

//return nominee values
?>