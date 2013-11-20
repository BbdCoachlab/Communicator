<?php

//add department user link: increase department count
function linkDepartmentAndUser($conn, $id_department, $id_user) {
    //Inserting a link into the database
    $insertQuery = "INSERT INTO Department_User  (Department_id_department, User_id_user) VALUES (?,?)";

    $insertStmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($insertStmt, 'ss', $id_department, $id_user);

    //execute prepared statement
    mysqli_stmt_execute($insertStmt);

    //close statement
    mysqli_stmt_close($insertStmt);
}

//fetch all users linked with a department
function getDepartmentMembers($conn, $id_department) {
    //select user IDs linked to the department
    $selectQuery = "SELECT User_id_user FROM Department_User WHERE Department_id_department = ?";

    if ($selectStmt = mysqli_prepare($conn, $selectQuery)) {

        //bind parameters 
        mysqli_stmt_bind_param($selectStmt, "i", $id_department);

		//execute prepared statement
		 mysqli_stmt_execute($selectStmt);
		
        //bind result variable
        mysqli_stmt_bind_result($selectStmt, $resultQuery);



        //fetch value
        mysqli_stmt_fetch($selectStmt);
        if ($resultQuery == null) {
            //free statement, close connection 
            mysqli_stmt_close($selectStmt);
            //mysqli_close($conn);

            return null;
        }

        //fetch values
        $outputarray = array();
		array_push($outputarray, $resultQuery);

        while ( mysqli_stmt_fetch($selectStmt)) {

            array_push($outputarray, $resultQuery);
        }
        //free statement and close connection
        mysqli_stmt_close($selectStmt);
        //mysqli_close($conn);
        return $outputarray;
    }
}

//fetch all departments linked with a user
function getUserDepartmentList($conn, $id_user) {

    //select user IDs linked to the department
    $selectQuery = "SELECT Department_id_department FROM Department_User  WHERE User_id_user = ?";

    if ($selectStmt = mysqli_prepare($conn, $selectQuery)) {

        //bind parameters 
        mysqli_stmt_bind_param($selectStmt, "s", $id_user);
		
		//execute prepared statement
		 mysqli_stmt_execute($selectStmt);
		 
        //bind result variable
        mysqli_stmt_bind_result($selectStmt, $resultQuery);

        //fetch value
        mysqli_stmt_fetch($selectStmt);
        if ($resultQuery == null) {
            //free statement, close connection 
            mysqli_stmt_close($selectStmt);
            //mysqli_close($conn);

            return null;
        }
        $outputarray = array();
		array_push($outputarray, $resultQuery);
		
        while (mysqli_stmt_fetch($selectStmt)) {
            array_push($outputarray, $resultQuery);
        }


        //free statement and close connection
        mysqli_stmt_close($selectStmt);
        //mysqli_close($conn);
        return $outputarray;
    }
}

//delete department user link
?>